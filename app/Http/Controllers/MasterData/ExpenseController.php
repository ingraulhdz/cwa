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



/*$carsPerDay = DB::select(" SELECT CONCAT(DayName(created_at), ' ', Day(created_at)) AS day, count(*) AS total FROM cars GROUP BY day order by created_at DESC ");
$max = DB::select(" SELECT CONCAT(DayName(created_at), ' ', Day(created_at)) AS day, count(*) AS total FROM cars GROUP BY day order by total DESC ");
*/

$cars_today = Car::whereDay('created_at', $dia)->get();

$cars=Car::where('level', '!=', 3)->orderBy('id', 'DESC')->get();


$ago = collect([]);

foreach ($cars as $car) {

$ago->push(['id' => $car->id, 'make' => $car->make, 'model' => $car->model, 'year' => $car->year,  'ago' => $car->created_at->addSeconds(10)->diffForHumans()]);

}


$cars_month = DB::select("SELECT count(cars.id) as total
 from cars
  WHERE cars.created_at >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
  AND cars.created_at < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY "); 
$due_month = DB::select("SELECT sum(cars.price) as total
 from cars
  WHERE cars.created_at >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
  AND cars.created_at < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY ");
$expenses= 1210;
$cars_month = Car::whereMonth('created_at', '=', $mes)->get();
$invoices = Invoice::orderBy('id','DESC')->get();




$carsByDealer = \DB::select("SELECT  dealers.name as dealer, count(cars.dealer_id) as total
 FROM cars
  left join dealers on dealers.id = cars.dealer_id
WHERE cars.created_at >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
  AND cars.created_at < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY 
   group by dealers.name
  order by total DESC
  LIMIT 5");
$carsByDealerC = collect($carsByDealer);


$arraydealers = array();
$arraydealerstotal = array();


foreach ($carsByDealerC as $key ) {

array_push($arraydealers, $key->dealer);

}


foreach ($carsByDealerC as $key ) {

array_push($arraydealerstotal, $key->total);

}


$maxDealer = \DB::select("SELECT  dealers.name as dealer, count(cars.dealer_id) as total
 FROM cars
  left join dealers on dealers.id = cars.dealer_id
WHERE cars.created_at >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
  AND cars.created_at < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY 
   group by dealers.name
  order by total DESC
  LIMIT 5");

if($maxDealer)
{
    $maxDealer  =$maxDealer[0]->total;

  }else{
    $arraydealers = array('No Data this month');

$arraydealerstotal = array(0);

$maxDealer  =0;

  }

$carsPerDay = DB::select(" SELECT CONCAT(DayName(created_at), ' ',Day(created_at)) AS day, COUNT(*) AS total FROM cars GROUP BY day ORDER BY day DESC LIMIT 7");
$carsPerDay = collect($carsPerDay);

$lastDays = array();
$lastDaysTotals = array();


foreach ($carsPerDay as $key ) {

array_push($lastDays, $key->day);

}


foreach ($carsPerDay as $key ) {

array_push($lastDaysTotals, $key->total);

}

$maxDay = DB::select(" SELECT DayName(created_at) AS day, COUNT(*) AS total FROM cars GROUP BY day ORDER BY total DESC");
$maxDay =$maxDay[0]->total;








        return response()->json([
            'cars3' => $ago->take(3), 
            'invoices3' => $invoices->take(3), 
      'dealersTop' => $arraydealers, 
      'dealersTopTotal' => $arraydealerstotal, 
      'lastDays' => $lastDays, 
            'lastDaysTotal' => $lastDaysTotals, 
         'currentMont' => $now->toFormattedDateString(), 
            'ago' => $now->addSeconds(10)->diffForHumans(),
            'today' => $date,
                        'dayN' => $carsPerDay, 
      'maxDay' => $maxDay,
            'maxDealer' => $maxDealer,
            'due' => $due = Invoice::where('is_paid','!=', 1)->sum('due'),
            'income' => $due - $expenses,
            'total_cars' => $cars_month->count(),
            'invoices_open' => $invoices->where('is_paid', 0)->count(),
            'cars_today' => $cars_today->count(),
            'cars_ready' => $cars_month->where('level',1)->count(),
            'cars_invoice' => $cars_month->where('level',2)->count(),
            'cars_news' => $cars_month->where('level',0)->count(),
            'cars_not_assigned' => $cars_month->where('employee_id','!=', null)->where('level','<', 2)->count(),
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
