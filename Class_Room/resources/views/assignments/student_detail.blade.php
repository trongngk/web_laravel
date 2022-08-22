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
                    <form action="{{route('assignmentSubmit.store', $assignment->id)}}" enctype="multipart/form-data"
                      method="post">
                      @csrf
                      <h4 class="card-title ">Assignments [ {{$assignment->description}}]</h4>
                      <p class="card-category">File: <a
                          href="{{route('assignments.downloadFile', $assignment->filename)}}">{{$assignment->filename}}</a>
                        &emsp; Due to: {{$assignment->deadline}}</p>
                      <br>
                      Turn in
                      <input type="file" name="file" placeholder="Choose file">
                      @error('file')
                      <div>{{ $message }}</div>
                      @enderror
                      <br>
                      <div>
                        <button type="submit">
                          Turn in
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr>
                            <th>Time submit</th>
                            <th>File</th>
                            <th>Student</th>
                            <th>#</th>
                          </tr>
                          @foreach ($assignmentSubs as $assignmentSub)
                        <tbody>
                          <td>{{$assignmentSub->created_at}}</td>
                          <td><a
                              href="{{route('assignments.downloadFile', $assignmentSub->filename)}}">{{$assignmentSub->filename}}</a>
                          </td>
                          <td>{{$assignmentSub->studentSubmit}}</td>
                          <td>
                            <form action="{{route('assignments.destroySub', $assignmentSub->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-success btn-link"><i class="material-icons">delete</i></button>
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
    </div>
    {{--
    <!--   Core JS Files   --> --}}
    {{-- @include('layouts.navbars.script') --}}
  </body>
</html>