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
                    <h4 class="card-title ">Challenge</h4>
                    {{-- <p class="card-category"> Here you can manage users</p> --}}
                  </div>
                  <div class="card-body">
                    <div class="row">
                      @if (session()->get("level") === 1)

                      <div class="col-12 text-right">
                        <a href="{{route('challenge.create')}}" class="btn btn-sm btn-primary">New</a>
                      </div>
                      @endif
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                            <tr>
                              <th>Challenge name</th>
                              <th class="text-center">#</th>
                            </tr>
                        </thead>

                        @foreach ($challenge as $challenge)
                        <tbody>

                          <td>{{$challenge->name}}</td>
                          <td class="td-actions text-right">

                            <table>
                              <tr>
                                <th>
                                  <form action="{{route('challenge.detail', $challenge->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-success btn-link"><i
                                        class="material-icons">details</i></button>
                                  </form>
                                </th>

                                <th>
                                  @if (session()->get("level") === 1)
                                  <form action="{{route('challenge.destroy', $challenge->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-success btn-link"><i
                                        class="material-icons">delete</i></button>
                                  </form>
                                  @endif
                                </th>
                              </tr>
                            </table>
                          </td>
                        </tbody>

                        @endforeach
                      </table>
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