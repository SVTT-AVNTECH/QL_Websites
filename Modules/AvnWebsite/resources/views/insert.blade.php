<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>insert</title>
</head>
<body>
    <form action="{{ route('AvnWebsite.insert') }}" method="post">
        @csrf
        <div>
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required>
        </div>
        <div>
            <label for="domain_date_register">Ngày đăng ký</label>
            <input type="date" id="domain_date_register" name="domain_date_register" required>
        </div>
        <div>
            <label for="domain_date_expried">Ngày hết hạn</label>
            <input type="date" id="domain_date_expried" name="domain_date_expried" required>
        </div>
        <div>
            <label for="date">Ngày</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div>
            <label for="title">Nội dung</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="price">Chi phí</label>
            <input type="text" id="price" name="price" required>
        </div>
        <div>
            <label for="type">Thông tin quản trị</label>
            <select selected(domain)>
                <option value="domain">domain</option>
                <option value="hosting">hosting</option>
            </select>
        </div>
        <button type="submit">Thêm hợp đồng</button>
    </form>
</body>
</html>

