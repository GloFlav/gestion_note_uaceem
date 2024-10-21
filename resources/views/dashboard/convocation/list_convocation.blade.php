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

        @session('error.import')
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
                            {{ session('error.import') }}
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

        @if ($errors->any())
            <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                                    Gestion des convocations
                                </h2>
                                <p class="text-sm text-gray-600 max-w-screen-md dark:text-neutral-400">
                                    Gérez la génération et l'impression des convocation ici.
                                </p>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:justify-between gap-x-8 gap-y-4">
                                <form method="GET" class="flex gap-5" id="search-form">
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
                                        <div class="relative">
                                            <input type="text"
                                                class="py-2 ps-10 pe-16 block w-full max-w-[400px] border bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600"
                                                placeholder="Rechecher..." name="key" value="{{ $key }}"
                                                id="search-input">
                                            @if ($key != '')
                                                <div class=" absolute inset-y-0 end-0 flex items-center z-20 pe-1">
                                                    <a href="{{ route('dashboard.convocation.index') }}" id="reset-search"
                                                        class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                                                        aria-label="Close">
                                                        <span class="sr-only">Close</span>
                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <path d="m15 9-6 6" />
                                                            <path d="m9 9 6 6" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- End Search Input -->
                                    @php
                                        $candidat_filters = session('candidat_filters_conv', [
                                            'all' => true,
                                            'paye' => true,
                                            'non_paye' => true,
                                        ]);
                                    @endphp

                                    <!-- Filter -->
                                    <div class="hs-dropdown relative inline-block [--auto-close:inside] [--placement:bottom-right]"
                                        data-hs-dropdown-auto-close="outside">
                                        <button id="hs-as-table-table-filter-dropdown" type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">

                                            Filtres
                                            <span id="filter-count"
                                                class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                                0
                                            </span>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="hs-as-table-table-filter-dropdown">
                                            <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                <label for="hs-as-filters-dropdown-all" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-all-filter" name="all"
                                                        {{ $candidat_filters['all'] ? 'checked' : '' }}>
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Tout</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-paid" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="filter shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-paid" name="paye"
                                                        {{ $candidat_filters['paye'] ? 'checked' : '' }}>
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Payé</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-pending" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="filter shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-pending" name="non_paye"
                                                        {{ $candidat_filters['non_paye'] ? 'checked' : '' }}>
                                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Non
                                                        payé</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End filter -->

                                    <!-- Search button -->
                                    <div class="inline-flex gap-x-2">
                                        <button
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                            type="submit">
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M3 6h18" />
                                                <path d="M7 12h10" />
                                                <path d="M10 18h4" />
                                            </svg>

                                            Filter
                                        </button>
                                    </div>
                                    <!-- End Search button-->
                                </form>

                                <form method="POST"
                                    class="hs-dropdown relative inline-block [--auto-close:inside] [--placement:bottom-right]"
                                    data-hs-dropdown-auto-close="outside">
                                    @csrf
                                    <input type="hidden" id="selected-numeros" name="selected_numeros" value="">
                                    <button id="hs-as-table-table-filter-dropdown" type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer">
                                            <path
                                                d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                            <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                                            <rect x="6" y="14" width="12" height="8" rx="1" />
                                        </svg>
                                        <span id="selected-count"
                                            class="ps-2 text-sm font-semibold text-gray-600 border-s border-gray-200 dark:border-neutral-700 dark:text-grey-200">
                                            0
                                        </span>
                                    </button>
                                </form>

                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="w-full overflow-auto divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col" class="py-1 ps-3 --exclude-from-ordering">
                                        <div class="flex items-center h-5">
                                            <input id="hs-datatable-select-all-rows" type="checkbox"
                                                class="border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                            <label class="sr-only">Checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Numéro
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Nom et prénom(s)
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Mention
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Droit
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($candidats as $candidat)
                                    @php
                                        $paye = $candidat->payement && !empty($candidat->payement->reference);
                                    @endphp
                                    <tr>
                                        <td class="size-px py-3 ps-3">
                                            <div class="flex items-center h-5">
                                                <input id="hs-table-filter-checkbox-1" type="checkbox"
                                                    class="hs-datatable-select-row border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    data-hs-datatable-row-selecting-individual=""
                                                    data-numero="{{ $candidat->num_conc }}">
                                                <label for="hs-table-filter-checkbox-1" class="sr-only">Checkbox</label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap pe-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500 capitalize">
                                                {{ $candidat->num_conc }}
                                            </span>
                                        </td>
                                        <td
                                            class="size-px whitespace-nowrap ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $candidat->nom }}
                                            </span>
                                        </td>
                                        <td
                                            class="size-px whitespace-nowrap ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start min-w-max">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $candidat->mention->design }}
                                            </span>
                                        </td>

                                        <td class="size-px whitespace-nowrap ">
                                            <div class=" py-2 flex justify-start">
                                                @if ($paye)
                                                    <div class=" py-3">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            Payé
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class=" py-3">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                            </svg>
                                                            Non payé
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="size-px py-1.5 whitespace-nowrap"
                                            data-status="{{ $candidat->status }}"
                                            data-candidat-id="{{ $candidat->id }}">
                                            @if ($paye)
                                                <form method="POST" class="px-1">
                                                    @csrf
                                                    <input type="hidden" name="selected_numeros"
                                                        value="{{ $candidat->num_conc }}">
                                                    <button id="hs-table-dropdown-1" type="submit"
                                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md bg-white text-gray-800 shadow-sm border border-gray-200 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="lucide lucide-printer">
                                                            <path
                                                                d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                                            <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                                                            <rect x="6" y="14" width="12" height="8"
                                                                rx="1" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
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
                                        class="font-semibold text-gray-800 dark:text-neutral-200">{{ $totalResults }}</span>
                                    @if ($totalResults == 1)
                                        résultat
                                    @else
                                        résultats
                                    @endif
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a href="{{ request()->fullUrlWithQuery(array_merge(request()->all(), ['page' => $candidats->currentPage() - 1 > 0 ? $candidats->currentPage() - 1 : ''])) }}"
                                        class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm cursor-pointer hover:bg-gray-50 disabled:opacity-50  disabled:cursor-default disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800
                                        @if ($candidats->currentPage() == 1) pointer-events-none cursor-default opacity-50 @endif">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6" />
                                        </svg>
                                        Préced.
                                    </a>
                                    <a href="{{ request()->fullUrlWithQuery(array_merge(request()->all(), ['page' => $candidats->currentPage() + 1])) }}"
                                        class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm cursor-pointer hover:bg-gray-50 disabled:opacity-50 disabled:cursor-default disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800
                                        @if ($candidats->currentPage() == $candidats->lastPage()) pointer-events-none cursor-default opacity-50 @endif">
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
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('hs-datatable-select-all-rows');
            const rowCheckboxes = document.querySelectorAll('.hs-datatable-select-row');
            const selectedCountElement = document.getElementById('selected-count');
            const selectedNumerosInput = document.getElementById('selected-numeros');

            const allCheckbox = document.getElementById('hs-as-filters-dropdown-all-filter');
            const filterCheckboxes = document.querySelectorAll(
                'input[type="checkbox"]:not(#hs-as-filters-dropdown-all-filter).filter');
            const filterCountSpan = document.getElementById('filter-count');

            const searchReset = document.getElementById('reset-search');
            if (searchReset) {
                const searchForm = document.getElementById('search-form');
                const searchInput = document.getElementById('search-input');

                searchReset.addEventListener('click', () => {
                    searchInput.value = "";
                    searchForm.submit();
                });
            }

            function updateFilterCount() {
                const checkedCount = Array.from(filterCheckboxes).filter(checkbox => checkbox.checked).length;
                filterCountSpan.textContent = checkedCount;
            }

            allCheckbox.addEventListener('change', () => {
                filterCheckboxes.forEach(checkbox => checkbox.checked = allCheckbox.checked);
                updateFilterCount();
            });

            filterCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const allChecked = Array.from(filterCheckboxes).every(checkbox => checkbox
                        .checked);
                    allCheckbox.checked = allChecked;
                    updateFilterCount();
                });
            });

            updateFilterCount();


            function updateSelectedCount() {
                const selectedCheckboxes = document.querySelectorAll('.hs-datatable-select-row:checked');
                const selectedCount = selectedCheckboxes.length;
                selectedCountElement.textContent = selectedCount;

                // Update the hidden input with selected 'numero' values
                const selectedNumeros = [];
                selectedCheckboxes.forEach(function(checkbox) {
                    const numero = checkbox.getAttribute('data-numero');
                    selectedNumeros.push(numero);
                });
                selectedNumerosInput.value = selectedNumeros.join(',');
            }

            // Event listener for the "Select All" checkbox
            selectAllCheckbox.addEventListener('change', function() {
                rowCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                updateSelectedCount();
            });

            // Event listeners for individual row checkboxes
            rowCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // If not all checkboxes are selected, uncheck "Select All"
                    if (!checkbox.checked) {
                        selectAllCheckbox.checked = false;
                    }
                    // If all checkboxes are selected, check "Select All"
                    if (document.querySelectorAll('.hs-datatable-select-row:checked').length ===
                        rowCheckboxes.length) {
                        selectAllCheckbox.checked = true;
                    }
                    updateSelectedCount();
                });
            });

            // Initial count update
            updateSelectedCount();
        });
    </script>
@endsection
