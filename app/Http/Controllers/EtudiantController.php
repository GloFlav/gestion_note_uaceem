<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use App\Models\Candidat;
use App\Models\Etudiant;
use App\Models\Matricule;
use App\Models\Mention;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    public function index($id)
    {
        $matricule = Matricule::findOrFail($id);
        $matricule->candidat()->get();
        return view('inscription-etudiant.index', compact('matricule'));
    }

    public function generatePassword($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        return substr(str_shuffle($characters), 0, $length);
    }

    public function store(EtudiantRequest $request)
    {
        // Valider les données entrantes
        $request->validate([
            'nom' => 'required|string|min:2|max:80|regex:/^[a-zA-ZÀ-ÿ\s\-]+$/u',
            'mention_id' => 'required|exists:mentions,id',
            'matricule' => 'required|integer|exists:matricules,id',
            // D'autres règles de validation si nécessaire
        ]);

        // Récupérer les 4 premières lettres du nom
        $nom = $request->input('nom');
        $part_nom = substr($nom, 0, 4);

        // Récupérer le design en fonction du mention_id
        $mention = Mention::findOrFail($request->input('mention_id'));
        $design = $mention->code;

        // Mapper les designs aux nombres
        $design_to_code = [
            'COM' => '33',
            'DT'  => '44',
            'SS'  => '22',
            'RI'  => '66',
            'ECO' => '55',
            'GE'  => '77',
            'IE'  => '99',
        ];

        // Vérifier si le design existe dans le mapping
        $code = isset($design_to_code[$design]) ? $design_to_code[$design] : '00'; // 00 par défaut si pas trouvé

        // Récupérer le matricule
        $matricule = Matricule::findOrFail($request->input('matricule'));

        // Extraire les 3 premiers chiffres du champ 'design' de la table matricules
        $part_design = substr($matricule->design, 0, 3);

        // Formater les 3 chiffres en 4 chiffres (ajout d'un 0 si nécessaire)
        $part_design_formatted = str_pad($part_design, 4, '0', STR_PAD_LEFT);

        // Générer le username
        $username = strtolower($part_nom) . $code . $part_design_formatted;

        // Générer un mot de passe aléatoire de 10 caractères
        $password = $this->generatePassword(10);

        // Crypter et hacher le mot de passe avant de le stocker (Option 1 : Hash sécurisé)
        $hashedPassword = $password;

        // Option 2 (si besoin de déchiffrer) :
        // $encryptedPassword = Crypt::encryptString($password);

        // Find the related Candidat
        $candidat = Candidat::find($request->candidat_id);

        // Update Candidat's email if it's null
        if (!$candidat->email && $request->has('email')) {
            $candidat->email = $request->email;
            $candidat->save();
        }
            // Créer un nouvel étudiant
        $etudiant = new Etudiant();
        $etudiant->candidat_id = $request->candidat_id;
        $etudiant->password_changed = 1;

        // Remplir les autres champs, sauf 'photo'
        $etudiant->fill($request->except('photo'));

        // Vérifier si un fichier a été uploadé
        if ($request->hasFile('photo')) {
            // Sauvegarder l'image dans le répertoire 'photos' avec un nom unique
            $path = $request->file('photo')->store('photos', 'public'); // stocké dans storage/app/public/photos

            // Sauvegarder le chemin de l'image dans la base de données
            $etudiant->photo = $path;
        }

        $etudiant->username = $username;
        $etudiant->password = $hashedPassword; // Hasher le password pour Option 1 (sécurisé)
        // $etudiant->password = $encryptedPassword; // Option 2 : Cryptage symétrique

        // Sauvegarder l'étudiant
        $etudiant->save();

        // Update the Matricule with the newly created Etudiant ID
        $matricule = Matricule::find($request->matricule);
        $matricule->etudiant_id = $etudiant->id;
        $matricule->save();

          // Créer un nouveau compte utilisateur lié à cet étudiant
        $utilisateur = new Utilisateur();
        $utilisateur->nom = $candidat->nom;
        $utilisateur->username = $etudiant->username;
        $utilisateur->password = $etudiant->password; // Mot de passe déjà hashé
        $utilisateur->password_changed = $etudiant->password_changed; // Mot de passe changer
        $utilisateur->role = 'Etudiant'; // Ou tout autre rôle par défaut
        $utilisateur->etudiant_id = $etudiant->id; // Relier l'utilisateur à l'étudiant

        // Sauvegarder l'utilisateur
        $utilisateur->save();

        if($etudiant && $matricule)
        {
            // Redirect or return success response
            return redirect()->route('etudiant.success')
                            ->with('success', 'Votre candidature est enregistré avec succès');
        }
        else
        {
            return back()->with('error','Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
        }
    }

    public function success()
    {
        return view('inscription-etudiant.success');
    }

}
