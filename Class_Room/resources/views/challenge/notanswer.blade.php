<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.app_index')
  {{-- @include('layouts.navbars.head') --}}

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
                    <h4 class="card-title ">Answer</h4>
                    {{-- <p class="card-category"> Here you can manage users</p> --}}
                  </div>
                  <div class="card-body">                    
                  <h1>
                      Your answer is incorrect. Try again !!!
                  </h1>
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