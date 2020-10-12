@extends('layout.master')
@section('css')
    <style>
        ul{
            list-style-type: none;
        }
    </style>


@stop
@section('content')

    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"  style="font-weight: bold;  font-size: 200%;">Thông tin sinh viên</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">

                                <tbody>
                                @if (count($internship) > 0)
                                @foreach($internship as $internship)
                                    <tr>
                                        <th>Ngày Nộp</th>
                                        <td>
                                            {{$internship->date_create}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Vị Trí Ứng Tuyển</th>
                                        <td>
                                            {{$internship->position}}
                                        </td>
                                    </tr>

                                   <tr>
                                       <th colspan="2" STYLE="text-align: center">THÔNG TIN CÁ NHÂN</th>
                                   </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <img src="{{URL::asset("images/internship/{$internship->image}")}}" style="width: 50px"
                                                 style="height: 10px" alt="error" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Họ Và Tên</th>
                                        <td>
                                            {{$internship->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            {{$internship->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Địa Chỉ</th>
                                        <td>
                                            {{$internship->address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Đại Chỉ Hiện Tại</th>
                                        <td>
                                            {{$internship->addresscurrent}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Giới Tính</th>
                                        <td>
                                            {{$internship->gender}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Số Điện Thoại</th>
                                        <td>
                                            {{$internship->phone}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Ngày Sinh</th>
                                        <td>
                                            {{$internship->birthday}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>CMND</th>
                                        <td>
                                            {{$internship->cmnd}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Ngày Cấp</th>
                                        <td>
                                            {{$internship->range_date}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nơi Cấp</th>
                                        <td>
                                            {{$internship->issued_by}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Họ Và Tên Người Thân</th>
                                        <td>
                                            {{$internship->name_family}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Số Điện Thoại Người Thân</th>
                                        <td>
                                            {{$internship->phone_family}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" STYLE="text-align: center">TRÌNH ĐỘ HỌC VẤN</th>
                                    </tr>

                                    <tr>
                                        <th>Trường</th>
                                        <td>
                                            {{$internship->school}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Chuyên Ngành</th>
                                        <td>
                                            {{$internship->major}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Bằng Cấp</th>
                                        <td>
                                            {{$internship->degree}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Loại</th>
                                        <td>
                                            {{$internship->loai}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" STYLE="text-align: center">Chứng chỉ</th>
                                    </tr>
                                    @if (count($certificate) > 0)
                                        @foreach($certificate as $cer)
                                            <tr>
                                                <th>Tên Chứng Chỉ</th>
                                                <td>
                                                    {{$cer->name_certificate}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nơi Đào Tạo</th>
                                                <td>
                                                    {{$cer->training_places}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Điểm</th>
                                                <td>
                                                    {{$cer->score}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <th colspan="2" STYLE="text-align: center">DỰ ÁN</th>
                                    </tr>
                                    @if (count($project) > 0)
                                    @foreach($project as $pro)
                                        <tr>
                                            <th>Thời Gian</th>
                                            <td>
                                                {{$pro->date_project}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tên Dự Án</th>
                                            <td>
                                                {{$pro->name_project}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tên Công Ty</th>
                                            <td>
                                                {{$pro->name_company}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nội Dung Công Việc</th>
                                            <td>
                                                {{$pro->content_job}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>

                                            </th>
                                        </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <th colspan="2" STYLE="text-align: center">NGÔN NGỮ</th>
                                    </tr>
                                    @if (count($languages) > 0)
                                    @foreach($languages as $lan)
                                    <tr>
                                        <th>Ngoại Ngữ</th>
                                        <td>
                                            {{$lan->language_name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nghe</th>
                                        <td>
                                            {{$lan->listen}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Viết</th>
                                        <td>
                                            {{$lan->write}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Đọc</th>
                                        <td>
                                            {{$lan->read}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nói</th>
                                        <td>
                                            {{$lan->speak}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <th>Trạng Thái</th>
                                        <td>
                                            {{ucfirst(array_search($internship->status,\App\Model\ConstantsModel::STATUS_INTERNSHIP))}}

                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.internship.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
