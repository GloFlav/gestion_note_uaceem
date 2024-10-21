@extends('layouts.app')

@section('content')
<div class="max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
<div class="space-y-5">
    <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30" role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
      <div class="flex">
        <div class="shrink-0">
          <!-- Icon -->
          <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
              <path d="m9 12 2 2 4-4"></path>
            </svg>
          </span>
          <!-- End Icon -->
        </div>
        <div class="ms-3">
        @if (session()->has('success'))
          <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold dark:text-white">
            {{ session()->get('success')}}
          </h3>
        @endif
        </div>
      </div>
    </div>
</div>
<!-- Card Section -->
<div class="max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
      <div class="text-center mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
            Votre numéro d'inscription au concours
        </h2>
      </div>

      <form>
        <div class="text-center mb-8">
            <div class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-b-blue-600 min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-l-neutral-700 dark:border-b-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 active" id="bar-with-underline-item-1" aria-selected="true" data-hs-tab="#bar-with-underline-1" aria-controls="bar-with-underline-1"">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                {{$candidat->num_conc}}
                </h2>
            </div>
          </div>
          <div class="mt-5 flex justify-center gap-x-2">
            <a href="{{ route('candidats.create')}}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
              Retour
            </a>
        </div>
      </form>

@endsection
