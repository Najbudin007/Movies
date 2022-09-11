
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/">Movie <span>Browser</span></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          @if(auth()->user())

          <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
          @endif
          @if(auth()->user())
          <li class="d-flex">
            <form action="{{route("logout")}}" method="POST">
              @csrf
            <button class="btn btn-sm btn-primary p-8 text-white" type="submit">Logout</button>
          </form>
          <div id="favi" class="ml-2">

            Fav( <span>{{ count(auth()->user()->favourites) }}</span> )
          </div>
          </li>
          @else
          <li><a class="btn btn-sm btn-primary p-8 text-white" href="{{route('login.form')}}">Login</a></li>

          @endif
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>