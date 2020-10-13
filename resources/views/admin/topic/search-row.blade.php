<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
            <th>{{ __('topic.id') }}</th>
            <th>{{ __('topic.name') }}</th>
            <th class="test">{{__('topic.category')}}</th>
            <th class="test">{{__('topic.support')}}</th>
            <th class="test"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($topics as $item => $topic)
            <tr>
                <td><input type="checkbox" class="btn-check" value="{{ $topic->id }}"></td>
                <td>{{ $topics->firstItem() + $item }}</td>
                <td>{{ $topic->name }}</td>
                <td class="test">{{ $topic->name_category }}</td>
                <td>{{ucfirst(array_search($topic->support,\App\Models\ConstantsModel::Support_Topic))}}</td>

                <td class="test">
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                            data-target="#viewModal{{ $topic->id }}">
                        {{ __('general.view') }}
                    </button>
                    <div class="modal fade" id="viewModal{{ $topic->id }}" tabindex="-1"
                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalLabel">{{ __('topic.topic') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table
                                        class="table table-bordered table-striped table-hover">
                                        <tbody>
                                        <tr>
                                            <td>{{ __('topic.name') }}</td>
                                            <td>{{ $topic->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('topic.category')}}</td>
                                            <td>{{ $topic->name_category }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('topic.support') }}</td>
                                            <td>{{ucfirst(array_search($topic->support,\App\Models\ConstantsModel::Support_Topic))}}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('topic.description') }}</td>
                                            <td>{{strip_tags(trim(html_entity_decode($topic->description,   ENT_QUOTES, 'UTF-8'), "\xc2\xa0"))}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ __('general.close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('topic-update')
                        <a href="{{route('admin.topic.edit', [$topic->id])}}"
                           class="btn  btn-success btn-xs">{{ __('general.update') }}</a>
                    @endcan
                    @can('topic-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $topic->id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.topic.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $topic->id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">{{ __('topic.topic') }}</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $topic->id }}"
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
        {!! $topics->links() !!}
    </div>
</div>
