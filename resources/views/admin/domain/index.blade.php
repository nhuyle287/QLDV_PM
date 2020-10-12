@extends('layout.master')
@section('title')
    Tên miền
@stop
@section('head')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
    <link rel="stylesheet" href="css/domain.css">
@stop
@section('content')
    <div class="content">
        <h3 class="page-title" id="title">Quản Lý Domain</h3>
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
            <a href="{{route('admin.domains.create')}}" class="btn btn-success btn-sm"> <i
                    class="fas fa-plus"></i> {{ __('general.create') }}</a>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="grid-container" id="domains">
                @forelse($domains as $domain)
                    <div class="card card-sytle">
                        {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
                        <div class="card-body">
                            {{--                            <p style="" class="card-text">code: {{$domain->code}}</p>--}}
                            <strong style="color: #fb6901fa" class="card-text">{{strtoupper($domain->name)}}</strong>
                            <p class="card-text">Phí đăng kí: {{$domain->fee_register}}</p>
                            <p class="card-text">Phí duy trì: {{$domain->fee_remain}}</p>
                            <p class="card-text">Phí chuyển: {{$domain->fee_tranformation}}</p>
                            <div style="text-align: center">
                                <a href="{{route('admin.domains.show', $domain->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.domains.edit', [$domain->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block"
                                      action="{{route('admin.domains.destroy', [$domain->id])}}"
                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                </form>
                            </div>

                        </div>
                    </div>
                @empty
                @endforelse
            </div>


            <div class="text-right">
                {{--hien thi phan trang--}}
                {{ $domains->links() }}
            </div>
        </div>
    </div>


@stop
