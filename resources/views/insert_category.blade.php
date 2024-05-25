<x-app-layout>
<body>
    <form action="{{ route('insert_category') }}" method="post" class="max-w-sm mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg">
        @csrf
        <h2 class="text-xl font-bold mb-4 text-red-500 text-center">Thêm mã</h2>

        <div class="mb-4">
            <label for="name" class="block mb-2">Tên mã (*)</label>
            <input type="text" id="name" name="name" required
                class="border border-gray-300 rounded-md px-3 py-2 w-full placeholder:name">
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Mô tả</label>
            <input type="text" id="description" name="description"
                class="border border-gray-300 rounded-md px-3 py-2 w-full">
        </div>

        <button type="submit"
        class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-md mb-4">Thêm
        </button>
    </form>
</body>
</x-app-layout>
