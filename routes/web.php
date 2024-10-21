<?php

use App\Http\Controllers\DirigeantController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CAController;
use App\Http\Controllers\Paiement\Caisse\CaisseDroitsController;
use App\Http\Controllers\Paiement\Caisse\CaisseCertificationController;
use App\Http\Controllers\Paiement\Caisse\CaisseScolariteController;
use App\Http\Controllers\Paiement\Caisse\CaisseFraisController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ConcoursController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\MentionController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ParcoursController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PasswordChangedMiddleware;
use App\Http\Middleware\SIAdminMiddleware;
use App\Http\Controllers\InscriptionlocalController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\VagueController;
use App\Http\Controllers\MatriculeController;
use App\Http\Middleware\AcceuilMiddleware;
use App\Http\Middleware\ConvocationMiddleware;
use App\Http\Middleware\InscriptionMiddleware;
use App\Http\Middleware\PayementMiddleware;
use App\Http\Middleware\CandidatAceemMiddleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EtudiantDashboardController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ReinscriptionController;
use App\Http\Controllers\SousGroupeController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\CaisseEventMiddleware;
use App\Http\Middleware\CandidatPresenceMiddleware;
use App\Http\Middleware\EtudiantMiddleware;


Route::get('/', function () {
    return view('welcome');
})->name('index');

// Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/matricule', [MatriculeController::class, 'index'])->name('matricule.index');
Route::post('/matricule', [MatriculeController::class, 'search'])->name('matricule.recherche');

Route::get('/etudiant/{matricule}', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant', [EtudiantController::class, 'success'])->name('etudiant.success');
Route::post('/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');



Route::middleware(['auth'])->prefix('/set-password')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get(
            '/',
            'setPassword'
        )->name('set.password');
        Route::post(
            '/',
            'doSetPassword'
        );
    });


