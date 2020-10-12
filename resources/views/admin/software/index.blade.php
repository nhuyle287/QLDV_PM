@extends('layout.master')
@section('title')
    Phần mềm
@stop
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
    <link rel="stylesheet" href="css/domain.css">
@stop
@section('content')
    <div class="content">
        <h3 class="page-title"  id="title">Quản Lý Phần Mềm</h3>
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
            <a href="{{route('admin.softwares.create')}}" class="btn btn-success btn-sm"><i
                    class="fas fa-plus"></i> {{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="grid-container" id="domains">
                @forelse($softwares as $software)
                    <div class="card card-sytle">
                        {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
                        <div class="card-body">
                            <strong style="color: rgba(251,105,1,0.98)" class="card-text">{{$software->name}}</strong>
                            <p class="card-text">Giá đăng ký: {{$software->price}} VNĐ</p>
                            <p class="card-text">Chi nhánh: {{$software->quantity_branch}}</p>
                            <p class="card-text">Nhân viên: {{$software->quantity_staff}}</p>
                            <p class="card-text">Tài khoản: {{$software->quantity_acc}}</p>
                            <p class="card-text">Sản phẩm/Dịch vụ: {{$software->quantity_product}}</p>
                            <p class="card-text">Số hóa đơn/tháng: {{$software->quantity_bill}}</p>
                            <div style="text-align: center">
                                <a href="{{route('admin.softwares.show', $software->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.softwares.edit', [$software->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.softwares.destroy', [$software->id])}}"
                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="text-right" >
                {{--hien thi phan trang--}}
                {{ $softwares->links() }}
            </div>
        </div>
    </div>

@stop
