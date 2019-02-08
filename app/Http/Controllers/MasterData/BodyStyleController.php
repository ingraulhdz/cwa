<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\BodyStyle;
use App\Models\Extra;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;

class BodyStyleController extends Controller
{
    

     public function index()
    {
 	     $body_styles = BodyStyle::orderBy('id', 'ASC')->get();
         return view('app.body_styles.index', compact('body_styles'));
    }



	public function create()
    {
        return view('app.body_styles.create');
	}


	public function store(Request $request)
	{
		 $data = $this->validate(request(), [
        'name' => 'required|min:2|max:244',
        'description' => 'required|min:5|max:244'
  ]);


    try{
		$body = new BodyStyle($request->all());
		$body->save();

         }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

            $message ='The body Style '.$body->name.' was created!.';
            \Session::flash('message',$message);
             return redirect()->route('body_style.index');



	}

    public function edit($id)
	{
        $body_style = BodyStyle::findOrFail($id);
        return view('app.body_styles.edit', compact('body_style'));
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
        'description' => 'required|min:5|max:244'
  ]);

 try{
		 $body= BodyStyle::findOrFail($id);
        $body->fill($request->all());

        $body->save();
   

         }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }
      $message ='Body was Updated! ';
		 	\Session::flash('message',$message);
        return redirect()->back()->withInput();



	}


	

	public function show($id)
	{
		$body_style= BodyStyle::findOrFail($id);
        return view('app.body_styles.show', compact('body_style'));
	}


public function destroy($id)
{

 $item = BodyStyle::findOrFail($id);

 if($item->status){
$item->status = 0;
$message="Body Style INACTIVE";
}
else{

$item->status = 1;
$message ="Body Style ACTIVE";

}

 $item->save();
		 	\Session::flash('message',$message);
        return redirect()->back()->withInput();

}


}
