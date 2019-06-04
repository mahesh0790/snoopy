<!DOCTYPE html>
<html>
    <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body style="background-color:lightgrey">
        <div class="container py-5">
             <div class="row justify-content-center">
                 <div class="col-md-8">
                    <div class="ibox-title">
                            <h3>LOGIN</h3>
                                </div>
                            <div class="ibox-content">
                             <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                             {{csrf_field()}}
                             <div class="form-group row"><label class="col-lg-2 col-form-label">Email</label>
                             <div class="col-lg-10">
                                 <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email')}}" required="">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required="">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </div>
                   <div class="form-group row">
                   <div class="col-lg-offset-2 col-lg-10">
                <div class="i-checks"><label> 
                <input type="checkbox"><i></i> Remember me </label>
               </div>
              </div>
             </div>
             <div class="form-group row ">
            <div class="col-md-12 text-center ">
            <button class="btn btn-w-m btn-primary" type="submit">Sign in</button><br>
            <a href="{{ route('password.request') }}">Forgot password?</a>
            </p>
        </div>
             </div>
               </form>
                     </div>
                       </div>
                        </div>
                         </div>
                             </div>
                               </div>                                   
                
            
</body>
</html>