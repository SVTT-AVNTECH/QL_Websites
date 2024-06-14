<x-app-layout>
    <body>
        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg">
            @csrf
            <h2 class="text-xl font-bold mb-4 text-red-500 text-center">Thêm Sản Phẩm</h2>

            <div class="mb-4">
                <label for="name" class="block mb-2">Tên sản phẩm</label>
                <input type="text" id="name" name="name" required
                    class="border border-gray-300 rounded-md px-3 py-2 w-full placeholder:name">
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2">Mô tả</label>
                <input type="text" id="description" name="description"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="price" class="block mb-2">Giá</label>
                <input type="text" id="price" name="price"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="quantity" class="block mb-2">Số lượng</label>
                <input type="text" id="quantity" name="quantity"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="img" class="block mb-2">Hình ảnh</label>
                <input type="file" id="img" name="img"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block mb-2">Danh mục</label>
                <select id="category_id" name="category_id" class="border border-gray-300 rounded-md px-3 py-2 w-full">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-md mb-4">Thêm
            </button>
        </form>
    </body>
    </x-app-layout>
