<div class="card rollIn">
    <div class="card-header">
        <h5 class="modal-title"
            id="exampleModalLabel">{{ __('internshiptopic.internship') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">

            <tbody>
            @if (count($internship) > 0)
                @foreach($internship as $internship)
                    <tr>
                        <th>Apply</th>
                        <td>
                            {{$internship->date_create}}
                        </td>
                    </tr>
                    <tr>
                        <th>Nominee</th>
                        <td>
                            {{$internship->position}}
                        </td>
                    </tr>
                    <tr>
                        <th>Start Date Do Job</th>
                        <td>
                            {{$internship_topic->start_date}}
                        </td>
                    </tr>
                    <tr>
                        <th>Topic</th>
                        <td>
                            {{$internship_topic->name}}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" STYLE="text-align: center">THÔNG TIN CÁ NHÂN</th>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="{{URL::asset("images/internship/{$internship->image}")}}" style="width: 50px"
                                 style="height: 10px" alt="error"/>
                        </td>
                    </tr>

                    <tr>
                        <th>Name</th>
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
                        <th>Address</th>
                        <td>
                            {{$internship->address}}
                        </td>
                    </tr>
                    <tr>
                        <th>Address Current</th>
                        <td>
                            {{$internship->addresscurrent}}
                        </td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            {{$internship->gender}}
                        </td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>
                            {{$internship->phone}}
                        </td>
                    </tr>
                    <tr>
                        <th>Birthday</th>
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
                        <th>Range Date</th>
                        <td>
                            {{$internship->range_date}}
                        </td>
                    </tr>
                    <tr>
                        <th>Issuaed By</th>
                        <td>
                            {{$internship->issued_by}}
                        </td>
                    </tr>
                    <tr>
                        <th>Name Family</th>
                        <td>
                            {{$internship->name_family}}
                        </td>
                    </tr>
                    <tr>
                        <th>Phone Family</th>
                        <td>
                            {{$internship->phone_family}}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" STYLE="text-align: center">TRÌNH ĐỘ HỌC VẤN</th>
                    </tr>

                    <tr>
                        <th>School</th>
                        <td>
                            {{$internship->school}}
                        </td>
                    </tr>
                    <tr>
                        <th>Major</th>
                        <td>
                            {{$internship->major}}
                        </td>
                    </tr>
                    <tr>
                        <th>Degree</th>
                        <td>
                            {{$internship->degree}}
                        </td>
                    </tr>
                    <tr>
                        <th>Classification</th>
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
                                <th>Certificate</th>
                                <td>
                                    {{$cer->name_certificate}}
                                </td>
                            </tr>
                            <tr>
                                <th>Trainining Places</th>
                                <td>
                                    {{$cer->training_places}}
                                </td>
                            </tr>
                            <tr>
                                <th>Score</th>
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
                                <th>Start Date Project</th>
                                <td>
                                    {{$pro->date_project}}
                                </td>
                            </tr>
                            <tr>
                                <th>Name Project</th>
                                <td>
                                    {{$pro->name_project}}
                                </td>
                            </tr>
                            <tr>
                                <th>Name Company</th>
                                <td>
                                    {{$pro->name_company}}
                                </td>
                            </tr>
                            <tr>
                                <th>Content Job</th>
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
                                <th>Languages</th>
                                <td>
                                    {{$lan->language_name}}
                                </td>
                            </tr>
                            <tr>
                                <th>Litening</th>
                                <td>
                                    {{$lan->listen}}
                                </td>
                            </tr>
                            <tr>
                                <th>Witing</th>
                                <td>
                                    {{$lan->write}}
                                </td>
                            </tr>
                            <tr>
                                <th>Reading</th>
                                <td>
                                    {{$lan->read}}
                                </td>
                            </tr>
                            <tr>
                                <th>Speaking</th>
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
                        <th>Status</th>
                        <td>
                            {{ucfirst(array_search($internship->status,\App\Models\ConstantsModel::STATUS_INTERNSHIP))}}

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="event_">
        <button type="button" class="btn btn-danger float-right" id="cancel-button" style="margin-right: 1rem">Hủy bỏ
        </button>

    </div>
</div>
<!-- /.card -->

