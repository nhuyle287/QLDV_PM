@inject('request', 'Illuminate\Http\Request')
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #000000">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="{{ $request->segment(2) == 'customers' ? 'active active-sub' : '' }}">
                    <a href="{{route("admin.customers.index")}}" class="nav-link">
                        <i class="fa fa-child"></i>
                        <p>
                            Khách hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fa fa-briefcase"></i>
                        <p>
                            Quản lý dịch vụ
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item {{ $request->segment(2) == 'domains' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.domains.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý tên miền</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'hostings' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.hostings.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý Hosting</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'vpss' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.vpss.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý VPS</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'emails' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.emails.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý dịch vụ Email</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'ssls' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.ssls.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý dịch vụ SSL</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'websites' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.websites.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý dịch vụ Website</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{--                <li class="{{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">--}}
                {{--                    <a href="{{route("admin.register_services.index")}}"  class="nav-link">--}}
                {{--                        <i class="fa fa-gift"></i>--}}
                {{--                        <p>--}}
                {{--                            Đăng ký dịch vụ--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fa fa-gift"></i>
                        <p>
                            Đăng ký dịch vụ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item {{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.register_services.registerdomain")}}" class="nav-link">
                                <i class="fas fa-registered"></i>
                                <p>Đăng ký Domain</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.register_services.registerhosting")}}" class="nav-link">
                                <i class="fas fa-registered"></i>
                                <p>Đăng ký Hosting</p>
                            </a>
                        </li>

                        <li class="nav-item {{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.register_services.registervps")}}" class="nav-link">
                                <i class="fas fa-registered"></i>
                                <p>Đăng ký VPS</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.register_services.registeremail")}}" class="nav-link">
                                <i class="fas fa-registered"></i>
                                <p>Đăng ký Email</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.register_services.registerssl")}}" class="nav-link">
                                <i class="fas fa-registered"></i>
                                <p>Đăng ký SSL</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.register_services.registerwebsite")}}" class="nav-link">
                                <i class="fas fa-registered"></i>
                                <p>Đăng ký Website</p>
                            </a>
                        </li>

                        <li class="nav-item {{ $request->segment(2) == 'register_services' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.register_services.index")}}" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>Danh sách đăng ký</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fa fa-gift"></i>
                        <p>
                            Quản lý phần mềm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item {{ $request->segment(2) == 'softwares' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.softwares.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Gói phần mềm</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'softwares' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.typesoftwares.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Loại phần mềm</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="{{ $request->segment(2) == 'register_softs' ? 'active active-sub' : '' }}">
                    <a href="{{route("admin.register_softs.index")}}" class="nav-link">
                        <i class="fa fa-gift"></i>
                        <p>
                            Đăng ký phần mềm
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fa fa-gift"></i>
                        <p>
                            Quản lý nhân viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item {{ $request->segment(2) == 'staffs' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.staffs.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'typestaffs' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.typestaffs.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Loại nhân viên</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class=" {{ $request->segment(2) == 'invoices' ? 'active active-sub' : '' }}">
                    <a href="{{route("admin.invoices.index")}}" class="nav-link">
                        <i class="fa fa-cubes"></i>
                        <p>
                            Quản lý hóa đơn

                        </p>
                    </a>
                </li>
                {{--                <li class="nav-item has-treeview">--}}
                {{--                    <a href="{{route("admin.internship.dang_ky")}}" class="nav-link">--}}
                {{--                        <i class="fa fa-paper-plane"></i>--}}
                {{--                        <p>Đăng ký thực tập</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--              chỗ này anh sẽ check nếu cái segment(2) là cái dường dẫn có cái / thứ 2 là interships thì thêm class menu open còn ko thì thôi or segment(2)....--}}
                <li class="nav-item has-treeview {{( $request->segment(2) == 'internships' || $request->segment(2) == 'internship_topic'  || $request->segment(2) == 'category_topic' || $request->segment(2) == 'topics') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-briefcase"></i>
                        <p>
                            Quản lý thực tập sinh
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview " id="nav-item" style="background-color: rgb(47 45 45)">

                        <li class="nav-item {{ $request->segment(2) == 'internships' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.internship.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Danh sách thực tập sinh</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'internship_topic' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.internship_topic.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Danh sách đang thực tập</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'category_topic' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.category_topic.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý danh mục đề tài</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(2) == 'topics' ? 'active active-sub' : '' }}">
                            <a href="{{route("admin.topic.index")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Quản lý danh sách đề tài</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-briefcase"></i>
                        <p>
                            Hợp đồng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item {{ $request->segment(2) == 'contract' ? 'active active-sub' : '' }} ">
                            <a href="{{route("admin.contract.software")}}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>Hợp đồng phần mềm</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>


                        </li>
                        {{--                        <li class="nav-item {{ $request->segment(2) == 'topic' ? 'active active-sub' : '' }}">--}}
                        {{--                            <a href="{{route("admin.topic.index")}}" class="nav-link">--}}
                        {{--                                <i class="fa fa-gift"></i>--}}
                        {{--                                <p>Quản lý đề tài</p>--}}
                        {{--                                <i class="fas fa-angle-left right"></i>--}}
                        {{--                            </a>--}}

                        {{--                        </li>--}}

                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>
                            {{ __('sidebar.user-management') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class=" {{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>{{ __('sidebar.roles') }}</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="fa fa-gift"></i>
                                <p>{{ __('sidebar.users') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="nav-link" href="javascript:" onclick="$('#logout').submit();">
                        <i class="fa fa-power-off"></i> <span>  {{ __('sidebar.logout') }}</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>

            </ul>
            <form method="post" id="logout" action="{{route('logout')}}" style="display: none">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
