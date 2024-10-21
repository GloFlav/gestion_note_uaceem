@extends('layouts.dashboard')

@section('content')
    <!-- Main Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
        <!-- Delete alert -->
        @session('success')
            <div id="dismiss-alert"
                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                            {{ session('success') }}
                        </h3>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                                data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endsession

        @session('error.delete')
            <div id="dismiss-alert"
                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                            {{ session('error.delete') }}
                        </h3>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 dark:bg-transparent dark:text-red-600 dark:hover:bg-red-800/50 dark:focus:bg-red-800/50"
                                data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endsession

        <!-- End Delete alert-->
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 w-full inline-block align-middle">
                    <div class= "border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div class="py-4 grid gap-3 md:flex flex-col  border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200 mb-4">
                                    Gestion des série
                                </h2>
                                <p class="text-sm text-gray-600 max-w-screen-md dark:text-neutral-400">
                                    Gérez les séries de baccalauréat qui peuvent participer au concours d'entrée en première
                                    année en ajoutant de nouvelles séries, en modifiant les informations existantes
                                </p>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-x-8 gap-y-4">
                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('dashboard.academique.serie.create') }}">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Ajouter
                                    </a>
                                </div>
                                <!-- Search Input -->
                                <div class="relative flex">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                        <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8" />
                                            <path d="m21 21-4.3-4.3" />
                                        </svg>
                                    </div>
                                    <form class="relative">
                                        <input type="text"
                                            class="py-2 ps-10 pe-16 block w-full max-w-[400px] bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600"
                                            placeholder="Rechecher..." name="key" value={{ $key }}>
                                        @if ($key != '')
                                            <div class=" absolute inset-y-0 end-0 flex items-center z-20 pe-1">
                                                <a href="{{ route('dashboard.academique.serie.index') }}"
                                                    class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                                                    aria-label="Close">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <path d="m15 9-6 6" />
                                                        <path d="m9 9 6 6" />
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif

                                    </form>
                                </div>
                                <!-- End Search Input -->
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
                                                Designation
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="py-3 text-end"></th>
                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($series as $serie)
                                    <tr>
                                        <td
                                            class="size-px whitespace-nowrap ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $serie->design }}
                                            </span>
                                        </td>
                                        <td></td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-1 py-1.5">
                                                <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                                    href="{{ route('dashboard.academique.serie.show', ['id' => $serie->id]) }}">
                                                    Voir
                                                </a>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-1 py-1.5">
                                                <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                                    href="{{ route('dashboard.academique.serie.edit', ['id' => $serie->id]) }}">
                                                    Editer
                                                </a>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-1 py-1.5">
                                                <button type="button"
                                                    class="inline-flex items-center gap-x-1 text-sm text-red-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-red-400"
                                                    aria-haspopup="dialog" aria-expanded="false"
                                                    aria-controls="hs-slide-down-animation-modal"
                                                    data-hs-overlay="#hs-slide-down-animation-modal"
                                                    data-element-id="{{ $serie->id }}">
                                                    Supprimer
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class=" py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    <span
                                        class="font-semibold text-gray-800 dark:text-neutral-200">{{ $count }}</span>
                                    @if ($count == 1)
                                        résultat
                                    @else
                                        résultats
                                    @endif
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a href="{{ request()->fullUrlWithQuery(array_merge(request()->all(), ['page' => $series->currentPage() - 1 > 0 ? $series->currentPage() - 1 : ''])) }}"
                                        class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm cursor-pointer hover:bg-gray-50 disabled:opacity-50  disabled:cursor-default disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800
                                            @if ($series->currentPage() == 1) pointer-events-none cursor-default opacity-50 @endif">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6" />
                                        </svg>
                                        Préced.
                                    </a>

                                    <a href="{{ request()->fullUrlWithQuery(array_merge(request()->all(), ['page' => $series->currentPage() + 1])) }}"
                                        class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm cursor-pointer hover:bg-gray-50 disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800
                                            @if ($series->currentPage() == $series->lastPage()) pointer-events-none cursor-default opacity-50 @endif">
                                        Suiv.
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Main Section -->


    <!-- Delete Model -->
    <div id="hs-slide-down-animation-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-slide-down-animation-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div
                class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-slide-down-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Supprimer
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-slide-down-animation-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="mt-1 text-gray-800 dark:text-neutral-400">
                        Êtes-vous sûr de vouloir supprimer ce série ?
                    </p>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-slide-down-animation-modal">
                        Annuler
                    </button>
                    <form method="POST">
                        @csrf
                        @method('delete')
                        <input type="text" name="id" id="delete_element" class="hidden">
                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection

@section('script')
    <script>
        document.querySelectorAll('button[data-element-id]').forEach(button => {
            button.addEventListener('click', event => {
                const elementId = event.target.getAttribute('data-element-id');
                document.getElementById('delete_element').value = elementId;
            });
        });
    </script>
@endsection
