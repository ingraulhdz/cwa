<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Supply;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;

class SupplyController extends Controller
{
    

     public function index()
    {
        $supplies = Supply::orderBy('id', 'ASC')->get();
        return view('app.supplies.index', compact('supplies'));
    }

    public function getSupply($id)
    {

        return Supply::findOrFail($id);
    }

	public function create()
	{
        return view('app.supplies.create');
	}


	public function store(Request $request)
	{
         $data = $this->validate(request(), [
        'name' => 'required|min:2|max:244',
        'description' => 'required|min:5|max:244'
  ]);
		try{

			$supply = new Supply($request->all());
			$supply->save();

 		}catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        	}

            $message ='The supply was created!.';
            \Session::flash('message',$message);
             return redirect()->route('supply.index');
	}




	public function edit($id)
	{
			$supply = Supply::findOrFail($id);
			return view('app.supplies.edit', compact('supply'));
	}


	public function update(Request $request,$id)
	{
         $data = $this->validate(request(), [
        'name' => 'required|min:2|max:244',
        'description' => 'required|min:5|max:244',
            'price' => 'required|numeric',
  ]);

         try{
        $supply= Supply::findOrFail($id);
        $supply->fill($request->all());
        $supply->save();
    }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
            }
        $message ='supply updated! ';
	 	\Session::flash('message',$message);
        return redirect()->route('supply.index');
	}



    public function destroy($id)
{

 $item = Supply::findOrFail($id);

 if($item->status){
$item->status = 0;
$message="supply inactive";
}
else{

$item->status = 1;
$message ="supply active";

}

 $item->save();
            \Session::flash('message',$message);

 return back()->with('success', $message);

}



   
	



	public function show($id)
	{

$supply = Supply::findOrFail($id);
return view('app.supplies.show', compact('supply'));

	}



public function pdf(Request $request)
   {
        $supplies = Supply::all();
        $date = date('Y-m-d');
        $view =  \View::make('cliente.reporte-supplies', compact('supplies', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
	    
	    return $pdf->download('reporte-Clientes.pdf');

   }





public function excel()
     {
        
        $clientes = Supply::orderby('id','DESC')->get();
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
