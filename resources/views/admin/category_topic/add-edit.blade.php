@extends('layout.master')
@section('content')
    {{--  main    --}}
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title" style="font-weight: bold;  font-size: 200%;">Danh mục đề tài</h3>
                            <form action="{{route('admin.category_topic.store')}}" method="post">
                                <input type="hidden" name="category_id" value="{{isset($category_topic->category_id) ? $category_topic->category_id: ''}}">
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

                                    <div class="panel-body" >
                                        <div class="form-row">
                                            <div class="form-group col-md-12 col-xs-12 d-flex flex-lg-nowrap">

                                                    <label class="col-md-2">Category Name <span class="aster">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="name_category"
                                                               value="{{isset($category_topic->name_category) ? old('name_category', $category_topic->name_category) : old('name_category')}}">
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                    @if($errors->has('name_category'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('name_category') }}
                                                        </p>
                                                    @endif

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">

                                            </div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.category_topic.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
