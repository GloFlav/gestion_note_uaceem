@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Modification Candidat
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Pour modifier les informations d'un candidat dans le système, veuillez remplir le formulaire
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

            <form method="POST" action="{{ route('dashboard.candidatsSI.update', $candidat->id) }}"  >
                @method('put')
                @csrf
                <div class="form-group mb-4">
                    <label for="vagues_id" class="block text-sm font-medium text-gray-700">Vagues</label>
                    <select name="vagues_id" id="vagues_id" class="form-control mt-1 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        @foreach($vagues as $vague)
                            <option value="{{ $vague->id }}" {{ old('vagues_id', $vague->vagues_id) == $vagues_id ? 'selected' : '' }}>
                                {{ $vague->designation }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- <input type="hidden" name="concours_id" value="{{ old('concours_id') ?? $candidat->concours_id}}"> --}}
                <div class="space-y-2">
                    <label for="nom"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Nom <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="nom" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('nom')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Nom" name="nom" value="{{ old('nom') ?? $candidat->nom }}">
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
                    <label for="num_bacc"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Numéro du Bacc <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="num_bacc" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('num_bacc')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="num_bacc" name="num_bacc"
                            value="{{ old('num_bacc') ?? $candidat->num_bacc }}">
                        @error('num_bacc')
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
                    @error('num_bacc')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                </div>
                <div class="space-y-2">
                    <label for="num_conc"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Numéro concours <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="num_conc" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('num_conc')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="num_conc" name="num_conc"
                            value="{{ old('num_conc') ?? $candidat->num_conc }}">
                        @error('num_conc')
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
                    @error('num_conc')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                </div>
                <div class="space-y-2">
                    <label for="anne_bacc"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Année du Bacc <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="anne_bacc" type="number" min="1990" max="2500" step="1"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('anne_bacc')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Anne_bacc" name="anne_bacc"
                            value="{{ old('anne_bacc') ?? $candidat->anne_bacc }}">
                        @error('anne_bacc')
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
                    @error('anne_bacc')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="space-y-2">
                    <label for="serie"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Série <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="serie_id"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('serie_id')
                                border-red-500
                            @enderror
                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            name="serie_id">
                            @php
                                $selectedSerie = old('serie_id') ?? $candidat->serie_id;
                            @endphp
                                <option disabled {{ is_null($selectedSerie) ? 'selected' : '' }}>Série du BACC</option>
                                @foreach ($series as $serieOption)
                                    <option value="{{ $serieOption['id'] }}" {{ $selectedSerie == $serieOption['id'] ? 'selected' : '' }}>
                                        {{ $serieOption['design'] }}
                                    </option>
                                @endforeach
                        </select>
                        @error('serie_id')
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
                </div>



                    @error('serie_id')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="mention"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Mention <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="mention_id"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('mention_id')
                                border-red-500
                            @enderror
                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            name="mention_id">
                            @php
                            $selectedMention = old('mention_id') ?? $candidat->mention_id;
                             @endphp
                         <option value="" {{ is_null($selectedMention) ? 'selected' : '' }}>Choisir Mention</option>
                         @foreach ($mentions as $mentionOption)
                             <option value="{{ $mentionOption['id'] }}" {{ $selectedMention == $mentionOption['id'] ? 'selected' : '' }}>
                                 {{ $mentionOption['design'] }}
                             </option>
                         @endforeach
                        </select>
                        @error('mention_id')
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
                    @error('mention_id')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="tel"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Téléphone <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="tel" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('tel')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="tel" name="tel" value="{{ old('tel') ?? $candidat->tel }}">
                        @error('tel')
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
                    @error('tel')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="space-y-2">
                    <label for="email"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        e-mail <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="nom" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('email')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="email" name="email" value="{{ old('email') ?? $candidat->email }}">
                        @error('email')
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
                    @error('email')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                </div>
                <div class="space-y-2">
                    <label for="ref_mvola"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        ref_mvola <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="nom" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200
                            @error('ref_mvola')
                                border-red-500
                            @enderror

                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="ref_mvola" name="ref_mvola" value="{{ old('ref_mvola') ?? $candidat->ref_mvola }}">
                        @error('ref_mvola')
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
                    @error('ref_mvola')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="space-y-2">
                        <label for="ref_mvola"
                            class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                            Commentaire Admin<span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="commentaire" type="textarea"
                                class="py-2 px-3 pe-11 block w-full border-gray-200
                                @error('commentaire')
                                    border-red-500
                                @enderror

                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="commentaire" name="commentaire" value="{{ old('commentaire') ?? $candidat->commentaire }}">
                            @error('commentaire')
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
                        @error('commentaire')
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror

                </div>

                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('dashboard.candidatsSI.index') }}"
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

    <script>
        const seriesMentions = @json($series);

        document.getElementById('serie_id').addEventListener('change', function() {
            const selectedSerieId = this.value;
            const mentionsSelect = document.getElementById('mention_id');

            // Effacer les options existantes
            mentionsSelect.innerHTML = '<option value="">Choisir Mention</option>';

            const selectedSerie = seriesMentions.find(serie => serie.id == selectedSerieId);
            console.log(selectedSerie)
            if (selectedSerie) {
                selectedSerie.mentions.forEach(function(mention) {
                    let option = document.createElement('option');
                    option.value = mention.id;
                    option.text = mention.design;
                    mentionsSelect.appendChild(option);
                });

                // Sélectionner la mention précédente si elle existe
                const selectedMentionId = {{ json_encode($selectedMention) }};
                if (selectedMentionId) {
                    mentionsSelect.value = selectedMentionId;
                }
            }
        });
    </script>

@endsection
