<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
                <div class="card">
                  <div class="card-header card-header-primary">
                    @csrf
                    <h4 class="card-title">Hint</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <form action="{{route("challenge.hint", $challenge->id)}}" method='post'>
                        @csrf
                        <button class="btn btn-success btn-link">Show hint</button>
                      </form>
                      <div class="dropdown-divider"></div>
                      <form action="{{route("challenge.submit", $challenge->id)}}" method="post">
                        @csrf
                        <input class="form-control" type="text" name="answer" placeholder="{{ __('Answer...') }}"
                          required>
                        <br>
                        <button class="btn btn-success btn-link">Submit</button>

                      </form>

                    </div>
                    <form action="{{route('challenge.index')}}">
                      @csrf
                      <button type="submit" class="btn btn-primary">{{ __('Back') }}</button>
                    </form>
                  </div>
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