<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto mt-10">
        <div class="flex justify-center my-10">
            <div class="w-full bg-white p-8 shadow-md rounded-lg">
                <h1 class="text-2xl font-bold mb-8 text-center">Giỏ hàng</h1>
                
                @if(session('success'))
                    <div id="success-message" class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(count($cart) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b">
                                    <th class="py-2 px-4">Tên sản phẩm</th>
                                    <th class="py-2 px-4">Số lượng</th>
                                    <th class="py-2 px-4">Giá</th>
                                    <th class="py-2 px-4">Thành tiền</th>
                                    <th class="py-2 px-4">Size</th>
                                    <th class="py-2 px-4">Hình ảnh</th>
                                    <th class="py-2 px-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($cart as $id => $details)
                                    @php $total += $details['price'] * $details['quantity']; @endphp
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $details['name'] }}</td>
                                        <td class="py-2 px-4">
                                            <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 p-2 border rounded mr-2">
                                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                            </form>
                                        </td>
                                        <td class="py-2 px-4">{{ number_format($details['price'], 0, ',', '.') }} đ</td>
                                        <td class="py-2 px-4">{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} đ</td>
                                        <td class="py-2 px-4"> 
                                            @if(isset($details['size']))
                                                {{ $details['size'] }}
                                            @else
                                                N/A
                                            @endif 
                                        </td>
                                        <td class="py-2 px-4">
                                            <img src="{{ asset($details['img']) }}" alt="Product Image" class="w-16 h-16 object-cover">
                                        </td>
                                        <td class="py-2 px-4">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3 text-red-500" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    
                    <div class="fixed bottom-0 w-full flex justify-end">
                        <div class="w-full">
                            <div class="bg-gray-100 p-4 rounded-lg shadow h-12 flex">
                                {{-- <h2 class="text-lg font-bold mb-4">Tổng tiền</h2> --}}
                                <div class="fixed bottom-0 w-full flex justify-center">
                                    <a href="{{ url('/') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mr-16">Continue Shopping</a>
                                        <div class=" justify-between mb-4 items-center">
                                            <span class="font-bold text-lg">Tổng tiền:</span>
                                            <span class="font-bold text-red-500 underline text-lg">{{ number_format($total, 0, ',', '.') }} đ</span>
                                        </div>
                                        <form action="{{ route('cart.checkout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-32 ml-16 text-center block hover:bg-blue-600">Thanh toán</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-gray-700">Your cart is empty.</p>
                @endif
    
                <div class="mt-8">
                   
                </div>
            </div>
        </div>
    </div>
    

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script> --}}
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.getElementById("success-message");
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.transition = "opacity 1s";
                successMessage.style.opacity = "0";
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 1000); // Matches the transition duration
            }, 2000); // 5 seconds
        }
    });
</script>

</html>
