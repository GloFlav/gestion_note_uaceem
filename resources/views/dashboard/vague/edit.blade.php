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

            <form action="{{ route('dashboard.vague.vague.update', $vague->id) }}" method="POST">
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
                            name="type" value="{{ old('type', $concours->type) }}">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="type"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Vagues
                    </label>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <input id="type" type="text"
                            class="py-2 px-3 pe-11 block w-full border border-gray-200
                            @error('designation') border-red-500 @enderror
                            shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500
                            disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900
                            dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500
                            dark:focus:ring-neutral-600"
                            placeholder="Vagues" name="designation[]" value="{{ old('designation', $vague->designation) }}">
                        <button type="button" id="addFields"
                            class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium
                            rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none
                            focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ajouter
                        </button>
                    </div>
                </div>

            <div id="dynamicFields">
                    <!-- Remplir les champs existants avec les données de la vague -->
                <div class="space-y-2">
                    <label for="date"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Date début et fin d'inscription <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2 space-y-3">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200
                                @error('deb_insc')
                                    border-red-500
                                @enderror
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900
                                dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                name="deb_insc[]" id="deb_insc" value="{{ old('deb_insc', $vague->deb_insc) }}">
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500
                                disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500
                                dark:focus:ring-neutral-600" name="fin_insc[]" id="fin_insc" value="{{ old('fin_insc', $vague->fin_insc) }}">
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
                                shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900
                                dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                name="deb_conc[]" id="deb_conc" value="{{ old('deb_conc', $vague->deb_conc) }}">
                            <input id="date" type="date"
                                class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500
                                disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500
                                dark:focus:ring-neutral-600" name="fin_conc[]" id="fin_conc" value="{{ old('deb_conc', $vague->fin_conc)}}">
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
                    <label for="commentaire"
                        class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Commentaire
                    </label>
                    <div class="flex">
                        <textarea name="commentaire" id="commentaire" class="py-2 px-3 pe-11 block w-full border border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">{{ old('commentaire', $vague->commentaire)}}</textarea>
                    </div>
                </div>
            </div>

                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="{{ route('dashboard.vague.vague.show', $vague->id) }}"
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
    <script>
        function closeModal() {
            const modal = document.querySelector('.fixed.inset-0.flex.items-center');
            const overlay = document.querySelector('.fixed.inset-0.bg-black');
            modal.remove();
            overlay.remove();
        }

            document.getElementById('addFields').addEventListener('click', function() {
                const dynamicFields = document.getElementById('dynamicFields');

                    // Créer un nouveau conteneur principal pour tous les champs dynamiques
                const newFieldContainer = document.createElement('div');
                newFieldContainer.classList.add('mt-2','space-y-3');

                // Créer le premier div contenant le champ "designation"
                const firstDiv = document.createElement('div');
                firstDiv.classList.add('flex', 'flex-col', 'sm:flex-row', 'gap-3', 'mb-4');

                // Créer le champ input "designation"
                const inputDesignation = document.createElement('input');
                inputDesignation.setAttribute('type', 'text');
                inputDesignation.setAttribute('name', 'designation[]');
                inputDesignation.classList.add('py-2', 'px-3', 'block', 'w-full', 'border', 'border-gray-200', 'shadow-sm', 'text-sm', 'rounded-lg', 'focus:border-blue-500', 'focus:ring-blue-500', 'dark:bg-neutral-900', 'dark:border-neutral-700', 'dark:text-neutral-400', 'dark:placeholder-neutral-500', 'dark:focus:ring-neutral-600');

                // Ajouter le champ "designation" dans le premier div
                firstDiv.appendChild(inputDesignation);

                // Créer le deuxième div contenant les champs de type "date"
                const secondDiv = document.createElement('div');
                secondDiv.classList.add('flex',  'flex-col', 'sm:flex-row', 'gap-3');

                // Créer les champs de type "date"
                const inputDebConc = document.createElement('input');
                inputDebConc.setAttribute('type', 'date');
                inputDebConc.setAttribute('name', 'deb_insc[]');
                inputDebConc.classList.add('py-2', 'px-3', 'pe-11', 'block','w-full','border', 'border-gray-200', 'shadow-sm', 'text-sm', 'rounded-lg', 'focus:border-blue-500', 'focus:ring-blue-500', 'disabled:opacity-50', 'disabled:pointer-events-none', 'dark:bg-neutral-900', 'dark:border-neutral-700', 'dark:text-neutral-400', 'dark:placeholder-neutral-500', 'dark:focus:ring-neutral-600');

                const inputFinConc = document.createElement('input');
                inputFinConc.setAttribute('type', 'date');
                inputFinConc.setAttribute('name', 'fin_insc[]');
                inputFinConc.classList.add('py-2', 'px-3', 'pe-11', 'block','w-full','border', 'border-gray-200', 'shadow-sm', 'text-sm', 'rounded-lg', 'focus:border-blue-500', 'focus:ring-blue-500', 'disabled:opacity-50', 'disabled:pointer-events-none', 'dark:bg-neutral-900', 'dark:border-neutral-700', 'dark:text-neutral-400', 'dark:placeholder-neutral-500', 'dark:focus:ring-neutral-600');

                // Ajouter les champs "date" au deuxième div
                secondDiv.appendChild(inputDebConc);
                secondDiv.appendChild(inputFinConc);

                  // Créer le deuxième div contenant les champs de type "date"
                const thirdDiv = document.createElement('div');
                thirdDiv.classList.add('flex',  'flex-col', 'sm:flex-row', 'gap-3');

                 // Créer les champs de type "date"
                const inputDebInsc = document.createElement('input');
                inputDebInsc.setAttribute('type', 'date');
                inputDebInsc.setAttribute('name', 'deb_conc[]');
                inputDebInsc.classList.add('py-2', 'px-3', 'pe-11', 'block','w-full','border', 'border-gray-200', 'shadow-sm', 'text-sm', 'rounded-lg', 'focus:border-blue-500', 'focus:ring-blue-500', 'disabled:opacity-50', 'disabled:pointer-events-none', 'dark:bg-neutral-900', 'dark:border-neutral-700', 'dark:text-neutral-400', 'dark:placeholder-neutral-500', 'dark:focus:ring-neutral-600');

                const inputFinInsc = document.createElement('input');
                inputFinInsc.setAttribute('type', 'date');
                inputFinInsc.setAttribute('name', 'fin_conc[]');
                inputFinInsc.classList.add('py-2', 'px-3', 'pe-11', 'block','w-full','border', 'border-gray-200', 'shadow-sm', 'text-sm', 'rounded-lg', 'focus:border-blue-500', 'focus:ring-blue-500', 'disabled:opacity-50', 'disabled:pointer-events-none', 'dark:bg-neutral-900', 'dark:border-neutral-700', 'dark:text-neutral-400', 'dark:placeholder-neutral-500', 'dark:focus:ring-neutral-600');

                // Ajouter les champs "date" au troisième div
                thirdDiv.appendChild(inputDebInsc);
                thirdDiv.appendChild(inputFinInsc);

                // Créer le troisième div pour le bouton supprimer
                const fourdDiv = document.createElement('div');
                fourdDiv.classList.add('mt-2', 'space-y-3');

                // Créer le bouton supprimer
                const deleteButton = document.createElement('button');
                deleteButton.type = 'button';
                deleteButton.innerText = 'Supprimer';
                deleteButton.classList.add('inline-flex', 'items-center', 'px-4', 'py-2', 'border', 'border-transparent', 'text-sm', 'font-medium', 'rounded-md', 'shadow-sm', 'text-white', 'bg-red-600', 'hover:bg-red-700', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-red-500');

                // Ajouter le bouton supprimer dans le quatrième div
                fourdDiv.appendChild(deleteButton);

                // Ajouter les trois divs dans le conteneur principal
                newFieldContainer.appendChild(firstDiv);
                newFieldContainer.appendChild(secondDiv);
                newFieldContainer.appendChild(thirdDiv);
                newFieldContainer.appendChild(fourdDiv);

                // Ajouter le conteneur principal au DOM
                dynamicFields.appendChild(newFieldContainer);

                // Ajouter l'événement de suppression pour supprimer tous les champs et le bouton
                deleteButton.addEventListener('click', function() {
                    dynamicFields.removeChild(newFieldContainer);
                });

                dynamicFields.insertAdjacentHTML('beforeend', newFields);

            });
        </script>
@endsection

