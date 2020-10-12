@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title">Phòng Ban</h3>
                            <form action="{{route('admin.roles.store')}}" method="post">
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
{{--                                    <div class="panel-heading">--}}
{{--                                        {{ __('general.create') }}--}}
{{--                                    </div>--}}

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <label>Tên Phòng *</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <label>Mã Phòng Ban *</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <label>Mô tả </label>
                                                <textarea rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <hr>
                                        <button class="btn btn-info">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.departments.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
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
