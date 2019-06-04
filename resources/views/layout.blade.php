<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Snoopy</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/gijgo.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('css/snoopy.css')}}" rel="stylesheet">




</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" style="width:50px;height:50px" class="rounded-circle" src="{{asset('images/Profile.png')}}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><h3>{{Auth::user()->first_name}}</h3></span>
                            <span class="text-muted text-xs block">{{Auth::user()->role}} <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="/">Profile</a></li>
                            <li><a class="dropdown-item" href="/changepassword">Change Password</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>
                    <div class="logo-element">
                        SN+
                    </div>
                </li>
                @if(auth::user()->role == 'super')
                <li><a href="/portal"><i class="fa fa-user"></i> <span class="nav-label">PORTAL ADMIN</span></a></li>
                <li><a href="/school"><i class="fa fa-user"></i> <span class="nav-label">SCHOOL ADMIN</span></a></li>
                @endif
                @if(auth::user()->role == 'portal')
                <li><a href="/school"><i class="fa fa-user"></i> <span class="nav-label">SCHOOL ADMIN</span></a></li>
                @endif
                @if(auth::user()->role == 'school')
                <li><a href="/addschool"><i class="fa fa-home"></i> <span class="nav-label">SCHOOLS</span></a></li>
                @endif
            </ul>
         </div>
 </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
           <li>
            <a href="{{ url('/logout') }}">
            <i class="fa fa-sign-out"></i> Log out</a></li>
               </ul>
            </nav>
        </div>
        @yield('content')
    </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('js/jquery.flot.js')}}"></script>
    <script src="{{asset('js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('js/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('js/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('js/jquery.flot.symbol.js')}}"></script>
    <script src="{{asset('js/jquery.flot.time.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>

    <!-- DROPZONE -->
    <script src="{{asset('js/dropzone.js')}}"></script>


    <!-- Chosen -->
    <script src="{{asset('js/chosen.jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>

   <script>
        $('#admissionStartDate').datepicker({
            uiLibrary: 'bootstrap4',
            format: "yyyy-mm-dd"
        });
    </script>
     <script>
        $('#admissionEndDate').datepicker({
            uiLibrary: 'bootstrap4',
            format: "yyyy-mm-dd"

        });
    </script>
    <script>
        $(document).ready(function(){
            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });
});

        $('.chosen-select').chosen({width: "100%"});

    </script>
    <script>
var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
    url: '{{ route('schools.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 10,
    acceptedFiles: '.jpg, .jpeg,.png',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="school_photos[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="school_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($project) && $project->document)
        var files =
          {!! json_encode($project->document) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="school_photos[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
</script>
    
</body>
</html>
