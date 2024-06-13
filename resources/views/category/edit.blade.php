<x-app-layout>
    <body>
        <form action="{{ route('update_category', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg">
            @csrf
            @method('PUT')
            <h2 class="text-xl font-bold mb-4 text-red-500 text-center">edit</h2>
            <div class="mb-4">
                <label for="name" class="block mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{$category->name}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full placeholder:name">
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2">description</label>
                <input type="text" id="description" name="description" value="{{$category->description}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

           

            <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-md mb-4">edit
            </button>
        </form>
    </body>

    </x-app-layout>
