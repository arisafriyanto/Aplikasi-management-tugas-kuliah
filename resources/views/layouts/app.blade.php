<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Afriyan Task</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/components.css">
  <link rel="stylesheet" href="/DataTables/datatables.min.css">

  
    @yield('style')

</head>

<body>
    
<div id="app">

  
  @guest


  <main class="py-3">
      @yield('content')
  </main>
  

  @else

  
      <div class="main-wrapper">

          <nav class="navbar navbar-expand-lg main-navbar">
              <form class="form-inline mr-auto">

              <ul class="navbar-nav mr-3">
                  <li>
                    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                      <i class="fas fa-bars"></i>
                    </a>
                  </li>

                  <li>
                    <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                      <i class="fas fa-search"></i>
                    </a>
                  </li>
              </ul>

              <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              </div>

              </form>

              <ul class="navbar-nav navbar-right">
          
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{asset('img/avatar/avatar-3.png')}}" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi,{{ Auth::user()->name }}</div>
                  </a>

                    <div class="dropdown-menu dropdown-menu-right">  
                    
                    <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>
            
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            
                    </div>
                </li>
          
              </ul>
          </nav>

          
          @include('layouts.navigation')

          
          <div class="main-content">
              @yield('content')
          </div>
    
        </div>

          <footer class="main-footer">
              <div class="footer-left">
              Copyright &copy; 2020 <div class="bullet"></div> arisafriyanto
              </div>
          </footer>

        @endguest
  
</div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="/js/stisla.js"></script>

  <script src="/js/scripts.js"></script>
  <script src="/js/custom.js"></script>
  <script src="/DataTables/datatables.min.js"></script>

  <script>
    $(document).ready(function () {
        $('#dataTables').dataTable();
    });
  </script>

  <script src="/js/page/index-0.js"></script>
  @yield('script')
</body>
</html>