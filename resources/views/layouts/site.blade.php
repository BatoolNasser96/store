<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('storage/'. $logo) }}"  type="image/png">
    <title>E-Commerce</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('site/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/vendors/lightbox/simpleLightbox.css')}}">
    <link rel="stylesheet" href="{{asset('site/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('site/vendors/animate-css/animate.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
    <style>
    .blog_post img{
        width: 100%;
        height:280px;
}
</style>
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html">
                        <img src="{{ asset('storage/'. $logo) }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav center_nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">
                                    <i class="fa fa-home fa-lg"></i>
                                </a>
                            </li>
                            @auth
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cart-plus fa-lg"></i>  
                                </a>
                                <ul class="dropdown-menu">
                            
                                @foreach(Auth::guard('web')->user()->cart as $product)
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        {{ $product->title }}
                                    </li>
                                    @endforeach
                                <li><a href="{{ route('cart') }}">Checkout</a></li>
                              </ul>
                            </li>
                            @endauth
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-unlock-alt fa-lg"></i>  
                                </a>
                                <ul class="dropdown-menu">
                                <li class="nav-item">
                                   <a class="nav-link" href="{{ route('login') }}">
                                        Personal
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" href="{{ route('company.login') }}">
                                       Company
                                    </a>
                                </li>
                              </ul>
                            </li>

                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-globe fa-lg"></i>  
                                </a>
                                <ul class="dropdown-menu">
                                <li class="nav-item">
                                   <a class="nav-link" href="#">
                                   {{__('English')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" href="#">
                                   {{__('Arabic')}}
                                    </a>
                                </li>
                              </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            
        </div>
    </header>
    <!--================Header Menu Area =================-->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
            @foreach(\App\Company::all() as $company)
                <div class="col-lg-2">
                    <div class="categories_post">
                        <img src="{{ asset('storage/'. $company->img) }}" alt="post" style=" width: 100%; height: 170px; border-radius: 50%;">
                        <div class="categories_details" style=" pointer-events: none; top: 25px; left: 25px; right: 25px; bottom: 25px;">
                            <div class="categories_text">
                                <p href="#">
                                    <h5>{{$company->name}}</h5>
                                </p>
                                <div class="border_line"></div>
                                <p>{{ $company->cities->name }} / {{ $company->countries->name }}  </p>
                            </div>
                        </div>
                    </div>
                </div>
             @endforeach  
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                    @yield('content')
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">01</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">02</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">03</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">04</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">09</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="lnr lnr-magnifier"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                        <h3 class="widget_title"  style="border-radius: 45px;">
                        <a href="{{ route('site.index')}}" style="color: #fff;">
                        All Products</a>
                        </h3>
                        @foreach(\App\Logo::all() as $logo)
                            <img class="author_img rounded-circle" src="{{ asset('storage/'. $logo->logo) }}" alt="">
                            <h4>{{ $logo->name}}</h4>
                            <p>{{ $logo->Tfax}}</p>
                            <p>{{ $logo->email}}</p>
                            <p>{{ $logo->currency}}</p>
                            <div class="social_icon">
                                <a href="https://www.facebook.com/batoolnasser1996">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://twitter.com/BatoolNasser13">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="https://github.com/BatoolNasser96">
                                    <i class="fa fa-github"></i>
                                </a>
                                <a href="https://www.linkedin.com/in/batoolnasser/">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                            <p>{{ $logo->description}}
                            </p>
                            <div class="br"></div>
                        @endforeach
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">All Brands</h3>
                            @foreach(\App\Brand::all() as $brand)
                            <div class="media post_item">
                               <a href="{{ route('brand',['id'=>$brand->id] )}}">
                                <img  src="{{ asset('storage/'. $brand->img) }}"alt="post">
                                </a>
                                <div class="media-body">
                                    <a href="{{ route('brand',['id'=>$brand->id] )}}">
                                        <h3>{{ $brand->manufacturers->name}}</h3>
                                        <p>{{ $brand->name}} ( {{ $brand->product->count()}} )</p>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">All Departments</h4>
                            <ul class="list cat-list">
                            @foreach(\App\Department::all() as $department)
                                <li>
                                    <a href="{{ route('department',['id'=>$department->id] )}}" class="d-flex justify-content-between">
                                        <p>{{ $department->name}}</p>
                                        <p>{{ $department->product->count()}}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">All Parts</h4>
                            <ul class="list">
                            @foreach(\App\Part::all() as $part)
                                <li>
                                    <a >{{ $part->name}}</a>
                                </li>
                            @endforeach
                               
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap" style="	padding: 30px 0px;">
        <div class="container">
            <div class="row">
             
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://github.com/BatoolNasser96" target="_blank">BatoolNasser</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('site/js/popper.js')}}"></script>
    <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('site/js/stellar.js')}}"></script>
    <script src="{{asset('site/vendors/lightbox/simpleLightbox.min.js')}}"></script>
    <script src="{{asset('site/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('site/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('site/vendors/isotope/isotope-min.js')}}"></script>
    <script src="{{asset('site/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('site/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('site/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('site/js/mail-script.js')}}"></script>
    <script src="{{asset('site/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('site/js/theme.js')}}"></script>
</body>

</html>
   