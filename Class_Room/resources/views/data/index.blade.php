<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.app_index')

  <body class="clickup-chrome-ext_installed">

    <div class="wrapper">
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
                    <h4 class="card-title ">Users</h4>
                    <p class="card-category"> Here you can manage users</p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      @if (session()->get("level") === 1)

                      <div class="col-12 text-right">
                        <a href="{{route("data.create")}}" class="btn btn-sm btn-primary">Add user</a>
                      </div>
                      @endif
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Role</th>
                            <th class="text-center">#</th>
                          </tr>
                        </thead>
                        @foreach($datas as $data)
                        <tbody>
                          <td>{{$data->username}}</td>
                          <td>{{$data->fullname}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->phone}}</td>
                          <td>{{$data->role=="0" ? "Student":"Teacher"}}
                          <td class="td-actions text-right">
                            <table>
                              <tr>
                                <th>
                                  <form action="{{route('data.detail', $data->id)}}">
                                    @csrf
                                    <input type="hidden" name="mess" value={{$data->fullname}}>
                                    <button class="btn btn-success btn-link"><i
                                        class="material-icons">details</i></button>
                                  </form>
                                </th>
                                <th>
                                  @if (session()->get("level") === 1)

                                  <form action="{{route('data.edit', $data->id)}}">
                                    @csrf
                                    <button class="btn btn-success btn-link"><i class="material-icons">edit</i></button>
                                  </form>
                                </th>
                                <th>
                                  {{-- @if (session()->get("level") === 1) --}}
                                  <form action="{{route('data.destroy', $data->id)}}" method="post">
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
        </div>

      </div>
    </div>
    <!--   Core JS Files   -->
    {{-- @include('layouts.navbars.script') --}}
  </body>
</html>