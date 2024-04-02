@extends('avnwebsite::layouts.master')

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center font-bold text-xl">index</h1>
                    <div class="flex justify-end">
                        <button
                            class="bg-green-500 hover:bg-green-700 text-white flex items-center w-32 px-4 py-2 rounded-md mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm1 5a1 1 0 011-1h6a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2zm10-1a1 1 0 00-1-1h-3V5a1 1 0 00-2 0v2H5a1 1 0 00-1 1v7a1 1 0 001 1h2v2a1 1 0 002 0v-2h6v2a1 1 0 002 0v-2h2a1 1 0 001-1V9zm-5 4h2v2h-2v-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="{{ url('website/create') }}">Insert</a>
                        </button>
                    </div>


                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th rowspan="3"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border align-middle">
                                        URL</th>
                                    <th colspan="6"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Tên miền</th>
                                    <th colspan="6"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Hosting</th>
                                    <th rowspan="3"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Ghi chú</th>
                                    <th rowspan="3"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Edit</th>
                                </tr>
                                <tr>
                                    <th rowspan="2"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Ngày đăng ký</th>
                                    <th rowspan="2"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Ngày hết hạn</th>
                                    <th colspan="3"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Chi phí</th>
                                    <th rowspan="2"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Thông tin quản trị</th>
                                    <th rowspan="2"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Ngày đăng ký</th>
                                    <th rowspan="2"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Ngày hết hạn</th>
                                    <th colspan="3"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Chi phí</th>
                                    <th rowspan="2"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Thông tin quản trị</th>
                                </tr>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Ngày</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Nội dung</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Chi phí</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Ngày</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Nội dung</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                        Chi phí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($websites as $index => $website)
                                    @php
                                        $count_domain_costs = $website->domain_costs->count();
                                        $count_hosting_costs = $website->hosting_costs->count();
                                        $count_loop =
                                            $count_domain_costs > $count_hosting_costs
                                                ? $count_domain_costs
                                                : $count_hosting_costs;
                                        if ($count_loop <= 0) {
                                            $count_loop = 1;
                                        }
                                    @endphp
                                    @for ($i = 0; $i < $count_loop; $i++)
                                        @php
                                            $domain_cost = isset($website->domain_costs[$i])
                                                ? $website->domain_costs[$i]
                                                : null;
                                            $hosting_cost = isset($website->hosting_costs[$i])
                                                ? $website->hosting_costs[$i]
                                                : null;
                                        @endphp
                                        <tr data-id="{{ $website->id }}">
                                            <td class="url border">
                                                {{ $website->url }}
                                            </td>
                                            <td class="domain_date_register border">
                                                {{ $website->domain_date_register }}
                                            </td>
                                            <td class="domain_date_expried border">
                                                {{ $website->domain_date_expried }}
                                            </td>
                                            <td class="border">
                                                {{ $domain_cost ? $domain_cost->date : '' }}
                                            </td>
                                            <td class="border">
                                                {{ $domain_cost ? $domain_cost->title : '' }}
                                            </td>
                                            <td class="border">
                                                {{ $domain_cost ? number_format($domain_cost->price, 0, ',', '.') . ' VNĐ' : '' }}
                                            </td>
                                            <td class="url border">{{ $website->domain_info }}</td>
                                            <td class="domain_date_register border">
                                                {{ $website->hosting_date_register }}</td>
                                            <td class="domain_date_expried border">{{ $website->hosting_date_expried }}
                                            </td>
                                            <td class="border">{{ $hosting_cost ? $hosting_cost->date : '' }}</td>
                                            <td class="border">{{ $hosting_cost ? $hosting_cost->title : '' }}</td>
                                            <td class="border">
                                                {{ $hosting_cost ? number_format($hosting_cost->price, 0, ',', '.') . ' VNĐ' : '' }}
                                            </td>
                                            <td class="url border">{{ $website->hosting_info }}</td>
                                            <td class="url border">{{ $website->note }}</td>

                                            <td class="url">
                                                <button
                                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm  w-32 rounded">
                                                    <a
                                                        href="{{ route('AvnWebsite.edit', ['id' => $website->id]) }}">Edit</a>
                                                </button>
                                                <br>
                                                <button
                                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm  w-32 rounded">
                                                    <a href="{{ route('AvnWebsite.view', ['id' => $website->id]) }}">Xem
                                                        chi tiết</a>
                                                </button>
                                                <br>
                                                <button
                                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm  w-32 rounded">
                                                    <a
                                                        href="{{ route('AvnWebsite.create_price', ['id' => $website->id]) }}">Cập
                                                        nhật chi phí</a>
                                                </button>


                                                <form action="{{ route('AvnWebsite.delete', ['id' => $website->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="inline-block bg-red-600 hover:bg-red-400 text-white font-bold text-sm  w-32 rounded">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endfor
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            document.querySelectorAll('[data-id]').forEach(function(element) {
                                var dataId = element.getAttribute('data-id');
                                var rows = document.querySelectorAll('[data-id="' + dataId + '"]');
                                var index = 0;
                                rows.forEach(function(row) {
                                    if (index > 0) {
                                        var cells = row.querySelectorAll('.url, .domain_date_register, .domain_date_expried');
                                        cells.forEach(function(cell) {
                                            cell.style.display = 'none';
                                        });
                                    }
                                    index++;
                                });
                                var rowspanValue = rows.length;
                                var cells = rows[0].querySelectorAll('.url, .domain_date_register, .domain_date_expried');
                                cells.forEach(function(cell) {
                                    cell.setAttribute('rowspan', rowspanValue);
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
{{--
@php
    use Carbon\Carbon;
    $max_cost = $websites->max('cost_count');
@endphp
@section('content')
    <h1 class="text-center">Hello World</h1>
    <table class="table-auto" border="1" cellspacing='0'>
        <thead>
            <tr>
                <th rowspan="3">URL</th>
                <th colspan="6">Tên miền</th>
                <th colspan="6">Hosting</th>
                <th rowspan="3">Ghi chú</th>
                <th rowspan="3">edit</th>


            </tr>
            <tr>

                <td rowspan="2">Ngày đăng ký</td>
                <td rowspan="2">Ngày hết hạn</td>
                <td colspan="3">Chi phí</td>
                <td rowspan="2">Thông tin quản trị</td>
                <td rowspan="2">Ngày đăng ký</td>
                <td rowspan="2">Ngày hết hạn</td>
                <td colspan="3">Chi phí</td>
                <td rowspan="2">Thông tin quản trị</td>
            </tr>
            <tr>
                <td>Ngày</td>
                <td>Nội dung</td>
                <td>Chi phí</td>
                <td>Ngày</td>
                <td>Nội dung</td>
                <td>Chi phí</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($websites as $index => $website)
                @php
                    $count_domain_costs = $website->domain_costs->count();
                    $count_hosting_costs = $website->hosting_costs->count();
                    $count_loop =
                        $count_domain_costs > $count_hosting_costs ? $count_domain_costs : $count_hosting_costs;
                    if ($count_loop <= 0) {
                        $count_loop = 1;
                    }
                @endphp
                @for ($i = 0; $i < $count_loop; $i++)
                    @php
                        $domain_cost = isset($website->domain_costs[$i]) ? $website->domain_costs[$i] : null;
                        $hosting_cost = isset($website->hosting_costs[$i]) ? $website->hosting_costs[$i] : null;
                    @endphp
                    <tr data-id="{{ $website->id }}">
                        <td class="url">{{ $website->url }}</td>
                        <td class="domain_date_register">{{ $website->domain_date_register }}</td>
                        <td class="domain_date_expried">{{ $website->domain_date_expried }}</td>
                        <td>{{ $domain_cost ? $domain_cost->date : '' }}</td>
                        <td>{{ $domain_cost ? $domain_cost->title : '' }}</td>
                        <td>{{ $domain_cost ? $domain_cost->price : '' }}</td>
                        <td class="url">{{ $website->domain_info }}</td>
                        <td class="domain_date_register">{{ $website->hosting_date_register }}</td>
                        <td class="domain_date_expried">{{ $website->hosting_date_expried }}</td>
                        <td>{{ $hosting_cost ? $hosting_cost->date : '' }}</td>
                        <td>{{ $hosting_cost ? $hosting_cost->title : '' }}</td>
                        <td>{{ $hosting_cost ? $hosting_cost->price : '' }}</td>
                        <td class="url">{{ $website->hosting_info }}</td>
                        <td class="url">{{ $website->note }}</td>

                        <td class="url">
                            <button><a href="{{ route('AvnWebsite.edit', ['id' => $website->id]) }}">edit</a></button><br>
                            <button><a href="{{ route('AvnWebsite.view', ['id' => $website->id]) }}">xem chi tiết</a></button>
                            <button><a href="{{ route('AvnWebsite.create_price', ['id' => $website->id])}}">cập nhập chi phí</a></button>

                                <form action="{{ route('AvnWebsite.delete', ['id' => $website->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">delete</button>
                                </form>
                        </td>

                    </tr>
                @endfor
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('website/create') }}">insert</a>
    <script>
        document.querySelectorAll('[data-id]').forEach(function(element) {
            var dataId = element.getAttribute('data-id');
            var rows = document.querySelectorAll('[data-id="' + dataId + '"]');
            var index = 0;
            rows.forEach(function(row) {
                if (index > 0) {
                    var cells = row.querySelectorAll('.url, .domain_date_register, .domain_date_expried');
                    cells.forEach(function(cell) {
                        cell.style.display = 'none';
                    });
                }
                index++;
            });

            var rowspanValue = rows.length;
            var cells = rows[0].querySelectorAll('.url, .domain_date_register, .domain_date_expried');
            cells.forEach(function(cell) {
                cell.setAttribute('rowspan', rowspanValue);
            });
        });
    </script>
@endsection --}}
