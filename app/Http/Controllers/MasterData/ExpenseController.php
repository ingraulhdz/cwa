<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\Dealer;

use App\Models\Invoice;

use Carbon\Carbon; 

use App\Models\Employee;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Expense;
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


    public function getDataExpenses(Request $request){
$now = new \DateTime();
$mes = $now->format('m');
$dia = $now->format('d');
$date = $now->format('g:ia \o\n l jS F Y');
$now = Carbon::now();

$carsPerDay = Expense::all();

$array_expense_name = array();
$array_expense_cost = array();

$expenses= Expense::get();

$total_expenses = $expenses->sum('price');
$total_income = 500;
$profit = $total_income - $total_expenses;
foreach ($expenses as $key ) {

array_push($array_expense_name, $key->name);

}


foreach ($expenses as $key ) {

array_push($array_expense_cost, $key->price);

}









        return response()->json([
            'array_expense_cost' => $array_expense_cost,
            'array_expense_name' => $array_expense_name,
            'total_expenses' => $total_expenses,
            'total_income' => $total_income,
            'profit' => $profit,
        ]);

    }
 


	public function create()
	{
        return view('app.expenses.create');
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
