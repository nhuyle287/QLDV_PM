@extends('layout.master')
@section('title')
    Email
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
        <h3 class="page-title" id="title">Quản Lý Email</h3>
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
            <a href="{{route('admin.emails.create')}}" class="btn btn-success btn-sm"><i
                    class="fas fa-plus"></i> {{ __('general.create') }}</a>
        </p>


        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="grid-container" id="domains">
                @forelse($emails as $email)
                    <div class="card card-sytle">
                        {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
                        <div class="card-body">
                            <strong style="color: rgba(251,105,1,0.98)" class="card-text">{{$email->name}}</strong>
                            <p class="card-text">Giá: {{$email->price}}</p>
                            <p class="card-text">Dung lượng: {{$email->capacity}}</p>
                            <p class="card-text">Email Number:{{$email->email_number}}</p>
                            <p class="card-text">Email Forwarder:{{$email->email_forwarder}}</p>
                            <p class="card-text">Email List:{{$email->email_list}}</p>
                            <p class="card-text">Parked-domains:{{$email->parked_domains}}</p>
                            <div style="text-align: center">
                                <a href="{{route('admin.emails.show', $email->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.emails.edit', [$email->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block"
                                      action="{{route('admin.emails.destroy', [$email->id])}}"
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
                {{ $emails->links() }}
            </div>
        </div>
    </div>



@stop
