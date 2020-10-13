<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
            <th>{{ __('internship.id') }}</th>
            <th>{{ __('internship.infor') }}</th>
            <th class="test">{{__('internship.academic')}}</th>
            <th>{{ __('internship.status') }}</th>
            <th>{{ __('internship.date_intern') }}</th>
            <th class="test"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($internship_Schools as $item => $internship)
            <tr>
                <td><input type="checkbox" class="btn-check" value="{{ $internship->internship_id }}"></td>
                <td>{{ $internship_Schools->firstItem() + $item }}</td>
                <td>

                    <p style="text-align: center">
                        <img src="{{URL::asset("images/internship/{$internship->image}")}}"
                             style="width: 50px" style="height: 10px" alt="error"/>
                    </p>
                    <p class="list-item1" >
                        {{$internship->name}}
                    </p>
                    <p class="list-item2">
                        {{$internship->email}}
                    </p>
                    <p class="list-item2">
                        {{$internship->phone}}
                    </p>

                </td>
                <td style="width: 18rem">

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
                <td>{{date('d-m-Y', strtotime($internship->date_create))}}
                </td>
                <td class="test">
                    <a onclick="show({{$internship->internship_id}})" class="btn btn-xs btn-info"                                                    >
                        {{ __('general.view') }}
                    </a>

                    @can('internship-update')
                        <a href="{{route('admin.internship.edit', [$internship->internship_id])}}"
                           class="btn  btn-success btn-xs">{{ __('general.update') }}</a>
                    @endcan
                    @can('internship-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $internship->internship_id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.internship.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $internship->internship_id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">{{ __('internship.internship') }}</h5>
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
        {!! $internship_Schools->links() !!}
    </div>
</div>
