<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">

      </li>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="/logout" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="nav-link btn w-100 text-start" style="background: none; border: none; padding-left: 0;">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p class="d-inline">Logout</p>
            </button>
        </form>
    </li>

    </ul>
  </nav>
  <!-- /.navbar -->