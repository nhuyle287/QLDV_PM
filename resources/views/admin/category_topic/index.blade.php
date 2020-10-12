@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title" style="font-weight: bold;  font-size: 250%;">Quản lý danh mục đề
            tài</h3>
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
            <a href="{{route('admin.category_topic.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center; ">STT</th>
                        <th style="text-align: center;">Tên danh mục</th>
                        <th style="text-align: center; ">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($category as $category)
                        <tr>
                            <td>{{$category->category_id}}</td>
                            <td>{{ $category->name_category }}</td>

                            <td>
                                <a href="{{route('admin.category_topic.show', $category->category_id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.category_topic.edit', [$category->category_id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block"
                                      action="{{route('admin.category_topic.destroy', [$category->category_id])}}"
                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-right">
                    {{--                    {{ $topics->links() }}--}}
                </div>
            </div>
        </div>
    </div>

@stop
