<ul class="flex flex-col space-y-1">
    <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5
          {{ request()->routeIs('inscription.*') ? 'bg-gray-100' : '' }}
         text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white"
            href="{{ route('inscription.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scroll-text"><path d="M15 12h-5"/><path d="M15 8h-5"/><path d="M19 17V5a2 2 0 0 0-2-2H4"/><path d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"/></svg>
            Inscription Concours
        </a>
    </li>
</ul>