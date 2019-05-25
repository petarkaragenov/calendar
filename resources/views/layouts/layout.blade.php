<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <title>Calendr</title>
</head>
<body>

    <div>
        <div class="tile is-ancestor is-marginless">
            <div class="tile is-2 has-background-grey-darker" style="min-height: 100vh">
                <aside class="menu">
                    <p class="menu-label has-text-warning">
                        View
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a class="has-text-white-ter" href="/appointments">
                                Appointments
                                <span class="tag is-black is-pulled-right">
                                    {{ auth()->user()->appointments()->count() }}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="has-text-white-ter" href="/tasks">
                                Tasks
                                <span class="tag is-black is-pulled-right">
                                    {{ auth()->user()->tasks()->count() }}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="has-text-white-ter" href="/notes">
                                Notes
                                <span class="tag is-black is-pulled-right ml-1">
                                    {{ auth()->user()->notes()->count() }}
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="menu-label has-text-warning">
                        Create New
                    </p>
                    <ul class="menu-list">
                        <li><a class="has-text-white-ter" href="/appointments/create">Appointment</a></li>
                        <li><a class="has-text-white-ter" href="/tasks/create">Task</a></li>
                        <li><a class="has-text-white-ter" href="/notes/create">Note</a></li>
                    </ul>
                    <p class="menu-label has-text-warning">
                        Trashed
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a class="has-text-white-ter" href="/trashed-tasks">
                                Tasks
                                <span class="tag is-black is-pulled-right">
                                    {{ auth()->user()->tasks()->onlyTrashed()->get()->count() }}
                                </span>
                            </a>                          
                        </li>
                        <li>
                            <a class="has-text-white-ter" href="/trashed-notes">
                                Notes
                                <span class="tag is-black is-pulled-right">
                                    {{ auth()->user()->notes()->onlyTrashed()->get()->count() }}
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="menu-label has-text-warning">
                        Actions
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a class="has-text-white-ter" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="tile is-10">
                @yield('content')
                @if (session()->has('success'))
                    <div class="flash-message has-background-success has-text-white-ter">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
      $(document).ready(function() {
          $('.menu-label').click(function() {
              $(this).next().slideToggle()
          })
      })
  </script>
    @yield('scripts')
</body>
</html>