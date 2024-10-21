@extends('layouts.app')

@section('content')
    <div class="bg-gray-50">
        @php
            $currentDate = \Carbon\Carbon::now();
        @endphp

        @if ($currentDate->between($deb_insc, $fin_insc) && !empty($deb_insc))
            <div class="max-w-5xl px-6 py-1 lg:px-1 lg:py-0 mx-auto">
                <img src="https://lh5.googleusercontent.com/h7aQPQmfQIdxpHp5rxG4GjMJoXq4_x1S7bPMZMhpr_Vj12QsO_Nsjn1CC8I6TDaWi0OGb1tM1YLFp2IJYxDNBBAwAEsphVX_MM9bjw9C_0hqZoOt4JyAm7KE-5A-IRcNWw=w2046
"
                    alt="couverture" class="rounded-lg w-full">
            </div>
            <div class="text-center mt-8 max-w-5xl px-6 mx-auto">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                    Inscription au concours d'entrée à l'Université ACEEM
                </h3>
                <br>
            </div>

            <!-- Card Section -->
            <div
                class="p-4 bg-white max-w-5xl mx-auto px-6 mt-6 border-dashed border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                <div class="text-center">
                    <label class="sm:text-base text-sm font-poppins font-high dark:text-white text-center">
                        Les inscriptions pour le concours commencent le
                        <strong>{{ \Carbon\Carbon::parse($deb_insc)->translatedFormat('d F') }}</strong> et se terminent le
                        <strong>{{ \Carbon\Carbon::parse($fin_insc)->translatedFormat('d F') }}</strong>.
                        <br>
                        Merci de compléter le formulaire ci-dessous pour être éligible au concours qui aura lieu les
                        <strong>{{ \Carbon\Carbon::parse($deb_conc)->translatedFormat('d') }} et
                            {{ \Carbon\Carbon::parse($fin_conc)->translatedFormat('d') }}
                            {{ \Carbon\Carbon::parse($fin_conc)->translatedFormat('M Y') }}</strong>.
                    </label>
                </div>
                <br>
                <div
                    class="flex justify-center items-center  border-dashed border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <form method="POST" action="{{ route('inscription.store') }}" class="w-full" id="candidateForm">
                        @csrf
                        <input type="hidden" name="vagues_id" value="{{ $vague->id }}">
                        <!-- Section -->
                        <div
                            class="py-3 first:pt-1 last:pb-1 border-t first:border-transparent border-gray-400 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="af-payment-billing-contact"
                                class="inline-block text-sm font-medium dark:text-white">
                                Nom et Prénoms <span class="text-red-500">*</span>
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="af-payment-billing-contact" type="text"
                                    class="py-2 px-3 pe-11 block w-full border-gray-400 border
                                @error('nom')
                                    border-red-500
                                @enderror
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Exemple: RANDRIANARIVO Jean" name="nom" value="{{ old('nom') }}">
                                @error('nom')
                                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div class="py-2 first:pt-0 last:pb-0">
                            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
                                N° d'inscription et Année du BACC <span class="text-red-500">*</span>
                            </label>

                            <div class="mt-2 space-y-3">
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <input type="text"
                                        class="py-2 px-3 pe-11 block w-full border-gray-400 border
                                    @error('num_bacc')
                                    border-red-500
                                    @enderror
                                    shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Exemple: 2014578" name="num_bacc" value="{{ old('num_bacc') }}">

                                    <input type="number" min="1990" id="anne_bacc" step="1"
                                        class="py-2 px-3 pe-11 block w-full border-gray-400 border
                                    @error('anne_bacc')
                                      border-red-500
                                    @enderror
                                    shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Année du Bacc" name="anne_bacc" value="{{ old('anne_bacc') }}">
                                </div>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <div class="block w-full">
                                        @error('num_bacc')
                                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="block w-full">
                                        @error('anne_bacc')
                                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div class="py-2 first:pt-0 last:pb-0">
                            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
                                Série du BACC et Choix de la Mention (Filière) <span class="text-red-500">*</span>
                            </label>

                            <div class="mt-2 space-y-3">
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <select name="serie_id" id="serie"
                                        class="py-2 px-3 pe-11 block w-full border-gray-400 border
                                    @error('serie_id')
                                    border-red-500
                                    @enderror
                                    shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Série">
                                        <option selected="">Série du Bacc</option>
                                        @foreach ($series as $serie)
                                            <option value="{{ $serie['id'] }}">{{ $serie['design'] }}</option>
                                        @endforeach
                                    </select>

                                    <select name="mention_id" id="mention"
                                        class="py-2 px-3 pe-11 block w-full border-gray-400 border
                                    @error('mention_id')
                                    border-red-500
                                    @enderror
                                    shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Mention">
                                        <option value="">Choisir Mention</option>
                                    </select>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <div class="block w-full">
                                        @error('serie_id')
                                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="block w-full">
                                        @error('mention_id')
                                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div class="py-2 first:pt-0 last:pb-0">
                            <label for="af-payment-billing-address"
                                class="inline-block text-sm font-medium dark:text-white">
                                Téléphone <span class="text-red-500">*</span>
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="af-payment-billing-address" type="text"
                                    class="py-2 px-3 pe-11 block w-full border-gray-400 border
                                @error('tel')
                                border-red-500
                                @enderror
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Exemple: 0340000000" name="tel" value="{{ old('tel') }}">
                                @error('tel')
                                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div class="py-2 first:pt-0 last:pb-0">
                            <label for="af-payment-billing-address"
                                class="inline-block text-sm font-medium dark:text-white">
                                Email
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="af-payment-billing-address" type="text"
                                    class="py-2 px-3 pe-11 block w-full border-gray-400 border
                                @error('email')
                                    border-red-500
                                @enderror
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Exemple: aceemgroupe@gmail.com" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <!-- End Section -->
                        <div class="mt-5 flex justify-end gap-x-2">
                            <button type="button" id="openModal"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- End Card -->
    </div>
    <!-- End Card Section -->
