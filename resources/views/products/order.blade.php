<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('DANH SÁCH ĐƠN HÀNG') }}
        </h2>
    </x-slot>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr class="hover:bg-red-50">
                <th class="w-1/7 py-2">ID</th>
                <th class="w-1/7 py-2">Người Dùng</th>
                <th class="w-1/7 py-2">Tổng Giá</th>
                <th class="w-1/7 py-2">Trạng Thái</th>
                <th class="w-1/7 py-2">Ngày Tạo</th>
                <th class="w-1/7 py-2">Ngày Cập Nhật</th>
                <th class="w-1/7 py-2">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $order->id }}</td>
                <td class="py-2 px-4">{{ $order->user->name }}</td>
                <td class="py-2 px-4">{{ $order->total_price }}</td>
                <td class="py-2 px-4">{{ $order->status }}</td>
                <td class="py-2 px-4">{{ $order->created_at }}</td>
                <td class="py-2 px-4">{{ $order->updated_at }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Xem</a>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Sửa</a>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng này?')">Xoá</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
