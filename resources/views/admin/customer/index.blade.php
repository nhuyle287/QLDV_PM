@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title" style="font-weight: bold; font-size: 250%;">Quản lý khách hàng</h3>
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
            <a href="{{route('admin.customers.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead >
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center; ">STT</th>
                        <th style="text-align: center; ">Họ Tên</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center; ">Điện Thoại</th>

                        <th style="text-align: center; ">Địa chỉ</th>

                        <th style="text-align: center; ">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($customers as $cus)
                        <tr>
                            <td>{{$cus->id}}</td>
                            <td>{{ $cus->name }}</td>
                            {{--                            <td>{{ $cus->represent_name }}</td>--}}
                            <td>{{ $cus->email }}</td>
                            <td>{{ $cus->phone_number }}</td>

                            <td>{{ $cus->address }}</td>


                            <td>
                                <a href="{{route('admin.customers.show', $cus->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.customers.edit', [$cus->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.customers.destroy', [$cus->id])}}"
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
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
