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
use App\Models\payment;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;


class paymentController extends Controller
{
    


     public function index()
		    {           
			     $payments = Payment::orderBy('id', 'DESC')->get();
			     return view('app.payments.index', compact('payments'));
		    }



	public function create()
			{

        return view('app.payments.create');
			}


	public function store(Request $request)
	{



try{

		$payment = new payment($request->all());
		$payment->save();

 }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

            $message ='The payment was created!.';
            \Session::flash('message',$message);
             return redirect()->route('payment.index');



	}




public function edit($id)
	{

      $payment = Payment::findOrFail($id);    
	  return view('app.payments.edit', compact('payment'));
	
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
        $payment= Payment::findOrFail($id);
        $payment->fill($request->all());
        $payment->save();

        $message ='Update successfull! ';
		\Session::flash('message',$message);
        return redirect()->route('payment.index');

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

 $item = Payment::findOrFail($id);

 if($item->status){
$item->status = 0;
$message="Payment inactive";
}
else{

$item->status = 1;
$message ="Payment active";

}

 $item->save();
 return back()->with('success', $message);

}




public function show($id)
	{


        $payment = Payment::findOrFail($id);    
	
	  return view('app.payments.show', compact('payment'));
	}






}
