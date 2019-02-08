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
use App\Models\Dealer;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;


class DealerController extends Controller
{
    


     public function index()
		    {           
			     $dealers = Dealer::orderBy('id', 'DESC')->get();
			     return view('app.dealers.index', compact('dealers'));
		    }



	public function create()
			{

        return view('app.dealers.create');
			}


	





public function print(){
  $dealers = Dealer::orderBy('id', 'DESC')->get();
    	     $date = date('m-d-Y');
 			 $pdf = \PDF::loadView('app.dealers.pdf',compact('dealers','date'));
return $pdf->stream();





}





	public function store(Request $request)
	{

 $data = $this->validate(request(), [
        'name' => 'required',
        'contact' => 'required',
            'phone' => 'required|digits:10|numeric|unique:dealers',
            'contact_phone' => 'required|min:10|digits:10|numeric',
        'zip_code' =>  'required|digits:5|numeric',
            'email' => 'required|email|unique:dealers',
            'address' => 'required'
  ]);


    // $data = request()->only('name', 'price', 'category_id');

try{

		$dealer = new Dealer($request->all());
		$dealer->save();

 }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

            $message ='The dealer '.$dealer->name.' was created!.';
            \Session::flash('message',$message);
             return redirect()->route('dealer.index');



	}




public function edit($id)
	{

      $dealer = Dealer::findOrFail($id);    
	  return view('app.dealers.edit', compact('dealer'));
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
 $data = $this->validate(request(), [
        'name' => 'required',
        'contact' => 'required',
            'phone' => 'required|digits:10|numeric|unique:dealers',
            'contact_phone' => 'required|min:10|digits:10|numeric',
        'zip_code' =>  'required|digits:5|numeric',
            'email' => 'required|email|unique:dealers',
            'address' => 'required',
  ]);
try{
        $dealer= Dealer::findOrFail($id);
        $dealer->fill($request->all());
        $dealer->save();

        $message ='Dealer '.$dealer->name. ' was Updated successfull ! ';
		\Session::flash('message',$message);
        return redirect()->route('dealer.index');

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
try{

 $dealer = Dealer::findOrFail($id);

 if($dealer->status){
$dealer->status = 0;
$message="dealer INACTIVE";
}
else{

$dealer->status = 1;
$message ="Dealer ACTIVE";

}

 $dealer->save();


             $message ='Update successfull: '.$message;
		\Session::flash('message',$message);
        return back()->with('success', $message);

}catch(Exception $e){
            $messageError = "Someting is wrong: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }








}



public function show($id)
	{

	//dd($id);
		//dd($request['ch []']);


$chartjs = app()->chartjs
         ->name('barChartTest')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels(['Label x', 'Label y'])
         ->datasets([
             [
                 "label" => "My First dataset",
                 'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                 'data' => [69, 59]
             ],
             [
                 "label" => "My First dataset",
                 'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                 'data' => [65, 12]
             ]
         ])
         ->options([]);

$average_cars = 32;
$average_sales = 1200;
$due = 433;
$cars = 8;

        $dealer = Dealer::findOrFail($id);    
	
	  return view('app.dealers.show', compact('dealer','average_sales','average_cars','due','cars','chartjs'));
	}






}
