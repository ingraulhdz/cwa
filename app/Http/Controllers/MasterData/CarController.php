<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Car_Extra;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Detailer;
use App\Models\Extra;
use App\Models\Dealer;
use App\Models\Payment;
use App\Models\MonthPassive;
use App\Models\Month_Expenses;
use App\Models\Expense;
use App\Models\Employee;
use App\Models\BodyStyle;
use App\Models\Service;
use App\Http\Requests\RequestCar;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon; 

use Illuminate\Routing\Route;

class CarController extends Controller
{
    

     public function index(Request $request)
    {
      	$cars = new Car();
        $emplo= Employee::pluck('name','id');






        return view('app.cars.index', compact('cars','emplo'));

    }



    public function getDealers(Request $request, $id){
        if($request->ajax()){
            $car = Car::findOrFail($id);
                if($car->dealer){
                $dealers = Dealer::all();
                }
            return response()->json($dealers);
        }
    }



public function ready_car(Request $request){
   $car= Car::findOrFail($request->id);


if($car->employee){


   $car->level_id = 2; // ready
   $car->save();

   return $car;  
   }else{
$employees= Employee::all();
    return response()->json(["employees" => $employees, "id" => $car->id]);
   }

                                            }





public  function getCars(Request $request){


//$cars = Car::count();
$cars = new Car();


return response()->json([
'inshop_cars' => $cars->where('leve_id',1)->count(),
'ready_cars' => $cars->where('leve_id',2)->count(),
'done_cars' => $cars->where('leve_id',3)->count(),
'due_cars' => $cars->where('leve_id','!=', 4)->count(),
'paid_cars' => $cars->where('leve_id',4)->count()
]);

}

public function done($id){

try{
        $car= Car::findOrFail($id);

   //      if(! $car->employee_id){
   // $messageError = "Select a detailer. ";
   //          \Session::flash('error',$messageError);
   //          return \Redirect::back()->withInput()->withErrors($messageError);
   //      }

        $car->level_id = 3; // ready
        $car->save();

         $message ='Tha Car ' .$car->name(). " is reaady to invoice";
     \Session::flash('message',$message);
        return \Redirect::back();

}catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }



}


public function getEmp(){

$emp = Employee::pluck('id','name');

return response()->json($emp);


}



public function getCar(Request $request){
$car = car::findOrFail($request->id);
$dealers = Dealer::all();
/*$dealer = Dealer::where('id', $car->dealer_id)->get();
$customer = Customer::where('id', $car->customer_id)->get();
$employee = Employee::where('id')
*/

$ex =Extra::all();

    return response()->json([
        'car' => $car,
        'totalExtras' => $car->totalExtras(),
        'dealer' => $car->dealer,
        'dealers' => $dealers,
        'extras' => $car->ex,
        'ex' => $ex,
        'employee' => $car->employee,
        'customer' => $car->customer]);
}



public function getYear(Request $request){
$car = Car::where('vin', $request->vin )->first();
if($car){
$vin = $car->vin;
}
else{
    $vin = null;
}
    return response()->json([
        'car' => $car,
        'vin' => $vin,
       
    ]);
}




public function setExtras(Request $request)
{


$flight = Car_Extra::firstOrCreate(
    ['car_id' => 4], ['extra_id' => 2]
);

//$extras = new Car_Extra($request->all());

$flight->save();

return;


}


public function createCar(Request $request)
{      


    try{
      
$now = Carbon::now();
        $car = Car::orderBy('created_at','DESC')->first()->created_at;
        $lastMonth = $car->format('y-m');
        $currentMonth = $now->format('y-m');


//if( $lastMonth != $currentMonth){

     $month_name = $now->format('F');

      $month = new MonthPassive();
      $month->month_name = $month_name ;
      $month->save();

$expenses= Expense::where('status',1)->get();
$expense_price=0;

foreach ($expenses as $key ) {

  $rel = new Month_Expenses();
$rel->expense_id = $key->id;
$rel->month_passive_id = $month->id;
$expense_price=  $expense_price + $key->price ;
$rel->save();

}

$month->price = $expense_price;
      $month->save();

//}





$car = new Car($request->all());
if( is_null($request->price) ){
}
$car->save();

$extras = json_decode($request->extras); /// get the request extras
$total = count($extras); /// total extras

// create if not exist each extra
for($i=0; $i<$total; $i++){

    $ex = Car_Extra::firstOrCreate([
    'extra_id' => $extras[$i], 'car_id' => $car->id

]);
   
}

$current_extras = Car_Extra::where('car_id',$car->id)->pluck('extra_id')->all(); //get all current extras





//get all current extras
$suma = 0;

for($i=0; $i < count($current_extras); $i++){
$extra = Extra::findOrFail($current_extras[$i]);
$suma = $suma + $extra->price;


}


$car->price_plus = $suma;
$car->save();
$employee = $car->employee;
$carName = $car->name();


        return response()->json([
'car' => $car,
'dealer' => $car->dealer,
'employee' => $car->employee,
]);



























     }catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return response()->json(['error' => $messageError,'msj' => 'hola']);
        }


       /* $car = new Car($request->all());
        $car = new Car();
        $car->make = $request->make;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->dealer_id = $request->dealer_id;
        $car->vin = $request->vin;
*/

