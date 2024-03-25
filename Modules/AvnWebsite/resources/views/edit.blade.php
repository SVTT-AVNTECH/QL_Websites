<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <table>
        <form action="{{ route('AvnWebsite.update', ['id' => $website->id]) }}" method="post">
            @csrf
            @method('PUT')
            <h1>edit</h1>
            <h2>domain</h2>
            <label for="dichvu">URL:</label>
            <input type="text" id="dichvu" name="url" value="{{ $website->url}}"><br>
            <label for="noidung"> Ngày đăng ký DOMAIN:</label>
            <input type="text" id="noidung" name="domain_date_register" value="{{ $website->domain_date_register }}"><br>
            <label for="tong">Ngày hết hạn DOMAIN:</label>
            <input type="text" id="tong" name="domain_date_expried" value="{{ $website->domain_date_expried }}"><br>
            @foreach ($website->domain_costs as $index => $item)
                <label for="ngay_{{ $index + 1 }}">Ngày thứ {{ $index + 1 }}:</label>
                <input type="text" name="ngay_{{ $index + 1 }}" class="form-control" value="{{ $item->date ?? '' }}"><br>

                <label for="noidung_{{ $index + 1 }}">Nội dung {{ $index + 1 }}:</label>
                <input type="text" name="noidung_{{ $index + 1 }}" class="form-control" value="{{ $item->title ?? '' }}"><br>

                <label for="chiphi_{{ $index + 1 }}">Chi phí {{ $index + 1 }}:</label>
                <input type="text" name="chiphi_{{ $index + 1 }}" class="form-control" value="{{ $item->price ?? '' }}"><br>
            @endforeach
            <label for="ngaythang">Thông tin quản trị domain:</label>
            <input type="text" id="ngaythang" name="domain_info" value="{{ $website->domain_info }}"><br>

            <h2>hosting</h2>
            <label for="noidung"> Ngày đăng ký hosting:</label>
            <input type="text" id="noidung" name="hosting_date_register" value="{{ $website->hosting_date_register }}"><br>
            <label for="tong">Ngày hết hạn hosting:</label>
            <input type="text" id="tong" name="hosting_date_expried" value="{{ $website->hosting_date_expried }}"><br>
            @foreach ($website->hosting_costs as $index => $item)
                <label for="ngay_{{ $index + 1 }}">Ngày thứ {{ $index + 1 }}:</label>
                <input type="text" name="date_{{ $index + 1 }}" class="form-control" value="{{ $item->date ?? '' }}"><br>

                <label for="noidung_{{ $index + 1 }}">Nội dung {{ $index + 1 }}:</label>
                <input type="text" name="title_{{ $index + 1 }}" class="form-control" value="{{ $item->title ?? '' }}"><br>

                <label for="chiphi_{{ $index + 1 }}">Chi phí {{ $index + 1 }}:</label>
                <input type="text" name="price_{{ $index + 1 }}" class="form-control" value="{{ $item->price ?? '' }}"><br>
            @endforeach
            <label for="ngaythang">Thông tin quản trị hosting:</label>
            <input type="text" id="ngaythang" name="hosting_info" value="{{ $website->hosting_info }}"><br>
            <label for="ghichu">Ghi chú:</label>
            <textarea id="ghichu" name="note">{{ $website->note }}</textarea><br>
            <button type="submit">Lưu</button>
        </form>


    </table>
</body>

</html>
