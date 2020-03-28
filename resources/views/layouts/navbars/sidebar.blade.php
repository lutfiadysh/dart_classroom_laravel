<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://github.com/lutfiadysh/dart_classroom_laravel" class="simple-text logo-normal">
      {{ __('Dart Classroom') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">house</i>
            <p>{{ __('Classes') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">calendar_today</i>
            <p>{{ __('Calendar') }}</p>
        </a>
      </li>
      <div class="dropdown-divider"></div>
      {{-- add new sidebar menu --}}
    </ul>
  </div>
</div>