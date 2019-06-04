@extends('layout')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-bold text-center text-dark"><h3>{{ __('CHANGE PASSWORD') }}</h3></div>
                  <div class="card-body"> 
                       <div class="container">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form  method="POST" action="{{ route('changePassword') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group row{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">Current Password</label>
                                            <div class="col-md-8">
                                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                                @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row {{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">New Password</label>

                                            <div class="col-md-8">
                                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                                @if ($errors->has('new-password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                            <div class="col-md-8">
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                            </div>
                                        </div>

                                    <div class="row form-group">
                                        <div class="col-md-2 offset-md-4">
                                            <input type="button" class="btn btn-warning" value = "Cancel" onclick="history.go(0)" />
                                        </div>
                                        <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary">
                                                    Change Password
                                                </button>
                                        </div>
                                    </div>
                         </div>
                     </div>
                 </div>  
                 </div>
         </div>
     </div>     
     @endsection 