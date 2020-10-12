@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title">Quyền</h3>
                            <form action="{{route('admin.hostings.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($hosting->id) ? $hosting->id: ''}}">
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

                                    </div>

                                    <div class="panel-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Tên *</label>
                                                    <input type="text" class="form-control" name="title"
                                                           value="{{isset($role->title) ? old('tile', $role->title) : old('title')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('title'))
                                                        <p class="help-block">
                                                            {{ $errors->first('title') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Mô tả</label>
                                                    <input type="text" class="form-control" name="description"
                                                           value="{{isset($role->description) ? old('description', $role->description) : old('description')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Vai trò</label>
                                                    <div class="row">
                                                        @foreach($permission_list as $role => $permission)
                                                            <div class="col-md-4 form-group">
                                                                <div class="permission">
                                                                    <div class="checkbox">
                                                                        <label class="student-item">
                                                                            <input type="checkbox" class="select-{{$role}}" data-screen="{{$role}}"
                                                                                   onchange="selectAll(this)">
                                                                            <b>{{ __('sidebar.'.$role) }}</b>
                                                                        </label>
                                                                    </div>
                                                                    <div class="child">
                                                                        @foreach($permission as $idx => $per)
                                                                            <div class="checkbox">
                                                                                <label class="permission-item">
                                                                                    <input class="check-{{$role}}" data-screen="{{$role}}"
                                                                                           @if (isset($choose_permission) && is_array($choose_permission)
                                                                                           && in_array($per['id'], $choose_permission)) checked @endif
                                                                                           type="checkbox" onchange="selectPermission(this)"
                                                                                           name="permissions[]" value="{{$per['id']}}">
                                                                                    <span>{{ __('sidebar.'.$per['title']) }}</span>
                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                            </div>

                                        </div>


                                        <hr>
                                            <button class="btn btn-primary">{{ __('general.save') }}</button>
                                            <a href="{{ route('admin.roles.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@stop
