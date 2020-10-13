<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
            <th>{{ __('contract.id') }}</th>
            <th>{{ __('contract.code') }}</th>
            <th>{{ __('contract.customer') }}</th>
            <th>{{ __('contract.contract_date') }}</th>
            <th class="test"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($contracts as $item => $contract)
            <tr>
                <td><input type="checkbox" class="btn-check" value="{{ $contract->id }}"></td>
                <td>{{ $contracts->firstItem() + $item }}</td>
                <td>{{ $contract->code }}</td>
                <td>{{ $contract->name }}</td>
                <td>{{date('d-m-Y', strtotime($contract->date_create))}}</td>
                <td class="test">
                    <a onclick="show({{$contract->id}})" class="btn btn-xs btn-info" >
                        {{ __('general.view') }}
                    </a>

                    @can('contract-update')
                        <a href="{{route('admin.contract.edit', [$contract->id])}}"
                           class="btn  btn-success btn-xs">{{ __('general.update') }}</a>
                    @endcan
                    @can('contract-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $contract->id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.contract.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $contract->id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">{{ __('contract.contract') }}</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $contract->id }}"
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
        {!! $contracts->links() !!}
    </div>
</div>