Route::middleware(['auth', PasswordChangedMiddleware::class])->group(function () {
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        //SI Admin Dashboard
        Route::prefix('dashboard')->name('dashboard.')->middleware([SIAdminMiddleware::class])->controller(
            DashboardAdminController::class
        )->group(function () {
            Route::get('/', 'index')->name('index');
        });
        //Convocation
        Route::prefix('convocation')->name('convocation.')->middleware([ConvocationMiddleware::class])
            ->controller(ConvocationController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'print');
            });
        //Home
        Route::get('/', function () {
            return view('dashboard_home');
        })->name("home");
        //Utilisateur
        Route::prefix('user')->name('user.')->middleware([SIAdminMiddleware::class])->controller(
            UserController::class
        )->group(function () {
            Route::get('/', 'index')->name('index');
            Route::delete('/', 'delete');
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/reset-password/{id}', 'reset')->name('reset.password');
        });
        //Candidats
        Route::prefix('candidatsSI')->name('candidatsSI.')->middleware([SIAdminMiddleware::class])->controller(
            CandidatController::class
        )->group(function () {
            Route::get('/', 'index')->name('index');
            Route::delete('/', 'delete');
            Route::get('/createSI', 'createSI')->name('createSI');
            Route::post('/createSI', 'storeSI');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit/{id}', 'update')->name('update');
            Route::get('/showSI/{id}', 'showSI')->name('showSI');
        });

        //Academique
        Route::prefix('academique')->name('academique.')->group(function () {
            //Mention
            Route::prefix('mention')->name('mention.')->middleware([SIAdminMiddleware::class])->controller(
                MentionController::class
            )->group(function () {
                Route::get('/', 'index')->name('index');
                Route::delete('/', 'delete');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/edit/{id}', 'update')->name('update');
                Route::get('/show/{id}', 'show')->name('show');
            });
            //Parcours
            Route::prefix('parcours')->name('parcours.')->middleware([SIAdminMiddleware::class])->controller(
                ParcoursController::class
            )->group(function () {
                Route::get('/', 'index')->name('index');
                Route::delete('/', 'delete');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/edit/{id}', 'update')->name('update');
                Route::get('/show/{id}', 'show')->name('show');
            });
            //Niveau
            Route::prefix('niveau')->name('niveau.')->middleware([SIAdminMiddleware::class])->controller(
                NiveauController::class
            )->group(function () {
                Route::get('/', 'index')->name('index');
                Route::delete('/', 'delete');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/edit/{id}', 'update')->name('update');
                Route::get('/show/{id}', 'show')->name('show');
            });
            //Groupes
            Route::prefix('groupe')->name('groupe.')->middleware([SIAdminMiddleware::class])->controller(GroupeController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::delete('/', 'delete');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/edit/{id}', 'update')->name('update');
                Route::get('/show/{id}', 'show')->name('show');
            });
            //Sous-Groupes
            Route::prefix('sousgroupe')->name('sousgroupe.')->middleware([SIAdminMiddleware::class])->controller(SousGroupeController::class)->group(function() {
                Route::get('/', 'index')->name('index');
                Route::delete('/', 'delete');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/edit/{id}', 'update')->name('update');
                Route::get('/show/{id}', 'show')->name('show');
            });
            //Serie
            Route::prefix('serie')->name('serie.')->middleware([SIAdminMiddleware::class])->controller(
                SerieController::class
            )->group(function () {
                Route::get('/', 'index')->name('index');
                Route::delete('/', 'delete');
                Route::get('/create', 'create')->name('create');
                Route::post(
                    '/create',
                    'store'
                );
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/edit/{id}', 'update')->name('update');
                Route::get('/show/{id}', 'show')->name('show');
            });
        });

        //Resultat
        Route::prefix('resultat')->name('resultat.')->middleware([SIAdminMiddleware::class])->controller(
            ResultatController::class
        )->group(function () {
            // Route::get('/', 'index')->name('index');
            Route::get('/concours/{id}', 'indexConcours')->name('index.concours');
            Route::get('/export/{id}', 'export')->name('export');
            Route::post('/publish/{id}', 'publish')->name('publish');
            Route::post('/unpublish/{id}', 'unpublish')->name('unpublish');
            Route::post('/', 'import')->name('import');
            Route::post('/concours/{id}', 'import');
            Route::put('/edit/{id}', 'update')->name('update');
        });
        //Vague
        Route::prefix('vague')->name('vague.')->middleware([SIAdminMiddleware::class])->controller(
            VagueController::class
        )->group(function () {
            Route::get('/', 'index')->name('vague.index');
            Route::post('/', 'store')->name('vague.store');
            Route::get('/create', 'create')->name('vague.create');
            Route::get('/show/{id}', 'show')->name('vague.show');
            Route::get('/edit/{id}', 'edit')->name('vague.edit');
            Route::delete('/', 'delete')->name('vague.delete');
            Route::put('/update/{id}', 'update')->name('vague.update');
        });
        //Caisse
        Route::prefix('payement')->name('payement.')->middleware([PayementMiddleware::class])->controller(
            PayementController::class
        )->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/affiche/{candidat}', 'show')->name('payement.affiche');
            Route::get('/show/{candidat}', 'affiche')->name('payement.show');
            Route::get('/regarder/{candidats}', 'regarder')->name('payement.regarder');
            Route::put('/update/{id}', 'update')->name('payement.update');
            Route::post('/store/{id}', 'enregistre')->name('payement.store');
            Route::get('/local', 'indexlocal')->name('payement.local.index');
            Route::get('/local/affiche/{candidat}', 'showlocal')->name('payement.local.affiche');
            Route::get('/local/show/{candidat}', 'affichelocal')->name('payement.local.show');
            Route::get('/local/regarder/{candidats}', 'regarderlocal')->name('payement.local.regarder');
            Route::put('/local/update/{id}', 'updatelocal')->name('payement.local.update');
            Route::post('/local/store/{id}', 'enregistrelocal')->name('payement.local.store');
            Route::get('/enligne', 'indexenligne')->name('payement.enligne.index');
            Route::get('/enligne/affiche/{candidat}', 'showenligne')->name('payement.enligne.affiche');
            Route::get('/enligne/show/{candidat}', 'afficheenligne')->name('payement.enligne.show');
            Route::get('/enligne/regarder/{candidats}', 'regarderenligne')->name('payement.enligne.regarder');
            Route::put('/enligne/update/{id}', 'updateenligne')->name('payement.enligne.update');
            Route::post('/enligne/store/{id}', 'enregistreenligne')->name('payement.enligne.store');
        });

        //Re-inscription
        Route::prefix('reinscription')->name('reinscription.')->middleware([PayementMiddleware::class])->controller(
            ReinscriptionController::class
        )->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create/{id}', 'create')->name('create');
            Route::post('/create', 'store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::put('/edit/{id}', 'update');
            Route::get('/show/{id}', 'show')->name('show');
        });

        //Caisse Candidat Accem
        Route::prefix('candidataceem')->name('candidataceem.')->middleware([CandidatAceemMiddleware::class])->controller(
            CAController::class
        )->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/CA/{candidat}', 'show')->name('show');
            Route::get('/CA/affiche/{candidat}', 'affiche')->name('affiche');
            Route::get('/CA/regarder/{candidats}', 'regarder')->name('regarder');
            Route::put('/update/{id}', 'update')->name('update');
            Route::post('/store/{id}', 'enregistre')->name('store');
        });

        //Acceuil
        Route::prefix('acceuil')->name('acceuil.')->middleware([AcceuilMiddleware::class])->controller(
            AcceuilController::class
        )->group(function () {
            Route::get('/', 'index')->name('acceuil.index');
            Route::get('/matricule', 'matricule')->name('acceuil.matricule');
            Route::post('/matricule', 'store')->name('acceuil.store');
        });

        //Etudiant
        Route::prefix('etudiant')->name('etudiant.')->middleware([EtudiantMiddleware::class])->controller(
            EtudiantDashboardController::class
        )->group(function () {
            Route::get('/', 'index')->name('etudiant.index');
            Route::get('/show/{etudiant}', 'show')->name('etudiant.show');
            Route::put('/update/{id}', 'update')->name('etudiant.update');
        });
    });
    //Inscription
    Route::prefix('inscription')->name('inscription.')->middleware([InscriptionMiddleware::class])->controller(
        InscriptionlocalController::class
    )->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{candidat}', 'show')->name('numeroconcours');
        // Route::post('/check-num-bacc', 'checkNumBacc');
        // Route::post('/check-email', 'checkEmail');
    });



    Route::get('/dirigeant', [DirigeantController::class, 'index']);
});
//Presence Concours
Route::middleware([CandidatPresenceMiddleware::class])->group(function () {
    Route::get('/concours/scolarite', [ConcoursController::class, 'index'])->name('candidat.scolarite.index');
    Route::get('/concours/scolarite/{id}', [ConcoursController::class, 'show'])->name('candidat.scolarite.show');
    Route::get('/concours/presence/{id}', [ConcoursController::class, 'presence'])->name('candidat.presence');
});
