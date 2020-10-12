@extends('layout.master')
@section('css')
    <style>
        .list-item2 {
            color: #9e9e9ede;
        }

        #title {
            font-weight: bold;
            font-size: 130%;
            background-color: #218fe6;
            color: white;
            text-align: center;
            padding-top: 6px;
            height: 40px;

        }

        .content {
            padding: 10px;
        }

        #content {

            border: 1px solid #0000004d;
            border-radius: 5px;
            margin-bottom: 10px
        }

        .panel {
            margin: 10px 15px;
        }

        table td, table th {
            padding: 0.25rem !important;

        }
    </style>


@stop
@section('content')
    <div class="content" style="padding: 10px;">
        <div id="content">
            <h3 class="page-title" id="title">Quản Lý Sinh
                Viên</h3>
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

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr style="background-color: #ffc107">
                            <th style="text-align: center; ">Thông Tin Thực Tập Sinh</th>
                            <th style="text-align: center; ">Trình Độ Học Vấn</th>
                            <th style="text-align: center; ">T.Thái</th>
                            <th style="text-align: center; ">Ngày Dự Kiến TT</th>
                            <th style="text-align: center; ">Ngày Bắt Đầu TT</th>
                            <th style="text-align: center; ">Chức Năng</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($internship_School as $internship)
                            <tr>

                                <td>
                                    <ul style="list-style-type: none">
                                        <li class="list-item1">
                                            {{$internship->name}}
                                        </li>
                                        <li class="list-item2">
                                            {{$internship->email}}
                                        </li>
                                        <li class="list-item2">
                                            {{$internship->phone}}
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style-type: none">
                                        <li class="list-item1">
                                            Trường: {{$internship->	school}}
                                        </li>
                                        <li class="list-item2">
                                            Chuyên ngành: {{$internship->major}}
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <span>{{ucfirst(array_search($internship->status,\App\Model\ConstantsModel::STATUS_INTERNSHIP))}}</span>
                                </td>
                                <td>{{$internship->date_create}}</td>
                                <td>{{$internship_topic->start_date}}</td>
                                <td>
                                    <a href="{{route('admin.internship_topic.show', $internship->internship_id)}}"
                                       class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                    <a href="{{route('admin.internship_topic.edit', [$internship->internship_id])}}"
                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                    <form style="display: inline-block"
                                          action="{{route('admin.internship_topic.destroy', [$internship->internship_id])}}"
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
                        {{$internship_School->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop


