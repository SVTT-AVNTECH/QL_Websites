@extends('avnwebsite::layouts.master')

@section('content')
    <h1 class="text-center">Hello World</h1>
    <table class="table-auto" border="1" cellspacing='0'>
        <tr>
            <th rowspan="3">URL</th>
            <th colspan="6">Tên miền</th>
            <th colspan="6">Hosting</th>
            <th rowspan="3">Ghi chú</th>
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
    </table>
    <a href="{{ url('AvnWebsite::insert') }}">insert</a>
@endsection
