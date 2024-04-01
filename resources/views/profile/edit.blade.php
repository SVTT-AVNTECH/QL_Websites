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

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900">
                        Connect Account
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Before
                        deleting your account, please download any data or information that you wish to retain.
                    </p>
                    <div class="mt-4 flex">
                        <div id="telegram_icon">

                            <script async src="https://telegram.org/js/telegram-widget.js?22" data-telegram-login="blackblowTele_bot"
                                data-size="large" data-onauth="onTelegramAuth(user)" data-request-access="write" data-lang="vie"></script>
                            <script type="text/javascript">
                                function onTelegramAuth(user) {
                                    var id = user.id;
                                    var name = user.first_name + ' ' + (user.last_name ? user.last_name : '');
                                    var avatar = user.photo;
                                    axios.post("{{ route('profile.insert_tele') }}", {
                                            id: id,
                                            name: name,
                                            avatar: avatar
                                        }).then(function(response) {
                                            alert('Thông tin Telegram đã được thêm thành công.');
                                            window.has_telegram = id;
                                            displayTelegramButton();
                                        })
                                        .catch(function(error) {
                                            console.error('Đã xảy ra lỗi khi thêm thông tin Telegram:', error);
                                        });
                                    btn.style.display = "block";
                                }
                            </script>
                        </div>


                        <div id="btn_cancel">
                            <button onclick="deleteTelegramInfo()" id="btn"
                                class="mt-2 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 w-32"> Hủy
                            </button>

                            <script type="text/javascript">
                                function deleteTelegramInfo() {
                                    btn.style.display = "none";
                                    axios.post("{{ route('profile.delete_tele') }}")
                                        .then(function(response) {
                                            alert('Thông tin Telegram đã được xóa thành công.');
                                            window.has_telegram = false;
                                            displayTelegramButton();
                                        })
                                        .catch(function(error) {
                                            console.error('Đã xảy ra lỗi khi xóa thông tin Telegram:', error);
                                        });
                                }
                            </script>
                        </div>


                        <script>
                            window.has_telegram = {{ $user->tele_id ? $user->tele_id : 'false' }};
                            displayTelegramButton();

                            function displayTelegramButton() {
                                if (has_telegram) {
                                    document.querySelector('#telegram_icon').classList.add('hidden')
                                    document.querySelector('#btn_cancel').classList.remove('hidden')
                                } else {
                                    document.querySelector('#telegram_icon').classList.remove('hidden')
                                    document.querySelector('#btn_cancel').classList.add('hidden')
                                }
                            }
                        </script>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
