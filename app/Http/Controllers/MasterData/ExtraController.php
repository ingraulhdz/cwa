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

class ExtraController extends Controller
{
    

     public function index()
    {
        $extras = Extra::orderBy('id', 'ASC')->get();
        return view('app.extras.index', compact('extras'));
    }


	public function create()
	{
        return view('app.extras.create');
	}


	public function store(Request $request)
	{ 
        $data = $this->validate(request(), [
        'name' => 'required|min:2|max:244',
        'description' => 'required|min:5|max:244',
                    'price' => 'required|numeric',
  ]);
		try{

			$extra = new Extra($request->all());
			$extra->save();

 		}catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        	}

            $message ='The extra was created!.';
            \Session::flash('message',$message);
             return redirect()->route('extra.index');
	}




	public function edit($id)
	{
			$extra = Extra::findOrFail($id);
			return view('app.extras.edit', compact('extra'));
	}


	public function update(Request $request,$id)
	{
     $data = $this->validate(request(), [
        'name' => 'required|min:2|max:244',
        'description' => 'required|min:5|max:244',
                    'price' => 'required|numeric',

  ]);
    try{
            $extra= Extra::findOrFail($id);
        $extra->fill($request->all());
        $extra->save();
        }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
            }
        $message ='Extra updated! ';
	 	\Session::flash('message',$message);
        return redirect()->route('extra.index');
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

$extra = Extra::findOrFail($id);
return view('app.extras.show', compact('extra'));

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
