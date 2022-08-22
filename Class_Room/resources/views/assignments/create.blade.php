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
                <form action="{{route('assignments.store')}}" enctype="multipart/form-data" method="post">
                  @csrf
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">{{ __('Add challenge') }}</h4>
                      {{-- <p class="card-category">{{ __('User information') }}</p> --}}
                    </div>
                    <div class="card-body ">
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Time') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input class="form-control" type="datetime-local" name="time" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input class="form-control" type="text" name="description"
                              placeholder="{{ __('Description') }}" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('File ') }}</label>
                        <div class="col-sm-7">
                          <div>
                            <input class="form-control" type="file" name="file" placeholder="{{ __('File') }}" required>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                      </div>
                    </div>
                </form>
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