@else
    <!-- Card Section -->
    <div class="max-w-2xl px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
        <div class="max-w-2xl px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
            <img src="https://lh5.googleusercontent.com/h7aQPQmfQIdxpHp5rxG4GjMJoXq4_x1S7bPMZMhpr_Vj12QsO_Nsjn1CC8I6TDaWi0OGb1tM1YLFp2IJYxDNBBAwAEsphVX_MM9bjw9C_0hqZoOt4JyAm7KE-5A-IRcNWw=w2046
    "
                alt="">
        </div>
        <!-- Card -->
        <div class="bg-gray-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
            <div class="text-center mb-8">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                    Inscription au concours d'entrer à l'Université ACEEM
                </h3>
                <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
                    Désolé, il n'y a pas d'inscription disponible pour le moment. <br>
                    L'Université ACEEM vous remercie.
                </label>
            </div>
        </div>
    </div>
    @endif
    <!-- JavaScript to handle dynamic mentions -->

    <!-- Modal -->
    <div id="validationModal" class="fixed inset-0 hidden z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="flex items-center justify-center min-h-screen w-full">
                <div
                    class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <div
                            class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Êtes-vous sûr de valider?</h3>
                                <p class="mt-2 text-sm text-gray-500">Vérifiez bien vos informations.</p>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button" id="submitForm"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Envoyer
                                </button>
                                <button type="button" id="closeModal"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none sm:mr-3">
                                    Annuler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- endModal -->

    <script>
        // Récupérer l'année actuelle
        const currentYear = new Date().getFullYear();

        // Sélectionner l'élément d'entrée et définir les attributs
        const anneBaccInput = document.getElementById('anne_bacc');

        // Définir la valeur actuelle comme année par défaut
        anneBaccInput.value = currentYear;

        // Définir l'année actuelle comme maximum
        anneBaccInput.max = currentYear;

        const seriesMentions = @json($series);

        document.getElementById('serie').addEventListener('change', function() {
            const selectedSerieId = this.value;
            const mentionsSelect = document.getElementById('mention');

            // Clear existing options
            mentionsSelect.innerHTML = '<option value="">Choisir Mention</option>';

            const selectedSerie = seriesMentions.find(serie => serie.id == selectedSerieId);

            if (selectedSerie) {
                selectedSerie.mentions.forEach(function(mention) {
                    let option = document.createElement('option');
                    option.value = mention.id;
                    option.text = mention.name;
                    mentionsSelect.appendChild(option);
                });
            }
        });

        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('validationModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('validationModal').classList.add('hidden');
        });

        document.getElementById('submitForm').addEventListener('click', function() {
            document.getElementById('candidateForm').submit();
        });
    </script>
@endsection
