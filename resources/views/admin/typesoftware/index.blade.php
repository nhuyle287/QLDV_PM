@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title" style="font-weight: bold;  font-size: 250%;">Quản Lý Loại Phần Mềm</h3>
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
            <a href="{{route('admin.typesoftwares.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead >
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center; ">STT</th>
                        <th style="text-align: center; ">Tên Loại</th>
                        <th style="text-align: center; ">Mô tả</th>

                        <th style="text-align: center; ">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($type_software as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td>{{ $type->name }}</td>
                            <td >{{ $type->description }}</td>
{{--                            style="text-overflow: ellipsis;width: 300px;height: 51px;overflow: hidden;white-space: nowrap;"--}}
{{--                            <td>{{ strip_tags(html_entity_decode($type->description)) }}</td>--}}

                            <td>
                                <a href="{{route('admin.typesoftwares.show', $type->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.typesoftwares.edit', [$type->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.typesoftwares.destroy', [$type->id])}}"
                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
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
                    {{ $type_software->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
