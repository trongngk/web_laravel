<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  {{-- @include('layouts.navbars.head') --}}
  @include('layouts.app_index')

  <body class="clickup-chrome-ext_installed">

    <div class="wrapper ">
      @include("layouts.navbars.sidebar")
      <div class="main-panel">
        <!-- Navbar -->
        @include('layouts.navbars.navs')
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <form action="{{route('data.store')}}" method="post">
                  @csrf
                  <div class="card ">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">{{ __('Add User') }}</h4>
                      <p class="card-category">{{ __('User information') }}</p>
                    </div>
                    <div class="card-body ">
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('User name') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input class="form-control" type="text" name="username" placeholder="{{ __('Name') }}"
                              required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Fullname') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input class="form-control" type="text" name="fullname" placeholder="{{ __('Full name') }}"
                              required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input class="form-control" type="password" name="password"
                              placeholder="{{ __('Password') }}" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="{{ __('Email') }}"
                              required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input class="form-control" type="text" name="phone" placeholder="{{ __('Phone number') }}"
                              required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input type="radio" name="role" value="1">Teacher
                          <input type="radio" name="role" value="0">Student
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                  </div>
              </div>
              </form>
            </div>
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{route("data.index")}}" class="btn btn-sm btn-primary">Back</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
    <!--   Core JS Files   -->
    {{-- @include('layouts.navbars.script') --}}

  </body>
</html>