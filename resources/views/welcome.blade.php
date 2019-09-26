<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

    <title>Sweet Kitchen</title>

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/pricing.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>

        @foreach($sliders as $key=>$slider)
            .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{$key+1}}) .item {
            background: url({{asset('uploads/slider/'.$slider->image)}});
            background-size: cover;
            background-position: bottom;
        }
        @endforeach
    </style>


    <script src="{{asset('frontend/js/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.flexslider.min.js')}}"></script>

    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flexslider-container"
            });
        });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(24.909439, 91.833800),
                zoom: 16,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions)

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(24.909439, 91.833800),
                title: "Mamma's Kitchen Restaurant"
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>


</head>
<body data-spy="scroll" data-target="#template-navbar">

<!--== 4. Navigation ==-->
<nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#Food-fair-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <h1>Sweet Kitchen</h1>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="Food-fair-toggle">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about">about</a></li>
                <li><a href="#menu_list">menu list</a></li>
                <li><a href="#reserve">reservation</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.row -->
</nav>


<!--== 5. Header ==-->
<section id="header-slider" class="owl-carousel">
    @foreach($sliders as $key=>$slider)
        <div class="item">
            <div class="container">
                <div class="header-content">
                    <h1 class="header-title">{{$slider->title}}</h1>
                    <p class="header-sub-title">{{$slider->sub_title}}</p>
                </div> <!-- /.header-content -->
            </div>
        </div>
    @endforeach

</section>

@if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                onclick="this.parentElement.style.display='none';">
            <i class="material-icons">close</i>
        </button>
        <span>
                      <b> {{session('success')}}</b> </span>
    </div>

@endif
<!--== 6. About us ==-->
<section id="about" class="about">
    <img src="{{asset('frontend/images/icons/about_color.png')}}"
         class="img-responsive section-icon hidden-sm hidden-xs">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                </div>
                <div class="col-xs-12 col-sm-6 dis-table-cell">
                    <div class="section-content">
                        <h2 class="section-content-title">About us</h2>
                        <p class="section-content-para">
                            Astronomy compels the soul to look upward, and leads us from this world to another. Curious
                            that we spend more time congratulating people who have succeeded than encouraging people who
                            have not. As we got further and further away, it [the Earth] diminished in size.
                        </p>
                        <p class="section-content-para">
                            beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a
                            finger it would crumble and fall apart. Seeing this has to change a man. Where ignorance
                            lurks, so too do the frontiers of discovery and imagination.
                        </p>
                    </div> <!-- /.section-content -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section> <!-- /#about -->


<!--==  7. Afordable Pricing  ==-->
<section id="menu_list" class="menu_list">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">Affordable Pricing</h2>
                                <ul id="filter-list" class="clearfix">
                                    <li class="filter" data-filter="all">All</li>
                                    @foreach($categories as $category)
                                        <li class="filter" data-filter="#{{$category->slug}}">{{$category->name}}
                                            <span class="badge">{{$category->items->count()}}</span>
                                        </li>
                                    @endforeach
                                </ul><!-- @end #filter-list -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul id="menu-pricing" class="menu-price">
                        @foreach($items as $item)
                            <li class="item" id="{{$item->category->slug}}">

                                <a href="#">
                                    <img src="{{asset('uploads/items/'.$item->image)}}" class="img-responsive"
                                         alt="Food"
                                         style="height: 300px;width: 350px;">
                                    <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{$item->name}}</h3>
                                                {{substr($item->description,0,100)}}
                                            </span>
                                    </div>
                                </a>

                                <h2 class="white">{{$item->price}}</h2>
                            </li>
                        @endforeach


                    </ul>

                    <!-- <div class="text-center">
                            <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                    </div> -->

                </div>
            </div>
        </div>

    </div>
</section>


<!--== 8. Great Place to enjoy ==-->
<section id="great-place-to-enjoy" class="great-place-to-enjoy">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/beer_black.png">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Great Place to enjoy</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#great-place-to-enjoy -->


<!--==  9. Our Beer  ==-->
<section id="beer" class="beer">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/beer_color.png">
    <div class="container-fluid">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell section-bg">

            </div>

            <div class="col-xs-12 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <h2 class="section-content-title">Our Beer</h2>
                    <div class="section-description">
                        <p class="section-content-para">
                            Astronomy compels the soul to look upward, and leads us from this world to another. Curious
                            that we spend more time congratulating people who have succeeded than encouraging people who
                            have not. As we got further and further away, it [the Earth] diminished in size.
                        </p>
                        <p class="section-content-para">
                            beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a
                            finger it would crumble and fall apart. Seeing this has to change a man. Where ignorance
                            lurks, so too do the frontiers of discovery and imagination.Astronomy compels the soul to
                            look upward, and leads us from this world to another. Curious that we spend more time
                            congratulating people who have succeeded than encouraging people who have not. As we got
                            further and further away, it [the Earth] diminished in size.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--== 10. Our Breakfast Menu ==-->
<section id="breakfast" class="breakfast">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/bread_black.png">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Our Breakfast Menu</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#breakfast -->


<!--== 11. Our Bread ==-->
<section id="bread" class="bread">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/bread_color.png">
    <div class="container-fluid">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell section-bg">

            </div>
            <div class="col-xs-12 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <h2 class="section-content-title">
                        Our Bread
                    </h2>
                    <div class="section-description">
                        <p class="section-content-para">
                            Astronomy compels the soul to look upward, and leads us from this world to another. Curious
                            that we spend more time congratulating people who have succeeded than encouraging people who
                            have not. As we got further and further away, it [the Earth] diminished in size.
                        </p>
                        <p class="section-content-para">
                            beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a
                            finger it would crumble and fall apart. Seeing this has to change a man. Where ignorance
                            lurks, so too do the frontiers of discovery and imagination.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--== 12. Our Featured Dishes Menu ==-->
