<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Document</title>
                    </head>

                    <body>
                        <form action="{{ route('AvnWebsite.update', ['id' => $website->id]) }}" method="post"
                            class="max-w-lg mx-auto mt-8 p-8 bg-zinc-100 shadow-lg rounded-lg">
                            @csrf
                            @method('PUT')
                            <p class="text-4xl font-bold mb-4 text-center text-red-500">Edit</p>
                            <h2 class="text-lg font-semibold mb-2">Domain</h2>
                            <div class="mb-4">
                                <label for="dichvu" class="block text-gray-700 font-bold mb-2">URL:</label>
                                <input type="text" id="dichvu" name="url" value="{{ $website->url }}"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4">
                            </div>
                            <div class="mb-4">
                                <label for="noidung" class="block text-gray-700 text-sm font-bold mb-2"> Ngày đăng ký
                                    DOMAIN:</label>
                                <input type="text" id="noidung" name="domain_date_register"
                                    value="{{ $website->domain_date_register }}"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                            </div>
                            <div class="mb-4">
                                <label for="tong" class="block text-gray-700 text-sm font-bold mb-2">Ngày hết hạn
                                    DOMAIN:</label>
                                <input type="text" id="tong" name="domain_date_expried"
                                    value="{{ $website->domain_date_expried }}"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                            </div>

                            <div class="mb-4">
                                @foreach ($website->domain_costs as $index => $item)
                                    <label for="ngay_{{ $index + 1 }}"
                                        class="block text-gray-700 text-sm font-bold mb-2">Ngày thứ
                                        {{ $index + 1 }}:</label>
                                    <input type="text" name="ngay_{{ $index + 1 }}" class="form-control"
                                        value="{{ $item->date ?? '' }}"
                                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>

                                    <label for="noidung_{{ $index + 1 }}"
                                        class="block text-gray-700 text-sm font-bold mb-2">Nội dung
                                        {{ $index + 1 }}:</label>
                                    <input type="text" name="noidung_{{ $index + 1 }}" class="form-control"
                                        value="{{ $item->title ?? '' }}"
                                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>

                                    <label for="chiphi_{{ $index + 1 }}"
                                        class="block text-gray-700 text-sm font-bold mb-2">Chi phí
                                        {{ $index + 1 }}:</label>
                                    <input type="text" name="chiphi_{{ $index + 1 }}" class="form-control"
                                        value="{{ $item->price ?? '' }}"
                                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <label for="ngaythang" class="block text-gray-700 text-sm font-bold mb-2">Thông tin quản
                                    trị domain:</label>
                                <input type="text" id="ngaythang" name="domain_info"
                                    value="{{ $website->domain_info }}"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                            </div>
                            <h2 class="text-lg font-semibold b-2 ">Hosting</h2>
                            <div class="mb-4">
                                <label for="noidung" class="block text-gray-700 text-sm font-bold mb-2"> Ngày đăng ký
                                    hosting:</label>
                                <input type="text" id="noidung" name="hosting_date_register"
                                    value="{{ $website->hosting_date_register }}"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                            </div>
                            <div class="mb-4">
                                <label for="tong" class="block text-gray-700 text-sm font-bold mb-2">Ngày hết hạn
                                    hosting:</label>
                                <input type="text" id="tong" name="hosting_date_expried"
                                    value="{{ $website->hosting_date_expried }}"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                            </div>

                            <div class="mb-4">

                                @foreach ($website->hosting_costs as $index => $item)
                                    <label for="ngay_{{ $index + 1 }}"
                                        class="block text-gray-700 text-sm font-bold mb-2">Ngày thứ
                                        {{ $index + 1 }}:</label>
                                    <input type="text" name="date_{{ $index + 1 }}" class="form-control"
                                        value="{{ $item->date ?? '' }}"
                                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>

                                    <label for="noidung_{{ $index + 1 }}"
                                        class="block text-gray-700 text-sm font-bold mb-2">Nội dung
                                        {{ $index + 1 }}:</label>
                                    <input type="text" name="title_{{ $index + 1 }}" class="form-control"
                                        value="{{ $item->title ?? '' }}"><br>

                                    <label for="chiphi_{{ $index + 1 }}"
                                        class="block text-gray-700 text-sm font-bold mb-2">Chi phí
                                        {{ $index + 1 }}:</label>
                                    <input type="text" name="price_{{ $index + 1 }}" class="form-control"
                                        value="{{ $item->price ?? '' }}"
                                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <label for="ngaythang" class="block text-gray-700 text-sm font-bold mb-2">Thông tin
                                    quản trị hosting:</label>
                                <input type="text" id="ngaythang" name="hosting_info"
                                    value="{{ $website->hosting_info }}"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                            </div>
                            <div class="mb-4">
                                <label for="ghichu" class="block text-gray-700 text-sm font-bold mb-2">Ghi
                                    chú:</label>
                                <textarea id="ghichu" name="note"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4">{{ $website->note }}</textarea><br>

                            </div>
                            <button type="submit"
                                class="float-right bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-32">Lưu</button>
                        </form>
                    </body>

                    </html>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
