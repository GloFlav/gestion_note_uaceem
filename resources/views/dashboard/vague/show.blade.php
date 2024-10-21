@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Information concours
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Voici les informations sur le concours.
                    Vous trouverez ci-dessous les détails complets le concernant
                </p>
            </div>

            <div>
                <div class="space-y-2 space-x-3">
                    <label for="nom" class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Type Concours :
                    </label>
                    <span class="text-gray-600">
                        {{ $vagues->concours->type }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Vague :
                    </label>
                    <span class="text-gray-600">
                        {{ $vagues->designation }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Date début d'inscription :
                    </label>
                    <span class="text-gray-600">
                        {{ $vagues->deb_insc }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Date fin d'inscription :
                    </label>
                    @if ($vagues->fin_insc == null)
                        <span class="text-gray-600">
                            Aucune date fin pour l'inscription
                        </span>
                    @else
                        <span class="text-gray-600">
                            {{ $vagues->fin_insc }}
                        </span>
                    @endif
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Date début du concours :
                    </label>
                    <span class="text-gray-600">
                        {{ $vagues->deb_conc }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Date fin du concours :
                    </label>
                    @if ($vagues->fin_conc == null)
                        <span class="text-gray-600">
                            Aucune date fin pour le concours
                        </span>
                    @else
                        <span class="text-gray-600">
                            {{ $vagues->fin_conc }}
                        </span>
                    @endif
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Commentaire :
                    </label>
                    <span class="text-gray-600">
                        {{ $vagues->commentaire }}
                    </span>
                </div>
                <div class="mt-4 flex gap-x-3">
                    <div class="inline-flex gap-x-2">
                        <a href="{{ route('dashboard.vague.vague.index') }}"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                            Retour
                        </a>
                    </div>
                    <div class="inline-flex gap-x-2">
                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none"
                            href="{{ route('dashboard.vague.vague.edit', ['id' => $vagues->id]) }}">
                            Modifier
                        </a>
                    </div>
                    <div class="inline-flex gap-x-2">
                        <a href="{{ route('candidat.presence', ['id' => $vagues->id]) }}"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="7 10 12 15 17 10" />
                                <line x1="12" x2="12" y1="15" y2="3" />
                            </svg>
                            Présence
                        </a>
                    </div>
                    <div class="inline-flex gap-x-2">
                        <a href="{{ route('dashboard.resultat.index.concours', ['id' => $vagues->id]) }}"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            Résultats
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->
    @endsection