//$extras = json_decode($request->extras);
//$total = count($extras);

/*
for($i=0; $i<$total; $i++){

    $ex = Car_Extra::firstOrCreate([
    'extra_id' => $extras[$i], 'car_id' => $car->id

]);
   
}



$current_extras = Car_Extra::where('car_id',$car->id)->pluck('extra_id')->all(); 

//get all current extras
$suma = 0;

for($i=0; $i < count($current_extras); $i++){
$extra = Extra::findOrFail($current_extras[$i]);
$suma = $suma + $extra->price;


}


$car->price_plus = $suma;*/
/*$car->save();

        return response()->json([
            'car' => $car,
            'dealer' => $car->dealer,
            'customer' => $car->customer,
            'employee' => $car->employee]);

*/
}








public function car_extras(Request $request, $id){
            $extras = Car_Extra::get(); 
            return response()->json($extras);
        

}












    public function updateCar(Request $request)
{      

  try{
  $car= Car::findOrFail($request->id);
  $car->fill($request->all());


$extras = json_decode($request->extras);
$total = count($extras);

if($total>0){
for($i=0; $i<$total; $i++){

    $ex = Car_Extra::firstOrCreate([
    'extra_id' => $extras[$i], 'car_id' => $car->id

]);
   
}
}



            if($request->extras)//ask if any extras exists. 
                {
            $current_extras = Car_Extra::where('car_id',$car->id)->pluck('extra_id')->all(); //get all current extras

                $remove = array_values(array_diff( $current_extras,  $extras)); // get extros to remove
                
                     if($remove)
                                {
                                for($i=0; $i< count($remove); $i++)
                                    {                                           
                                       /*$extra= Extra::findOrFail($remove[$i]);
                                       $price = $price - $extra->price;*/
                                        $extraCar = Car_Extra::where('car_id',$car->id)->where('extra_id',$remove[$i])->delete();
                                    }
                                }
                }


$current_extras = Car_Extra::where('car_id',$car->id)->pluck('extra_id')->all(); 

//get all current extras
$suma = 0;

for($i=0; $i < count($current_extras); $i++){
$extra = Extra::findOrFail($current_extras[$i]);
$suma = $suma + $extra->price;


}


$car->price_plus = $suma;
$car->save();
$employee = $car->employee;
$carName = $car->name();

        return response()->json([
            'car' => $car,
            'car_total_extras' => $car->totalExtras(),
            'car_extras' => $car->ex,
            'carName' => $carName,
            'dealer' => $car->dealer,
            'customer' => $car->customer,
            'employee' => $employee]);













  }catch(Exception $e){
    return response()->json(['error'=> $e->getMessage(), "res" => $request->all()]);
  }
}

public function ready($id){

try{
        $car= Car::findOrFail($id);

        if(! $car->employee_id){
   $messageError = "Select a detailer. ";
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

        $car->level_id = 2; // ready
        $car->save();

         $message ='Tha Car ' .$car->name(). " is reaady.";
     \Session::flash('message',$message);
        return redirect()->route('car.index');

}catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }



}





 
    public function create()
{
try{
        return view('app.cars.create');
   
    }catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

}



 public function store(Request $request)
    {





//dd($request);

if($request->name)
{
   try{

        $customer = new Customer($request->all());
        $customer->save();

        $car = new Car($request->all());
        $car->customer_id = $customer->id;
        $car->save();

        $message ='The car '.$request->year.' '.$request->make.' '.$request->model. ' was added!';
        \Session::flash('message',$message);
        return redirect()->route('car.index');  

  }catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
    }
  



} 
else{
   try{

        $car = new Car($request->all());
       // $car->price = 100;
        $car->save();

       }catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
      }



  
    }


