@extends('layout.master')
@section('content')

    <div class="content">
        <h1 class="titleheader" >Đăng ký phần mềm</h1>
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
        <p>
            <a href="{{route('admin.register_softs.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

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

                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($register_softs as $register_soft)
                        <tr>
                            <td class="thstyleform">{{$register_soft->id}}</td>
                            <td class="thstyleform">{{$register_soft->customer_name}}
                            <p class="pstyleform1">{{$register_soft->customer_email}}</p>
                            </td>
                            <td class="thstyleform">{{$register_soft->staff_name}}</td>
                            <td class="thstyleform">{{$register_soft->software}}</td>
                            <td class="thstyleform">{{$register_soft->typesoftware}}</td>
                            <td class="thstyleform">{{$register_soft->start_date}}
                            <p class="pstyleform1">{{$register_soft->end_date}}</p></td>


                            <td class="thstyleform">
                                <a href="{{route('admin.register_softs.show', $register_soft->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.register_softs.edit', [$register_soft->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.register_softs.destroy', [$register_soft->id])}}"
                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-right">
                    {{--                    hien thi phan trang--}}
                    {{ $register_softs->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
