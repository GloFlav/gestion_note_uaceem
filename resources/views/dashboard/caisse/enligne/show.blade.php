@extends('layouts.dashboard')

@section('content')
 <!-- Card Section -->
 <div class=" px-1 py-1 sm:px-6 lg:px-1 mx-auto">
    @if ($candidats->payement)
    <!-- Card -->
    <div class=" p-4 sm:p-1 ">
        <div class="text-center bg-gray-100 border-b border-gray-200 text-xl text-gray-800 p-2 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white">
            <span class="font-bold">{{$candidats->nom}} :
                <input class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" placeholder="réference mvola en ligne" value="{{ $candidats->payement->reference}}" disabled>
                </span>
        </div>

             <!-- Section -->
        <!-- List -->
        <div class="relative space-y-3">
            <dl class="flex flex-col sm:flex-row gap-1">
                <dt class="min-w-40">
                    <span class="block text-sm text-gray-500 dark:text-neutral-500">Mention :</span>
                </dt>
                <dd>
                    <ul>
                    <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                        {{ $candidats->mention->design }}
                    </li>
                    </ul>
                </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
                <dt class="min-w-40">
                    <span class="block text-sm text-gray-500 dark:text-neutral-500">Numéro au concours :</span>
                </dt>
                <dd>
                    <ul>
                    <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                        {{ $candidats->num_conc }}
                    </li>
                    </ul>
                </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
                <dt class="min-w-40">
                    <span class="block text-sm text-gray-500 dark:text-neutral-500">Contact :</span>
                </dt>
                <dd>
                    <ul>
                    <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                        {{ $candidats->tel }}
                    </li>
                    </ul>
                </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-sm text-gray-500 dark:text-neutral-500">Date de payement :</span>
            </dt>
            <dd>
                <ul>
                <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                    {{ $candidats->payement->date }}
                </li>
                </ul>
            </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-sm text-gray-500 dark:text-neutral-500">Type de payement :</span>
            </dt>
            <dd>
                <ul>
                <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                    {{ $candidats->payement->type }}
                </li>
                </ul>
            </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-sm text-gray-500 dark:text-neutral-500">Montant (en Ariary) :</span>
            </dt>
            <dd>
                <ul>
                <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                    {{ number_format($candidats->payement->montant, 2, '.', ' ') }}
                </li>
                </ul>
            </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-sm text-gray-500 dark:text-neutral-500">Mode de payement :</span>
            </dt>
            <dd>
                <ul>
                <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                    {{ $candidats->payement->mode}}
                </li>
                </ul>
            </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-sm text-gray-500 dark:text-neutral-500">Reférence du payement via mvola (en ligne) :</span>
            </dt>
            <dd>
                <ul>
                    @if ($candidats->ref_mvola == null)
                    <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                        L'inscription est fait en Local. Pas de reférence mvola.
                    </li>
                    @else
                    <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                        {{ $candidats->ref_mvola}}
                    </li>
                    @endif
                </ul>
            </dd>
            </dl>

            <dl class="flex flex-col sm:flex-row gap-1">
                <dt class="min-w-40">
                    <span class="block text-sm text-gray-500 dark:text-neutral-500">Commentaire :</span>
                </dt>
                <dd>
                    <ul>
                    @if(!empty(optional($candidats->payement)->commentaire))
                    <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                        {{ $candidats->payement->commentaire}}
                    </li>
                    @else
                    <li class="me-1 inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                        Aucune commentaire
                    </li>
                    @endif
                    </ul>
                </dd>
            </dl>
        </div>
        <!-- End List -->
    </div>
    <!-- End Card -->
    <div class="mt-5 flex justify-start gap-x-2">
        <a href="{{ route('dashboard.payement.payement.enligne.index')}}" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
          Retour
        </a>
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-toggle-between-modals-first-modal" data-hs-overlay="#hs-toggle-between-modals-first-modal"
        href="{{ route('dashboard.payement.payement.enligne.regarder', $candidats->id) }}">
        Editer
        </a>
      </div>
      @else
        <p>Aucun payement enregistré pour cet étudiant.</p>
      @endif
</div>
<!-- End Card Section -->
@endsection
