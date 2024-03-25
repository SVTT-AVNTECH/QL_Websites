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
    <form action="{{ route('AvnWebsite.insert') }}" method="post">
        @csrf
        <h2>Domain</h2>
        <div>
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required>
        </div>
        <div>
            <label for="domain_date_register">Ngày đăng ký domain</label>
            <input type="date" id="domain_date_register" name="domain_date_register">
        </div>
        <div>
            <label for="domain_date_expried">Ngày hết hạn domain</label>
            <input type="date" id="domain_date_expried" name="domain_date_expried">
        </div>
        <div>
            <label for="domain_date_register">Thông tin quản trị domain:</label>
            <input type="text" id="domain_date_register" name="domain_info" multiple>
        </div>

        <div>
            <label for="hosting_date_register">Ngày đăng ký hosting</label>
            <input type="date" id="hosting_date_register" name="hosting_date_register">
        </div>
        <div>
            <label for="hosting_date_expried">Ngày hết hạn hosting</label>
            <input type="date" id="hosting_date_expried" name="hosting_date_expried">
        </div>
        <div>
            <label for="hosting_date_register">Thông tin quản trị hosting:</label>
            <input type="text" id="hosting_date_register" name="hosting_info" multiple>
        </div>

        <div>
            <label for="note">Ghi chú:</label>
            <input type="text" id="note" name="note">
        </div>



        <button id="showFormDomainButton" type="button">Mua domain</button>
        <template id="domainFields" class="hidden">
            <div>
                <label for="date">Ngày</label>
                <input type="date" id="date" name="cost[date][]" multiple>
            </div>
            <div>
                <label for="title_domain">Nội dung</label>
                <input type="text" id="title_domain" name="cost[title][]" multiple>
            </div>
            <input type="hidden" id="date" name="cost[type][]" value="domain" multiple>
            <div>
                <label for="price_domain">Chi phí domain</label>
                <input type="text" id="price_domain" name="cost[price][]" multiple>
            </div>
        </template>

        <button id="showFormHostingButton" type="button">Mua hosting</button>
        <template id="hostingFields" class="hidden">
            <div>
                <label for="date">Ngày</label>
                <input type="date" id="date" name="cost[date][]" multiple>
            </div>
            <div>
                <label for="title_hosting">Nội dung</label>
                <input type="text" id="title_hosting" name="cost[title][]" multiple>
            </div>
            <input type="hidden" id="date" name="cost[type][]" value="hosting" multiple>
            <div>
                <label for="price_hosting">Chi phí hosting</label>
                <input type="text" id="price_hosting" name="cost[price][]" multiple>
            </div>
        </template>

        <button type="submit">Thêm hợp đồng</button>
    </form>
</body>

</html>
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
