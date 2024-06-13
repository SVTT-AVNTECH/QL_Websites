<x-app-layout>
    <body>
        <form action="{{ route('update_product', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg">
            @csrf
            @method('PUT')
            <h2 class="text-xl font-bold mb-4 text-red-500 text-center">edit</h2>
            <div class="mb-4">
                <label for="name" class="block mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{$product->name}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full placeholder:name">
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2">description</label>
                <input type="text" id="description" name="description" value="{{$product->description}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="price" class="block mb-2">price</label>
                <input type="text" id="price" name="price" value="{{$product->price}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="quantity" class="block mb-2">quantity</label>
                <input type="text" id="quantity" name="quantity" value="{{$product->quantity}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="img" class="block mb-2">Image</label>
                <input type="file" id="img" name="img" class="border border-gray-300 rounded-md px-3 py-2 w-full" onchange="previewImage(event)">
                @if($product->img)
                    <div id="currentImageWrapper" class="mt-2">
                        <img src="{{ asset($product->img) }}" id="currentImage" class="w-20 h-20 object-cover mb-2">
                    </div>
                @else
                    <p>No image available</p>
                @endif
                <div id="newImageWrapper" style="display:none;">
                    <img id="newImage" class="w-20 h-20 object-cover mb-2">
                    {{-- <p id="newImageName"></p> --}}
                </div>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block mb-2">id category</label>
                <select id="category_id" name="category_id" class="border border-gray-300 rounded-md px-3 py-2 w-full">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-md mb-4">edit
            </button>
        </form>
    </body>

    <script>
        function previewImage(event) {
            const currentImageWrapper = document.getElementById('currentImageWrapper');
            const newImageWrapper = document.getElementById('newImageWrapper');
            const newImage = document.getElementById('newImage');
            const newImageName = document.getElementById('newImageName');
        
            // Ẩn ảnh cũ
            if (currentImageWrapper) {
                currentImageWrapper.style.display = 'none';
            }
        
            // Hiển thị ảnh mới
            newImageWrapper.style.display = 'block';
            newImage.src = URL.createObjectURL(event.target.files[0]);
            newImageName.textContent = event.target.files[0].name;
        
            // Giải phóng bộ nhớ cho URL object khi không cần thiết
            newImage.onload = function() {
                URL.revokeObjectURL(newImage.src);
            }
        }
        </script>
    </x-app-layout>
