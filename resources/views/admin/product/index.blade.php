@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">Quản Lý Sản Phẩm</h3>
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
            <a href="{{route('admin.products.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('general.list') }}
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Đơn Vị Tính</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Mô Tả</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $pro)
                        <tr>
                            <td>{{$pro->id}}</td>
                            <td>{{$pro->code}}</td>
                            <td>{{$pro->customer_name }}</td>
                            <td>{{$pro->name }}</td>
                            <td>{{$pro->unit_name }}</td>
                            <td>{{$pro->price }}</td>
                            <td>{{$pro->description }}</td>

                            <td>
                                <a href="{{route('admin.products.show', $pro->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.products.create')}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.products.destroy', [$pro->id])}}"
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
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
