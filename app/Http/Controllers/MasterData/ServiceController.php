<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Service;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;

class ServiceController extends Controller
{
    

     public function index()
    {
    	
    	$services = Service::orderBy('id', 'ASC')->get();
        return view('app.services.index', compact('services'));
    }



	public function create()
	{
        return view('app.services.create');
	}


	public function store(Request $request)
	{
		  $data = $this->validate(request(), [
        'name' => 'required|min:2|max:244',
        'description' => 'required|min:5|max:244',
                    'price' => 'required|numeric',

  ]);

try{
		$service = new service($request->all());
		$service->save();

 }catch(\Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

            $message ='The service was created!.';
            \Session::flash('message',$message);
             return redirect()->route('service.index');
}




public function edit($id)
	{

$service = Service::findOrFail($id);     
return view('app.services.edit', compact('service'));

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
        'name' => 'required|min:2|max:244',
        'description' => 'required|min:5|max:244',
                    'price' => 'required|numeric',

  ]);


try{
        $service= service::findOrFail($id);
        $service->fill($request->all());
 }catch(\Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

        $service->save();
         $message ='Service updated! ';
		 	\Session::flash('message',$message);
        return redirect()->route('service.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function destroy($id)
{

 $item = Service::findOrFail($id);

 if($item->status){
$item->status = 0;
$message="Service is  inactive";
}
else{

$item->status = 1;
$message ="Service is  active";

}

 $item->save();
 		 	\Session::flash('message',$message);

 return back()->with('success', $message);

}


	public function show($id)
	{
		$service= Service::findOrFail($id);
        return view('app.services.show', compact('service'));
	}










}
