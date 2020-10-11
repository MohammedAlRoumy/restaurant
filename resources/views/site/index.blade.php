<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant</title>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-rtl.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/fonts/font-awesome/css/font-awesome.css')}}">


    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
</head>
<body>
<!-- Header -->
<header id="header">

    <nav id="menu" class="navbar navbar-expand-lg navbar-dark  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">fresh</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link pr-2" href="#about">من نحن </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pr-2" href="#restaurant-menu">قائمة الوجبات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pr-2" href="#reservation">احجز</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pr-2" href="#team">فريقنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pr-2" href="#contact">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="intro" style="    background: url({{asset('frontend/images/intro-bg-2.jpg')}}) no-repeat center center;
        ">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="intro-text">
                        <h1>fresh</h1>
                        <p>مطعم / مقهى </p>
                        <a href="#reservation" class="btn btn-custom btn-lg page-scroll">احجز الان</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 ">
                <div class="about-img"><img src="{{asset('upload/images').'/'.setting('image') }}" class="img-responsive" alt="" width="100%"></div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2>من نحن</h2>
                    <hr>
                    <p>
                        {{ setting('aboutus') }} </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Restaurant Menu Section -->
<div id="restaurant-menu">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>قائمة الطعام</h2>
            <hr>
            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">{{$category->name}}</h2>
                    <hr>
                    @foreach($category->meals as $meal)
                    <div class="menu-item">
                        <div class="menu-item-name">{{$meal->name}}</div>
                        <div class="menu-item-price"> ${{$meal->price}}</div>
                        <div class="menu-item-description">{{$meal->description}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Reservation Section -->
<div id="reservation">
    <!--    <div class="row">-->
    <div class="container text-center">
        <div class="section-title text-center">
            <h2>احجز الان</h2>
            <hr>
        </div>
        <div class="col-md-12">
            <form id="first_form" method="POST" action="{{route('store')}}">

                @csrf()

                <div class="form-row">
                    <input type="hidden" name="which" value="first_form">

                    <div class="form-group col-6">
                        <input type="date" name="date" class="form-control" id="inputDate" placeholder="Data gg/mm/aaaa">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="الاسم">
                    </div>
                    <div class="form-group col-6">
                        <input type="time" name="time" class="form-control" id="inputTime" placeholder="Timetables">
                    </div>
                    <div class="form-group col-6">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="البريد الالكتروني">
                    </div>

                    <div class="form-group col-6">
                            <select name="table" class="form-control" style="width: 100%">
                                <option value="">رقم الطاولة</option>
                                @foreach($tables as $table)
                                    <option value="{{$table->id}}">{{$table->tableNumber}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group col-6">
                        <input type="tel" name="phone" class="form-control" id="inputCel" placeholder="الهاتف">
                    </div>
                {{--    <div class="form-group col-12">
                            <textarea class="form-control" rows="4" id="inputComment"
                                      placeholder="طلبات مسبقة"></textarea>
                    </div>--}}
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-custom btn-block">إحجز</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--    </div>-->
</div>

<!-- Team Section -->
<div id="team" class="text-center">
    <div class="overlay">
        <div class="container">
            <div class="col-md-12 section-title">
                <h2>فريقنا</h2>
                <hr>
                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،</p>
            </div>
            <div class="row">
                @foreach($teams as $team)
                <div class="col-md-4 team">
                    <div class="thumbnail">
                        <div class="team-img"><img src="{{asset('upload/images/'.$team->image)}}" alt="..."></div>
                        <div class="caption">
                            <h3>{{$team->name}}</h3>
                            <p>{{$team->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div id="contact" class="text-center">
    <div class="container">
        <div class="section-title text-center">
            <h2>اتصل بنا</h2>
            <hr>
            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،</p>
        </div>
        <div class="col-md-12">
            <form class="" id="second_form" method="POST" action="{{route('store')}}">
                @csrf()
{{--                @method('post')--}}
                <div class="row">
                    <input type="hidden" name="which" value="second_form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder="العنوان" required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="البريد الالكتروني"
                                   required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="content" id="message" class="form-control" rows="4" placeholder="الرسالة"
                              required></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div id="success"></div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <button type="submit" class="btn btn-custom btn-block"> ارسال الرسالة</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer Section -->
<div id="footer">
    <div class="container text-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <h3>العنوان</h3>
                    <div class="contact-item">
                        <p>بناية,</p>
                        <p>شارع,</p>
                        <p>مدينة,</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>مواعيد العمل</h3>
                    <div class="contact-item">
                        <p>السبت - الخميس: 11:00 صباحاً - 11:00 مساءً </p>
                        <p>الجمعة: 2:00 مساءً - 11:00 مساءً</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>للتواصل</h3>
                    <div class="contact-item">
                        <p>هاتف:070591111111</p>
                        <p>بريد إلكتروني: info@company.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center copyrights">
        <div class="social">
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
        </div>
        <p> جميع الحقوق محفوظة &copy; 2020 <a href="" rel="nofollow">Mohammed Al roumy</a></p>
    </div>
</div>

<script src="{{asset('frontend/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
