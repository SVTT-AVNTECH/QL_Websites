<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <body class="bg-gray-700 flex justify-center items-center h-screen">
                        <form action="{{ route('AvnWebsite.insert') }}" method="post"
                            class="max-w-sm mx-auto mt-8 p-8 bg-zinc-100 shadow-lg rounded-lg">
                            @csrf
                            <h2 class="text-xl font-bold mb-4 text-red-500 text-center">Thêm hợp đồng</h2>
                            <div class="mb-4">
                                <label for="url" class="block mb-2">URL:</label>
                                <input type="text" id="url" name="url" required
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="domain_date_register" class="block mb-2">Ngày đăng ký domain</label>
                                <input type="date" id="domain_date_register" name="domain_date_register"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="domain_date_expried" class="block mb-2">Ngày hết hạn domain</label>
                                <input type="date" id="domain_date_expried" name="domain_date_expried"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="domain_date_register" class="block mb-2">Thông tin quản trị domain:</label>
                                <input type="text" id="domain_date_register" name="domain_info" multiple
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>

                            <div class="mb-4">
                                <label for="hosting_date_register" class="block mb-2">Ngày đăng ký hosting</label>
                                <input type="date" id="hosting_date_register" name="hosting_date_register"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="hosting_date_expried" class="block mb-2">Ngày hết hạn hosting</label>
                                <input type="date" id="hosting_date_expried" name="hosting_date_expried"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="hosting_date_register" class="block mb-2">Thông tin quản trị
                                    hosting:</label>
                                <input type="text" id="hosting_date_register" name="hosting_info" multiple
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>

                            <div class="mb-4">
                                <label for="note" class="block mb-2">Ghi chú:</label>
                                <input type="text" id="note" name="note"
                                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
                            </div>



                            <button id="showFormDomainButton" type="button"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Mua domain</button>
                            <template id="domainFields" class="hidden">
                                <div class="mb-4">
                                    <label for="date" class="block mb-2">Ngày</label>
                                    <input type="date" id="date" name="cost[date][]" multiple
                                        class="border border-gray-300 rounded-md px-3 py-2 w-full">
                                </div>
                                <div class="mb-4">
                                    <label for="title_domain" class="block mb-2">Nội dung</label>
                                    <input type="text" id="title_domain" name="cost[title][]" multiple
                                        class="border border-gray-300 rounded-md px-3 py-2 w-full">
                                </div>
                                <input type="hidden" id="date" name="cost[type][]" value="domain" multiple>
                                <div class="mb-4">
                                    <label for="price_domain" class="block mb-2">Chi phí domain</label>
                                    <input type="text" id="price_domain" name="cost[price][]" multiple
                                        class="border border-gray-300 rounded-md px-3 py-2 w-full">
                                </div>
                            </template>

                            <button id="showFormHostingButton" type="button"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Mua hosting</button>
                            <template id="hostingFields" class="hidden">
                                <div class="mb-4">
                                    <label for="date" class="block mb-2">Ngày</label>
                                    <input type="date" id="date" name="cost[date][]" multiple
                                        class="border border-gray-300 rounded-md px-3 py-2 w-full">
                                </div>
                                <div class="mb-4">
                                    <label for="title_hosting" class="block mb-2">Nội dung</label>
                                    <input type="text" id="title_hosting" name="cost[title][]" multiple
                                        class="border border-gray-300 rounded-md px-3 py-2 w-full">
                                </div>
                                <input type="hidden" id="date" name="cost[type][]" value="hosting" multiple>
                                <div class="mb-4">
                                    <label for="price_hosting" class="block mb-2">Chi phí hosting</label>
                                    <input type="text" id="price_hosting" name="cost[price][]" multiple
                                        class="border border-gray-300 rounded-md px-3 py-2 w-full">
                                </div>
                            </template>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white  px-4 py-2 rounded-md mb-4">Thêm hợp
                                đồng</button>
                        </form>
                    </body>

                    </html>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    // document.getElementById('showFormHostingButton').addEventListener('click', function() {
    //     var hostingFields = document.getElementById('hostingFields');
    //     appen
    //     if (hostingFields.classList.contains('hidden')) {
    //         hostingFields.classList.remove('hidden');
    //     } else {
    //         hostingFields.classList.add('hidden');
    //     }
    // });
    document.getElementById('showFormDomainButton').addEventListener('click', function() {
        // Lấy nội dung của phần tử có id là "domainFields"
        var domainFieldsContent = document.getElementById("domainFields").innerHTML;

        // Tìm phần tử có id là "showFormDomainButton"
        var showFormDomainButton = document.getElementById("showFormDomainButton");

        // Tạo một phần tử mới chứa nội dung vừa sao chép
        var newElement = document.createElement("div");
        newElement.innerHTML = domainFieldsContent;

        // Chèn phần tử mới sau phần tử "showFormDomainButton"
        showFormDomainButton.parentNode.insertBefore(newElement, showFormDomainButton.nextSibling);

    });
    document.getElementById('showFormHostingButton').addEventListener('click', function() {
        // Lấy nội dung của phần tử có id là "hostingFields"
        var hostingFieldsContent = document.getElementById("hostingFields").innerHTML;

        // Tìm phần tử có id là "showFormHostingButton"
        var showFormHostingButton = document.getElementById("showFormHostingButton");

        // Tạo một phần tử mới chứa nội dung vừa sao chép
        var newElement = document.createElement("div");
        newElement.innerHTML = hostingFieldsContent;

        // Chèn phần tử mới sau phần tử "showFormHostingButton"
        showFormHostingButton.parentNode.insertBefore(newElement, showFormHostingButton.nextSibling);

    });
</script>
