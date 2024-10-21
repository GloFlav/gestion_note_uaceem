@extends('layouts.app')

@section('content')
<!-- Card Section -->
<div class="max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="bg-gray-150 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
      <div class="text-center mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
          Ajouter Concours
        </h2>
      </div>

      <form method="POST" action="{{ route('concours.store') }}">
        @csrf
        <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
              Date début et fin d'inscription
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="date" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('deb_insc')
                  border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="deb_insc">

                <input type="date" class="py-2 px-3 pe-11 block w-full border-gray-400 border shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="fin_insc">
              </div>
            </div>
        </div>
        <!-- End Section -->

        <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <label for="af-payment-payment-method" class="inline-block text-sm font-medium dark:text-white">
              Date début et fin du concours
            </label>

            <div class="mt-2 space-y-3">
              <div class="flex flex-col sm:flex-row gap-3">
                <input type="date" class="py-2 px-3 pe-11 block w-full border-gray-400 border
                @error('deb_conc')
                  border-red-500
                @enderror
                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="deb_conc">

                <input type="date" class="py-2 px-3 pe-11 block w-full border-gray-400 border shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="fin_conc">
              </div>
            </div>
        </div>
        <!-- End Section -->

        <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
          <label for="af-payment-billing-address" class="inline-block text-sm font-medium dark:text-white">
            Vague du concours
          </label>

          <div class="mt-2 space-y-3">
            <select name="design" id="serie" class="py-2 px-3 pe-11 block w-full border-gray-400 border shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($vagues as $vague)
                    <option value="{{ $vague->id}}">{{ $vague->designation}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <!-- End Section -->

        <div class="mt-5 flex justify-end gap-x-2">
            <a href="{{ route('vague.index')}}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                Cancel
              </a>
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
              Ajouter
            </button>
        </div>
      </form>

    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->
@endsection
