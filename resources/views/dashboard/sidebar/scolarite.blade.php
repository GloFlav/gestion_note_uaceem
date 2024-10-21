<ul class="flex flex-col space-y-1">
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
        {{ request()->routeIs('dashboard.convocation.*') ? 'bg-gray-100' : '' }}
        text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('dashboard.convocation.index') }}">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-file-check">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                <path d="m9 15 2 2 4-4" />
            </svg>
            Convocations
        </a>
    </li>
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
                        {{ request()->routeIs('candidat.scolarite.*') ? 'bg-gray-100' : '' }}
                        text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
            href="{{ route('candidat.scolarite.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-align-justify">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
            Concours
        </a>
    </li>

</ul>
