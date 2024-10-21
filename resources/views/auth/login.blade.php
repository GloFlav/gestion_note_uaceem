@extends('layouts.app')

@section('content')
    <div class="flex items-center min-h-screen">
        <div
            class="bg-white border max-w-96 w-5/6 mx-auto shadow-md border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <img src="{{ asset('images/logo-aceem.webp') }}" alt="logo" class="w-20 h-auto my-4 mx-auto">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Connexion</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                        Pour accéder à votre espace membre, veuillez vous connecter.
                    </p>
                </div>
                @if (session('error.login'))
                    <div class="mt-2 bg-red-500 text-sm text-white rounded-lg p-4" role="alert" tabindex="-1"
                        aria-labelledby="hs-solid-color-danger-label">
                        {{ session('error.login') }}
                    </div>
                @endif

                <div class="mt-5">

                    <!-- Form -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf()
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="username" class="block text-sm mb-2 dark:text-white">Nom d'utilisateur</label>
                                <div class="relative">
                                    <input type="text" id="username" name="username"
                                        class="py-3 px-4 block w-full border-gray-400 border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        value="{{ old('username') }}" required aria-describedby="username-error">
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="password" class="block text-sm mb-2 dark:text-white">Mot de passe</label>
                                </div>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="py-3 px-4 block w-full border-gray-400 border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required aria-describedby="password-error">
                                </div>
                            </div>
                            <!-- End Form Group -->


                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Se
                                connecter</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
@endsection
