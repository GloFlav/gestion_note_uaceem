<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayementRequest;
use App\Jobs\SendEmailJob;
use App\Models\Candidat;
use App\Models\Mention;
use App\Models\Payement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function affiche($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.caisse.edit', compact('candidats'));
    }

    public function enregistre(PayementRequest $request, $id)
    {
        $candidats = new Payement();
        $candidats->candidat_id = $id;
        $candidats->date = $request->date;
        $candidats->type = $request->type;
        $candidats->montant = $request->montant;
        $candidats->mode = $request->mode;
        $candidats->reference = $request->reference;
        $candidats->commentaire = $request->commentaire;
        $candidats->save();

        if ($candidats) {
            return redirect()->route('dashboard.payement.index')
                ->with('success', 'Payement bien effectuer.');
        } else {
            return back()->with('error', 'Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
        }
    }

    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";

        $candidats = Candidat::where('nom', 'like', "%$key%")
            ->with('payement')
            ->paginate(10);

        return view('dashboard.caisse.index', compact('candidats', 'key'));
    }

    public function show($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.caisse.show', compact('candidats'));
    }

    public function regarder($candidat)
    {
        $candidats = Candidat::with('payement')->findOrFail($candidat);
        return view('dashboard.caisse.regarder', compact('candidats'));
    }

    public function update(PayementRequest $request, $id)
    {
        $candidats = Candidat::findOrFail($id);
        $payement = $candidats->payement;

        $request->validate([
            'montant' => 'required|numeric|min:0',
        ]);

        if ($payement) {
            $payement->date = $request->date;
            $payement->type = $request->type;
            $payement->montant = $request->input('montant');
            $payement->mode = $request->mode;
            $payement->reference = $request->reference;
            $payement->commentaire = $request->commentaire;
            $payement->save();
        } else {
            $candidats->payement()->create([
                'date' => $request->date,
                'type' => $request->type,
                'montant' => $request->input('montant'),
                'mode' => $request->mode,
                'reference' => $request->reference,
                'commentaire' => $request->commentaire
            ]);
        }

        if ($payement || $candidats || $payement && $candidats) {
            return redirect()->route('dashboard.payement.index')
                ->with('success', 'Payement mis à jour avec succès.');
        } else {
            return back()->with('error', 'Veuillez vérifier que les champs sont bien remplis ou que les données sont bien compatibles.');
        }
    }

    public function indexlocal(Request $request)
    {
        $key = $request->get('key') ?? "";

        $count = Candidat::where(function ($query) use ($key) {
            $query->where('nom', 'like', "%$key%")
                ->where('mode_inscription', 'like', 'local');
        })
            ->count();
        $candidats = Candidat::where(function ($query) use ($key) {
            $query->where('nom', 'like', "%$key%")
                ->where('mode_inscription', 'local');
        })
            ->with('payement')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.caisse.local.index', compact('candidats', 'count', 'key'));
    }

    public function showlocal($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.caisse.local.show', compact('candidats'));
    }

    public function affichelocal($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.caisse.local.create', compact('candidats'));
    }

    public function regarderlocal($candidat)
    {
        $candidats = Candidat::with('payement')->findOrFail($candidat);
        return view('dashboard.caisse.local.edit', compact('candidats'));
    }

    public function enregistrelocal(PayementRequest $request, $id)
    {
        $candidats = new Payement();
        $candidats->candidat_id = $id;
        $candidats->date = $request->date;
        $candidats->type = $request->type;
        $candidats->montant = $request->montant;
        $candidats->mode = $request->mode;
        $candidats->reference = $request->reference;
        $candidats->commentaire = $request->commentaire;
        $candidats->save();

        if ($candidats) {
            return redirect()->route('dashboard.payement.payement.local.index')
                ->with('success', 'Payement bien effectuer.');
        } else {
            return back()->with('error', 'Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
        }
    }

    public function updatelocal(PayementRequest $request, $id)
    {
        $payement = Payement::findOrFail($id);

        // Assurez-vous que le montant est correctement formaté
        $montant = number_format((float)str_replace(',', '.', $request->montant), 2, '.', '');

        if ($payement) {
            $payement->date = $request->date;
            $payement->type = $request->type;
            $payement->montant = $montant;
            $payement->mode = $request->mode;
            $payement->reference = $request->reference;
            $payement->commentaire = $request->commentaire;
            $payement->save();
        }

        if ($payement) {
            return redirect()->route('dashboard.payement.payement.local.index')
                ->with('success', 'Payement mis à jour avec succès.');
        } else {
            return back()->with('error', 'Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
        }
    }

    public function indexenligne(Request $request)
    {
        $key = $request->get('key') ?? "";

        $count = Candidat::where(function ($query) use ($key) {
            $query->where('nom', 'like', "%$key%")
                ->where('mode_inscription', 'like', 'en_ligne');
        })
            ->count();
        $candidats = Candidat::where(function ($query) use ($key) {
            $query->where('nom', 'like', "%$key%")
                ->where('mode_inscription', 'en_ligne');
        })
            ->with('payement')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.caisse.enligne.index', compact('candidats', 'count', 'key'));
    }


    public function showenligne($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.caisse.enligne.show', compact('candidats'));
    }

    public function afficheenligne($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.caisse.enligne.create', compact('candidats'));
    }

    public function regarderenligne($candidat)
    {
        $candidats = Candidat::with('payement')->findOrFail($candidat);
        return view('dashboard.caisse.enligne.edit', compact('candidats'));
    }

    public function enregistreenligne(PayementRequest $request, $id)
    {
        $payement = new Payement();
        $payement->candidat_id = $id;
        $payement->date = $request->date;
        $payement->type = $request->type;
        $payement->montant = number_format((float) $request->montant, 2, '.', ''); // Conversion en decimal(10,2)
        $payement->mode = $request->mode;
        $payement->reference = $request->reference;
        $payement->commentaire = $request->commentaire;
        $payement->save();

        $candidat = Candidat::with('mention')->findOrFail($id);

        if ($payement) {
            $codeMention = $candidat->mention->code;
            $currentYear = date("Y");
            $nextYear = date("Y", strtotime('+1 year'));

            // Extract the last two digits of the current and next year
            $currentYearShort = substr($currentYear, -2);
            $nextYearShort = substr($nextYear, -2);

            $numCandidat = Candidat::where(
                'mention_id',
                $candidat->mention_id
            )
                ->whereNotNull('num_conc')
                ->whereHas(
                    'vague',
                    function ($query) use ($candidat) {
                        $query->where('concours_id', $candidat->vague->concours_id);
                    }

                )
                ->orderBy('num_conc', 'desc')->first();
            if ($numCandidat) {
                $parts = explode('/', $numCandidat->num_conc);
                $extractedPart = $parts[0];
                $number = intval($extractedPart) + 1;
            } else
                $number = 1;

            $numConcours = str_pad($number, 3, '0', STR_PAD_LEFT) . "/Conc{$codeMention}/IèA/{$currentYearShort}-{$nextYearShort}";
            $candidat->num_conc = $numConcours;
            $candidat->save();

            // SendEmailJob::dispatch($candidat->email, $candidat->id);

            return redirect()->route('dashboard.payement.payement.enligne.index')
                ->with('success', 'Payement bien effectuer.');
        } else {
            return back()->with('error', 'Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
        }
    }

    public function updateenligne(PayementRequest $request, $id)
    {
        $payement = Payement::findOrFail($id);

        // Assurez-vous que le montant est correctement formaté
        $montant = number_format((float)str_replace(',', '.', $request->montant), 2, '.', '');

        if ($payement) {
            $payement->date = $request->date;
            $payement->type = $request->type;
            $payement->montant = $montant;
            $payement->mode = $request->mode;
            $payement->reference = $request->reference;
            $payement->commentaire = $request->commentaire;
            $payement->save();

            return redirect()->route('dashboard.payement.payement.enligne.index')
                ->with('success', 'Payement mis à jour avec succès.');
        } else {
            return back()->with('error', 'Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
        }
    }
}
