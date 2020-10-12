@extends('layout.master-unlogin')
@section('title')
    Đăng nhập
@stop
@section('head')
    <link rel="stylesheet" href="css/login.css">
@stop
@section('content')

    <div class="page-container login">
        <div class="row justify-content-center login">
            <div class="login_box">
                <div class="card">
                    <div class="card-header">{{ __('general.login') }}</div>
                    <div class="card-body">
                        @if(session('fail'))
                            <div class="alert alert-danger">
                                {{session('fail')}}
                            </div>
                        @endif
                        <form action="{{route('postLogin')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-3 col-ms-4 col-form-label text-left">{{ __('general.email') }}</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="email" id="email" class="form-control" name="email"
                                           value="@if(request('email')){{request('email')}}@endif{{ old('email') }}"
                                           autofocus>
                                    @if($errors->has('email'))
                                        <p class="help-block">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-3 col-form-label text-left">{{ __('general.password') }}</label>
                                <div class="col-md-6  col-xs-12">
                                    <input type="password" id="password" class="form-control"
                                           value="{{old('password')}}"
                                           name="password">
                                    @if($errors->has('password'))
                                        <p class="help-block">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                    <button type="submit" class="btn btn-sm" id="login">
                                        {{ __('general.login') }}
                                    </button>


                            </div>
                        </form>
                        <br>
                        <br>
                            <strong> <a href="/" class="singup" >Đăng ký tài khoản</a><span> / </span>
                                <a href="#" class="reset_pass">Quên mật khẩu</a></strong>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
