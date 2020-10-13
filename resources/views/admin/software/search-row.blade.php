<div class="grid-container" id="domains">
    @forelse($softwares as $software)
        <div class="card card-sytle">
            {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
            <div class="card-body">
                <strong style="color: rgba(251,105,1,0.98)" class="card-text">{{$software->name}}</strong>
                <p class="card-text">Giá đăng ký: {{$software->price}} VNĐ</p>
                <p class="card-text">Chi nhánh: {{$software->quantity_branch}}</p>
                <p class="card-text">Nhân viên: {{$software->quantity_staff}}</p>
                <p class="card-text">Tài khoản: {{$software->quantity_acc}}</p>
                <p class="card-text">Sản phẩm/Dịch vụ: {{$software->quantity_product}}</p>
                <p class="card-text">Số hóa đơn/tháng: {{$software->quantity_bill}}</p>
                <div style="text-align: center">
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                            data-target="#viewModal{{ $software->id }}">
                        {{ __('general.view') }}
                    </button>
                    <div class="modal fade" id="viewModal{{ $software->id }}" tabindex="-1"
                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalLabel">Phần mềm</h5>
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
                                            <td>STT</td>
                                            <td>{{ $software->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tên phần mềm</td>
                                            <td>{{ $software->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Chi nhánh</td>
                                            <td>{{ $software->quantity_branch }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nhân viên</td>
                                            <td>{{ $software->quantity_staff }}</td>
                                        </tr>

                                        <tr>
                                            <td>Tài khoản</td>
                                            <td>{{ $software->quantity_acc }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sản phẩm/Dịch vụ</td>
                                            <td>{{ $software->quantity_product }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số hóa đơn/tháng</td>
                                            <td>{{ $software->quantity_bill }}</td>
                                        </tr>
                                        <tr>
                                            <td>Giá</td>
                                            <td>{{ $software->price }}</td>
                                        </tr>

                                        <tr>
                                            <td>Ghi chú</td>
                                            <td>{{ $software->notes }}</td>
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
                    @can('software-update')
                        <a href="{{route('admin.softwares.edit', [$software->id])}}"
                           class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                    @endcan
                    @can('software-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $software->id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.softwares.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $software->id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">Hosting</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $software->id }}"
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


                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>


<div class="text-right">

    {{ $softwares->links() }}
</div>
