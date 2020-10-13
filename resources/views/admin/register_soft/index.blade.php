@extends('layout.master')
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')

    <div class="content">
        <h1 class="titleheader" >Danh sách đăng ký</h1>
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger">
                    {{session('fail')}}
                </div>
            @endif
        </div>
{{--        <p>--}}
{{--            <a href="{{route('admin.register_softs.create')}}" class="btn btn-success">{{ __('general.create') }}</a>--}}
{{--        </p>--}}

        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="margin-bottom: 15px;width: 500px" class="panel-heading">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..."/>
                    </div>
                    <h5>Số lượng đăng ký : <span id="total_records"></span></h5>
                </div>

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr class="table_header">
                        <th class="thstyleform" >STT</th>
                        <th class="thstyleform" >Tên Khách hàng</th>
                        <th class="thstyleform" >Nhân Viên</th>
                        <th class="thstyleform" >Phần Mềm</th>
                        <th class="thstyleform" >Gói Phần Mềm</th>
                        <th class="thstyleform" >Ngày Bắt Đầu
                        <p class="pstyleform1">Ngày Kết Thúc</p></th>
                        <th class="thstyleform" >Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @forelse($register_softs as $register_soft)--}}
{{--                        <tr>--}}
{{--                            <td class="thstyleform">{{$register_soft->id}}</td>--}}
{{--                            <td class="thstyleform">{{$register_soft->customer_name}}--}}
{{--                            <p class="pstyleform1">{{$register_soft->customer_email}}</p>--}}
{{--                            </td>--}}
{{--                            <td class="thstyleform">{{$register_soft->staff_name}}</td>--}}
{{--                            <td class="thstyleform">{{$register_soft->software}}</td>--}}
{{--                            <td class="thstyleform">{{$register_soft->typesoftware}}</td>--}}
{{--                            <td class="thstyleform">{{$register_soft->start_date}}--}}
{{--                            <p class="pstyleform1">{{$register_soft->end_date}}</p></td>--}}


{{--                            <td class="thstyleform">--}}
{{--                                <a href="{{route('admin.register_softs.show', $register_soft->id)}}"--}}
{{--                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>--}}
{{--                                <a href="{{route('admin.register_softs.edit', [$register_soft->id])}}"--}}
{{--                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>--}}
{{--                                <form style="display: inline-block" action="{{route('admin.register_softs.destroy', [$register_soft->id])}}"--}}
{{--                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>--}}
{{--                                </form>--}}

{{--                            </td>--}}

{{--                        </tr>--}}
{{--                    @empty--}}
{{--                        <tr>--}}
{{--                            <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>--}}
{{--                        </tr>--}}
{{--                    @endforelse--}}
                    </tbody>
                </table>
                <div class="text-right">
                    {{--                    hien thi phan trang--}}
                    {{ $register_softs->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('admin.register_softs.action') }}",
                    method: 'GET',
                    data: {query: query},
                    dataType: 'json',
                    success: function (data) {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function () {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@stop


