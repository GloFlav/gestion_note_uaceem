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
                                    Gestion des résultats
                                </h2>
                                <p class="text-sm text-gray-600 max-w-screen-md dark:text-neutral-400">
                                    Gérez les résulats des concours ici.
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
                                                    <a href="{{ route('dashboard.resultat.index') }}" id="reset-search"
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
                                        $candidat_filters = session('candidat_filters', [
                                            'all' => true,
                                            'admis' => true,
                                            'recale' => true,
                                            'pending' => true,
                                        ]);

                                    @endphp

                                    <!-- Filter -->
                                    <div class="hs-dropdown relative inline-block [--auto-close:inside] [--placement:bottom-right]"
                                        data-hs-dropdown-auto-close="outside">
                                        <button id="hs-as-table-table-filter-dropdown" type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            {{-- <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M3 6h18" />
                                                <path d="M7 12h10" />
                                                <path d="M10 18h4" />
                                            </svg> --}}
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
                                                        id="hs-as-filters-dropdown-all" name="all"
                                                        {{ $candidat_filters['all'] ? 'checked' : '' }}>
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Tout</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-paid" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-paid" name="admis"
                                                        {{ $candidat_filters['admis'] ? 'checked' : '' }}>
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Admis</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-pending" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-pending" name="recale"
                                                        {{ $candidat_filters['recale'] ? 'checked' : '' }}>
                                                    <span
                                                        class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Recalé</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-declined" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-declined" name="pending"
                                                        {{ $candidat_filters['pending'] ? 'checked' : '' }}>
                                                    <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">En
                                                        cours</span>
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

                                <!--Import input -->
                                <form method="POST" id="file-upload-form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="hidden" name="results" id="file-input"
                                        accept=".xlsx, .xls, .csv">
                                    <button type="button" id="upload-button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-upload">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="17 8 12 3 7 8" />
                                            <line x1="12" x2="12" y1="3" y2="15" />
                                        </svg>
                                        Importer
                                    </button>
                                </form>
                                <!-- End import input -->
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
                                                Résultat
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($candidats as $candidat)
                                    <tr>
                                        <td class="size-px whitespace-nowrap ps-3 pe-6">
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

                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-2">
                                                @if ($candidat->status == 'admis')
                                                    <span
                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                        Admis
                                                    </span>
                                                @elseif ($candidat->status == 'recalé')
                                                    <span
                                                        class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-green-200">
                                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
                                                            </path>
                                                        </svg>
                                                        Recalé
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-green-200">
                                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                            </path>
                                                        </svg>
                                                        En cours
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="size-px py-1.5 whitespace-nowrap"
                                            data-status="{{ $candidat->status }}"
                                            data-candidat-id="{{ $candidat->id }}">
                                            @if ($candidat->status == null)
                                                <form class="flex flex-col gap-1 items-center">
                                                    <div class="flex">
                                                        <label
                                                            class="text-sm text-gray-500 ms-2 cursor-pointer dark:text-neutral-400">
                                                            <input type="radio" name="status" value="admis"
                                                                class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                            Admis</label>
                                                    </div>
                                                    <div class="flex">
                                                        <label
                                                            class="text-sm text-gray-500 ms-2 cursor-pointer dark:text-neutral-400">
                                                            <input type="radio" name="status" value="recalé"
                                                                class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                            Recalé</label>
                                                    </div>
                                                </form>
                                                <div class="flex justify-center mt-2 gap-x-2">
                                                    <button
                                                        class="save-button py-1 px-1 inline-flex justify-center items-center gap-x-2 text-sm font-semibold border shadow-md rounded-md bg-white text-gray-800 hover:bg-white focus:outline-none focus:bg-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="lucide lucide-check">
                                                            <path d="M20 6 9 17l-5-5" />
                                                        </svg>
                                                    </button>
                                                    <button
                                                        class="cancel-button py-1 px-1 inline-flex justify-center items-center shadow-md border gap-x-2 text-sm font-semibold rounded-md bg-white text-gray-800 hover:bg-white focus:outline-none focus:bg-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="lucide lucide-x">
                                                            <path d="M18 6 6 18" />
                                                            <path d="m6 6 12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="px-1">
                                                    <button id="hs-table-dropdown-1" type="button"
                                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md bg-white text-gray-800 shadow-sm border border-gray-200 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="lucide lucide-pencil">
                                                            <path
                                                                d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                            <path d="m15 5 4 4" />
                                                        </svg>
                                                    </button>
                                                </div>
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
        document.addEventListener('DOMContentLoaded', () => {
            const elements = {
                allCheckbox: document.getElementById('hs-as-filters-dropdown-all'),
                filterCheckboxes: document.querySelectorAll(
                    'input[type="checkbox"]:not(#hs-as-filters-dropdown-all)'),
                filterCountSpan: document.getElementById('filter-count'),
                searchReset: document.getElementById('reset-search'),
                searchForm: document.getElementById('search-form'),
                searchInput: document.getElementById('search-input'),
                uploadButton: document.getElementById('upload-button'),
                fileInput: document.getElementById('file-input'),
                fileUploadForm: document.getElementById('file-upload-form')
            };

            const initSearchReset = () => {
                if (elements.searchReset) {
                    elements.searchReset.addEventListener('click', () => {
                        elements.searchInput.value = "";
                        elements.searchForm.submit();
                    });
                }
            };

            const updateFilterCount = () => {
                const checkedCount = Array.from(elements.filterCheckboxes).filter(checkbox => checkbox.checked)
                    .length;
                elements.filterCountSpan.textContent = checkedCount;
            };

            const initCheckboxes = () => {
                elements.allCheckbox.addEventListener('change', () => {
                    elements.filterCheckboxes.forEach(checkbox => checkbox.checked = elements
                        .allCheckbox.checked);
                    updateFilterCount();
                });

                elements.filterCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', () => {
                        const allChecked = Array.from(elements.filterCheckboxes).every(
                            checkbox => checkbox.checked);
                        elements.allCheckbox.checked = allChecked;
                        updateFilterCount();
                    });
                });

                updateFilterCount();
            };

            const updateResultat = (cell) => {
                const saveButton = cell.querySelector('.save-button');
                const cancelButton = cell.querySelector('.cancel-button');
                if (saveButton && cancelButton) {
                    const cellContent = getCellContent();

                    saveButton.addEventListener('click', () => handleSaveClick(cell, cellContent));
                    cancelButton.addEventListener('click', () => handleCancelClick(cell, cellContent));
                }
            };

            const getCellContent = () => `
        <div class="px-1">
            <button id="hs-table-dropdown-1" type="button"
                class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md bg-white text-gray-800 shadow-sm border border-gray-200 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                    <path d="m15 5 4 4" />
                </svg>
            </button>
        </div>
    `;

            const handleSaveClick = (cell, cellContent) => {
                const selectedStatus = cell.querySelector('input[name="status"]:checked').value;
                cell.innerHTML = getLoadingSpinner();

                const candidatId = cell.getAttribute('data-candidat-id');
                const route = "{{ route('dashboard.resultat.update', ['id' => '1']) }}";
                fetch(`${route.slice(0, -1)}${candidatId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            status: selectedStatus
                        }),
                        credentials: 'same-origin'
                    })
                    .then(response => response.json())
                    .then(data => {
                        cell.setAttribute('data-status', selectedStatus);
                        cell.innerHTML = cellContent;
                        cell.querySelector('.hs-dropdown-toggle').addEventListener('click', clickHandler);
                        updatePreviousCell(cell, selectedStatus);
                    })
                    .catch(error => {
                        console.error('Error updating candidat:', error);
                        cell.innerHTML = getErrorIcon();
                    });
            };

            const handleCancelClick = (cell, cellContent) => {
                cell.innerHTML = cellContent;
                cell.querySelector('.hs-dropdown-toggle').addEventListener('click', clickHandler);
            };

            const getLoadingSpinner = () => `
        <div class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-gray-700 rounded-full dark:text-blue-500" role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
        </div>
    `;

            const getErrorIcon = () => `
        <div class="inline-block size-4 text-gray-700 dark:text-blue-500" role="status" aria-label="error">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            <span class="sr-only">Error</span>
        </div>
    `;

            const updatePreviousCell = (cell, selectedStatus) => {
                const previousCell = cell.previousElementSibling;
                if (previousCell) {
                    previousCell.innerHTML = `<div class="px-6 py-2">${getStatusContent(selectedStatus)}</div>`;
                }
            };

            const getStatusContent = (status) => {
                const statusMap = {
                    admis: {
                        class: 'bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500',
                        icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />',
                        text: 'Admis'
                    },
                    recalé: {
                        class: 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-green-200',
                        icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>',
                        text: 'Recalé'
                    },
                    default: {
                        class: 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-green-200',
                        icon: '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>',
                        text: 'En cours'
                    }
                };

                const {
                    class: className,
                    icon,
                    text
                } = statusMap[status] || statusMap.default;

                return `
            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium ${className} rounded-full">
                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    ${icon}
                </svg>
                ${text}
            </span>
        `;
            };

            const clickHandler = (event) => {
                const cell = event.target.closest('td');
                const currentStatus = cell.getAttribute('data-status');
                const cellContent = cell.innerHTML;

                cell.innerHTML = getRadioButtons(currentStatus);
                updateResultat(cell);
            };

            const getRadioButtons = (currentStatus) => `
        <form class="flex flex-col gap-1 items-center">
            <div class="flex">
                <label class="text-sm text-gray-500 ms-2 cursor-pointer dark:text-neutral-400">
                    <input type="radio" name="status" value="admis" ${currentStatus === 'admis' ? 'checked' : ''} class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    Admis</label>
            </div>
            <div class="flex">
                <label class="text-sm text-gray-500 ms-2 cursor-pointer dark:text-neutral-400">
                    <input type="radio" name="status" value="recalé" ${currentStatus === 'recalé' ? 'checked' : ''} class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    Recalé</label>
            </div>
        </form>
        <div class="flex justify-center mt-2 gap-x-2">
            <button class="save-button py-1 px-1 inline-flex justify-center items-center gap-x-2 text-sm font-semibold border shadow-md rounded-md bg-white text-gray-800 hover:bg-white focus:outline-none focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
            </button>
            <button class="cancel-button py-1 px-1 inline-flex justify-center items-center shadow-md border gap-x-2 text-sm font-semibold rounded-md bg-white text-gray-800 hover:bg-white focus:outline-none focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
    `;

            const initEditButtons = () => {
                const editButtons = document.querySelectorAll('.hs-dropdown-toggle');
                editButtons.forEach(button => {
                    button.addEventListener('click', clickHandler);
                });

                document.querySelectorAll('td[data-status]').forEach(updateResultat);
            };

            const initFileUpload = () => {
                elements.uploadButton.addEventListener('click', () => elements.fileInput.click());
                elements.fileInput.addEventListener('change', () => elements.fileUploadForm.submit());
            };

            initSearchReset();
            initCheckboxes();
            initEditButtons();
            initFileUpload();
        });
    </script>
@endsection
