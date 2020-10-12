@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title" style="font-weight: bold;  font-size: 250%;">Quản lý đề
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
            <a href="{{route('admin.topic.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center; ">STT</th>
                        <th style="text-align: center; ">Tên Đề Tài</th>
                        <th style="text-align: center; ">Danh Mục</th>
                        <th style="text-align: center;">Mô Tả</th>

                        <th style="text-align: center; ">Hỗ Trợ</th>

                        <th style="text-align: center; ">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($topics as $tpic)
                        <tr>
                            <td>{{$tpic->id}}</td>
                            <td>{{ $tpic->name }}</td>
                            <td>
                                @foreach($category_topic as $category)
                                    @if($tpic->category_id==$category->category_id)
                                        {{$category->name_category}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $tpic->description }}</td>
                            <td>{{ $tpic->support }}</td>
                            <td>
                                <a href="{{route('admin.topic.show', $tpic->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.topic.edit', [$tpic->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block"
                                      action="{{route('admin.topic.destroy', [$tpic->id])}}"
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
