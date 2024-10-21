@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Ajout Niveau
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Pour ajouter un nouveau niveau au système, veuillez remplir le formulaire ci-dessous avec les
                    informations requises.
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

            <form method="POST">
                @csrf
                <div class="relative">
                    <label for="mention"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200 mb-2">
                        Parcours <span class="text-red-500">*</span>
                    </label>

                    <!-- Select -->
                    <select
                        data-hs-select='{
    "placeholder": "Selectionner Parcours...",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-3 pe-9 shadow-sm flex text-sm gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
    "dropdownClasses": "mt-2 z-50 w-full text-sm max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
  }'
                        class="hidden" name="parcours_id">
                        @foreach ($parcours as $parcour)
                            <option value="{{ $parcour->id }}">
                                {{ $parcour->design }} - {{ $parcour->mention->code }}
                            </option>
                        @endforeach
                    </select>
                    <!-- End Select -->
                    @error('parcours_id')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="relative">
                    <label for="mention"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200 mb-2">
                        Niveau <span class="text-red-500">*</span>
                    </label>

                    <!-- Select -->
                    <select
                        class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        name="design">

                    </select>
                    <!-- End Select -->
                    @error('design')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="descriotion"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Description
                    </label>
                    <div class="relative ">
                        <textarea id="descriotion"
                            class="py-2 px-3 pe-11 block w-full border border-gray-200
                            @error('description')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Description du niveau" name="description">{{ old('description') }}</textarea>
                        @error('description')
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
                    @error('description')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>



                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('dashboard.academique.niveau.index') }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        Annuler
                    </a>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const allLevels = ['L1', 'L2', 'L3', 'M1', 'M2'];
            const addedLevels = @json($niveauxTaken);
            const parcoursSelect = document.querySelector('select[name="parcours_id"]');
            const niveauSelect = document.querySelector('select[name="design"]');

            const updateNiveau = function() {
                const selectedParcoursId = parcoursSelect.value;
                const addedLevelsForParcours = addedLevels[selectedParcoursId] || [];
<<<<<<< HEAD
                console.log(addedLevelsForParcours)
=======
>>>>>>> wendi_flux

                // Clear existing options
                niveauSelect.innerHTML = '';

                // Add available levels
                allLevels.forEach(level => {
                    if (!addedLevelsForParcours.includes(level)) {
                        const option = document.createElement('option');
                        option.value = level;
                        option.textContent = level;
                        niveauSelect.appendChild(option);
<<<<<<< HEAD
                        console.log(level)
                    }
                });


=======
                    }
                });

>>>>>>> wendi_flux
            }
            parcoursSelect.addEventListener('change', updateNiveau);
            updateNiveau();
        })
    </script>
@endsection
