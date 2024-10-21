@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Modifier Concours
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Pour modifier le concours inscrit déjà dans le système, veuillez modifier le formulaire ci-dessous.
                </p>
            </div>

            <form action="{{ route('dashboard.concours.concours.update', $concours->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="type"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Type du concours
                    </label>
                    <div class="relative">
                        <input id="type" type="text"
                            class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Concours d'entrer en L1" name="type" value="{{ $concours->type }}">
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="date"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Date début et fin d'inscription <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2 space-y-3">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200
                                @error('deb_insc')
                                    border-red-500
                                @enderror
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="deb_insc" value="{{ $concours->deb_insc }}">
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="fin_insc" value="{{ $concours->fin_insc}}">
                        </div>
                        <div class="gap-0">
                        @error('deb_insc')
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                {{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="password"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Date début et fin du concours<span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2 space-y-3">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200
                                @error('deb_conc')
                                    border-red-500
                                @enderror
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="deb_conc" value="{{ $concours->deb_conc }}">
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="fin_conc" value="{{ $concours->fin_conc}}">
                        </div>
                        <div class="gap-0">
                            @error('deb_conc')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="role"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Vague
                    </label>
                    <div class="relative">
                        <select id="role"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            name="vague_id">
                            @foreach($vagues as $vague)
                                <option value="{{ $vague->id }}" {{ $concours->vague_id == $vague->id ? 'selected' : '' }}>{{ $vague->designation }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('dashboard.concours.concours.show', $concours->id) }}"
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
@endsection

