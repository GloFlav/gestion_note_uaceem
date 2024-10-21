@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto"><!-- Card -->
        <div class=" p-4 sm:p-1 ">
            <div class="mb-4">
                <h2 class="text-2xl mb-4 font-bold text-gray-800 dark:text-neutral-200">
                    Ajout Concours
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    Pour ajouter un nouveau concours au système, veuillez remplir le formulaire ci-dessous avec les
                    informations requises.
                </p>
            </div>

            <form method="POST" action="{{ route('dashboard.concours.concours.store')}}">
                @csrf
                <div class="space-y-2">
                    <label for="type"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Type du concours <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="type" type="text"
                            class="py-2 px-3 pe-11 block w-full border border-gray-200
                              @error('type')
                                    border-red-500
                            @enderror
                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Concours d'entrer en L1" name="type">
                            @error('type')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}</p>
                            @enderror
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="type"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Vagues <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="type" type="text"
                            class="py-2 px-3 pe-11 block w-full border border-gray-200
                              @error('designation')
                                    border-red-500
                            @enderror
                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Vagues" name="designation">
                            @error('designation')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}</p>
                            @enderror
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
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="deb_insc" >
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="fin_insc" >
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
                        Date début et fin du concours <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2 space-y-3">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200
                                @error('deb_conc')
                                    border-red-500
                                @enderror
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="deb_conc" >
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="fin_conc" >
                        </div>
                        <div class="gap-0">
                            @error('deb_conc')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('dashboard.concours.concours.index') }}"
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

