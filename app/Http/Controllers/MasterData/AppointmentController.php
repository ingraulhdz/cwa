<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Body;
use App\Models\Extra;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Customer;
use App\Mail\AppointmentMail;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;
use Mail;
use App\Http\Controllers\MasterData\AppointmentController;

use Illuminate\Routing\Route;

class AppointmentController extends Controller
{
    





public function index(){

$appointments= Appointment::where('in_shop',0)->get();
  return view('appointment.index',compact('appointments'));
}
     public function front()
    {
     
     $ser[0]='Select Your Service';
      $services = Service::pluck('name', 'id')->all();
      $services=($ser+$services);


$body[0]='Select Your Body Style';
      $bodies = Body::pluck('name', 'id')->all();
      $bodies=($body+$bodies);







      return view('front.index', compact('services','bodies'));
    }


    public function store(Request $request)
    {
 

//dd($request);


try{

$customer = new Customer($request->all());
    $customer->save();


        $appointment = new Appointment($request->all());
        $appointment->customer_id = $customer->id;
        $appointment->save();




   Mail::to($request->email)->send(new \App\Mail\CustomerAppointmentMail($request));
   Mail::to("ingraulhernandez@hotmail.com")->send(new \App\Mail\AppointmentMail($request));




      $ser[0]='Select Your Service';
      $services = Service::pluck('name', 'id')->all();
      $services=($ser+$services);


$body[0]='Select Your Body Style';
      $bodies = Body::pluck('name', 'id')->all();
      $bodies=($body+$bodies);







   $message ='Your appointment was created!.';
            \Session::flash('message',$message);
             return redirect()->route('front.index');



 }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            dd($messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

            $message ='The customer was created!.';
            \Session::flash('message',$message);
             return redirect()->route('customer.index');



    }









	public function addCarFromCustomer($id)
{
  $appointment= Appointment::findOrFail($id);
   $ser[0]='Select Your Service';
      $services = Service::pluck('name', 'id')->all();
      $services=($ser+$services);


$body[0]='Select Your Body Style';
      $bodies = Body::pluck('name', 'id')->all();
      $bodies=($body+$bodies);

        return view('appointment.edit', compact('appointment','bodies','services'));

	}


public function export(){

    	     $customers = Customer::orderBy('id', 'DESC')->get();
    	     $date = date('m-d-Y');
 
 $pdf = \PDF::loadView('customer/pdf',compact('customers','date'));
//$pdf->save(storage_path('some-filename.pdf'));
//$pdf = PDF::loadView('some.view.name', ['someVariableName' => 'some value']);
		return $pdf->download('customers_'.$date.'.pdf');

}






public function edit($id)
	{

     
try{
        $appoiment= Appointment::findOrFail($id);
        $appoiment->is_confirmed=1;
        $appoiment->save();

         $message ='appointment has been Conmirmed! ';
      \Session::flash('message',$message);
        return redirect()->route('appointment.index');

}catch(Exception $e){
            $messageError = "Someting is wrong: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

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

        $appointment= Appointment::findOrFail($id);
        $appointment->in_shop=1;
        $appointment->save();
        $date = date('m-d-Y');

  $car = new Car;
            $car->make = $request->make;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->vin = $request->vin;
            $car->color = $request->color;
            $car->customer_id = $appointment->customer_id;
            $car->body_id = $request->body_id;
            $car->service_id = $request->service_id;
            $car->date_of_service = $date;
            $car->save();



         $message ='Car was Added! ';
		 	\Session::flash('message',$message);
        return redirect()->route('car.index');

}catch(Exception $e){
            $messageError = "Someting is wrong: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }




	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		dd('hola');
		try{

		 Customer::destroy($id);
        Session::flash('message','Customer was deleted');
        return redirect()->route('customer.index');

}catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

	}



	public function show($id)
	{



				try{

		 $appointment= Appointment::findOrFail($id);
     dd($appointment);

   $car = new Car;
            $car->make = $appointment->make;
            $car->model = $appointment->model;
            $car->year = $appointment->year;
            $car->vin = $appointment->vin;
            $car->color = $appointment->color;
            $car->dealer_id = $appointment->dealer_id;
            $car->body_id = $appointment->body_id;
            $car->price = $appointment->price;
            $car->stock = $appointment->stock;
            $car->save();
















        Session::flash('message','Customer was deleted');
        return redirect()->route('appintment.index');

}catch(Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

	}






}
