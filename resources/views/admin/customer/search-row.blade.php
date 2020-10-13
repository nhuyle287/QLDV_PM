<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
            <th>{{ __('customer.id') }}</th>
            <th>{{ __('customer.name') }}</th>
            <th class="test">Email</th>
            <th>{{ __('customer.phone') }}</th>

            <th class="test"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($customers as $item => $cus)
            <tr>
                <td><input type="checkbox" class="btn-check" value="{{ $cus->id }}"></td>
                <td>{{ $customers->firstItem() + $item }}</td>
                <td>{{ $cus->name }}</td>
                <td class="test">{{ $cus->email }}</td>
                <td>{{ $cus->phone_number }}</td>

                <td class="test">
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#viewModal{{ $cus->id }}">
                        {{ __('general.view') }}
                    </button>
                    <div class="modal fade" id="viewModal{{ $cus->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('customer.customer') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tbody>
                                        <tr>
                                            <td>{{ __('customer.name') }}</td>
                                            <td>{{ $cus->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $cus->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.address') }}</td>
                                            <td>{{ $cus->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.phone') }}</td>
                                            <td>{{ $cus->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.nameStore') }}</td>
                                            <td>{{ $cus->nameSote }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.position') }}</td>
                                            <td>{{ $cus->position }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.fax_number') }}</td>
                                            <td>{{ $cus->fax_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.tax_number') }}</td>
                                            <td>{{ $cus->tax_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.account_number') }}</td>
                                            <td>{{$cus->account_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.open_at') }}</td>
                                            <td>{{ $cus->open_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('customer.note') }}</td>
                                            <td>{{ $cus->note }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('customer-update')
                        <a href="{{route('admin.customers.edit', [$cus->id])}}"
                           class="btn  btn-success btn-xs">{{ __('general.edit') }}</a>
                    @endcan
                    @can('customer-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteItemModal{{ $cus->id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.customers.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $cus->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('customer.customer') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $cus->id }}" style="display: none">
                                            <p>{{ __('general.confirm_delete') }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.close') }}</button>
                                            <button type="submit" class="btn btn-danger">{{ __('general.delete') }}</button>
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
        {!! $customers->links() !!}
    </div>
</div>
