@extends('layouts.app')

@section('content')
    <div
        class="mt-7 bg-white border max-w-96 w-5/6 mx-auto shadow-md border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <img src="{{ asset('images/logo-aceem.webp') }}" alt="logo" class="w-20 h-auto my-4 mx-auto">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Mot de passe</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Veillez definir votre mot de passe avant de continuer.
                </p>
            </div>

            <div class="mt-5">

                <!-- Form -->
                <form method="POST" id="passwordForm">
                    @csrf()
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="password" class="block text-sm mb-2 dark:text-white">Nouveau mot de passe</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="py-3 px-4 block w-full border-gray-400 border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    value="{{ old('password') }}" required aria-describedby="password-error">
                            </div>
                            <p class="text-sm text-red-600 mt-2 hidden" id="password-error"></p>
                        </div>
                        <!-- End Form Group -->
                        <!-- Form Group -->
                        <div>
                            <label for="confirm_password" class="block text-sm mb-2 dark:text-white">Confirmé mot de
                                passe</label>
                            <div class="relative">
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="py-3 px-4 block w-full border-gray-400 border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    value="{{ old('confirm_password') }}" required
                                    aria-describedby="confirm-password-error">
                            </div>
                            <p class="text-sm text-red-600 mt-2 hidden" id="confirm-password-error"></p>
                        </div>
                        <!-- End Form Group -->

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Enregistrer</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('passwordForm');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');
            const passwordError = document.getElementById('password-error');
            const confirmPasswordError = document.getElementById('confirm-password-error');

            function validatePassword() {
                if (password.value.length < 8) {
                    setError(password, passwordError, 'Le mot de passe doit contenir au moins 8 caractères.');
                    return false;
                } else {
                    setSuccess(password);
                    return true;
                }
            }

            function validateConfirmPassword() {
                if (confirmPassword.value !== password.value) {
                    setError(confirmPassword, confirmPasswordError, 'Les mots de passe ne correspondent pas.');
                    return false;
                } else {
                    setSuccess(confirmPassword);
                    return true;
                }
            }

            function setError(input, errorElement, message) {
                input.classList.remove('border-teal-500', 'focus:border-teal-500', 'focus:ring-teal-500');
                input.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                errorElement.textContent = message;
                errorElement.classList.remove('hidden');

                updateIcon(input, 'error');
            }

            function setSuccess(input) {
                input.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                input.classList.add('border-teal-500', 'focus:border-teal-500', 'focus:ring-teal-500');

                // Hide the error message
                const errorElement = input.id === 'password' ? passwordError : confirmPasswordError;
                errorElement.classList.add('hidden');

                updateIcon(input, 'success');
            }

            function updateIcon(input, state) {
                const existingIcon = input.parentElement.querySelector('svg');
                if (existingIcon) {
                    existingIcon.remove();
                }

                let iconHTML = '';
                if (state === 'error') {
                    iconHTML = `
                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                            <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" x2="12" y1="8" y2="12"></line>
                                <line x1="12" x2="12.01" y1="16" y2="16"></line>
                            </svg>
                        </div>
                    `;
                } else if (state === 'success') {
                    iconHTML = `
                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                            <svg class="shrink-0 size-4 text-teal-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                    `;
                }

                input.parentElement.insertAdjacentHTML('beforeend', iconHTML);
            }

            password.addEventListener('input', validatePassword);
            confirmPassword.addEventListener('input', validateConfirmPassword);

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const isPasswordValid = validatePassword();
                const isConfirmPasswordValid = validateConfirmPassword();

                if (isPasswordValid && isConfirmPasswordValid) {
                    // If both validations pass, you can submit the form
                    form.submit();
                }
            });
        });
    </script>
@endsection
