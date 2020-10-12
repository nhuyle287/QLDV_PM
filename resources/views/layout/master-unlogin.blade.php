<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<body class="login-container">
<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo"
     style="background-image: none, linear-gradient(to top,rgba(29,88,154,0.75) 0px,
     rgba(29,88,154,0.94) 10px,rgba(29,88,154,0.98) 20px,rgba(29,88,154,0.99) 30px,#1d589a 40px)">
    <div class="navbar-header">
        <a class="navbar-brand">
            {{--            <img src="{{asset('images/common/logo.png')}}" alt="">--}}
            <span class="brand-title">Phần mềm Hoa Technology</span>
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
