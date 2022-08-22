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
                <form action="{{route('assignments.update', $assignment->id) }}" enctype="multipart/form-data"
                  method="post">
                  @csrf
                  @method('PUT')
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">{{ __('Edit challenge') }}</h4>
                    </div>
                    <div class="card-body ">
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('File ') }}</label>
                        <div class="col-sm-7">
                          <div>
                            <input class="form-control" type="file" name="file" placeholder="{{ __('File') }}" required>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Change') }}</button>
                      </div>
                    </div>
                  </div>
                </form>
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