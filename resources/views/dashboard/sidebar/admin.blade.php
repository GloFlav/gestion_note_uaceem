<ul class="flex flex-col space-y-1">
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
          {{ request()->routeIs('dashboard.dashboard.*') ? 'bg-gray-100' : '' }}
         text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('dashboard.dashboard.index') }}">
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
        {{ request()->routeIs('dashboard.user.*') ? 'bg-gray-100' : '' }}
        text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('dashboard.user.index') }}">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-user">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            Utilisateurs
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
            Académique
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
                        Mentions
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
                        Parcours
                    </a>
                </li>
                <li
                    class="flex items-center gap-x-3 py-2 px-2.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ request()->routeIs('dashboard.academique.niveau.*') ? 'bg-gray-100' : '' }}">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-no-axes-gantt">
                        <path d="M8 6h10" />
                        <path d="M6 12h9" />
                        <path d="M11 18h7" />
                    </svg>
                    <a class="flex items-center gap-x-3.5 text-sm text-gray-800 rounded-lg h focus:outline-none dark:bg-neutral-800 dark:text-neutral-200"
                        href="{{ route('dashboard.academique.niveau.index') }}">
                        Niveaux
                    </a>
                </li>
                <li
                    class="flex items-center gap-x-3 py-2 px-2.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ request()->routeIs('dashboard.academique.groupe.*') ? 'bg-gray-100' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <a class="flex items-center gap-x-3.5 text-sm text-gray-800 rounded-lg h focus:outline-none dark:bg-neutral-800 dark:text-neutral-200"
                        href="{{ route('dashboard.academique.groupe.index') }}">
                        Groupes
                    </a>
                </li>
                <li
                    class="flex items-center gap-x-3 py-2 px-2.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ request()->routeIs('dashboard.academique.sousgroupe.*') ? 'bg-gray-100' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
                    <a class="flex items-center gap-x-3.5 text-sm text-gray-800 rounded-lg h focus:outline-none dark:bg-neutral-800 dark:text-neutral-200"
                        href="{{ route('dashboard.academique.sousgroupe.index') }}">
                        Sous-Groupes
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5
                    {{ request()->routeIs('dashboard.academique.serie.*') ? 'bg-gray-100' : '' }}
                    text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="{{ route('dashboard.academique.serie.index') }}">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-scroll">
                            <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                            <path
                                d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                        </svg>
                        Séries
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="hs-accordion" id="projects-accordion">
        <button type="button"
            class="hs-accordion-toggle hs-accordion-active:text-gray-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hs-accordion-active:text-white dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
            aria-expanded="true" aria-controls="projects-accordion">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path
                    d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z" />
                <path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8" />
                <path d="M15 2v5h5" />
            </svg>
            Concours

            <svg class="hs-accordion-active:block ms-auto hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m18 15-6-6-6 6" />
            </svg>

            <svg class="hs-accordion-active:hidden ms-auto block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m6 9 6 6 6-6" />
            </svg>
        </button>

        <div id="projects-accordion"
            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="region"
            aria-labelledby="projects-accordion">
            <ul class="pt-2 ps-2">
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5
                        {{ request()->routeIs('dashboard.vague.vague.*') ? 'bg-gray-100' : '' }}
                        text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                        href="{{ route('dashboard.vague.vague.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-align-justify">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        Concours
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5
                        {{ request()->routeIs('dashboard.candidatsSI.*') ? 'bg-gray-100' : '' }}
                        text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="{{ route('dashboard.candidatsSI.index') }}">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-user">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        Candidats
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5
                        {{ request()->routeIs('dashboard.convocation.*') ? 'bg-gray-100' : '' }}
                        text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="{{ route('dashboard.convocation.index') }}">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-file-check">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                            <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                            <path d="m9 15 2 2 4-4" />
                        </svg>
                        Convocations
                    </a>
                </li>
                {{-- <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5
                        {{ request()->routeIs('dashboard.resultat.*') ? 'bg-gray-100' : '' }}
                        text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="{{ route('dashboard.resultat.index') }}">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-list-check">
                            <path d="M11 18H3" />
                            <path d="m15 18 2 2 4-4" />
                            <path d="M16 12H3" />
                            <path d="M16 6H3" />
                        </svg>
                        Résultats
                    </a>
                </li> --}}
            </ul>
        </div>
    </li>
</ul>
