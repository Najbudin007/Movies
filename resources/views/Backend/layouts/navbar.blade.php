<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="z-index:0 !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     
      <li class="nav-item">
        <form action="{{route("logout")}}" method="POST">
          @csrf
        <button  type="submit"class="btn btn-sm btn-outline-dark"  role="button">
  Logout
        </button>
      </form>
      </li>
    </ul>
  </nav>