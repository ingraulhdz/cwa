 @section('module_name')
   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-arrow-down fa-sm fa-fw text-gray-400"></i>
Expenses</h6><h6>
        <a class="nav-link  text-muted pull-right float-right" href="#" id="date_expense" style="display: none" data-toggle="modal" data-target="#add_expenses">
<small>Data for <?php
$today = date('F Y');               // Sat Mar 10 17:16:18 MST 2001
echo $today;
              ?>   </small>     </a>
      

 </h6>

@endsection

@section('options')
 <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item"  href="#" id="add_expense" data-toggle="modal" data-target="#add_expenses">  <i class="fas fa-plus fa-sm fa-fw text-gray-600"></i> Add Expense</a>
                      <a class="dropdown-item"  href="#" id="add_supply" data-toggle="modal" data-target="#add_supplys">  <i class="fas fa-plus fa-sm fa-fw text-gray-600"></i> Add Supply</a>
                      <a class="dropdown-item"  href="{{route('expense.create')}}" id="btn-add">  <i class="fas fa-plus fa-sm fa-fw text-gray-600"></i> Add</a>
                      <a class="dropdown-item"  href="{{url('expense.print')}}"  id="btn-export-expense">  <i class="fas fa-file fa-sm fa-fw text-gray-600"></i> Export</a>
                      <div class="dropdown-divider"></div>
                    </div>

@endsection



