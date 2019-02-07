<div class="options-bar">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/expense">
   <i class="fa fa-building" style="color: #dc3545;"></i>
   {{$title or 'Expenses'}} 
  <small>@yield('subtitle')</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{ url()->previous() }}">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-arrow-left"></i> Back</button>
        </a>
      </li>

        <li class="nav-item" id="btn-add">
        <a class="nav-link" href="{{route('expense.create')}}">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-plus"></i> Add</button>
        </a>
      </li>

       <li class="nav-item" id="btn-export-expense">
        <a class="nav-link" href="{{url('expense.export')}}">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-print"></i> Export</button>
        </a>
      </li>

       <li class="nav-item" id="btn-add-expense" style="display: none">
        <a class="nav-link" href="#" id="add_supply" data-toggle="modal" data-target="#add_supplys">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-arrow-left"></i> Add Supply</button>
        </a>
      </li>

        <li class="nav-item" id="btn-add-supply" style="display: none">
        <a class="nav-link" href="#" id="add_expense" data-toggle="modal" data-target="#add_expenses">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-arrow-left"></i> Add Expense</button>
        </a>
      </li>

        <a class="nav-link  text-muted pull-right float-right" href="#" id="add_expense" data-toggle="modal" data-target="#add_expenses">
<small>Data for <?php
$today = date('F Y');               // Sat Mar 10 17:16:18 MST 2001
echo $today;
              ?>   </small>     </a>
      

    @yield('buttons')

          </ul>

 
<!--
        <li class="nav-item">
        <a class="nav-link" href="#">
        <button class="btn btn-md btn-outline-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
        </a>
      </li>

    -->

  </div>

  </div>
</nav>

