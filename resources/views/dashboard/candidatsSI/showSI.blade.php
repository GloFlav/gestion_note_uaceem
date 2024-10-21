@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Information Candidat
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Voici les informations sur cet candidat.
                    Vous trouverez ci-dessous les détails complets le concernant
                </p>
            </div>

            <div><div class="space-y-2 space-x-3">
                <label for="nom" class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                    Numéro Concours:
                </label>
                <span class="text-gray-600">
                    {{ $candidat->num_conc }}
                </span>
            </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom" class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Nom:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->nom }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Numero Bacc:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->num_bacc }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Année  Bacc:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->anne_bacc }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Mention:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->mention->design }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Série:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->serie->design }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Téléphone:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->tel }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Email:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->email }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Référence Mvola:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->ref_mvola }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Mode d'inscription:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->mode_inscription }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Commentaire Admin:
                    </label>
                    <span class="text-gray-600">
                        {{ $candidat->commentaire }}
                    </span>
                </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="inline-flex gap-x-2">
                    <a href="{{ route('dashboard.candidatsSI.index') }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        Retour
                    </a>
                </div>

            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
@endsection
