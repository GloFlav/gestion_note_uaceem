@extends('layouts.dashboard')

@section('content')
 <!-- Card Section -->
 <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
    <div class=" p-4 sm:p-1 ">
        <div class="mb-4">
            <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                Valider Payement
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Effectuer les payements en remplissant les formulaires ci-joint.
            </p>
        </div>

        <form method="POST" action="{{ route('dashboard.payement.payement.enligne.store', $candidats->id) }}">
            @csrf
            <div class="text-center bg-gray-100 border-b border-gray-200 text-xl text-gray-800 p-2 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white">
                <span class="font-bold">{{$candidats->nom}} :
                  <input class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" placeholder="réference mvola en ligne" value="{{ $candidats->ref_mvola}}" disabled>
                  </span>
            </div>

            <input id="af-payment-billing-address" type="hidden" name="date">

        <!-- Section -->
        <div class="py-2">
          <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
            Type de payement
          </label>

          <div class="mt-2 space-y-3">
            <select name="type" id="mention" class="py-2 px-3 pe-11 block w-full border-gray-400 border shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Concours">
                <option selected="">-- Sélectionner --</option>
                <option value="concours">Concours</option>
                <option value="concours salon">Concours Salon</option>
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
                <input type="text" id="montant" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('montant')
                border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="100000" name="montant">

                <select name="mode" id="mention" class="py-2 px-3 pe-11 block w-full border-gray-400 border shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Espece">
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
              shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="ref-xxxxx" name="reference" value="{{ old('reference')}}">
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
              <textarea class="py-3 px-4 block w-full border-gray-400 border shadow-sm text-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="2" placeholder="" name="commentaire"></textarea>
          </div>
          <!-- End Section -->

          <div class="mt-5 flex justify-end gap-x-2">
            <a href="{{ route('dashboard.payement.payement.enligne.index')}}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
              Annuler
            </a>
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-toggle-between-modals-first-modal" data-hs-overlay="#hs-toggle-between-modals-first-modal">
              Valider
            </button>
          </div>
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

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
// Récupérer la date actuelle au format YYYY-MM-DD
const today = new Date().toISOString().split('T')[0];

    // Sélectionner l'élément d'entrée caché et définir la valeur par défaut comme la date actuelle
    document.getElementById('af-payment-billing-address').value = today;

    // Sélectionner les éléments du DOM
    const selectMention = document.getElementById('mention');
    const montantInput = document.getElementById('montant');

    // Écouter les changements sur le select
    selectMention.addEventListener('change', function() {
        if (this.value === 'concours') {
            montantInput.value = formatNumber(50000); // Remplir le montant avec 50 000
        }
        if (this.value === 'concours salon') {
            montantInput.value = formatNumber(25000); // Remplir le montant avec 50 000
        }
    });

    // Ajouter un événement d'écoute pour formater le montant à chaque saisie
    montantInput.addEventListener('input', function() {
        const rawValue = montantInput.value.replace(/\s+/g, ''); // Retirer les espaces avant de reformater
        montantInput.value = formatNumber(rawValue);
    });

    // Formater les nombres avec des espaces entre les milliers
    function formatNumber(value) {
        let parts = parseFloat(value).toFixed(2).toString().split('.');
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        return parts.join('.');
    }

    // Avant soumission du formulaire, reformater en décimal sans espaces
    document.querySelector('form').addEventListener('submit', function(e) {
        montantInput.value = montantInput.value.replace(/\s+/g, '');
    });

function closeModal() {
const modal = document.querySelector('.fixed.inset-0.flex.items-center');
const overlay = document.querySelector('.fixed.inset-0.bg-black');
modal.remove();
overlay.remove();
}
</script>

@endsection
