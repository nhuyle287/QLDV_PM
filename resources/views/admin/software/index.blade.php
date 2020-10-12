@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title"  style="font-weight: bold; font-size: 250%;">Quản Lý Phần Mềm</h3>
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
            <a href="{{route('admin.softwares.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center; ">STT</th>
                        <th style="text-align: center; ">Tên</th>
                        <th style="text-align: center; ">Giá</th>
                        <th style="text-align: center;">Chi nhánh</th>
                        <th style="text-align: center; ">Nhân viên</th>
                        <th style="text-align: center; ">Tài khoản</th>
                        <th style="text-align: center; ">Sản phẩm/Dịch vụ</th>
                        <th style="text-align: center; ">Số hóa đơn/tháng</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($softwares as $software)
                        <tr>
                            <td>{{$software->id}}</td>
                            <td>{{$software->name}}</td>
                            <td>{{$software->price}}</td>
                            <td>{{$software->quantity_branch}}</td>
                            <td>{{$software->quantity_staff}}</td>
                            <td>{{$software->quantity_acc}}</td>
                            <td>{{$software->quantity_product}}</td>
                            <td>{{$software->quantity_bill}}</td>

                            <td>
                                <a href="{{route('admin.softwares.show', $software->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.softwares.edit', [$software->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.softwares.destroy', [$software->id])}}"
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
                    {{ $softwares->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
