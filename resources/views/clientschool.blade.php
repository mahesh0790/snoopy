<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/blueimp-gallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/snoopy.css')}}" rel="stylesheet">
</head>
    <body class="bg-white" >
    <div style="background-color:lightgrey">
    <div class="container-fluid">
         <nav class="bg-white navbar-expand-md navbar fixed-top">
            <a class="navbar-brand" href="/school_details">
            <img src="{{asset('images/snoopy.jpeg')}}" width="40%" height="50px"
        class="d-inline-block align-top" alt="">
            </a>
        </nav>

        <br><br><br><br>
            <div class="row mt-4">    
                <img class="col-md-3" style="width:200px;height:200px" src="/storage/{{$school->school_image}}"> 
                    
                    <div class="col-md-4">
                        <h2>{{$school->school_name}}</h2>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>Address:{{$school->area}},@foreach($cities as $key=>$value)
                        @if($key==$school->city)
                        {{$value}}
                        @endif
                        @endforeach
                        {{$school->pincode}}</p>
                            <i class="fa fa-graduation-cap"></i>
                        @foreach ($boards as $key => $value)
                            @if(in_array($key,$school->boards))                             
                                {{ $value}}
                            @endif
                        @endforeach
                    </div>
            </div>

        </div>
        
          <div class="school_name mt-4">About School</div>
            <div class="jumbotron mt-2" style="background-color:white">
                <div class="row" >                
                        <div class="col-md-4">
                            <p style="color:grey"><h3>Address</h3></p>
                            <p>{{$school->area}}</p>
                            <p>@foreach($cities as $key=>$value)
                                @if($key==$school->city)
                                {{$value}}
                                @endif
                                @endforeach</p>
                                <p>{{$school->pincode}}</p>
                        </div>
                        <div class="col-md-4 " style="height:100px">
                            <p style="color:grey"><h3>Contact information</h3></p>
                            <p><i class="fa fa-phone" aria-hidden="true">{{$school->mobile_number}}</i></p>
                            <p><i class="fa fa-globe" aria-hidden="true">{{$school->website}}</i></p>

                        </div>
                        <div class="col-md-4">
                            <p style="color:grey"><h3>Facilities</h3></p>
                            @foreach ($facilities as $key => $value)
                        
                                            @if(in_array($key,$school->facilities))                             
                                            {{ $value}}
                                            @endif
                                        
                                        @endforeach
                        </div>
                        <div class="col-md-4 mt-4">
                            <p style="color:grey"><h3>Board</h3></p>
                            @foreach ($boards as $key => $value)
                        
                                            @if(in_array($key,$school->boards))                             
                                            {{ $value}}
                                            @endif
                                            @endforeach
                        </div>
                        <div class="col-md-4 mt-4">
                            <p style="color:grey"><h3>Medium</h3></p>
                            @foreach ($mediums as $key => $value)
                        
                                            @if(in_array($key,$school->mediums))                             
                                            {{ $value}}
                                            @endif
                                            @endforeach
                        </div>
                        <div class="col-md-4 mt-4">
                            <p style="color:grey"><h3>School Type</h3></p>
                            @foreach ($school_types as $key => $value)
                        
                                            @if(in_array($key,$school->school_types))                             
                                            {{ $value}}
                                            @endif
                                            @endforeach
                        </div>
                        <div class="col-md-4 mt-4">
                            <p style="color:grey"><h3>Max. Students Per Class</h3></p>
                            <p>{{$school->max_students_per_class}}</p>
                        </div>
                        <div class="col-md-4 mt-4">
                            <p style="color:grey"><h3>Admission Start Date</h3></p>
                            <p>{{$school->admission_start_date}}</p>
                        </div>
                        <div class="col-md-4 mt-4">
                            <p style="color:grey"><h3>Admission End Date</h3></p>
                            <p>{{$school->admission_end_date}}</p>
                        </div>
                        <div class="col-md-4 mt-4">
                            <p style="color:grey"><h3>Extra Curricular Activites:</h3></p>
                            <p>{{$school->extra_activities}}</p>
                        </div>
                    </div>
                </div>
                <div class="school_name mt-4">School Photos</div>
                <div id="wrapper">
                   <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="lightBoxGallery">
                                            @foreach($school_photos as $school_photo)
                                                <a href="/storage/gallery/{{$school_photo->filename}}" data-gallery="">
                                                <img src="/storage/gallery/{{$school_photo->filename}}" style="width:200px;height:200px"></a>
                                            @endforeach
                                        </div>          
                                        <div id="blueimp-gallery" class="blueimp-gallery">
                                            <div class="slides"></div>
                                            <h3 class="title"></h3>
                                            <a class="prev">‹</a>
                                            <a class="next">›</a>
                                            <a class="close">×</a>
                                            <a class="play-pause"></a>
                                            <ol class="indicator"></ol>
                                        </div>
                                    
                            </div>
                        </div> 
                    </div>
                </div>


            
        
</div>

                   
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script> 
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.blueimp-gallery.min.js')}}"></script>



      <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>

     
</body>
</html>
                           
            

















    