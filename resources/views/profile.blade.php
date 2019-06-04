@extends('layout')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form>
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                <div class="card-header text-center text-dark font-bold"><h3>{{ __('PROFILE') }}</h3></div>
                <div class="card-body">
                   <div class="form-group row">
                   <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input type="text"  id="first_name"  class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{Auth::user()->first_name}}" required>

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
                            <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}"required>

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
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"disabled>

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
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ Auth::user()->mobile_number }}" required>
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
                        <button type="submit" class="btn btn-primary" formmethod="post" formaction="/profile/{{$profile->id}}">SAVE CHANGES </button>
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