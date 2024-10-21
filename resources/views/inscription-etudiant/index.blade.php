@extends('layouts.app')

@section('content')
<div class="max-w-5xl px-6 mx-auto">
    <img src="https://lh5.googleusercontent.com/h7aQPQmfQIdxpHp5rxG4GjMJoXq4_x1S7bPMZMhpr_Vj12QsO_Nsjn1CC8I6TDaWi0OGb1tM1YLFp2IJYxDNBBAwAEsphVX_MM9bjw9C_0hqZoOt4JyAm7KE-5A-IRcNWw=w2046
" alt="" class="rounded-lg w-full">
</div>
    <!-- Card Section -->
<div class="max-w-5xl px-6 mx-auto">
    <!-- Card -->
    <div class="bg-gray-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
      <div class="text-center mb-8">
        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
          Inscription d'entrer à l'Université ACEEM
        </h3>
        <label for="af-payment-billing-contact" class="mt-4 inline-block text-sm font-medium dark:text-white">
            Veuillez remplir ce formulaire d'inscription. Il vous faudra une adresse email valide, cette adresse email sera utilisée tout au long de votre cursus au sein de l'Université ACEEM. Assurez-vous que votre adresse email fonctionne et que vous y avez accès.
        </label>
      </div>

      <form method="POST" action="{{ route('etudiant.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="py-1 first:pt-1 last:pb-1 border-t first:border-transparent border-gray-400 dark:border-neutral-700 dark:first:border-transparent">
         <!-- Matricule -->
            <input type="hidden" name="matricule" value="{{ $matricule->id }}">
            <input type="hidden" name="mention_id" value="{{ $matricule->candidat->mention_id }}">
            <input type="hidden" name="candidat_id" value="{{ $matricule->candidat_id }}">
        <!-- Section -->
        </div>
         <!-- Nom Complet -->
        <div class="py-1 first:pt-1 last:pb-0">
            @if ($matricule->candidat && !empty($matricule->candidat->nom))
            <label for="email" class="inline-block text-sm font-medium dark:text-white">
                Nom complet <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
                <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('nom')
                    border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: RANDRIANARIVO Jean" name="nom" value="{{ old('nom', $matricule->candidat->nom ?? '') }}">
                @error('nom')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                @enderror
            </div>
            @else
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
                Nom Complet <span class="text-red-500">*</span>
            </label>
            <div class="mt-2 space-y-3">
                <input type="text" lass="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('nom')
                    border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: RANDRIANARIVO Jean" name="nom">
                @error('nom')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                @enderror
            </div>
            @endif
        </div>

         <!-- Mentions -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
              Mention : {{ $matricule->candidat->mention->design }}
            </label>
        </div>

        <!-- Série Bacc -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
              Série du Bacc : {{ $matricule->candidat->serie->design }}
            </label>
        </div>

        <!-- Année du Bacc -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
              Année du bacc : {{ $matricule->candidat->anne_bacc }}
            </label>
        </div>

        <!-- Telephone -->
        <div class="py-2 first:pt-1 last:pb-0">
            @if ($matricule->candidat)
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
                Numéro du téléphone <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
                <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('tel')
                    border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: RANDRIANARIVO Jean" name="tel" value="{{ old('tel', $matricule->candidat->tel ?? '') }}">
                @error('tel')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                @enderror
            </label>
            @else
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
                Numéro du téléphone <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
                <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('tel')
                    border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: 0340000000" name="tel">
                @error('tel')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                @enderror
            </label>
            @endif
        </div>

        <!-- Email -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="email" class="inline-block text-sm font-medium dark:text-white">
                Adresse email <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
                <input id="email" type="email" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('email')
                    border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: aceemgroupe@gmail.com" name="email" value="{{ old('email', $matricule->candidat->email ?? '') }}">
                @error('email')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                @enderror
              </div>
        </div>

        <!-- Photo -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="photo" class="inline-block text-sm font-medium dark:text-white">
              Photo
            </label>
          <div class="mt-2 space-y-3">
            <div class="max-w-sm">
                  <label class="block">
                    <span class="sr-only">Choisir photo</span>
                    <input type="file" name="photo" class="block w-full text-sm text-gray-500
                      file:me-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0
                      file:text-sm file:font-semibold
                      file:bg-blue-600 file:text-white
                      hover:file:bg-blue-700
                      file:disabled:opacity-50 file:disabled:pointer-events-none
                      dark:text-neutral-500
                      dark:file:bg-blue-500
                      dark:hover:file:bg-blue-400
                    ">
                    @error('photo')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ $message }}</p>
                    @enderror
                  </label>
              </div>
          </div>
        </div>
        <!-- End Section -->

        <!-- Sexe -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="genre" class="inline-block text-sm font-medium dark:text-white">
              Genre <span class="text-red-500">*</span>
            </label>
          <div class="mt-2 space-y-3">
            <div class="flex">
                <input type="radio" name="sexe" class="shrink-0 mt-0.5 border-gray-400 border
                @error('sexe')
                    border-red-500
                @enderror
                rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-default-radio" checked="" value="M">
                <label for="hs-default-radio" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Masculin</label>
              </div>

              <div class="flex">
                <input type="radio" name="sexe" class="shrink-0 mt-0.5 border-gray-400 border
                @error('sexe')
                    border-red-500
                @enderror rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-checked-radio" value="F">
                <label for="hs-checked-radio" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Féminin</label>
              </div>
          </div>
        </div>
        <!-- End Section -->

        <!-- Date et lieu de naissance -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
              Date et lieu de naissance <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="date" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('date_nais')
                  border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="date_nais" value="{{ old('date_nais') }}">

                <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('lieu_nais')
                  border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Mahamasina Antananarivo" name="lieu_nais" value="{{ old('lieu_nais') }}">
              </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="block w-full">
                @error('date_nais')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ $message }}</p>
                @enderror
                </div>
                <div class="block w-full">
                @error('lieu_nais')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ $message }}</p>
                @enderror
                </div>
            </div>
          </div>
          <!-- End Section -->

          <!-- Situation Matrimoniale -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="genre" class="inline-block text-sm font-medium dark:text-white">
              Situation matrimoniale <span class="text-red-500">*</span>
            </label>
          <div class="mt-2 space-y-3">
            <div class="flex flex-col gap-y-3">
                <div class="flex">
                  <input type="radio" name="situation_matri" class="shrink-0 mt-0.5 border-gray-400 border
                  @error('situation_matri')
                    border-red-500
                 @enderror
                  rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-radio-vertical-group-1" checked="" value="celibataire">
                  <label for="hs-radio-vertical-group-1" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Célibataire</label>
                </div>

                <div class="flex">
                  <input type="radio" name="situation_matri" class="shrink-0 mt-0.5 border-gray-400 border
                  @error('situation_matri')
                    border-red-500
                 @enderror
                  rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-radio-vertical-group-2" value="marié">
                  <label for="hs-radio-vertical-group-2" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Marié</label>
                </div>

                <div class="flex">
                  <input type="radio" name="situation_matri" class="shrink-0 mt-0.5 border-gray-400 border
                  @error('situation_matri')
                    border-red-500
                  @enderror
                  rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-radio-vertical-group-3" value="autre">
                  <label for="hs-radio-vertical-group-3" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Autre</label>
                </div>
              </div>
        </div>
        <!-- End Section -->

        <!-- Numéro de CIN -->
        <div class="py-2 first:pt-1 last:pb-0">
            <label for="CIN" class="inline-block text-sm font-medium dark:text-white">
                Numéro de CIN
            </label>

            <div class="mt-2 space-y-3">
                <input id="CIN" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('num_cin')
                    border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: 201011032156" name="num_cin" value="{{ old('num_cin') }}">
              </div>
        </div>

          <!-- Délivré et lieu de CIN -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="date_lieu" class="inline-block text-sm font-medium dark:text-white">
              Délivrance et lieu du délivrance de la CIN
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="date" name="date_cin" id="date_lieu" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('date_cin')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" value="{{ old('date_cin') }}">

                <input type="text" name="lieu_cin" id="date_lieu" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('lieu_cin')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Antananarivo" value="{{ old('lieu_cin') }}">
              </div>
            </div>
          </div>
          <!-- End Section -->

           <!-- Adresse et quartier de résidence -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="adresse_quartier" class="inline-block text-sm font-medium dark:text-white">
                Adresse et Quartier de résidence à Antananarivo <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="text" name="adresse" id="adresse_quartier" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('adresse')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Exemple: Lot 266A/1546" value="{{ old('adresse') }}">

                <select name="quartier" id="adresse_quartier" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('quartier')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="" value="">-- Sélectionner --</option>
                    <option value="67HA">67HA</option>
                    <option value="Alasora">Alasora</option>
                    <option value="Ambatomainty">Ambatomainty</option>
                    <option value="Ambohimanarina">Ambohimanarina</option>
                    <option value="Ambohipo">Ambohipo</option>
                    <option value="Ambohitsirohitra">Ambohitsirohitra</option>
                    <option value="Ambolokandrina">Ambolokandrina</option>
                    <option value="Ampasapito">Ampasapito</option>
                    <option value="Ampefiloha">Ampefiloha</option>
                    <option value="Ampitatafika">Ampitatafika</option>
                    <option value="Andavamamba">Andavamamba</option>
                    <option value="AndrefanAmbohijanahary">AndrefanAmbohijanahary</option>
                    <option value="Ankadifotsy">Ankadifotsy</option>
                    <option value="Ankatso">Ankatso</option>
                    <option value="Ankazotokana">Ankazotokana</option>
                    <option value="Antanimena">Antanimena</option>
                    <option value="Anosizato">Anosizato</option>
                    <option value="Ilafy">Ilafy</option>
                    <option value="Itaosy">Itaosy</option>
                    <option value="Ivandry">Ivandry</option>
                    <option value="Ivato">Ivato</option>
                    <option value="Manakambahiny">Manakambahiny</option>
                    <option value="Sabotsy namehana">Sabotsy Namehana</option>
                    <option value="Talatamaty">Talatamaty</option>
                    <option value="Tanjombato">Tanjombato</option>
                    <option value="Tsiadana">Tsiadana</option>
                    <option value="Autre">Autre</option>
                </select>
              </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="block w-full">
                @error('adresse')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ $message }}</p>
                @enderror
                </div>
                <div class="block w-full">
                @error('quartier')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ $message }}</p>
                @enderror
                </div>
            </div>
          </div>
          <!-- End Section -->

          <!-- Facebook -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="facebook" class="inline-block text-sm font-medium dark:text-white">
                Compte facebook
            </label>

            <div class="mt-2 space-y-3">
              <input id="facebook" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('facebook')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Jean Pierre" name="facebook" value="{{ old('facebook') }}">
            </div>
          </div>
          <!-- End Section -->

           <!-- Etalissement d'origine -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="etablissement_origine" class="inline-block text-sm font-medium dark:text-white">
                Etablissement d'origine(Votre etablissement scolaire l'an dernier) <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <input id="etablissement_origine" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('etablissement_origine')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Collège Saint François Xavier Ambatomena Fianarantsoa" name="etablissement_origine" value="{{ old('etablissement_origine') }}">
              @error('etablissement_origine')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

            <!-- Email parent -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="email_parent" class="inline-block text-sm font-medium dark:text-white">
                Email de vos parents
            </label>

            <div class="mt-2 space-y-3">
              <input id="email_parent" type="email" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('email_parent')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: nomparent@gmail.com" name="email_parent" value="{{ old('email_parent') }}">
              @error('email_parent')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

           <!-- Nom parent -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="nom_parent" class="inline-block text-sm font-medium dark:text-white">
                Nom et prénom du premier parent ou tuteur légal <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <input id="nom_parent" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('nom_parent')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: RANDRIANAIVO Jean" name="nom_parent" value="{{ old('nom_parent') }}">
              @error('nom_parent')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

           <!-- Adresse parent -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="adresse_parent" class="inline-block text-sm font-medium dark:text-white">
                Adresse des parents ou tuteur légal <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <input id="adresse_parent" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('adresse_parent')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Lot 541C/4781" name="adresse_parent" value="{{ old('adresse_parent') }}">
              @error('adresse_parent')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

          <!-- Profession parent -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="profession_parent" class="inline-block text-sm font-medium dark:text-white">
                Profession du premier parent ou tuteur légal <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <input id="profession_parent" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('profession_parent')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Directeur du Banque BOA" name="profession_parent" value="{{ old('profession_parent') }}">
              @error('profession_parent')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->


          <!-- Numéro parent -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="tel_parent" class="inline-block text-sm font-medium dark:text-white">
                Numéro de téléphone du premier parent ou tuteur légal <span class="text-red-500">*</span>
                <p>Entrez le sous la forme 03XNNNNNNN</p>
            </label>

            <div class="mt-2 space-y-3">
              <input id="tel_parent" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('tel_parent')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: 0340000000" name="tel_parent" value="{{ old('tel_parent') }}">
              @error('tel_parent')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

           <!-- Numéro mvola -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="num_mvola" class="inline-block text-sm font-medium dark:text-white">
                Votre numéro Mvola
                <p>Important: si vous pensez effectuer des paiement d'écolage via Mvola entrez le numéro ici, même si vous l'avez déjà entré auparavant. Entrez le sous la forme 034NNNNNNN ou 038NNNNNNN</p>
            </label>

            <div class="mt-2 space-y-3">
              <input id="num_mvola" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('num_mvola')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: 0340000000" name="num_mvola" value="{{ old('num_mvola') }}">
              @error('num_mvola')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

        <!-- Province parent -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="province_parent" class="inline-block text-sm font-medium dark:text-white">
                La résidence de vos parents ou de votre tuteur légal se trouve dans la province de <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
                <select name="province_parent" id="province_parent" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('province_parent')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="" value="">-- Sélectionner --</option>
                    <option value="Antananarivo">Antananarivo</option>
                    <option value="Antsirabe">Antsirabe</option>
                    <option value="Antsiranana">Antsiranana</option>
                    <option value="Mahajanga">Mahajanga</option>
                    <option value="Toamasina">Toamasina</option>
                    <option value="Toliara">Toliara</option>
                    <option value="Fianarantsoa">Fianarantsoa</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
        </div>
        <!-- End Section -->

        <!-- Nom 2eme parent -->
           <div class="py-2 first:pt-0 last:pb-0">
            <label for="nom_parent_2" class="inline-block text-sm font-medium dark:text-white">
                Nom et prénom du deuxième parent
            </label>

            <div class="mt-2 space-y-3">
              <input id="nom_parent_2" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('nom_parent_2')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: ANDRIANARIVO Fabrice" name="nom_parent_2" value="{{ old('nom_parent_2') }}">
              @error('nom_parent_2')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

          <!-- Profession 2eme parent -->
          <div class="py-2 first:pt-0 last:pb-0">
            <label for="profession_parent_2" class="inline-block text-sm font-medium dark:text-white">
                Profession du deuxième parent
            </label>

            <div class="mt-2 space-y-3">
              <input id="profession_parent_2" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('profession_parent_2')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Chauffeur" name="profession_parent_2" value="{{ old('profession_parent_2') }}">
              @error('profession_parent_2')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

           <!-- telephone 2eme parent -->
           <div class="py-2 first:pt-0 last:pb-0">
            <label for="tel_parent_2" class="inline-block text-sm font-medium dark:text-white">
                Numéro de téléphone du deuxième parent
                <p>Entrez le sous la forme 03XNNNNNNN</p>
            </label>

            <div class="mt-2 space-y-3">
              <input id="tel_parent_2" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('profession_parent_2')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: 0340000000" name="tel_parent_2" value="{{ old('tel_parent_2') }}">
              @error('tel_parent_2')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

         <!-- Centre d'intérêt -->
         <div class="py-2 first:pt-0 last:pb-0">
            <label for="centre_interet" class="inline-block text-sm font-medium dark:text-white">
                Parlez nous de vous et de vos centres d'intérêts <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <input id="centre_interet" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('centre_interet')
                 border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: Lire,Ecrire..." name="centre_interet" value="{{ old('centre_interet') }}">
              @error('centre_interet')
                  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

        {{-- <!-- Username -->
        <div class="py-2 first:pt-0 last:pb-0">
          <label for="username" class="inline-block text-sm font-medium dark:text-white">
            Votre nom d'utilisateur pour votre compte(username) <span class="text-red-500">*</span>
          </label>

          <div class="mt-2 space-y-3">
            <input id="username" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
            @error('username')
               border-red-500
            @enderror
            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Exemple: jean" name="username" value="{{ old('username') }}">
            @error('username')
                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- End Section -->

         <!-- Mot de passe -->
         <div class="py-2 first:pt-0 last:pb-0">
            <label for="password" class="inline-block text-sm font-medium dark:text-white">
              Votre mot de passe(password) <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
               <!-- Form Group -->
                    <input id="hs-toggle-password-with-checkbox" type="password" name="password" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                    @error('password')
                        border-red-500
                    @enderror
                    rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="**********">
                    @error('password')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                    @enderror
                    <!-- Checkbox -->
                    <div class="flex mt-4">
                    <input data-hs-toggle-password='{
                        "target": "#hs-toggle-password-with-checkbox"
                        }' id="hs-toggle-password-checkbox" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-toggle-password-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Afficher</label>
                    </div>
                    <!-- End Checkbox -->
                <!-- End Form Group -->
            </div>
          </div>
          <!-- End Section -->

          <!-- Mot de passe -->
         <div class="py-2 first:pt-0 last:pb-0">
            <label for="password_confirmation" class="inline-block text-sm font-medium dark:text-white">
              Confirmer votre mot de passe(password) <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
               <!-- Form Group -->
                    <input id="password_confirmation" type="password" name="password_confirmation" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                    @error('password_confirmation')
                        border-red-500
                    @enderror
                    rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="**********">
                    @error('password_confirmation')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                    @enderror
                <!-- End Form Group -->
            </div>
          </div>
          <!-- End Section --> --}}

          <div class="mt-5 flex justify-end gap-x-2">
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
              Envoyer
            </button>
          </div>
      </form>

    </div>
</div>

@if (session('error'))
<div class="mt-4">
    <!-- Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <h2 class="text-lg font-semibold text-red-600">Erreur</h2>
            <p class="mt-2 text-sm text-gray-600">{{ session('error') }}</p>
            <button class="mt-4 inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="closeModal()">Fermer</button>
        </div>
    </div>
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black opacity-50 z-40" onclick="closeModal()"></div>
</div>
@endif

<script>
function closeModal() {
const modal = document.querySelector('.fixed.inset-0.flex.items-center');
const overlay = document.querySelector('.fixed.inset-0.bg-black');
modal.remove();
overlay.remove();
}
</script>

@endsection
