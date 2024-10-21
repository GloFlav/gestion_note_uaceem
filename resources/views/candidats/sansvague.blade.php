@extends('layouts.app')

@section('content')

@php
    $currentDate = \Carbon\Carbon::now();
@endphp

@if ($currentDate->between($deb_insc, $fin_insc) && !empty($deb_insc))

<div class="max-w-5xl px-1 py-1 sm:px-6 lg:px-1 lg:py-0 mx-auto">
    <img src="https://lh5.googleusercontent.com/h7aQPQmfQIdxpHp5rxG4GjMJoXq4_x1S7bPMZMhpr_Vj12QsO_Nsjn1CC8I6TDaWi0OGb1tM1YLFp2IJYxDNBBAwAEsphVX_MM9bjw9C_0hqZoOt4JyAm7KE-5A-IRcNWw=w2046
" alt="">
</div>
<!-- Card Section -->
<div class="max-w-5xl px-1 py-1 sm:px-6 lg:px-1 lg:py-0 mx-auto">
    <!-- Card -->
    <div class="bg-gray-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
      <div class="text-center mb-8">
        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
            Inscription au concours d'entrer à l'Université ACEEM
        </h3>
        <br>
        <label for="af-payment-billing-contact" class="inline-block text-lg font-high dark:text-white">
            L'inscription pour le concours d'entrer à l'Université ACEEM se débute le <strong>{{ $deb_insc}}</strong> et se termine le <strong>{{ $fin_insc}}</strong> pour aucune vague de concours. <br>
            Veuillez remplir le formulaire suivant pour avoir votre numréro d'inscription au concours.
        </label>
      </div>

      <form method="POST" action="{{ route('candidats.enregistre') }}">
        @csrf
        <!-- Section -->
        <div class="py-2 first:pt-1 last:pb-1 border-t first:border-transparent border-gray-400 dark:border-neutral-700 dark:first:border-transparent">
          <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
            Nom Complet <span class="text-red-500">*</span>
          </label>

          <div class="mt-2 space-y-3">
            <input id="af-payment-billing-contact" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
            @error('nom')
                border-red-500
            @enderror
            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Nom complet" name="nom" value="{{ old('nom')}}">
            @error('nom')
                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- End Section -->

        <!-- Section -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
              Numéro et Année du Bacc <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('num_bacc')
                  border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Numéro du Bacc" name="num_bacc" value="{{ old('num_bacc')}}">

                <input type="number" min="1990" max="2500" step="1" value="2024" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('anne_bacc')
                  border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Année du Bacc" name="anne_bacc" value="{{ old('anne_bacc')}}">
                @error('anne_bacc')
                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
                @enderror
              </div>
            </div>
          </div>
          <!-- End Section -->

          <!-- Section -->
        <div class="py-2 first:pt-0 last:pb-0">
            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
              Série du Bacc et Mention en ACEEM <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <select name="serie_id" id="serie" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('serie_id')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Série">
                    <option selected="">Série du Bacc</option>
                    @foreach($series as $serie)
                        <option value="{{ $serie['id'] }}">{{ $serie['design'] }}</option>
                    @endforeach
                </select>

                <select name="mention_id" id="mention" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('mention_id')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Mention">
                    <option value="">Choisir Mention</option>
                </select>
              </div>
            </div>
          </div>
          <!-- End Section -->

        <!-- Section -->
        <div class="py-2 first:pt-0 last:pb-0">
          <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
            Téléphone <span class="text-red-500">*</span>
          </label>

          <div class="mt-2 space-y-3">
            <input id="af-payment-billing-address" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
            @error('tel')
               border-red-500
            @enderror
            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="0340000000" name="tel" value="{{ old('tel')}}">
            @error('tel')
                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- End Section -->

         <!-- Section -->
         <div class="py-2 first:pt-0 last:pb-0">
            <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
              Email <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <input id="af-payment-billing-address" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('email')
                border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="aceem@gmail.com" name="email" value="{{ old('email')}}">
              @error('email')
                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->
          <!-- Section -->
         <div class="py-2 first:pt-0 last:pb-0">
            <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
              Référence Mvola <span class="text-red-500">*</span>
            </label>

            <div class="mt-2 space-y-3">
              <input id="af-payment-billing-address" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('ref_mvola')
                border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="123456789" name="ref_mvola" value="{{ old('ref_mvola')}}">
              @error('ref_mvola')
                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->
          <div class="mt-5 flex justify-end gap-x-2">
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
              Envoyer
            </button>
          </div>
      </form>

    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->
@else
    <!-- Card Section -->
<div class="max-w-2xl px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
    <div class="max-w-2xl px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
        <img src="https://lh5.googleusercontent.com/h7aQPQmfQIdxpHp5rxG4GjMJoXq4_x1S7bPMZMhpr_Vj12QsO_Nsjn1CC8I6TDaWi0OGb1tM1YLFp2IJYxDNBBAwAEsphVX_MM9bjw9C_0hqZoOt4JyAm7KE-5A-IRcNWw=w2046
    " alt="">
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
<script>
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
</script>
@endsection
