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

class ReportController extends Controller
{
    

     public function index()
    {
    	     $cars = Car::orderBy('id', 'ASC')->get();

        return view('app.report.index', compact('cars'));
    }



	public function create()
{
        return view('extra.create');
	}


	public function store(Request $request)
	{



try{

//SELECT * FROM `cars` WHERE `date_of_service` BETWEEN '2018-04-18' AND '2018-04-29'
	//SELECT dealer_id, count(*) FROM cars WHERE dealer_id IS NOT NULL GROUP BY dealer_id ORDER BY count(*) DESC LIMIT 4

$from=$request->from;
$to=$request->to;


if($from == NULL OR $to == NULL ){

 $messageError = "Please, select a FROM and TO date: ";
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
}
else{


$cars = Car::orderBy('id', 'ASC')->whereBetween('date_of_service', [$from, $to])->get();
$carsPaid = count(Car::orderBy('id', 'ASC')->where('is_complete',1)->whereBetween('date_of_service', [$from, $to])->get());
$carsNotPaid = count(Car::orderBy('id', 'ASC')->where('is_complete',0)->whereBetween('date_of_service', [$from, $to])->get());

	//$amigos = DB::select("SELECT amigos.id as id,  secciones.seccion as seccion
	 //FROM `amigos` left join secciones on amigos.id_seccion = secciones.id 
       //         left join users on amigos.usuario_creo = users.id where users.rol_id =".$id_rol);


$amigos = DB::table('cars')
                     ->select(DB::raw('count(*) as cars, dealers.name as name'))
                     ->groupBy('dealers.name')->join('dealers', 'cars.dealer_id', '=', 'dealers.id')
                     ->whereBetween('date_of_service', [$from, $to])
                     ->limit(3)
                     ->get();



$totalCars=(count($cars));
	

$bar = app()->chartjs
        ->name('line')
        ->type('bar')
        ->size(['width' =>  500, 'height' => 300])
        ->labels([$amigos[0]->name, $amigos[1]->name, $amigos[2]->name],'DEALERS')
        ->datasets([
            [
                "label" => "Cars By Dealer",
                'backgroundColor' => "rgba(0, 23, 255, 0.90)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [$amigos[0]->cars, $amigos[1]->cars, $amigos[2]->cars,0]
            ],
         
        ])
        ->options([]);


$pie = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 500, 'height' => 300])
        ->labels(['Cars Paid', 'Cars Due'])
        ->datasets([
            [
                'backgroundColor' => ['#00ff08', '#ffcc00'],
                'hoverBackgroundColor' => ['#ff0000', '#ff0000'],
                'data' => [$carsPaid, $carsNotPaid]
            ]
        ])
        ->options([]);




             return view('report.index2',compact('cars','totalCars','bar','horizontal','line','pie','from','to'));

}
	

 }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

           


	}




public function edit($id)
	{


$extra = Extra::findOrFail($id);

		       
	

		return view('extra.edit', compact('extra'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{

        $extra= Extra::findOrFail($id);
        $extra->fill($request->all());

        $extra->save();
         $message ='¡Registro Actualizado correctamente! ';
		 	\Session::flash('message',$message);
        return redirect()->route('extra.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 Extra::destroy($id);
        Session::flash('message','The Extra was deleted');
        return redirect()->route('extra.index');
	}



	public function show($id)
	{
		//dd($id);
		//dd($request['ch []']);

		$data = Input::get('ch');
		//if($extra!=null){
		//	foreach($extra as $t){
				//Extra::destroy($t);
				Extra::destroy($id);
				//dd($t);
		//	}
			Session::flash('message','The Extra was deleted');
	        
			/*dd($data);
		}else
		{
			Session::flash('message','Tienes que seleccionar un cliente a eliminar');
		}*/
		return redirect()->route('extra.index');
	}


public function pdf(Request $request){
$clientes = Cliente::all();
        $date = date('Y-m-d');
        $view =  \View::make('cliente.reporte-clientes', compact('clientes', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
	return $pdf->download('reporte-Clientes.pdf');

    }





public function excel(){
        
        $clientes = Cliente::orderby('id','DESC')->get();
        $date = date('Y-m-d');
        Excel::create('Clientes',function($excel) use($clientes){ 
            $excel->sheet('Clientes', function($sheet) use($clientes) {
                $sheet->loadView('cliente.reporte-clientes-Excel', ['clientes'=>$clientes ]);
            });
        })->export('xlsx');

	}











}
