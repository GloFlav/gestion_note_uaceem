@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Information Mention
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Voici les informations sur la Mention.
                    Vous trouverez ci-dessous les détails complets le concernant
                </p>
            </div>

            <div>
                <div class="space-y-2 space-x-3">
                    <label for="nom" class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Désignation:
                    </label>
                    <span class="text-gray-600">
                        {{ $mention->design }}
                    </span>
                </div>
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Code:
                    </label>
                    <span class="text-gray-600">
                        {{ $mention->code }}
                    </span>
                </div>
                @if ($mention->description)
                    <div class="space-y-2 space-x-3">
                        <label for="nom"
                            class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                            Description:
                        </label>
                        <span class="text-gray-600">
                            {{ $mention->description }}
                        </span>
                    </div>
                @endif
                <div class="space-y-2 space-x-3">
                    <label for="nom"
                        class="inline-block text-lg font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Séries:
                    </label>
                    <span class="text-gray-600">
                        @php
                            $series = [];
                            foreach ($mention->series->all() as $serie) {
                                $series[] = $serie->design;
                            }
                            echo implode(', ', $series);
                        @endphp
                    </span>
                </div>

            </div>

            <div class="mt-4">
                <div class="inline-flex gap-x-2">
                    <a href="{{ route('dashboard.academique.mention.index') }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        Retour
                    </a>
                </div>
                <div class="inline-flex gap-x-2">
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        href="{{ route('dashboard.academique.mention.edit', ['id' => $mention->id]) }}">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
@endsection
