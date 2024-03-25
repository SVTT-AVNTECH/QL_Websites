@extends('avnwebsite::layouts.master')
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
                <th rowspan="3">control</th>

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
                        <td><a href="{{ url('edit', ['id' => $website->id]) }}">edit</a></td>
                    </tr>
                @endfor
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('create') }}">insert</a>
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

            // Cập nhật rowspan cho cột đầu tiên
            var rowspanValue = rows.length;
            var cells = rows[0].querySelectorAll('.url, .domain_date_register, .domain_date_expried');
            cells.forEach(function(cell) {
                cell.setAttribute('rowspan', rowspanValue);
            });
        });
    </script>
@endsection
