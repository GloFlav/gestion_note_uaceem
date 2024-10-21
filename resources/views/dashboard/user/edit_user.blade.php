@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Modification utilisateur
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Pour modifier les informations d'un utilisateur dans le système, veuillez remplir le formulaire
                    ci-dessous avec les informations requises.
                </p>
            </div>
            <!-- Alert -->
            @if (session('success'))
                <div id="dismiss-alert"
                    class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                    role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
                    <div class="flex">
                        <div class="shrink-0">
                            <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
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
                                    <span class="sr-only">Fermer</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Alert -->

            <form method="POST" action="{{ route('dashboard.user.update', ['id' => $utilisateur->id]) }}">
                @method('put')
                @csrf
                <div class="space-y-2">
                    <label for="nom"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Nom <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="nom" type="text"
                            class="py-2 px-3 pe-11 block w-full border border-gray-200
                            @error('nom')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Nom" name="nom" value="{{ old('nom') ?? $utilisateur->nom }}">
                        @error('nom')
                            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12"></line>
                                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                </svg>
                            </div>
                        @enderror

                    </div>
                    @error('nom')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                </div>
                <div class="space-y-2">
                    <label for="username"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Nom d'utilisateur <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="username" type="text"
                            class="py-2 px-3 pe-11 block w-full border border-gray-200
                            @error('username')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Nom d'utilisateur" name="username"
                            value="{{ old('username') ?? $utilisateur->username }}">
                        @error('username')
                            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12"></line>
                                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                </svg>
                            </div>
                        @enderror

                    </div>
                    @error('username')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="space-y-2">
                    <label for="role"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Rôle <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="role"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('role')
                                border-red-500
                            @enderror
                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            name="role">
                            @php
                                $role = old('role') ?? $utilisateur->role;
                            @endphp
                            <option value="SI Admin" {{ $role == 'SI Admin' ? 'selected' : '' }}>SI Admin</option>
                            <option value="Caisse" {{ $role == 'Caisse' ? 'selected' : '' }}>Caisse</option>
                            <option value="Acceuil" {{ $role == 'Acceuil' ? 'selected' : '' }}>Acceuil</option>
                            <option value="Agent" {{ $role == 'Agent' ? 'selected' : '' }}>Agent</option>
                            <option value="Scolarité" {{ $role == 'Scolarité' ? 'selected' : '' }}>Scolarité
                            </option>
                            <option value="Etudiant" {{ $role == 'Etudiant' ? 'selected' : '' }}>Etudiant</option>
                        </select>
                        @error('role')
                            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12"></line>
                                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('role')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                @if ($utilisateur->id != auth()->user()->id)
                    <div class="space-y-2">
                        <div class="flex flex-col space-y-2">
                            <label for="hs-basic-with-description-checked"
                                class="block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                                Suspendu
                            </label>
                            <input type="checkbox" id="hs-basic-with-description-checked"
                                class="relative w-[3.25rem] h-7 p-px bg-gray-400 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600
                        before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200"
                                @php $status = old('status') ?? $utilisateur->status;
                            if (!$status) echo "checked"; @endphp
                                name="status">
                        </div>
                    </div>
                @endif


                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('dashboard.user.index') }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        Annuler
                    </a>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Enregistrer
                    </button>
                </div>
            </form>
            <hr class="my-4">
            <form method="POST" action="{{ route('dashboard.user.reset.password', ['id' => $utilisateur->id]) }}"
                class="space-y-2">
                @csrf
                <label for="password" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                    Nouveau mot de passe (par défaut) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input id="password" type="text"
                        class="py-2 px-3 pe-11 block w-full border border-gray-200
                        @error('password')
                            border-red-500
                        @enderror

                        shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Mot de passe" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                            <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" x2="12" y1="8" y2="12"></line>
                                <line x1="12" x2="12.01" y1="16" y2="16"></line>
                            </svg>
                        </div>
                    @enderror

                </div>
                @error('password')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ $message }}
                    </p>
                @enderror
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('dashboard.user.index') }}"
                        class="py-2 px-3 inline-flex items-center mt-2  text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        Annuler
                    </a>
                    <button type="submit"
                        class="py-2 px-3 mt-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Réinitialiser
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
@endsection
