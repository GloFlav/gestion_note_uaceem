@extends('layouts.dashboard')

@section('content')
<!-- Card Section -->
<!-- Card -->
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
         Votre Profile
        </h2>
        <p class="text-sm text-gray-600 dark:text-neutral-400">
          Bienvenue dans votre profile. <br>
          Vous pourriez renseigner sur votre profile.
        </p>
      </div>

      <form>
        <!-- Grid -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
          <div class="sm:col-span-3">
            <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            Photo de Profile
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-9">
            <div class="flex items-center gap-5">
            @if (!empty($etudiants->photo))
                <img src="{{ asset('storage/' . $etudiants->photo) }}"
                alt="Photo de l'étudiant"
                class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-md">
            @else
              <img class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-md" src="https://preline.co/assets/img/160x160/img1.jpg" alt="Avatar">
            @endif
            </div>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-3">
            <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
              Numéro Matricule
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-9">
            <div class="sm:flex">
              <input id="af-account-full-name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" value="{{ $matricule->design }}" disabled>
            </div>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-3">
            <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
              Nom complet
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-9">
            <div class="sm:flex">
              <input id="af-account-full-name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" value="{{  $etudiants->candidat ? $etudiants->candidat->nom : ''}}" disabled>
            </div>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-3">
            <label for="af-account-email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
              Email
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-9">
            <input id="af-account-email" type="email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" value="{{  $etudiants->candidat ? $etudiants->candidat->email : ''}}" disabled>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-3">
            <div class="inline-block">
              <label for="af-account-phone" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                Phone
              </label>
            </div>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-9">
            <div class="sm:flex">
              <input id="af-account-phone" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" value="{{  $etudiants->candidat ? $etudiants->candidat->tel : ''}}" disabled>
            </div>
          </div>
          <!-- End Col -->
      </form>
    <!-- End Card -->
@endsection
