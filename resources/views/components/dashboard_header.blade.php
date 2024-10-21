<!-- ========== HEADER ========== -->
<header
    class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-neutral-800 dark:border-neutral-700">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-5 lg:me-0 lg:hidden">
            <!-- Logo -->
            <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                href="{{ route('index') }}" aria-label="Preline">
                <img src="{{ asset('images/logo-aceem.webp') }}" class="w-20 h-auto" alt="logo">
            </a>
            <!-- End Logo -->
        </div>
        <div class="w-full flex items-center justify-end ms-auto gap-x-1 md:gap-x-3">
            <div class="flex flex-row items-center justify-end gap-1">

                <div class="shrink-0 group block ml-3">
                    <div class="flex items-center">
                        @if (Auth::user()->role == 'SI Admin')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-blue-900 font-semibold text-white leading-none dark:bg-blue-500">
                                SI
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @elseif (Auth::user()->role == 'Caisse')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-green-900 font-semibold text-white leading-none dark:bg-green-500">
                                CA
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @elseif (Auth::user()->role == 'CA')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-green-500 font-semibold text-white leading-none dark:bg-green-900">
                                C.A
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @elseif (Auth::user()->role == 'Accueil')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-yellow-500 font-semibold text-white leading-none dark:bg-yellow-500">
                                AC
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @elseif (Auth::user()->role == 'Scolarité')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-green-500 font-semibold text-white leading-none dark:bg-green-300">
                                SC
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @elseif (Auth::user()->role == 'Inscription')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-blue-800 font-semibold text-white leading-none dark:bg-blue-800">
                                IN
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @elseif (Auth::user()->role == 'Etudiant')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-violet-800 font-semibold text-white leading-none dark:bg-blue-800">
                                ET
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @elseif (Auth::user()->role == 'Caisse evenement')
                            <span
                                class="inline-flex items-center justify-center size-[46px] rounded-full bg-violet-800 font-semibold text-white leading-none dark:bg-blue-800">
                                ET
                            </span>
                            <div class="ms-3">
                                <h3 class="font-semibold text-gray-800 dark:text-white">{{ Auth::user()->nom }}</h3>
                                <p class="text-sm font-medium capitalize text-gray-400 dark:text-neutral-500">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="hs-tooltip [--placement:bottom] inline-block">
                @method('delete')
                @csrf
                <button type="submit"
                    class="hs-tooltip-toggle size-8 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600  hover:border-blue-200 focus:outline-none focus:bg-blue-50 focus:border-blue-200 hover:bg-gray-100  fdark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-white/10 dark:hover:border-white/10 dark:hover:text-white dark:focus:bg-white/10 dark:focus:border-white/10 dark:focus:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-power">
                        <path d="M12 2v10" />
                        <path d="M18.4 6.6a9 9 0 1 1-12.77.04" />
                    </svg>
                    <span
                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                        role="tooltip">
                        Déconnexion
                    </span>
                </button>
            </form>

        </div>
    </nav>
</header>
<!-- ========== END HEADER ========== -->
