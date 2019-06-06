@extends('layout')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
           <form class="m-t" role="form" method="POST" enctype="multipart/form-data" 
           action="{{action('AddSchoolController@store')}}">
                                        {{csrf_field()}}
                    <div class="card-header font-bold text-center text-dark"><h3>{{ __('ADD SCHOOL') }}</h3></div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="schoolName" class=" col-md-2 col-form-label text-md-center required"> School Name </label>
                                <div class="col-md-10">
                                    <input id="schoolName" name="school_name" value="{{old('school_name')}}" class="form-control @error('school_name') is-invalid @enderror">
                                    @error('school_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class=" col-md-2 col-form-label text-md-center required">City</label>
                                <div class="col-md-3">
                    
                                    <select id="city" name="city" value="{{old('city')}}" class="form-control @error('city') is-invalid @enderror">
                                        <option value=" " selected disabled> SELECT CITY </option>
                                     @foreach ($cities as $key => $value)
                                   <option value="{{ $key }}" 
                                {{ (collect(old('city'))->contains($key)) ? 'selected':'' }}  />
                                {{ $value }}
                                 </option>
                                 @endforeach
                                       </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                             </div>
                                <label for="area" class=" col col-form-label text-md-center required">Area</label>
                             <div class="col-md-3">
                                    <input id="area" name="area" value="{{old('area')}}" class="form-control @error('area') is-invalid @enderror">
                                    @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                             </div>
                             <label for="pincode" class=" col col-form-label text-md-center required">Pincode</label>
                             <div class="col-md-2">
                                    <input id="pincode" name="pincode" value="{{old('pincode')}}" class="form-control @error('pincode') is-invalid @enderror">
                                    @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                             </div>
                        </div>
                        <div class="form-group row">
                                <label for="email" class=" col-md-2 col-form-label text-md-center">Email</label>
                                <div class="col-md-4">
                                    <input id="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <label for="mobileNumber" class=" col-md-2 col-form-label text-md-center required">Mobile Number </label>
                                <div class="col-md-4">
                                    <input id="mobileNumber" name="mobile_number" value="{{old('mobile_number')}}" class="form-control @error('mobile_number') is-invalid @enderror">
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="board" class=" col-md-2 col-form-label text-md-center required">Board </label>
                                <div class="col-md-4">
                                    <select data-placeholder="SELECT BOARD" class="chosen-select" multiple style="width:350px;" tabindex="4" id="board" name="boards[]" class="form-control @error('boards') is-invalid @enderror">
                                    @foreach ($boards as $key => $value)
                                    <option value="{{ $key }}" 
                                    {{ (collect(old('boards'))->contains($key)) ? 'selected':'' }}  />
                                    {{ $value }}
                                    </option>
                                @endforeach
                                       </select>
                                    @error('boards')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <label for="medium" class=" col-md-2 col-form-label text-md-center required">Medium </label>
                                <div class="col-md-4">
                                    <select data-placeholder="SELECT MEDIUM" class="chosen-select" multiple style="width:350px;" tabindex="4" id="medium" name="mediums[]" class="form-control @error('mediums') is-invalid @enderror">
                                    @foreach ($mediums as $key => $value)
                                    <option value="{{ $key }}" 
                                    {{ (collect(old('mediums'))->contains($key)) ? 'selected':'' }}  />
                                    {{ $value }}
                                    </option>
                                @endforeach
                                       </select>
                                    @error('mediums')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="schoolType" class=" col-md-2 col-form-label text-md-center required">School Type </label>
                                <div class="col-md-4">
                                    <select data-placeholder="SELECT SCHOOL TYPE" class="chosen-select" multiple style="width:350px;" tabindex="4" id="schoolType" name="school_types[]" class="form-control @error('school_types') is-invalid @enderror">
                                    @foreach ($school_types as $key => $value)
                                    <option value="{{ $key }}" 
                                    {{ (collect(old('school_types'))->contains($key)) ? 'selected':'' }}  />
                                    {{ $value }}
                                    </option>
                                @endforeach
                                       </select>
                                    @error('school_types')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <label for="website" class=" col-md-2 col-form-label text-md-center ">Website</label>
                                <div class="col-md-4">
                                    <input id="website" name="website" value="{{old('website')}}" class="form-control @error('website') is-invalid @enderror">
                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="admissionStartDate" class=" col-md-2 col-form-label text-md-center">Admission Start Date</label>
                                <div class="col-md-4">
                                    <input id="admissionStartDate" name="admission_start_date" value="{{old('admission_start_date')}}" class="form-control @error('admission_start_date') is-invalid @enderror">
                                    @error('admission_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <label for="admissionEndDate" class=" col-md-2 col-form-label text-md-center">Admission End Date</label>
                                <div class="col-md-4">
                                     <input id="admissionEndDate" name="admission_end_date" value="{{old('admission_end_date')}}" class="form-control @error('admission_end_date') is-invalid @enderror">
                                    @error('admission_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="maxStudentsPerClass" class="col-md-2 col-form-label text-md-center">Max Student Per Class</label>
                                <div class="col-md-4">
                                    <input id="maxStudentsPerClass" name="max_students_per_class" value="{{old('max_students_per_class')}}" class="form-control @error('max_students_per_class') is-invalid @enderror">
                                    @error('max_students_per_class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                              <label for="facilities" class=" col-md-2 col-form-label text-md-center required">Facilities </label>
                                <div class="col-md-4">
                                <select data-placeholder="SELECT FACILITY" class="chosen-select" multiple style="width:350px;" tabindex="4" id="facilities" name="facilities[]" class="form-control @error('facilities') is-invalid @enderror">
                                @foreach ($facilities as $key => $value)
                                    <option value="{{ $key }}" 
                                    {{ (collect(old('facilities'))->contains($key)) ? 'selected':'' }}  />
                                    {{ $value }}
                                    </option>
                                @endforeach
                                       
                                       </select>
                                    @error('facilities')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                </div>
                        
                              <div class="form-group row">
                              <label for="extraActivities" class=" col-md-2 col-form-label text-md-center">Extra Activities</label>
                                <div class="col-md-4">
                                    <input id="extraActivities" name="extra_activities" value="{{old('extra_activities')}}" class="form-control @error('extra_activities') is-invalid @enderror" row="7">
                                    @error('extra_activities')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <label for="schoolImage" class="col-md-2 col-form-label text-md-center required">School Image </label>
                                <div class="col-md-4">
                                    <img id="school_image" src="https://dummyimage.com/150x150/d3d3d3/242024&text=upload+school+image" alt="your image"  style="width:150px;height:150px"/>
                                    <input id="schoolImage" type="file"  onchange="readURL(this);"   name="school_image" value="{{old('school_image')}}" class="form-control @error('school_image') is-invalid @enderror" accept="image/*" style="position:absolute;top:0;left:0;height:150px;width:150px;opacity:0">

                                    @error('school_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                          </div>
                          
                        <div class="form-group row">
                              <label for="gallery" class=" col-md-2 col-form-label text-md-center">Gallery</label>
                            <div class="col-md-10">
                                <div class="needsclick dropzone" id="document-dropzone">
                                    @error('school_photos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                            </div>
                      </div> 
                             <div class="form-group row mb-0">
                             <div class="col-md-2 offset-md-4">
                        <input type="button" class="btn btn-warning" value = "CANCEL" onclick="history.go(0)" />
                        </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    <h4>{{ __('ADD SCHOOL') }}</h4>
                                </button>
                            </div>
                        </div>

                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
        document.getElementById("schoolName").addEventListener("input", forceLower);
        document.getElementById("area").addEventListener("input", forceLower);
        document.getElementById("extraActivities").addEventListener("input", forceLower);


        function forceLower(evt) {
            var words = evt.target.value.toLowerCase().split(/\s+/g);
            var newWords = words.map(function(element){   
                return element !== "" ?  element[0].toUpperCase() + element.substr(1, element.length) : "";
            });
            evt.target.value = newWords.join(" "); 
}

</script>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#school_image')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

    @endsection
