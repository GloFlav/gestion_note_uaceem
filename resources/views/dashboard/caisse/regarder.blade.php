@extends('layouts.dashboard')

@section('content')
 <!-- Card Section -->
 <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
    <div class=" p-4 sm:p-1 ">
        <div class="mb-4">
            <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                Modifier Payement
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Modifier les payements en cas d'erreur.
            </p>
        </div>

        <form method="POST" action="{{ route('dashboard.payement.payement.update', $candidats->id) }}">
            @csrf
            @method('PUT')

            <div class="text-center bg-gray-100 border-b border-gray-200 text-xl text-gray-800 p-2 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white">
                <span class="font-bold">{{$candidats->nom}} :
                  <input class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" placeholder="réference mvola en ligne" value="{{ $candidats->ref_mvola}}" disabled>
                  </span>
            </div>

             <!-- Section -->
         <div class="py-2">
            <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
              Date de payement
            </label>

            <div class="mt-2 space-y-3">
              <input id="af-payment-billing-address" type="date" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('date')
                    border-red-500
                @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="date" value="{{ optional($candidats->payement)->date }}">
            </div>
          </div>
          <!-- End Section -->

        <!-- Section -->
        <div class="py-2">
          <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
            Type de payement
          </label>

          <div class="mt-2 space-y-3">
            <select name="type" id="mention" class="py-2 px-3 pe-11 block w-full border-gray-400 border shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Concours">
                <option value="{{ optional($candidats->payement)->type }}" selected>{{ optional($candidats->payement)->type }}</option>
                <option value="concours">Concours</option>
                <option value="droit">Droit</option>
                <option value="ecolage">Ecolage</option>
            </select>
          </div>
        </div>
        <!-- End Section -->

          <!-- Section -->
          <div class="py-2">
            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
              Montant et mode de payement
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="number" id="montant" name="montant" step="0.01" value="{{ old('montant', number_format(optional($candidats->payement)->montant, 2, '.', '')) }}" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('montant')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="100000">

                <select name="mode" id="mention" class="py-2 px-3 pe-11 block w-full border-gray-400 border shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Espece">
                    <option value="{{ optional($candidats->payement)->mode }}" selected>{{ optional($candidats->payement)->mode }}</option>
                    <option value="espece">Espece</option>
                    <option value="mvola">Mvola</option>
                </select>
              </div>
            </div>
          </div>
          <!-- End Section -->

         <!-- Section -->
         <div class="py-2">
            <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
              Réference
            </label>

            <div class="mt-2 space-y-3">
              <input id="af-payment-billing-address" type="text" class="py-2 px-3 pe-11 block w-full border-gray-400 border
              @error('reference')
                border-red-500
              @enderror
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="ref-xxxxx" name="reference" value="{{ old('reference', optional($candidats->payement)->reference)}}">
              @error('reference')
                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$message}}</p>
              @enderror
            </div>
          </div>
          <!-- End Section -->

          <!-- Section -->
         <div class="py-2">
            <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
              Commentaire
            </label>

            <div class="mt-2 space-y-3">
            @if(!empty(optional($candidats->payement)->commentaire))
              <textarea class="py-3 px-4 block w-full border-gray-400 border shadow-sm text-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="2" placeholder="" name="commentaire">{{optional($candidats->payement)->commentaire}}</textarea>
            @else
                <textarea class="py-3 px-4 block w-full border-gray-400 border shadow-sm text-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="2" placeholder="Aucun commentaire" name="commentaire"></textarea>
            @endif
          </div>
          <!-- End Section -->

          <div class="mt-5 flex justify-end gap-x-2">
            <a type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
            href="{{ route('dashboard.payement.payement.affiche', $candidats->id) }}">
            Annuler
            </a>
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-toggle-between-modals-first-modal" data-hs-overlay="#hs-toggle-between-modals-first-modal">
              Sauvegarder
            </button>
          </div>
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
@endsection
