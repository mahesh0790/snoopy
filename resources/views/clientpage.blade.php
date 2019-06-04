<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('css/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/snoopy.css')}}" rel="stylesheet">

    </head>
    <body class="bg-white">
    <div class="container-fluid">
        <nav class="bg-white navbar-expand-md navbar fixed-top">
            <a class="navbar-brand" href="#">
                <img src="{{asset('images/snoopy.jpeg')}}" width="40%" height="50px"
            class="d-inline-block align-top" alt="">
            </a>
            <button type="button" data-target="#collapseNavbar" data-toggle="collapse" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapseNavbar">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
            </div>
        </nav>
<br><br><br><br>
        <div id="banner">
            <img src="{{asset('images/school-supplies-background-10.jpg')}}" width="100%" height="320px">
            <div class="banner-title">
                <h1><font size="+3"><b>Discover the best schools </b></font></h1>
                <h2  style="color:green;">Search, compare and explore schools in your city.</h2>
            </div>
        </div><br>
        <div class="blogHeading" style="margin-top:50px">
            <h1 class="font-bold" style="text-align:center">Featured Schools</h1>
        </div><br>
        <div class="row justify-content-md-center">
            <div class="col-lg-11" >
                <div class="slick_demo_2">
                    @foreach($schools as $school)
                    <a href="/school_details/{{$school->id}}">
                    <div>
                        <div class="slick_hover ibox-content" style="height:380px;background-color:#ffebcd">
                                <div class="row"> 
                                    <img style="width:100px;height:100px" src="/storage/{{$school->school_image}}">
                                    <div class="col-md-4">
                                        <h4>{{$school->school_name}}</h4>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <p>Address:{{$school->area}},@foreach($cities as $key=>$value)
                                @if($key==$school->city)
                                {{$value}}
                                @endif
                                @endforeach, 
                                {{$school->pincode}}</p>
                                <h3><i class="fa fa-phone" aria-hidden="true">{{$school->mobile_number}}</h3></i>
                                <h3><i class="fa fa-globe" aria-hidden="true">{{$school->website}}</h3></i>
                                <h3><i class="fa fa-graduation-cap">@foreach ($boards as $key => $value)
                                        @if(in_array($key,$school->boards))                             
                                            {{ $value}}
                                        @endif
                                @endforeach</h3></i>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
</div>
     <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <script src="{{asset('js/popper.min.js')}}"></script> 
     <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
     <script src="{{asset('js/bootstrap.js')}}"></script>
     <script src="{{asset('js/jquery.metisMenu.js')}}"></script>
     <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
      <script src="{{asset('js/slick.min.js')}}"></script>

      <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>

    <!-- Additional style only for demo purpose -->
    <style>
        .slick_demo_2 .ibox-content {
            margin: 0 10px;
        }
    </style>

    <script>
        $(document).ready(function(){

          $('.slick_demo_2').slick({
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

    
        });

    </script>

</body>

</html>
