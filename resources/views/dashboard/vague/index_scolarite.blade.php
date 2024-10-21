@extends('layouts.dashboard')

@section('content')
    <!-- Main Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">

        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 w-full inline-block align-middle">
                    <div class= "border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div class="py-4 grid gap-3 md:flex flex-col  border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200 mb-4">
                                    Gestion des Concours
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Voici la liste des concours disponibles sur la plateforme.
                                </p>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="w-full overflow-auto divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>

                                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Concours
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @if ($vagues->count())
                                    @foreach ($vagues as $vague)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                                <span class="text-gray-600">
                                                    {{ $vague->concours->type }} - {{ $vague->designation }}
                                                </span>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-1 py-1.5">
                                                    <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                                        href="{{ route('candidat.scolarite.show', $vague->id) }}">
                                                        Voir
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td class="size-px whitespace-nowrap text-center ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 min-w-max"
                                        colspan="3">
                                        Il n'y a actuellement aucun concours. Ajouter-en un.
                                    </td>
                                @endif
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Main Section -->

@endsection
