<x-app-layout>

    <div class="py-12 w-full max-md:px-3">
        <h1 class="w-full max-w-7xl mx-auto text-3xl font-bold sm:px-6 lg:px-8 mb-4">Your Profile</h1>
        <div class="w-full max-w-7xl grid lg:grid-cols-2 mx-auto sm:px-6 lg:px-8 gap-4">
            <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                <div class="w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                <div class="w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>