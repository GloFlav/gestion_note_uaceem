<!-- Sidebar -->
<div id="hs-application-sidebar"
    class="hs-overlay  [--auto-close:lg]
         hs-overlay-open:translate-x-0
         -translate-x-full transition-all duration-300 transform
         w-[260px] h-full
         hidden
         fixed inset-y-0 start-0 z-[60]
         bg-white border-e border-gray-200
         lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
         dark:bg-neutral-800 dark:border-neutral-700"
    role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <div class="px-6 pt-4">
            <!-- Logo -->
            <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                href="{{ route('index') }}" aria-label="Preline">
                <img src="{{ asset('images/logo-aceem.webp') }}" class="w-20 h-auto" alt="logo">
            </a>
            <!-- End Logo -->
        </div>
        <!-- Content -->
        <div
            class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                @if (auth()->user()->role == 'SI Admin')
                    @include('dashboard.sidebar.admin')
                @endif
                @if (auth()->user()->role == 'Caisse')
                    @include('dashboard.sidebar.caisse')
                @endif
                @if (auth()->user()->role == 'CA')
                    @include('dashboard.sidebar.candidataceem')
                @endif
                @if (auth()->user()->role == 'Scolarité')
                    @include('dashboard.sidebar.scolarite')
                @endif
                @if (auth()->user()->role == 'Accueil')
                    @include('dashboard.sidebar.acceuil')
                @endif
                @if (auth()->user()->role == 'Inscription')
                    @include('dashboard.sidebar.inscription')
                @endif
                @if (auth()->user()->role == 'Etudiant')
                    @include('dashboard.sidebar.etudiant')
                @endif
                @if (auth()->user()->role == 'Caisse evenement')
                    @include('dashboard.sidebar.caisse_event')
                @endif
            </nav>
        </div>
        <!-- End Content -->
    </div>
</div>
<!-- End Sidebar -->