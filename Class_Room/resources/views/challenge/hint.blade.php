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
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Hint: {{$challenge->hint}}</h4>
                    {{-- <p class="card-category"> Here you can manage users</p> --}}
                  </div>
                  <div class="card-body">
                    <form action="{{route('challenge.detail', $challenge->id)}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary">{{ __('Back') }}</button>

                    </form>
                  </div>
                </div>
              </div>




            </div>
          </div>
          <!--   Core JS Files   -->
          {{-- @include('layouts.navbars.script') --}}
  </body>
</html>