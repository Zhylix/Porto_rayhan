<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-900 to-slate-800 py-12 px-6">
        <div class="max-w-3xl mx-auto space-y-6">

            <!-- Title -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-white">
                    Profile
                </h2>
                <p class="text-slate-400 text-sm mt-1">
                    Manage your account settings
                </p>
            </div>

            <!-- Update Profile -->
            <div class="bg-white rounded-xl shadow-md p-6">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Update Password -->
            <div class="bg-white rounded-xl shadow-md p-6 ring-1 ring-slate-200">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete Account -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-red-200">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
