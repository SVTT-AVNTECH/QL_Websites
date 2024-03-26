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
    <form action="{{ route('AvnWebsite.insert_price', ['id' => $website->id]) }}" method="post">
        @csrf
        <h2>Domain</h2>
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

        <button type="submit">Thêm</button>
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
