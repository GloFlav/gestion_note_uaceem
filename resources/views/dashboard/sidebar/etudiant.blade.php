<ul class="flex flex-col space-y-1">
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
          {{ request()->routeIs('dashboard.etudiant.etudiant.index') ? 'bg-gray-100' : '' }}
         text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('dashboard.etudiant.etudiant.index') }}">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
            Dashboard
        </a>
    </li>
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
        {{ request()->routeIs('dashboard.etudiant.etudiant.show') ? 'bg-gray-100' : '' }}
        text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('dashboard.etudiant.etudiant.show', $etudiants->id) }}">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-user">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            Profile
        </a>
    </li>
    <li class="hs-accordion" id="account-accordion">
        <button type="button"
            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200 {{ request()->routeIs('dashboard.academique.*') ? 'bg-gray-100' : '' }}"
            aria-expanded="true" aria-controls="account-accordion-child">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-school">
                <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2" />
                <path d="M18 5v17" />
                <path d="m4 6 8-4 8 4" />
                <path d="M6 5v17" />
                <circle cx="12" cy="9" r="2" />
            </svg>
            Demandes
            <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m18 15-6-6-6 6" />
            </svg>
            <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m6 9 6 6 6-6" />
            </svg>
        </button>
        <div id="account-accordion-child"
            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="region"
            aria-labelledby="account-accordion">
            <ul class="ps-8 pt-1 space-y-1">
                <li
                    class="flex items-center gap-x-3 py-2 px-2.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ request()->routeIs('dashboard.academique.mention.*') ? 'bg-gray-100' : '' }}">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-library-big">
                        <rect width="8" height="18" x="3" y="3" rx="1" />
                        <path d="M7 3v18" />
                        <path
                            d="M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z" />
                    </svg>
                    <a class="flex items-center gap-x-3.5 text-sm text-gray-800 rounded-lg h focus:outline-none dark:bg-neutral-800 dark:text-neutral-200"
                        href="{{ route('dashboard.academique.mention.index') }}">
                        Rélévé de Notes
                    </a>
                </li>
                <li
                    class="flex items-center gap-x-3 py-2 px-2.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ request()->routeIs('dashboard.academique.parcours.*') ? 'bg-gray-100' : '' }}">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-route">
                        <circle cx="6" cy="19" r="3" />
                        <path d="M9 19h8.5a3.5 3.5 0 0 0 0-7h-11a3.5 3.5 0 0 1 0-7H15" />
                        <circle cx="18" cy="5" r="3" />
                    </svg>
                    <a class="flex items-center gap-x-3.5 text-sm text-gray-800 rounded-lg h focus:outline-none dark:bg-neutral-800 dark:text-neutral-200"
                        href="{{ route('dashboard.academique.parcours.index') }}">
                        Attestation
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
