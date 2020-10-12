@extends('layout.master-unlogin')
@section('content')
    <div class="page-container">
        <div class="row justify-content-center login">
            <div class="col-md-5">
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
                                       class="col-md-4 col-form-label text-right">{{ __('general.email') }}</label>
                                <div class="col-md-6">
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
                                       class="col-md-4 col-form-label text-right">{{ __('general.password') }}</label>
                                <div class="col-md-6">
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
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('general.login') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
