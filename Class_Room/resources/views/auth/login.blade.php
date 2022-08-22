@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      @if(Session::has('warning'))
      <div class="alert alert-danger">
        {{Session::get('warning')}}
      </div>
      @endif
      <form class="form" method="POST" action="{{ route('Logingin') }}">
        @csrf
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h3 class="card-title"><strong>{{ __('Login') }}</strong></h3>

          </div>
          <div class="card-body">
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="{{ __('Username...') }}" required>
              </div>

            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control"
                  placeholder="{{ __('Password...') }}" required>
              </div>

            </div>

          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Lets Go') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection