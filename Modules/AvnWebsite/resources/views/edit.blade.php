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
            <label for="dichvu">URL:</label>
            <input type="text" id="dichvu" name="url" value="{{ $website->url}}"><br>
            <h3>Tên miền</h3>
            <label for="noidung"> Ngày đăng ký:</label>
            <input type="text" id="noidung" name="domain_date_register" value="{{ $website->domain_date_register }}"><br>
            <label for="tong">Ngày hết hạn:</label>
            <input type="text" id="tong" name="domain_date_expried" value="{{ $website->domain_date_expried }}"><br>
            <h5>Chi phí:</h5>
            <label for="ngaythang">Ngày:</label>
            <input type="date" id="ngaythang" name="date" value="{{ $website->date }}"><br>
            <label for="congno">Công nợ:</label>
            <input type="text" id="congno" name="congno" value="{{ $website->congno }}"><br>
            <label for="ghichu">Ghi chú:</label>
            <textarea id="ghichu" name="ghichu">{{ $website->ghichu }}</textarea><br>


            <button type="submit">Lưu</button>
        </form>


    </table>
</body>

</html>
