<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
            <th>{{ __('internshiptopic.id') }}</th>
            <th>{{ __('internshiptopic.infor') }}</th>
            <th class="test">{{__('internshiptopic.academic')}}</th>
            <th>{{ __('internshiptopic.status') }}</th>
            <th class="test">{{__('internshiptopic.date_intern')}}</th>
            <th>{{ __('internshiptopic.start_date') }}</th>
            <th class="test"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($internship_School as $item => $internship)
            <tr>
                <td><input type="checkbox" class="btn-check" value="{{ $internship->internship_id }}"></td>
                <td>{{ $internship_School->firstItem() + $item }}</td>


                <td>

                    <p class="list-item1">
                        {{$internship->name}}
                    </p>
                    <p class="list-item2">
                        {{$internship->email}}
                    </p>
                    <p class="list-item2">
                        {{$internship->phone}}
                    </p>

                </td>
                <td style="width: 15rem">

                    <p class="list-item1">
                        Trường: {{$internship->	school}}
                    </p>
                    <p class="list-item2">
                        Chuyên ngành: {{$internship->major}}
                    </p>

                </td>
                <td>
                    <span>{{ucfirst(array_search($internship->status,\App\Models\ConstantsModel::STATUS_INTERNSHIP))}}</span>
                </td>
                <td>{{$internship->date_create}}</td>
                <td>{{$internship_topic->start_date}}</td>

                <td class="test">
                    <a onclick="show({{$internship->internship_id}})"
                       class="btn btn-xs btn-info">
                        {{ __('general.view') }}
                    </a>

                    @can('internship-topic-update')
                        <a href="{{route('admin.internship-topic.edit', [$internship->internship_id])}}"
                           class="btn  btn-success btn-xs">{{ __('general.update') }}</a>
                    @endcan
                    @can('internship-topic-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $internship->internship_id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.internship-topic.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $internship->internship_id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">{{ __('customer.customer') }}</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $internship->internship_id }}"
                                                   style="display: none">
                                            <p>{{ __('general.confirm_delete') }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ __('general.close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-danger">{{ __('general.delete') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td style="text-align: center" colspan="5">{{ __('general.nodata') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="clearfix">
    <div style="float: right">
        {!! $internship_School->links() !!}
    </div>
</div>
