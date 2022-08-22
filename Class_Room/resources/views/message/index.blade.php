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
                    <h4 class="card-title ">Receive Message</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr>
                            <th>
                              Time
                            </th>
                            <th>
                              Content
                            </th>
                            <th>
                              From
                            </th>
                          </tr>
                        </thead>
                        @foreach ($message as $message)
                        <tr>
                          <td>{{$message->created_at}}</td>
                          <td>{{$message->Content}}</td>
                          <td>{{$message->userSent}}</td>
                        </tr>
                        @endforeach
                      </table>
                    </div>
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