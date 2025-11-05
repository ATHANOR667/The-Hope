@extends('admin.disconnected-base')

@section('content')

    <div x-data="{ showLoginForm: true, showPasswordResetForm: false }"
         @@show-login-form.window="showLoginForm = true; showPasswordResetForm = false"
         class="flex items-center justify-center p-4 sm:p-6 w-full h-full">

        <!-- Login Form Card -->
        <div x-show="showLoginForm"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="bg-white dark:bg-gray-800 p-6 md:p-8 rounded-3xl shadow-2xl max-w-sm md:max-w-md w-full transition-all duration-300 ease-in-out hover:shadow-3xl transform hover:scale-[1.01]">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center text-gray-800 dark:text-white">Connexion</h2>
            <form action="" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Adresse email:</label>
                    <input type="email" id="email" name="email"
                           class="shadow-sm appearance-none border border-gray-300 dark:border-gray-600 rounded-xl w-full py-3 px-4 text-gray-800 dark:text-white leading-tight focus:outline-none focus:ring-4 focus:ring-indigo-200 dark:bg-gray-700 dark:focus:ring-indigo-800 transition-all duration-300 ease-in-out"
                           required autocomplete="current-email">
                    @error('email')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Mot de passe:</label>
                    <input type="password" id="password" name="password"
                           class="shadow-sm appearance-none border border-gray-300 dark:border-gray-600 rounded-xl w-full py-3 px-4 text-gray-800 dark:text-white leading-tight focus:outline-none focus:ring-4 focus:ring-indigo-200 dark:bg-gray-700 dark:focus:ring-indigo-800 transition-all duration-300 ease-in-out"
                           required autocomplete="current-password">
                    @error('password')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6">
                    <a class="inline-block align-baseline font-semibold text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 cursor-pointer transition-colors duration-300"
                       @click="showLoginForm = false; showPasswordResetForm = true">
                        Mot de passe oublié?
                    </a>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <a href="{{route('admin.auth.disconnected.signupView')}}" class="inline-block align-baseline font-semibold text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 cursor-pointer transition-colors duration-300">
                        Pas encore inscrit ?
                    </a>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-900 transition-all duration-300 ease-in-out transform hover:scale-105">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>

        {{-- Password Reset Form --}}
        <div x-show="showPasswordResetForm"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="bg-white dark:bg-gray-800 p-6 md:p-8 rounded-3xl shadow-2xl max-w-sm md:max-w-md w-full transition-all duration-300 ease-in-out hover:shadow-3xl transform hover:scale-[1.01]">
            <livewire:adminbase::auth.password-reset-while-disconnected-form :guard="'admin'" />
        </div>
    </div>

@endsection
