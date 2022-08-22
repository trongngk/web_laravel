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
                      <h4 class="card-title ">Name: {{($data->fullname)}}</h4>
                      <p class="card-title ">{{$data->role=="0" ? "Student":"Teacher"}}</p>
                      <p class="card-title ">Email: {{$data->email}}</p>
                      <p class="card-title ">Phone number: {{$data->phone}}</p>
                      <div class="dropdown-divider"></div>

                      <p class="card-category">
                      <form action="{{route('message.send')}}" method="post">
                        @csrf
                        <input type="hidden" name="mess" value={{$data->fullname}}>
                        <h3>Send Message</h3>
                        <br>
                        <input type="text" name="message">
                        <button name="send">
                          Send
                        </button>
                      </form>
                      </p>
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
                              <th class="text-right">
                                #
                              </th>
                            </tr>
                          </thead>
                          @foreach ($message as $message)
                          <tr>
                            <td>{{$message->created_at}}</td>
                            <td>{{$message->Content}}</td>
                            <td class="td-actions text-right">
                              <form action="{{route('message.destroy', $message->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-success btn-link"><i class="material-icons">delete</i></button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </table>
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
          </div>

        </div>
      </div>
      <!--   Core JS Files   -->
      {{-- @include('layouts.navbars.script') --}}

    </body>
  </html>