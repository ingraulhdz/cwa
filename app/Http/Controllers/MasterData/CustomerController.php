<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Extra;
use App\Models\Customer;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;

class CustomerController extends Controller
{
    

     public function index()
    {
     
      $customers = Customer::orderBy('id', 'DESC')->get();
      return view('app.customers.index', compact('customers'));
    }



	public function create()
{
        return view('app.customers.create');

	}



	public function store(Request $request)
	{


$validatedData = $request->validate([
         'email' => 'required|email|unique:users',
    'phone' => 'required|numeric',

    ]);


try{




		$customer = new Customer($request->all());
		$customer->save();

 }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

            $message ='The customer was created!.';
            \Session::flash('message',$message);
             return redirect()->route('customer.index');



	}




public function edit($id)
	{

        $customer = Customer::findOrFail($id);    
	
	  return view('app.customers.edit', compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{

try{
        $customer= Customer::findOrFail($id);
        $customer->fill($request->all());
        $customer->save();

         $message ='Customer updated! ';
		 	\Session::flash('message',$message);
        return redirect()->route('customer.index');

}catch(Exception $e){
            $messageError = "Someting is wrong: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }




	}


public function show($id)
    {

$customer = Customer::findOrFail($id);

return view('app.customers.show', compact('customer'));

    }



public function destroy($id)
{

 $customer = Customer::findOrFail($id);

 if($customer->status){
$customer->status = 0;
$message="customer inactive";
}
else{

$customer->status = 1;
$message ="customer inactive";

}

 $customer->save();

        return back()->with('success', $message);

}




public function invoice($id){

        try
        {
// Car::where('id',$id)->where('is_invoice',0)
//           ->update([  'is_done' => 1
//                   ]);

$car = Car::findOrFail($id);

             if(! $car->employee_id){
   $messageError = "Select a detailer. ";
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }



            $fecha = date("Y-m-d");
            $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
            $dueDate = date ('Y-m-d' , $nuevafecha );

          $dealer = Customer::findOrFail( $car->customer_id);
         Car::where('id',$id)
           ->update([  'level' => 2
                 ]);
            $cars = Car::where('customer_id', $car->customer_id)->where('level',2)->get();



        $due=0;
        foreach ($cars as $car) 
        {
            $due = $due + ($car->price) ;
        }
        
        return view('app.invoices.create',compact('cars','dealer','due','dueDate','request'));

        }catch(\Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }        
    }


    public function updateCar(Request $request,$id)
    {
        dd($request);
             $car= Car::findOrFail($id);
             $oldExtras = $car->totalExtras();
             $array_extras = Car_Extra::where('car_id',$car->id)->pluck('extra_id')->all();

        try
            {
            if($request->extras)//ask if array extras exist
                {
                $add = array_values(array_diff( $request->extras, $array_extras)); // if you addelementes add
                $remove = array_values(array_diff( $array_extras,  $request->extras)); // if you addelementes add
                if($add)
                    {
                    for($i=0; $i < count($add); $i++)
                        {
                        if(!(in_array($add[0],$array_extras)))
                            {
                            $new = new Car_Extra();
                            $new->extra_id = $add[$i];
                            $new->car_id = $car->id;
                            $new->save();
                             }
                         }
                    }
                if($remove)
                {
                for($i=0; $i < count($remove); $i++)
                    {
                     for($x=0; $x < count($array_extras); $x++)
                        {
                        if($array_extras[$x] == $remove[$i])
                            {
                            Car_Extra::where('car_id', $car->id)->where('extra_id',$remove[$i])->delete();
                            }
                        }
                    }
                }
            }else
                {
                     Car_Extra::where('car_id', $car->id)->delete();
                }

            $price= $car->price;
                if($car->totalExtras() < $oldExtras )
                    {
                        $new  = ($price) - ($oldExtras) ;
                        $car->price = $new;

                    }
            if($car->totalExtras() > $oldExtras )

                        {

                            $car->price = ($price ) + ($car->totalExtras()) ;
                        }
            
            $car->fill($request->all());
            $car->save();
     
          
            $fecha = date('m/d/y');
            $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
            $dueDate = date ( 'm/d/y' , $nuevafecha );
            $dealer = Dealer::findOrFail( $car->dealer_id);
            $cars = new car();
            $cars = $cars->done()->where('dealer_id', $dealer->id);
            $due=0;
                foreach ($cars as $car) 
                    {
                        $due = $due + ($car->price) ;
                    }
              $message =' Car Updated! ';
                        \Session::flash('message',$message);


            return view('app.invoices.create',compact('cars','dealer','due','dueDate','request'));

            }catch(Exception $e)
                {
                    $messageError = "Someting is worng: ".$e->getMessage();
                    \Session::flash('error',$messageError);
                    return \Redirect::back()->withInput()->withErrors($messageError);
                }
    }     


}
