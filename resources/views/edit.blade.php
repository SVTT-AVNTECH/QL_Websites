<x-app-layout>
    <body>
        <form action="{{ route('update', ['id' => $users->id]) }}" method="post" class="max-w-sm mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg">
            @csrf
            @method('PUT')
            <h2 class="text-xl font-bold mb-4 text-red-500 text-center">edit</h2>
            <div class="mb-4">
                <label for="name" class="block mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{$users->name}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full placeholder:name">
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2">Email</label>
                <input type="text" id="description" name="description" value="{{$users->email}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="address" class="block mb-2">Address</label>
                <input type="text" id="address" name="address" value="{{$users->address}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <div class="mb-4">
                <label for="phone" class="block mb-2">Phone</label>
                <input type="text" id="phone" name="phone" value="{{$users->phone}}"
                    class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>

            <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-md mb-4">edit
            </button>
        </form>
    </body>
    </x-app-layout>
