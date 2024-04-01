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
                            alert('Đăng nhập thành công với tài khoản ' + user.first_name + ' ' + (user.last_name ? user.last_name : ''));
                            var id = user.id;
                            var name = user.first_name + ' ' + (user.last_name ? user.last_name : '');
                            var avatar = user.photo;
                            axios.post("{{ route('profile.insert_tele') }}", {
                                id: id,
                                name: name,
                                avatar: avatar
                            })
                            btn.style.display="block";
                        }
                    </script>
                    <button onclick="deleteTelegramInfo()" id="btn" style="display:none" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"> Hủy </button>
                    <script type="text/javascript">
                        function deleteTelegramInfo() {
                            axios.post("{{ route('profile.delete_tele') }}")
                                .then(function(response) {
                                    // Xử lý phản hồi từ máy chủ (nếu cần)
                                    alert('Thông tin Telegram đã được xóa thành công.');
                                })
                                .catch(function(error) {
                                    // Xử lý lỗi (nếu có)
                                    console.error('Đã xảy ra lỗi khi xóa thông tin Telegram:', error);
                                });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
