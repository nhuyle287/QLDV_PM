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
        <h3 class="page-title" style="font-weight: bold;font-size: 250%;">Quản Lý Domain</h3>
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
            <a href="{{route('admin.hostings.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
                    <div class="grid-container" id="container">
                        @forelse($hostings as $hosting)
                            <div class="card card-sytle" id="card">
{{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
                                <div class="card-body">
                                    <strong style="" class="card-text">Tên Hosting: {{$hosting->name}}</strong>
                                    <p class="card-text">Giá: {{$hosting->price}}</p>
                                    <p class="card-text">Dung lượng: {{$hosting->capacity}}</p>
                                    <p class="card-text">Băng thông:{{$hosting->bandwith}}</p>
                                    <a href="{{route('admin.hostings.show', $hosting->id)}}"
                                       class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                    <a href="{{route('admin.hostings.edit', [$hosting->id])}}"
                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                    <form style="display: inline-block" action="{{route('admin.hostings.destroy', [$hosting->id])}}"
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
                    {{ $hostings->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
