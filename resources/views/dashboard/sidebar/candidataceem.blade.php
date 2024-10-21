<ul class="flex flex-col space-y-1">
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
          {{ request()->routeIs('dashboard.candidataceem.*') ? 'bg-gray-100' : '' }}
         text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('dashboard.candidataceem.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor">
                <rect width="20" height="14" x="2" y="3" rx="2"/>
                <line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
            C.A
        </a>
    </li>
</ul>
