<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4"
         style="background: radial-gradient(circle at top, rgba(59,130,246,0.25) 0, transparent 60%), radial-gradient(circle at bottom, rgba(139,92,246,0.25) 0, transparent 55%);">
        <div class="w-full max-w-md">
            <div class="mb-8 text-center">
                <p class="text-xs uppercase tracking-[0.25em] text-slate-400">
                    Portfolio admin
                </p>
                <h1 class="mt-2 text-2xl font-bold text-slate-50">
                    Sign in to continue
                </h1>
                <p class="mt-1 text-xs text-slate-400">
                    Use your owner credentials to manage projects and certificates.
                </p>
            </div>

            <div class="bg-slate-900/90 border border-slate-700/70 rounded-2xl shadow-2xl shadow-slate-900/80 px-6 py-6 backdrop-blur-xl">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-sm text-emerald-300" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-xs text-slate-200" />
                        <x-text-input id="email"
                                      class="block mt-1 w-full border-slate-600 bg-slate-900/70 text-slate-100 focus:border-blue-500 focus:ring-blue-500 rounded-xl"
                                      type="email"
                                      name="email"
                                      :value="old('email')"
                                      required
                                      autofocus
                                      autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <x-input-label for="password" :value="__('Password')" class="text-xs text-slate-200" />
                        <x-text-input id="password"
                                      class="block mt-1 w-full border-slate-600 bg-slate-900/70 text-slate-100 focus:border-blue-500 focus:ring-blue-500 rounded-xl"
                                      type="password"
                                      name="password"
                                      required
                                      autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mt-2">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-slate-600 bg-slate-900 text-blue-500 shadow-sm focus:ring-blue-500"
                                   name="remember">
                            <span class="ms-2 text-xs text-slate-300">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-xs text-slate-400 hover:text-blue-400 focus:outline-none"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="w-full justify-center rounded-xl bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 border-0">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
