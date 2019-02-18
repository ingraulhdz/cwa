<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

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
      return view('app.dashboards.developer');
        break;    case 'Admin':
      return view('app.dashboards.developer');
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





		return response()->json([
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
 








//RRRRRRRRRRRRR








}