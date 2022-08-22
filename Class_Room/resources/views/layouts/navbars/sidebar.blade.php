<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      {{ __('Class Room') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('data.index') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Home') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('message.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Message') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('assignments.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Assignment') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('challenge.index') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Challenge') }}</p>
        </a>
      </li>
     
    </ul>
  </div>
</div>

