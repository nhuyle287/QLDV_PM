<div class="panel-body table-responsive">
    <div id="content">
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                <th class="thstyleform">STT</th>
                <th class="thstyleform">Tên Khách hàng</th>
                <th class="thstyleform">Tên dịch vụ</th>
                <th class="thstyleform">Ngày Bắt Đầu<p class="pstyleform1">Ngày Kết Thúc</p>
                </th>
                <th class="thstyleform">Trạng thái</th>
                <th class="thstyleform">Chức năng</th>
            </tr>
            </thead>
            <tbody id="myTableBody">

            <?php $i = 0?>
            @if($register_services!==null)
                @forelse($register_services as $register_service)
                    <tr>
                        <td><input type="checkbox" class="btn-check"
                                   value="{{ $register_service->id }}"></td>
                        <td class="thstyleform">{{$i+1}}</td>
                        <td class="thstyleform">{{$register_service->customer_name}}
                            <p class="pstyleform1">{{$register_service->customer_email}}</p>
                        </td>
                        <td class="thstyleform">{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}
                            <p class="pstyleform1">{{$register_service->address_domain}}</p>
                        </td>

                        <td class="thstyleform">{{ date('d-m-Y', strtotime($register_service->start_date))}}
                            <p class="pstyleform1">{{date('d-m-Y',strtotime($register_service->end_date))}}</p></td>

                        <td class="thstyleform"
                            @if($register_service->status=='Quá hạn') style="color: red; "
                            @else @if($register_service->status=='Đang hoạt động') style=""
                            @else style="color: #0040FF" @endif @endif>{{$register_service->status}}

                        </td>
                        <td class="thstyleform">
                            <button type="button" class="btn btn-xs btn-info"
                                    data-toggle="modal"
                                    data-target="#viewModal{{ $register_service->id }}">
                                {{ __('general.view') }}
                            </button>
                            <div class="modal fade" id="viewModal{{ $register_service->id }}"
                                 tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">Dịch vụ</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table
                                                class="table table-bordered table-striped table-hover view">
                                                <tbody>
                                                <tr>
                                                    <th>STT</th>
                                                    <td>{{ $register_service->id }}</td>

                                                </tr>
                                                <tr>
                                                    <th>Mã dịch vụ</th>
                                                    <td>{{ $register_service->code }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tên khách hàng</th>
                                                    <td>{{ $register_service->customer_name }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Tên dịch vụ</th>
                                                    <td>{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}</td>
                                                </tr>
                                                <tr>

                                                    <th>Ngày bắt đầu</th>
                                                    <td>{{ $register_service->start_date }}</td>
                                                </tr>
                                                <tr>

                                                    <th>Ngày kết thúc</th>
                                                    <td>{{ $register_service->end_date }}</td>
                                                </tr>

                                                <tr>

                                                    <th>Ghi chú</th>
                                                    <td>{{ $register_service->notes }}</td>
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
                            @can('list-service-management-update')
                                <a href="{{route('admin.list-services.edit', [$register_service->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                            @endcan
                            @can('list-service-management-delete')
                                <button type="button" class="btn btn-xs btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteItemModal{{ $register_service->id }}">
                                    {{ __('general.delete') }}
                                </button>
                                <form action="{{ route('admin.list-services.destroy') }}"
                                      method="POST">
                                    @csrf
                                    <div class="modal fade"
                                         id="deleteItemModal{{ $register_service->id }}"
                                         tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabel">Dịch vụ</h5>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" name="id"
                                                           value="{{ $register_service->id }}"
                                                           style="display: none">
                                                    <p>{{ __('general.confirm_delete') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('general.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ __('general.delete') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endcan
                            @if($register_service->status == 'Quá hạn')
                                <a href="{{route('admin.list-services.extend', $register_service->id)}}
                                    " class="btn btn-xs btn-info">Gia hạn</a>
                            @endif
                        </td>
                        <?php $i++?>
                    </tr>
                @empty
                @endforelse
            @endif

            @if($register_softs!==null)
                @forelse($register_softs as $register_soft)
                    <tr>
                        <td><input type="checkbox" class="btn-check2"
                                   value="{{ $register_soft->id }}"></td>
                        <td class="thstyleform">{{++$count}}</td>
                        <td class="thstyleform">{{$register_soft->customer_name}}
                            <p class="pstyleform1">{{$register_soft->customer_email}}</p>
                        </td>
                        <td class="thstyleform">{{$register_soft->software}}</td>
                        <td class="thstyleform">{{ date('d-m-Y', strtotime($register_soft->start_date))}}
                            <p class="pstyleform1">{{date('d-m-Y',strtotime($register_soft->end_date))}}</p></td>
                        @if($register_soft->end_date<now())
                            <td class="thstyleform" style="color: red">Quá hạn</td>
                        @else
                            <td class="thstyleform">Đang hoạt động</td>
                        @endif
                        <td class="thstyleform">
                            <button type="button" class="btn btn-xs btn-info"
                                    data-toggle="modal"
                                    data-target="#viewModal1{{ $register_soft->id }}">
                                {{ __('general.view') }}
                            </button>
                            <div class="modal fade" id="viewModal1{{ $register_soft->id }}"
                                 tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">Phần mềm</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table
                                                class="table table-bordered table-striped table-hover view">
                                                <tbody>
                                                <tr>
                                                    <th>STT</th>
                                                    <td>{{ $register_soft->id }}</td>

                                                </tr>

                                                <tr>
                                                    <th>Tên Khách Hàng</th>
                                                    <td>{{$register_soft->customer_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tên Nhân Viên</th>
                                                    <td>{{$register_soft->staff_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Loại Phần Mềm</th>
                                                    <td>{{$register_soft->typesoftware}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gói Phần Mềm</th>
                                                    <td>{{$register_soft->software}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Giá Phần Mềm</th>
                                                    <td>{{$register_soft->price}} </td>
                                                </tr>
                                                <tr>

                                                    <th>Ngày bắt đầu</th>
                                                    <td>{{ $register_soft->start_date }}</td>
                                                </tr>
                                                <tr>

                                                    <th>Ngày kết thúc</th>
                                                    <td>{{ $register_soft->end_date }}</td>
                                                </tr>

                                                <tr>

                                                    <th>Ghi chú</th>
                                                    <td>{{ $register_soft->notes }}</td>
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
                            @can('list-service-management-update')
                                <a href="{{route('admin.admin.register-softs.edit', [$register_soft->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                            @endcan
                            @can('list-service-management-delete')
                                <button type="button" class="btn btn-xs btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteItemModal{{ $register_soft->id }}">
                                    {{ __('general.delete') }}
                                </button>
                                <form action="{{ route('admin.register-softs.destroy') }}"
                                      method="POST">
                                    @csrf
                                    <div class="modal fade"
                                         id="deleteItemModal{{ $register_soft->id }}"
                                         tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabel">Dịch vụ</h5>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" name="id"
                                                           value="{{ $register_soft->id }}"
                                                           style="display: none">
                                                    <p>{{ __('general.confirm_delete') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('general.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ __('general.delete') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endcan
                            @if($register_soft->end_date<now())
                                <a href="{{route('admin.register-softs.extend', $register_soft->id)}}
                                    " class="btn btn-xs btn-info">Gia hạn</a>

                            @endif

                        </td>

                    </tr>

                @empty
                @endforelse
            @endif
            </tbody>
        </table>
    </div>
    <div class="text-right float-right" id="page">
        <div class="col-md-12 text-center ">
            <ul class="pagination pagination-lg pager" id="myPager"></ul>
        </div>

    </div>
</div>
<script>
    $.fn.pageMe = function(opts){
        var $this = this,
            defaults = {
                perPage: 10,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this;
        var perPage = settings.perPage;
        var children = listElement.children();
        var pager = $('.pager');

        if (typeof settings.childSelector!="undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector!="undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.length;
        var numPages = Math.ceil(numItems/perPage);

        // alert(numPages);
        pager.data("curr",0);

        if (settings.showPrevNext){
            $('<li><a href="#" class="prev_link btn btn-default">«</a></li>').appendTo(pager);
        }

        var curr = 0;
        if(numPages>1)
        {
            while(numPages > curr && (settings.hidePageNumbers==false)){
                $('<li><a href="#" class="page_link btn btn-default">'+(curr+1)+'</a></li>').appendTo(pager);
                curr++;
            }
        }


        if (settings.showPrevNext){
            $('<li><a href="#" class="next_link btn btn-default">»</a></li>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages<=1) {
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");

        children.hide();
        children.slice(0, perPage).show();

        pager.find('li .page_link').click(function(){
            var clickedPage = $(this).html().valueOf()-1;
            goTo(clickedPage,perPage);
            return false;
        });
        pager.find('li .prev_link').click(function(){
            previous();
            return false;
        });
        pager.find('li .next_link').click(function(){
            next();
            return false;
        });

        function previous(){
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }

        function next(){
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page){
            var startAt = page * perPage,
                endOn = startAt + perPage;

            children.css('display','none').slice(startAt, endOn).show();

            if (page>=1) {
                pager.find('.prev_link').show();
            }
            else {
                pager.find('.prev_link').hide();
            }

            if (page<(numPages-1)) {
                pager.find('.next_link').show();
            }
            else {
                pager.find('.next_link').hide();
            }

            pager.data("curr",page);
            pager.children().removeClass("active");
            pager.children().eq(page+1).addClass("active");

        }
    };

    $(document).ready(function(){

        $('#myTableBody').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:$("#showRow :selected").val()});
    });
</script>
