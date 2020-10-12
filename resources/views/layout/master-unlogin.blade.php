
<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<body class="login-container">
<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand">
{{--            <img src="{{asset('images/common/logo.png')}}" alt="">--}}
            <span class="brand-title">*****</span>
        </a>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

</div>
@yield('content')
<!-- /page container -->

</body>
</html>
