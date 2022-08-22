<<!DOCTYPE html>
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
                      <h4 class="card-title ">Assignments</h4>
                      {{-- <p class="card-category"> Here you can manage users</p> --}}
                    </div>
                    <div class="card-body">
                      <div class="row">
                        @if (session()->get("level") === 1)
                        <div class="col-12 text-right">
                          <a href="{{route('assignments.create')}}" class="btn btn-sm btn-primary">New challenge</a>
                        </div>
                        @endif
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <tr>
                              <th>Due to</th>
                              <th>Description</th>
                              <th class="text-center">#</th>
                            </tr>
                            @foreach ($assignments as $assignment)
                          <tbody>
                            <td>{{$assignment->deadline}}</td>
                            <td>{{$assignment->description}}</td>
                            <td>
                              @if (session()->get('level') === 1)
                              <form action="{{route('assignments.Teacherdetail')}}" method="post">
                                @csrf
                                <input type="hidden" name="assign" value={{$assignment->id}}>
                                <button class="btn btn-success btn-link"><i class="material-icons">details</i></button>
                              </form>
                              <form action="{{route('assignments.destroy', $assignment->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-success btn-link"><i class="material-icons">delete</i></button>
                              </form>
                              @else
                              <form action="{{route('assignments.Studentdetail', $assignment->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="assign" value={{$assignment->id}}>
                                <button class="btn btn-success btn-link"><i class="material-icons">details</i></button>

                              </form>
                              @endif
                            </td>
                          </tbody>
                          @endforeach
                          </thead>
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