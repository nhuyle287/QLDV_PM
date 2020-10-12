@extends('layout.master')
@section('title')
    Website
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
        <h3 class="page-title" style="font-weight: bold; font-size: 250%;">Quản Lý Dịch Vụ Website</h3>
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
            <a href="{{route('admin.websites.create')}}" class="btn btn-success btn-sm"><i
                    class="fas fa-plus"></i> {{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="grid-container" id="domains">
                @forelse($websites as $website)
                    <div class="card card-sytle">
                        {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
                        <div class="card-body">
                            <strong style="color: #fb6901fa" class="card-text">{{strtoupper($website->name)}}</strong>

                            <p class="card-text">Loại: {{$website->type_website}}</p>
                            <p class="card-text">Giá: {{$website->price}}</p>
                            <div style="text-align: center">
                                <a href="{{route('admin.websites.show', $website->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.websites.edit', [$website->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block"
                                      action="{{route('admin.websites.destroy', [$website->id])}}"
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
                {{ $websites->links() }}
            </div>
        </div>
    </div>



@stop
