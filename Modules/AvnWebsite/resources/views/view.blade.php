<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
    <title>Xem chi tiết</title>
</head>
<body class="bg-gray-100">
    <form action="{{ route('AvnWebsite.update', ['id' => $website->id]) }}" method="post" class="max-w-xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <h1 class="text-4xl font-bold mb-4 text-center text-red-600">View</h1>
        <h2 class="text-2xl mb-2">Domain</h2>
        <label for="dichvu" class="block ml-6">URL:</label>
        <input type="text" id="dichvu" name="url" value="{{ $website->url }}" readonly class="form-input mb-2 ml-6 w-96"><br>

        <label for="noidung" class="block ml-6">Ngày đăng ký DOMAIN:</label>
        <input type="text" id="noidung" name="domain_date_register" value="{{ $website->domain_date_register }}" readonly class="form-input mb-2 ml-6 w-96"><br>

        <label for="tong" class="block ml-6">Ngày hết hạn DOMAIN:</label>
        <input type="text" id="tong" name="domain_date_expried" value="{{ $website->domain_date_expried }}" readonly class="form-input mb-2 ml-6 w-96"><br>

        @foreach ($website->domain_costs as $index => $item)
            <label for="ngay_{{ $index + 1 }}" class="block ml-6">Ngày thứ {{ $index + 1 }}:</label>
            <input type="text" name="ngay_{{ $index + 1 }}" value="{{ $item->date ?? '' }}" readonly class="form-input mb-2 ml-6"><br>

            <label for="noidung_{{ $index + 1 }}" class="block ml-6">Nội dung lần thứ {{ $index + 1 }}:</label>
            <input type="text" name="noidung_{{ $index + 1 }}" value="{{ $item->title ?? '' }}" readonly class="form-input mb-2 ml-6"><br>

            <label for="chiphi_{{ $index + 1 }}" class="block ml-6">Chi phí lần thứ {{ $index + 1 }}:</label>
            <input type="text" name="chiphi_{{ $index + 1 }}" value="{{ $item->price ?? '' }}" readonly class="form-input mb-2 ml-6"><br>
        @endforeach

        <label for="ngaythang" class="block ml-6">Thông tin quản trị domain:</label>
        <input type="text" id="ngaythang" name="domain_info" value="{{ $website->domain_info }}" readonly class="form-input mb-2 ml-6 w-96"><br>

        <h2 class="text-2xl mb-2">Hosting</h2>
        <label for="noidung" class="block ml-6"> Ngày đăng ký hosting:</label>
            <input type="text" id="noidung" name="hosting_date_register" value="{{ $website->hosting_date_register }}" class="form-input mb-2 ml-6 w-96" readonly><br>
            <label for="tong" class="block ml-6">Ngày hết hạn hosting:</label>
            <input type="text" id="tong" name="hosting_date_expried" value="{{ $website->hosting_date_expried }}" class="form-input mb-2 ml-6 w-96" readonly><br>
            @foreach ($website->hosting_costs as $index => $item)
                <label for="ngay_{{ $index + 1 }}" class="block ml-6">Ngày thứ {{ $index + 1 }}:</label>
                <input type="text" name="date_{{ $index + 1 }}" value="{{ $item->date ?? '' }}" class="form-input mb-2 ml-6" readonly><br>

                <label for="noidung_{{ $index + 1 }}" class="block ml-6">Nội dung {{ $index + 1 }}:</label>
                <input type="text" name="title_{{ $index + 1 }}" value="{{ $item->title ?? '' }}" class="form-input mb-2 ml-6" readonly><br>

                <label for="chiphi_{{ $index + 1 }}" class="block ml-6">Chi phí {{ $index + 1 }}:</label>
                <input type="text" name="price_{{ $index + 1 }}" value="{{ $item->price ?? '' }}" class="form-input mb-2 ml-6"><br>
            @endforeach
            <label for="ngaythang" class="block ml-6">Thông tin quản trị hosting:</label>
            <input type="text" id="ngaythang" name="hosting_info" value="{{ $website->hosting_info }}" class="form-input mb-2 ml-6 w-96" readonly><br>

        <label for="ghichu" class="block ml-6">Ghi chú:</label>
        <textarea id="ghichu" name="note" readonly class="form-textarea mb-2 ml-6 w-96">{{ $website->note }}</textarea><br>

        <div class="flex justify-end">
            <button type="submit" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold text-xl w-32 rounded">Lưu</button>
        </div>
    </form>
</body>

</html>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>

