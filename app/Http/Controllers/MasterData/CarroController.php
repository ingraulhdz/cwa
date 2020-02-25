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
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;

class CarroController extends Controller
{
    

     public function index()
    {
        
        $carros = Car::orderBy('id', 'ASC')->get();
        return view('app.carros.index', compact('carros'));
    }


	public function create()
	{
        return view('app.carros.create');
	}


	public function store(Request $request)
	{ 
        $data = $this->validate(request(), [
        'make' => 'required|min:2|max:244',
        'model' => 'required|min:2|max:244',
                    'year' => 'required|numeric',
                    'vin' => 'required|min:6|max:8',
  ]);
		try{

			$carro = new Car($request->all());
			$carro->save();

 		}catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        	}

            $message ='The car was created!.';
            \Session::flash('message',$message);
             return redirect()->route('carro.index');
	}




	public function edit($id)
	{
			$carro = Car::findOrFail($id);
			return view('app.carros.edit', compact('carro'));
	}


	public function update(Request $request,$id)
	{
     $data = $this->validate(request(), [
        'make' => 'required|min:1|max:244',
        'model' => 'required|min:1|max:244',
                    'year' => 'required|numeric',

  ]);
    try{
            $carro= Car::findOrFail($id);
        $carro->fill($request->all());
        $carro->save();
        }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
            }
        $message ='Car updated! ';
	 	\Session::flash('message',$message);
        return redirect()->route('carro.index');
	}



    public function destroy($id)
{

 $item = Extra::findOrFail($id);

 if($item->status){
$item->status = 0;
$message="Extra inactive";
}
else{

$item->status = 1;
$message ="Extra active";

}

 $item->save();
        \Session::flash('message',$message);

 return back()->with('success', $message);

}



   
	



	public function show($id)
	{

$carro = Car::findOrFail($id);
return view('app.carros.show', compact('carro'));

	}



public function pdf(Request $request)
   {
        $clientes = Cliente::all();
        $date = date('Y-m-d');
        $view =  \View::make('cliente.reporte-clientes', compact('clientes', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
	    
	    return $pdf->download('reporte-Clientes.pdf');

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