if($request->extras){

      for($i=0; $i < count($request->extras); $i++){
                    $new = new Car_Extra();
                    $new->car_id = $car->id;
                    $new->extra_id = $request->extras[$i];
                    $new->save();
          
            }





}



        $message ='The car '.$request->year.' '.$request->make.' '.$request->model. ' was added!';
        \Session::flash('message',$message);
        return redirect()->route('car.index');  




}




public function show($id)
    {
    
    $car = Car::findOrFail($id);
    return view('app.cars.show', compact('car'));
    }




    public function edit($id)   {

      try{
           $car = Car::findOrFail($id);
             return view('app.cars.edit', compact('car'));

        }catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

    }


  public function update(Request $request,$id)
    {

 try
            {

    $car= Car::findOrFail($id);
    $car->fill($request->all());
    $price= $request->price; // 
    $array_extras = Car_Extra::where('car_id',$car->id)->pluck('extra_id')->all(); //get all current extras



            if($request->extras)//ask if any extras exists. 
                {
            
                 $add = array_values(array_diff( $request->extras, $array_extras)); // get elements to  add
                 $remove = array_values(array_diff( $array_extras,  $request->extras)); // get extros to remove


                       if($add)
                               {
                                 for($i=0; $i < count($add); $i++)
                                     {
                                       if(!(in_array($add[$i],$array_extras)))
                                          {
                                            $new = new Car_Extra();
                                            $new->extra_id = $add[$i];
                                            $new->car_id = $car->id;
                                            $new->save();
                                            $extra= Extra::findOrFail($new->extra_id);
                                            $price = $price + $extra->price;
                                           }
                                       }
                                }
                     if($remove)
                                {
                                for($i=0; $i< count($remove); $i++)
                                    {                                           
                                        $extra= Extra::findOrFail($remove[$i]);
                                        $price = $price - $extra->price;
                                        $extraCar = Car_Extra::where('car_id',$car->id)->where('extra_id',$remove[$i])->delete();
                                    }
                                }
                }else
                      {
                           $extraCar = Car_Extra::where('car_id',$car->id)->get();
                              foreach ($extraCar as $extra) 
                                    {
                                     $extra = Extra::findOrFail($extra->extra_id);
                                     $price =$price - $extra->price;
                                    }                                         
                                     Car_Extra::where('car_id', $car->id)->delete();
                    }


    $car->price = $price;
    $car->save();
   
    $fecha = date('m/d/y');
    $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
    $dueDate = date ( 'm/d/y' , $nuevafecha );       
    $cars = new car();


  if($request->stock)
        {
             $dealer = Dealer::findOrFail( $car->dealer_id);
             $cars = $cars->done()->where('dealer_id', $dealer->id);

        }
     else
     {
         $dealer = Customer::findOrFail( $car->customer_id);
         $cars = $cars->done()->where('customer_id', $dealer->id);
     }
       

 
              $message =' Car Updated! ';
             \Session::flash('message',$message);

         return redirect()->route('car.index');

            }catch(Exception $e)
                {
                    $messageError = "Someting is worng: ".$e->getMessage();
                    \Session::flash('error',$messageError);
                    return \Redirect::back()->withInput()->withErrors($messageError);
                }
    }     



    
public function print(){

$car= new Car();
$cars = $car->inShop();
 $pdf = \PDF::loadView('app.cars.pdf',compact('cars'));
 // $pdf->save(storage_path('invoices/pdf.pdf'));

return $pdf->stream();





}



	public function destroy($id)
	{

		try{
		 Car::destroy($id);
        Session::flash('message','The car was deleted');
        return redirect()->route('car.index');

         }catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }
	}



	public function import(Request $request)
    {

try{
          \Excel::load($request->excel, function($reader) {
          $excel = $reader->get();
          $reader->each(function($request) {

            $car = new Car;
            $car->make = $request->make;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->vin = $request->vin;
            $car->color = $request->color;
            $car->dealer_id = $request->dealer_id;
            $car->BodyStyle_id = $request->BodyStyle_id;
            $car->price = $request->price;
            $car->stock = $request->stock;
            $car->service_id = 1;
            $car->is_invoice = $request->is_invoice;
            $car->date_of_service = $request->date_of_service;
            $car->save();
 
        });
    
    });
 


         $message =" Cars were imported!";
         \Session::flash('message',$message);
        return redirect()->route('car.index');


    }catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }



    }












}
