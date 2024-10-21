@extends('layouts.app')

@section('content')
@if (session('sucess'))
<div class="mt-4">
    <!-- Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <h2 class="text-lg font-semibold text-blue-600">Reçu</h2>
            <p class="mt-2 text-sm text-gray-600">{{ session('success') }}</p>
            <a href="{{ route('login')}}" type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Se connecter</a>
            <button class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" onclick="closeModal()">Fermer</button>
        </div>
    </div>
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black opacity-50 z-40" onclick="closeModal()"></div>
</div>
@endif
    <!-- Card Section -->
<div class="max-w-2xl px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
    <div class="max-w-2xl px-1 py-1 sm:px-6 lg:px-1 lg:py-1 mx-auto">
        <img src="https://lh5.googleusercontent.com/h7aQPQmfQIdxpHp5rxG4GjMJoXq4_x1S7bPMZMhpr_Vj12QsO_Nsjn1CC8I6TDaWi0OGb1tM1YLFp2IJYxDNBBAwAEsphVX_MM9bjw9C_0hqZoOt4JyAm7KE-5A-IRcNWw=w2046
    " alt="" class="rounded-lg w-full">
    </div>
    <!-- Card -->
    <div class="bg-gray-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
      <div class="text-center mb-8">
        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
          Inscription d'entrer à l'Université ACEEM
        </h3>
        <br>
        <label for="af-payment-billing-contact" class="inline-block text-lg font-medium dark:text-white">
            Félicitation, vous avez été admis à l'Université ACEEM. <br>
            Pour complétez votre inscription, veuillez entrer votre numéro matricule.
        </label>

        <div class="py-3"></div>

          <!-- Begin Mailchimp Signup Form -->
          <div id="mc_embed_signup">
            <form action="{{ route('matricule.recherche') }}" method="post">
                @csrf
              <div id="mc_embed_signup_scroll">
                <div class="flex flex-col sm:flex-row gap-3">
                  <input type="text" value="" name="design" id="design" class="block w-full border-gray-500
                   rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:placeholder:text-neutral-400" placeholder="Recherche..." required>
                  <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Valider
                  </button>
                </div>
              </div>
            </form>
          </div>
          <!--End mc_embed_signup-->
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

      </div>
    </div>
</div>

<script>
    function closeModal() {
        const modal = document.querySelector('.fixed.inset-0.flex.items-center');
        const overlay = document.querySelector('.fixed.inset-0.bg-black');
        modal.remove();
        overlay.remove();
    }
</script>
@endsection
