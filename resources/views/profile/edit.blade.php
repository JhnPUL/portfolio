{{-- resources/views/profile/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-slate-500">
                    Account
                </p>
                <h2 class="mt-1 font-semibold text-2xl leading-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-indigo-400 to-emerald-300">
                    Profile settings
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-10"
         style="background: radial-gradient(circle at top, rgba(59,130,246,0.25) 0, transparent 60%), radial-gradient(circle at bottom, rgba(139,92,246,0.2) 0, transparent 55%);">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            {{-- Profile info (uses your updated section with phone) --}}
            <div class="bg-slate-900/80 border border-slate-700/60 shadow-2xl shadow-slate-900/60 sm:rounded-2xl p-6 sm:p-8 backdrop-blur-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-slate-100">Profile information</h3>
                        <p class="text-xs text-slate-400 mt-1">Update your basic details and contact information.</p>
                    </div>
                </div>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Password --}}
            <div class="bg-slate-900/80 border border-slate-700/60 shadow-2xl shadow-slate-900/60 sm:rounded-2xl p-6 sm:p-8 backdrop-blur-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-slate-100">Security</h3>
                        <p class="text-xs text-slate-400 mt-1">Change your password to keep your account secure.</p>
                    </div>
                </div>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete account --}}
            <div class="bg-gradient-to-r from-red-900/80 via-slate-900/80 to-red-900/70 border border-red-700/60 shadow-2xl shadow-red-900/60 sm:rounded-2xl p-6 sm:p-8 backdrop-blur-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-red-100">Danger zone</h3>
                        <p class="text-xs text-red-200/80 mt-1">Permanently delete your account and all associated data.</p>
                    </div>
                </div>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
