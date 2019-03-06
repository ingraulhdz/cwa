<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

use App\Models\MonthPassive;
use App\Models\Dealer;
use App\Models\Invoice;
use Carbon\Carbon; 
use DB;
class DashboardController extends Controller
{
    //
    public function index(){
//
      if(\Auth::user()){

$rol = \Auth::user()->employee->rol->name;


switch ($rol) {
    case 'Developer':
      return view('app.dashboards.admin');
        break;  

          case 'Admin':
      return view('app.dashboards.admin');
        break;

    case 'Detailer':
      return view('app.dashboards.detailer');
        break;

    case 'Manager':
      return view('app.dashboards.manager');
        break;  

         case 'External':
      return view('app.dashboards.external');
        break;  

       case 'Salaried':
      return view('app.dashboards.salaried');
        break;
}

      }
    return view('home');

    }

    public function getDataDashboard(Request $request){
$now = new \DateTime();
$mes = $now->format('m');
$dia = $now->format('d');
$y = $now->format('y');
$date = $now->format('g:ia \o\n l jS F Y');
$now = Carbon::now();

$cars=Car::where('level_id', '!=', 4)->orderBy('id', 'DESC')->get();



$ago = collect([]);
foreach ($cars as $car) {
$ago->push(['id' => $car->id, 'make' => $car->make, 'model' => $car->model, 'year' => $car->year,  'ago' => $car->created_at->addSeconds(10)->diffForHumans()]);
}

$expenses= MonthPassive::whereMonth('created_at', $mes)->first();

if($expenses){

$expenses = $expenses->price;
}else{
  $expenses = 0;
}


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



$carsPerDay = DB::select(" SELECT CONCAT(DayName(created_at), ' ',Day(created_at)) AS day, COUNT(*) AS total FROM cars GROUP BY day ORDER BY created_at DESC LIMIT 7");
$carsPerDay = collect($carsPerDay);

$lastDays = array();
$lastDaysTotals = array();


foreach ($carsPerDay as $key ) {

array_push($lastDays, $key->day);

}


foreach ($carsPerDay as $key ) {

array_push($lastDaysTotals, $key->total);

}


$employees = DB::table('employees')
->join('cars', 'employees.id', '=', 'cars.employee_id')
->select('employees.name as name', DB::raw("count(cars.employee_id) as total"))->whereMonth('cars.created_at', $mes)
->groupBy('employees.name')
->get()->take(3);

$arrayEmployees = array();
$employeesTotal = array();
foreach ($employees as $key ) {

array_push($arrayEmployees, $key->name);

}
foreach ($employees as $key ) {

array_push($employeesTotal, $key->total);

}


$cars_today = Car::whereDay('created_at', $dia)->whereMonth('created_at', $mes)->get();

$cars_month = Car::whereMonth('created_at', '=', $mes)->get();


		return response()->json([
       'cars_monthly' => $cars_month->count(),
     'cars_today' => $cars_today->count(),
       'expenses' => $expenses,
      'due' => $due = Car::where('level_id','!=', 4)->sum('price'),
      'income' => $income = Car::where('level_id', 4)->sum('price'),
      
      'employees' => $arrayEmployees, 
      'employeesTotal' => $employeesTotal, 
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
		  'invoices_open' => $invoices->where('is_paid', 0)->count(),
			'cars_ready' => $cars_month->where('level_id',2)->count(),
			'cars_invoice' => $cars_month->where('level_id',3)->count(),
			'cars_news' => $cars_month->where('level_id',1)->count(),
			'cars_not_assigned' => $cars_month->where('employee_id','!=', null)->where('employee_id', null)->count(),
		]);

    }
 








}