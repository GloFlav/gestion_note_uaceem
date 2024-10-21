<ul class="flex flex-col space-y-1">
    <li class="hs-accordion" id="projects-accordion">
        <button type="button"
            class="hs-accordion-toggle hs-accordion-active:text-gray-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hs-accordion-active:text-white dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300 {{ request()->routeIs('dashboard.payement.payement.*') ? 'bg-gray-100' : '' }}"
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
                      {{ request()->routeIs('dashboard.payement.payement.local.*') ? 'bg-gray-100' : '' }}
                     text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="{{ route('dashboard.payement.payement.local.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor">
                            <rect width="20" height="14" x="2" y="3" rx="2"/>
                            <line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
                        Local
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5
                      {{ request()->routeIs('dashboard.payement.payement.enligne.*') ? 'bg-gray-100' : '' }}
                     text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="{{ route('dashboard.payement.payement.enligne.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                        En Ligne
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
          {{ request()->routeIs('dashboard.reinscription.*') ? 'bg-gray-100' : '' }}
         text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('dashboard.reinscription.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen"><path d="M12.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v9.5"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/></svg>
            Réinscription
        </a>
    </li>
</ul>
