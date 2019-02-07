<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\Dealer;

use App\Models\UniqueExpense;
use App\Models\Invoice;

use Carbon\Carbon; 

use App\Models\Employee;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Month_Supplies;
use App\Models\MonthPassive;
use App\Models\Expense;
use App\Models\Supply;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;

class ExpenseController extends Controller
{
    

     public function index()
    {
        $expenses = Expense::orderBy('id', 'ASC')->get();
        return view('app.expenses.index', compact('expenses'));
    }

     public function main()
    {
        return view('app.expenses.main');
    }


public function AddSupply(Request $request){

try{


 $month = MonthPassive::whereYear('created_at',Carbon::now()->format('Y'))->whereMonth('created_at', Carbon::now()->format('m'))->first();
  $supply = new Month_Supplies();
$supply->month_passive_id = $month->id;
$supply->supply_id = $request->supply_id;
$supply->amount = $request->amount;
$supply->total_price = $request->total;
$supply->save();
return $supply;
 }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return $messageError;
            }


}

    public function getDataExpenses(Request $request){
$now = new \DateTime();
$date = $now->format('g:ia \o\n l jS F Y');

$now = Carbon::now();
$y = $now->format('Y');
$m = $now->format('m');
$month = MonthPassive::whereYear('created_at', $y)->whereMonth('created_at', $m)->first();
$array_expense_name = array();
$array_expense_cost = array();

$expenses= Expense::where('status',1)->get();
$unique_expenses = UniqueExpense::where('month_passive_id', $month->id)->get();
$supplies= ($month->supplies);








foreach ($supplies as $key ) {
    array_push($array_expense_name, $key->name);
}


foreach ($supplies as $key ) {
array_push($array_expense_cost, $key->price);
}




foreach ($expenses as $key ) {
    array_push($array_expense_name, $key->name);
}


foreach ($expenses as $key ) {
array_push($array_expense_cost, $key->price);
}


if($unique_expenses){
    foreach ($unique_expenses as $key ) {

array_push($array_expense_name, $key->name);

}


foreach ($unique_expenses as $key ) {

array_push($array_expense_cost, $key->price);

}
$sum_unique_expenses= $unique_expenses->sum('price');

}



$expenses_all =  collect();

foreach ($expenses as $key) {

    $expenses_all->push([
    'name' => $key->name,
    'type' => 'Montly Expense',
    'price' => $key->price
]);

}

if($unique_expenses){

foreach ($unique_expenses as $key) {

    $expenses_all->push([
    'name' => $key->name,
    'type' => 'Unique Expense',
    'price' => $key->price
]);

}

}


if($supplies){

foreach ($supplies as $key) {

    $expenses_all->push([
    'name' => $key->name,
    'type' => 'Supply',
    'price' => $key->price
]);

}

}






$sum_expenses = $expenses->sum('price');
$sum_supplies = 0 ;


$total_expenses = ( $sum_expenses + $sum_supplies + $sum_unique_expenses );
$total_income = 500;
$profit = $total_income - $total_expenses;



        return response()->json([
            'array_expense_cost' => $array_expense_cost,
            'array_expense_name' => $array_expense_name,
            'total_expenses' => $total_expenses,
            'total_income' => $total_income,
            'profit' => $profit,
            'expenses' => $expenses_all,
        ]);

    }
 


	public function create()
	{
        return view('app.expenses.create');
	}


    public function CreateUniqueExpense(Request $request)
    {
       try{

$month_id = MonthPassive::orderby('id','DESC')->first()->month;

            $expense = new UniqueExpense($request->all());
            $expense->month_id = 1;
            $expense->save();

        }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return $messageError;
            }

            $message ='The expense was created!.';
            \Session::flash('message',$message);
             return 1;
    }


	public function store(Request $request)
	{
		try{

			$expense = new Expense($request->all());
			$expense->save();

 		}catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return $messageError;
        	}

            $message ='The expense was created!.';
            \Session::flash('message',$message);
             return 1;
	}




	public function edit($id)
	{
			$expense = Expense::findOrFail($id);
			return view('app.expenses.edit', compact('expense'));
	}


	public function update(Request $request,$id)
	{
        $expense= Expense::findOrFail($id);
        $expense->fill($request->all());
        $expense->save();

        $message ='Expense updated! ';
	 	\Session::flash('message',$message);
        return redirect()->route('expense.index');
	}



    public function destroy($id)
{

 $item = expense::findOrFail($id);

 if($item->status){
$item->status = 0;
$message="Expense inactive";
}
else{

$item->status = 1;
$message ="Expense active";

}

 $item->save();
 return back()->with('success', $message);

}



   
	



	public function show($id)
	{

$expense = Expense::findOrFail($id);
return view('app.expenses.show', compact('expense'));

	}



public function pdf(Request $request)
   {
        $expenses = Expense::all();
        $date = date('Y-m-d');
        $view =  \View::make('cliente.reporte-clientes', compact('expenses', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
	    
	    return $pdf->download('reporte-Expense.pdf');

   }





public function excel()
     {
        
        $clientes = Cliente::orderby('id','DESC')->get();
        $date = date('Y-m-d');
        Excel::create('Clientes',function($excel) use($clientes)
        { 
	        $excel->sheet('Clientes', function($sheet) use($clientes)
	         {
	        $sheet->loadView('cliente.reporte-clientes-Excel', ['clientes'=>$clientes ]);
              });
        })->export('xlsx');

	}


}
