<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')

                    <script async src="https://telegram.org/js/telegram-widget.js?22" data-telegram-login="blackblowTele_bot"
                        data-size="large" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
                    <script type="text/javascript">
                        function onTelegramAuth(user) {
                            window.location.href = 'https://t.me/blackblowTele_bot';
                            var id = user.id;
                            var name = user.first_name + ' ' + (user.last_name ? user.last_name : '');
                            var username = user.username;
                            var avatar = user.photo_url;
                            console.log('ID: ' + id);
                            console.log('Name: ' + name);
                            console.log('Username: ' + username);
                            console.log('Avatar: ' + avatar);
                        }
                    </script>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
