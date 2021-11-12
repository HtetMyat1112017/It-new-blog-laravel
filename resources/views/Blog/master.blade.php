<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('feather.css/feather.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom position-fixed top-0 w-100">
    <div class="container">
        <a class="navbar-brand" href="{{route('blog.index')}}">
            <img src="{{asset('logos/logo.PNG')}}" style="height: 40px" class="me-1" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="feather-align-right"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="menu-top-right-menu" class="navbar-nav ms-auto mb-2 mb-md-0 ">
                <li id="menu-item-12"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-12">
                    <a href="{{url('/')}}" class="nav-link ">Home</a></li>
                <li id="menu-item-16"
                    class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-16"><a
                        href="{{route('about')}}" class="nav-link ">About</a></li>
                <li id="menu-item-242"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-242">
                    <a href="#" class="nav-link  dropdown-toggle"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu  depth_0">
                        <li id="menu-item-9"
                            class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-9"><a
                                href="http://google.com/" class="dropdown-item ">facebook</a></li>
                        <li id="menu-item-10"
                            class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-10"><a
                                href="http://google.com/" class="dropdown-item ">youtube</a></li>
                    </ul>
                </li>
                <li id="menu-item-11"
                    class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-11"><a
                        href="#" class="nav-link ">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="py-3 mb-5" id="themeHeaderSpacer"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            @yield("content")
        </div>

            <div class="col-12 col-lg-4 border-start" id="sidebarColumn">
                <div class="position-sticky" style="top: 100px">
                    <div class="mb-5 sidebar">


                        <div id="search" class="mb-5">
                            <form action="{{route("blog.index")}}" method="get">

                                <div class="d-flex search-box">
                                    <input type="text" class="form-control flex-shrink-1 me-2 search-input" name="search" value="{{request()->search}}" placeholder="Search Anything">
                                    <button class="btn btn-primary search-btn">
                                        <i class="feather-search d-block d-xl-none"></i>
                                        <span class="d-none d-xl-block">Search</span>
                                    </button>
                                </div>

                            </form>

                        </div>

                        <div id="category" class="mb-3">
                            <h4 class="fw-bolder">Category Lists</h4>
                            <ul class="list-group">
                                @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{route('baseOnCategory',$category->id)}}" class="{{request()->url() == route('baseOnCategory',$category->id) ? "active" : ""}}">{{$category->title}}</a>
                                </li>

                                @endforeach
                            </ul>
                        </div>
                       @yield('paginatePage')
                    </div>
                    <div class="d-none d-lg-block">
                    </div>
                </div>
            </div>
    </div>
</div>


<script src="{{asset('js/theme.js')}}"></script>
@yield('foot')
</body>
</html>
