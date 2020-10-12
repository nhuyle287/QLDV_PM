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
        }

        .panel {
            margin: 10px 15px;
        }
        table td, table th{
            padding: 0.25rem !important;

        }
    </style>


@stop
@section('content')
    <div class="content" style="padding: 10px">
        <div id="content">
            <h3 class="page-title" id="title">Quản Lý Sinh Viên Thực Tập</h3>
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
                            <th style="text-align: center; ">Trạng Thái</th>
                            <th style="text-align: center;">Ngày Dự Kiến Thực Tập</th>
                            <th style="text-align: center; ">Chức năng</th>

                        </tr>
                        </thead>
                        <tbody>
                        <input type="hidden" value="{{count($internship_School)}}" id="length">
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
                                <td>{{date('d-m-Y', strtotime($internship->date_create))}}
                                </td>
                                <td>
                                    <a href="{{route('admin.internship.show', $internship->internship_id)}}"
                                       class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                    <a href="{{route('admin.internship.edit', [$internship->internship_id])}}"
                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                    <form style="display: inline-block"
                                          action="{{route('admin.internship.destroy', [$internship->internship_id])}}"
                                          method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                    </form>
                                    @if($internship->status === 3)
                                        <button style="" id="btnRegister" type="button" class="btn btn-xs btn-primary"
                                                data-id="{{$internship->internship_id}}"
                                                data-toggle="modal" data-target="#myModal">Đăng ký
                                        </button>

                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                    <div class="text-right" style="float: right">
                        {{ $internship_School->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đăng ký đề tài sinh viên</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('admin.internship_topic.insert')}}" method="POST">
                        @csrf
                        <input type="hidden" name="internship_id" id="internship_id" value="">
                        <div class="form-group">
                            {{--                                                    <label for="ten">Tên sinh viên:</label>--}}
                            {{--                                                    <input type="text" class="form-control" id="name" name="name"  value="">--}}
                            <label for="ten">Chọn đề tài:</label><br>
                            <select style="width: 300px;height: 35px; border: 1px solid #ced4da;" name="topic_id">
                                <option value="option_select" disabled selected>Chọn đề tài</option>
                                @foreach($topic as $topic)
                                    <option value="{{$topic->id}}">{{$topic->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label for="ten">Ngày bắt đầu:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="">
                            <label for="ten">Mục đích làm việc:</label>
                            <input type="text" class="form-control" id="purpose" name="purpose" value="">

                        </div>
                        <div class="form-group">
                        </div>

                        <button style="background: green;color: white;" type="submit" class="btn btn-default">Save
                        </button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@section('javascript')
    <script>
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #internship_id').val(id);
            modal.find('.modal-body #topic_id option:selected').text();
            modal.find('.modal-body #start_date').val();
            modal.find('.modal-body #purpose').val();
            // modal.find('.modal-body #name').val(name);

        })
    </script>
@stop

@stop
