<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hợp Đồng</title>
    <style>
        /* CSS for hiding the form initially */
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <form action="{{ route('AvnWebsite.insert_domain') }}" method="post">
        @csrf
        <h2>Domain</h2>
        <div>
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required>
        </div>
        <div>
            <label for="domain_date_register">Ngày đăng ký domain</label>
            <input type="date" id="domain_date_register" name="domain_date_register" required>
        </div>
        <div>
            <label for="domain_date_expried">Ngày hết hạn domain</label>
            <input type="date" id="domain_date_expried" name="domain_date_expried" required>
        </div>
        <div>
            <label for="date">Ngày</label>
            <input type="date" id="date" name="date_domain" required>
        </div>
        <div>
            <label for="title">Nội dung</label>
            <input type="text" id="title" name="title_domain" required>
        </div>
        <div id="priceInputs">
            <label for="price">Chi phí</label>
            <input type="text" id="price" name="price_domain" required>
        </div>
        <div>
            <label for="type_hosting">Thông tin quản trị:</label>
            <input type="text" id="type_hosting" name="type_hosting" >
        </div>





        <div>
            <label for="hosting_date_register">Ngày đăng ký hosting</label>
            <input type="date" id="hosting_date_register" name="hosting_date_register" required>
        </div>
        <div>
            <label for="hosting_date_expried">Ngày hết hạn hosting</label>
            <input type="date" id="hosting_date_expried" name="hosting_date_expried" required>
        </div>
        <button id="showFormButton" type="button">Mua hosting</button>
        <div id="hostingFields" class="hidden">
            <div>
                <label for="date">Ngày</label>
                <input type="date" id="date" name="date_hosting" >
            </div>
            <div>
                <label for="title_hosting">Nội dung</label>
                <input type="text" id="title_hosting" name="title_hosting" >
            </div>

            <div id="priceInputs">
                <label for="price_hosting">Chi phí</label>
                <input type="text" id="price_hosting" name="price_hosting" >
            </div>
        </div>
        <div>
            <label for="note">Thông tin quản trị:</label>
            <input type="text" id="note" name="note" >
        </div>
        <div>
            <label for="type">Thông tin quản trị:</label>
            <input type="text" id="type" name="type" >
        </div>
        <button type="submit">Thêm hợp đồng</button></form>
</body>

</html>
<script>
    document.getElementById('showFormButton').addEventListener('click', function() {
        var hostingFields = document.getElementById('hostingFields');
        if (hostingFields.classList.contains('hidden')) {
            hostingFields.classList.remove('hidden');
        } else {
            hostingFields.classList.add('hidden');
        }
    });
</script>
