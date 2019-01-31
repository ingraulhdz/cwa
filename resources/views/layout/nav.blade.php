 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="/"><img src="/img/logo.png" height="70%" width="80%"></a>

      <button class="btn btn-link btn-lg text-white order-0 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars" style="color:#dc3545;"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Car..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-danger" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-car fa-fw" style="color: #dc3545"></i>
            <span class="badge badge-success" id="nav_cars"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown" style="font-size: 12px">

            <div id="nav_card_cars"></div>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/car">See all cars</a>
          </div>

        </li>

           <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw" style="color: #dc3545"></i>
            <span class="badge badge-success" id="nav_invoices"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown" >

            <div id="nav_card_invoices"></div>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/invoice">See all invoices</a>
          </div>

        </li>



        <li class="nav-item dropdown no-arrow ">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw" style="color: #dc3545"></i>
            <small>Raul Hernandez</small>
            <!-- <font style="color:white"> | </font><small>Admin</small> -->

          </a>
          <div class="dropdown-menu dropdown-menu-right  " aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#"><b>Admin</b></a>
                        <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="#"><i class="fa fa-user"  style="color: #dc3545"></i> My Profile</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-key"  style="color: #dc3545"></i> Logout</a>
          </div>
        </li>
      </ul>

    </nav>