<section id="featured-dish" class="featured-dish">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/food_black.png">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Our Featured Dishes Menu</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#featured-dish -->


<!--== 13. Menu List ==-->
<section id="menu-list" class="menu-list">
    <div class="container">
        <div class="row menu">
            <div class="col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-12">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="menu-catagory">
                                <h2>Bread</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">French Bread</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$149.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Italian Bread</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$149.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Regular Bread</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$149.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="menu-catagory">
                                <h2>Drinks</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Regular Tea</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$20.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Garlic Tea</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$30.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Black Coffee</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$40.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="menu-catagory">
                                <h2>Meat</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Bacon</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$70.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Sausage</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$50.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Chicken Balls</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$90.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="menu-catagory">
                                <h2>Special</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Chicken Balls</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$90.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Bacon</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$70.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-item">
                                <h3 class="menu-title">Sausage</h3>
                                <p class="menu-about">Astronomy compels the soul</p>

                                <div class="menu-system">
                                    <div class="half">
                                        <p class="per-head">
                                            <span><i class="fa fa-user"></i></span>1:1
                                        </p>
                                    </div>
                                    <div class="half">
                                        <p class="price">$50.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="moreMenuContent"></div>
                <div class="text-center">
                    <a id="loadMenuContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span
                            class="caret"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>


<!--== 14. Have a look to our dishes ==-->

<section id="have-a-look" class="have-a-look hidden-xs">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/food_color.png">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="menu-gallery" style="width: 50%; float:left;">
                    <div class="flexslider-container">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="images/menu-gallery/menu1.png"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu2.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu3.png"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu4.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu5.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu6.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu7.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu8.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu9.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu10.jpg"/>
                                </li>
                                <li>
                                    <img src="images/menu-gallery/menu11.jpg"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="gallery-heading hidden-xs color-bg" style="width: 50%; float:right;">
                    <h2 class="section-title">Have A Look To Our Dishes</h2>
                </div>


            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section>


<!--== 15. Reserve A Table! ==-->
<section id="reserve" class="reserve">
    <img class="img-responsive section-icon hidden-sm hidden-xs"
         src="{{asset('frontend/images/icons/reserve_black.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Reserve A Table !</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#reserve -->


<section class="reservation">
    <img class="img-responsive section-icon hidden-sm hidden-xs"
         src="{{asset('frontend/images/icons/reserve_color.png')}}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <form class="reservation-form" method="post" action="{{route('reservation.reserve')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="name"
                                               id="name"  placeholder="  &#xf007;  Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email"
                                               class="form-control reserve-form empty iconified" id="email"
                                                placeholder="  &#xf1d8;  e-mail">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control reserve-form empty iconified" name="phone"
                                               id="phone"  placeholder="  &#xf095;  Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified"
                                               name="dateTime" id="dateTime"
                                               placeholder="&#xf017;  Time">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <textarea type="text" name="message"
                                              class="form-control reserve-form empty iconified" id="message" rows="3"
                                               placeholder="  &#xf086;  We're listening"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                        <span><i class="fa fa-check-circle-o"></i></span>
                                        Make a reservation
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-md-2 hidden-sm hidden-xs"></div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="opening-time">
                            <h3 class="opening-time-title">Hours</h3>
                            <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                            <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                            <div class="launch">
                                <h4>Lunch</h4>
                                <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                            </div>

                            <div class="dinner">
                                <h4>Dinner</h4>
                                <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                <p>Sun: 5:30 PM - 12:00 AM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<section id="contact" class="contact">
    <div class="container-fluid color-bg">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell">
                <h2 class="section-title">Contact With us</h2>
            </div>
            <div class="col-xs-6 col-sm-6 dis-table-cell">
                <div class="section-content">
                    <p>16th Birn street Get Plaza (4th floar) USA</p>
                    <p>+44 12 213584</p>
                    <p>example@mail.com </p>
                </div>
            </div>
        </div>
        <div class="social-media">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="center-block">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="twit"></a></li>
                        <li><a href="#" class="g-plus"></a></li>
                        <li><a href="#" class="link"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <div class="row">
                    <form class="contact-form" method="post" action="{{route('contact.sendMessage')}}">
                        {{csrf_field()}}

                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" id="name" required="required"
                                       placeholder="  Name">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" id="email" required="required"
                                       placeholder="  Email">
                            </div>
                            <div class="form-group">
                                <input name="subject" type="text" class="form-control" id="subject" required="required"
                                       placeholder="  Subject">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <textarea name="message" type="text" class="form-control" id="message" rows="7"
                                      required="required" placeholder="  Message"></textarea>
                        </div>

                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="text-center">
                                <button type="submit" id="submit" name="submit" class="btn btn-send">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="copyright text-center">
                    <p>
                        &copy; Copyright, 2019 Developed by <a href="#">SHOVON.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.mixitup.min.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.hoverdir.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jQuery.scrollSpeed.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if ($errors->any())

        @foreach ($errors->all() as $error)
          <script>
              var toastr;
              toastr.error('{{$error}}')
          </script>
        @endforeach


@endif
<script>
    $(function () {
        $('#dateTime').datetimepicker({
            format: "dd MM yyyy - HH:ll P",
            showMeridian: true,
            autoClose: true,
            todayBtn: true
        });
    })
</script>
</body>
</html>
