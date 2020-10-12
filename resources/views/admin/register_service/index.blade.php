@extends('layout.master')

@section('content')

    <div class="content">
        <h1 class="titleheader">Đăng ký dịch vụ</h1>
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
        {{--            <a href="{{route('admin.register_services.create')}}" class="btn btn-success">{{ __('general.create') }}</a>--}}
        {{--        </p>--}}

        <div class="panel panel-default">
            <div style="margin-bottom: 15px;width: 500px" class="panel-heading">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search..."/>
                </div>
                <h5>Số lượng đăng ký : <span id="total_records"></span></h5>
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr class="table_header">
                        <th class="thstyleform">STT</th>
                        <th class="thstyleform">Tên Khách hàng</th>
                        <th class="thstyleform">Tên dịch vụ</th>

                        <th class="thstyleform">Ngày Bắt Đầu
                            <p class="pstyleform1">Ngày Kết Thúc</p></th>

                        <th class="thstyleform">Trạng thái</th>

                        {{--                        <th class="thstyleform">&nbsp;</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    @forelse($register_services as $register_service)--}}
                    {{--                        <tr >--}}
                    {{--                            <td class="thstyleform">{{$register_service->id}}</td>--}}
                    {{--                            <td class="thstyleform">{{$register_service->customer_name}}--}}
                    {{--                                <p class="pstyleform1">{{$register_service->customer_email}}</p></td>--}}
                    {{--                            <td class="thstyleform">{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}--}}
                    {{--                            <p class="pstyleform1">{{$register_service->address_domain}}</p></td>--}}

                    {{--                            <td class="thstyleform">{{$register_service->start_date}}--}}
                    {{--                                <p class="pstyleform1">{{$register_service->end_date}}</p></td>--}}

                    {{--                            <td class="thstyleform" @if($register_service->status=='Quá hạn') style="color: red; " @else @if($register_service->status=='Đang hoạt động') style="" @else style="color: #0040FF" @endif @endif>{{$register_service->status}}--}}

                    {{--                            </td>--}}


{{--                                                <td class="thstyleform">--}}
{{--                                                    <a href="{{route('admin.register_services.show', $register_service->id)}}"--}}
{{--                                                       class="btn btn-xs btn-info">{{ __('general.view') }}</a>--}}
{{--                                                    <a href="{{route('admin.register_services.edit', [$register_service->id])}}"--}}
{{--                                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>--}}
{{--                                                    <form style="display: inline-block" action="{{route('admin.register_services.destroy', [$register_service->id])}}"--}}
{{--                                                          method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">--}}
{{--                                                        @csrf--}}
{{--                                                        <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>--}}
{{--                                                    </form>--}}

{{--                                                </td>--}}

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
                    {{ $register_services->links() }}
                </div>
            </div>
        </div>
        <p id="test"></p>
    </div>


    <script>
        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('admin.register_services.action') }}",
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


