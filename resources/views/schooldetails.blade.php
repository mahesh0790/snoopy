@extends('layout')
@section('content')
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <form method="post" action="/school/{{$school_admin->id}}">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}

                  <div class="card-header font-bold"><h3>{{ __('Edit School Admin') }}</h3></div>
                   <div class="card-body">
                   <div class="form-group row">
                   <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input type="text"  id="first_name"  class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$school_admin->first_name}}" >

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                            <input type="text" id="last_name" class="form-control @error('first_name') is-invalid @enderror" name="last_name" value="{{$school_admin->last_name}}">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$school_admin->email}}"disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{$school_admin->mobile_number}}" >

                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="row form-group">
                        <div class="col-md-2 offset-md-4">
                        <input type="button" class="btn btn-warning" value = "CANCEL" onclick="history.go(0)" />
                        </div>
                        <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">SAVE CHANGES </button>
                        </div>
                        </form>
                  </div>
              </div>
         </div>
      </div>
    </div>
</div>
 <script>
        document.getElementById("first_name").addEventListener("input", forceLower);
        document.getElementById("last_name").addEventListener("input", forceLower);

        function forceLower(evt) {
            var words = evt.target.value.toLowerCase().split(/\s+/g);
            var newWords = words.map(function(element){   
                return element !== "" ?  element[0].toUpperCase() + element.substr(1, element.length) : "";
            });
            evt.target.value = newWords.join(" "); 
}

</script>                                         
 @endsection