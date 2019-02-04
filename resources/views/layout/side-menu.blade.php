<ul class="sidebar navbar-nav ">
        <li @click="menu=0" class="nav-item active">
          <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
            
        <hr style="color: red">


  <li class="nav-item">
          <a class="nav-link" href="{{ url('car') }}">
            <i class="fas fa-car fa-car" style="color: #dc3545"></i>
            <span>Cars</span></a>
    </li>


  <li @click="menu=100" class="nav-item">
          <a class="nav-link" href="{{ url('dealer') }}">
            <i class="fas fa-building fa-building" style="color: #dc3545"></i>
            <span>Dealers</span></a>
    </li>


  <li @click="menu=100" class="nav-item">
          <a class="nav-link" href="{{ url('employee') }}">
            <i class="fas fa-chalkboard-teacher fa-chalkboard-teacher" style="color: #dc3545"></i>
            <span>Employees</span></a>
    </li>


  <li @click="menu=100" class="nav-item">
          <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-users fa-users" style="color: #dc3545"></i>
            <span>Users</span></a>
    </li>



  <li @click="menu=100" class="nav-item">
          <a class="nav-link" href="{{ url('customer') }}">
            <i class="fas fa-address-card fa-address-card" style="color: #dc3545"></i>
            <span>Customer</span></a>
    </li>





  <li class="nav-item">
          <a class="nav-link" href="{{ url('invoice') }}">
            <i class="fas fa-address-card fa-envelope" style="color: #dc3545"></i>
            <span>Invoices</span></a>
    </li>



   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-arrow-down fa-arrow-down"style="color: #dc3545"></i>
            <span>Expenses</span>
          </a>
          <div class="dropdown-menu bg-dark" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header" style="color: #dc3545">About Car:</h6>
            <a class="dropdown-item"  href="{{ url('supply') }}"><i class='fa fa-car' style="color: #dc3545"></i> Supplies</a>
            <a class="dropdown-item" href="{{ url('expense') }}"><i class='fa fa-ad' style="color: #dc3545"></i> Expenses</a>
            <div class="dropdown-divider"></div>
          </div>
  </li>

 




   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-link fa-link"style="color: #dc3545"></i>
            <span>Modules</span>
          </a>
          <div class="dropdown-menu bg-dark" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header" style="color: #dc3545">About Car:</h6>
            <a class="dropdown-item"  href="{{ url('body_style') }}"><i class='fa fa-car' style="color: #dc3545"></i> Body Styles</a>
            <a class="dropdown-item" href="{{ url('extra') }}"><i class='fa fa-ad' style="color: #dc3545"></i> Extras</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header" style="color: #dc3545">About Services:</h6>
            <a class="dropdown-item"  href="{{ url('service') }}"><i class='fa fa-american-sign-language-interpreting' style="color: #dc3545"></i> Services</a>
            <a class="dropdown-item"  href="{{ url('payment') }}"><i class='fa fa-money-check-alt' style="color: #dc3545"></i> Payments</a>
          </div>
  </li>

 <li class="nav-item">
          <a class="nav-link" href="{{ url('report') }}">
            <i class="fas fa-chart-pie fa-chart-pie" style="color: #dc3545"></i>
            <span>Reports</span></a>
    </li>


        
      </ul>



<!--

<li class="header"><a href="{{ url('/') }}">Web Page</a></li>
<li><a href="{{ url('/home') }}"><i class='fa fa-home'></i> <span> Home</span></a></li>
<li><a href="{{ url('car') }}"><i class='fa fa-car'></i> <span> Cars</span></a></li>
<li><a href="{{ url('employee') }}"><i class='fa fa-users'></i> <span> Employees</span></a></li>
<li><a href="{{ url('dealer') }}"><i class='fa fa-building'></i> <span> Dealers</span></a></li>
<li><a href="{{ url('customer') }}"><i class='fa fa-user'></i> <span> Customers</span></a></li>
<li><a href="{{ url('appointment') }}"><i class='fa fa-calendar-plus-o'></i> <span> Appointments</span></a></li>
<li class="treeview">
                <a href="#"><i class='fa fa-envelope'></i> <span>Invoice</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                                <li><a href="{{ url('invoice') }}"><i class='fa fa-plus'></i> <span> Create Invoice</span></a></li>
                                <li><a href="{{ url('invoices') }}"><i class='fa fa-eye'></i> <span> View Invoices</span></a></li>
                                <li><a href="{{ url('invoice.record') }}"><i class='fa fa-calendar-plus-o'></i> <span> Record</span></a></li>
                </ul>
</li>
<li><a href="{{ url('report') }}"><i class='fa fa-bar-chart'></i> <span> Reports</span></a></li>         



<li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Modules</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                                <li><a href="{{ url('service') }}"><i class='fa fa-asl-interpreting'></i> <span> Services</span></a></li>
                                <li><a href="{{ url('extra') }}"><i class='fa fa-plus'></i> <span> Extras</span></a></li>
                                <li><a href="{{ url('body') }}"><i class='fa fa-car'></i> <span> Body</span></a></li>
                                <li><a href="{{ url('payment') }}"><i class='fa fa-envelope'></i> <span> Payments</span></a></li>
                </ul>
            </li>

  -->