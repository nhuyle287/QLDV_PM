@extends('layout.master')
@section('css')
    <style>
        #container {
            text-align: center;
            display: flex;
            flex-flow: row wrap;
        }

        #card {
            width: 18rem;
            margin-left: 5%;
        }
    </style>
@stop
@section('content')
    <div class="content">
        <h3 class="page-title"  style="font-weight: bold; font-size: 250%;">Quản Lý VPS</h3>
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
            <a href="{{route('admin.vpss.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="grid-container" id="container">
                @forelse($vpss as $vps)
                    <div class="card card-sytle" id="card">
                        {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
                        <div class="card-body">
                            {{--                            <p style="" class="card-text">code: {{$domain->code}}</p>--}}
                            <strong class="card-text">Tên: {{$vps->name}}</strong>
                            <p class="card-text">Giá: {{$vps->price}}</p>
                            <p class="card-text">CPU:{{$vps->cpu}}</p>
                            <p class="card-text">Dung lượng:{{$vps->capacity}}</p>
                            <p class="card-text">Ram:{{$vps->ram}}</p>
                            <p class="card-text">Băng thông:{{$vps->bandwith}}</p>
                            <a href="{{route('admin.vpss.show', $vps->id)}}"
                               class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                            <a href="{{route('admin.vpss.edit', [$vps->id])}}"
                               class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                            <form style="display: inline-block" action="{{route('admin.vpss.destroy', [$vps->id])}}"
                                  method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                            </form>

                        </div>
                    </div>
                @empty
                @endforelse
            </div>


            <div class="text-right">
                {{--hien thi phan trang--}}
                {{ $vpss->links() }}
            </div>
        </div>
    </div>



@stop
