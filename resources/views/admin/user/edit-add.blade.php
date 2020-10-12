@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">{{ __('sidebar.users') }}</h3>
        <form action="{{route('admin.users.store')}}" method="post">
            <input type="hidden" name="id" value="{{isset($user->id) ? $user->id: ''}}">
            @csrf
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ __('general.create') }}
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Tên *</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{isset($user->name) ? old('name', $user->name) : old('name')}}">
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Email *</label>
                            <input type="email" class="form-control" name="email"
                                   value="{{isset($user->email) ? old('email', $user->email) : old('email')}}">
                            <p class="help-block"></p>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>New Password *</label>
                            <input type="password" class="form-control" name="password">
                            <p class="help-block"></p>
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Phân quyền *</label>
                            <select name="id_role" class="form-control select2">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if (isset($user->id_role) && $user->id_role == $role->id) selected @endif>
                                        {{$role->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Phòng ban *</label>
                            <select name="id_department" class="form-control select2">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}} @if (isset($user->id_department) && $user->id_department == $department->id) selected @endif">
                                        {{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary">{{ __('general.save') }}</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
                </div>
            </div>
        </form>
    </div>
@stop