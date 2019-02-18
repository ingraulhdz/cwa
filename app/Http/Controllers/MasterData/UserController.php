<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Employee;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;

use Illuminate\Routing\Route;

class UserController extends Controller
{
    

     public function index()
    {
        $users = User::orderBy('id', 'ASC')->get();
        
        return view('app.users.index', compact('users'));
    }


	public function create()
	{
        return view('app.users.create');
	}


    public function getEmployee(Request $request){
$employee= Employee::findOrFail($request->id);

return response()->json([
'employee' => $employee,
'rol' => $employee->rol->name,
]);
    }



	public function store(Request $request)
	{ 

        $data = $this->validate(request(), [
        'email' => 'required|email|unique:users',
        'password1' => 'required|min:6|max:50',
        'password2' => 'required|min:6|max:50',
          ]);
       /* if ($validator->fails()) {

}*/
		try{
            $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->employee_id = $request->employee_id;
        $user->username = $request->username;
        $user->email = $request->email;

			$user->save();

 		}catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        	}

            $message ='The User was created!.';
            \Session::flash('message',$message);
             return redirect()->route('user.index');
	}




	public function edit($id)
	{
			$user = User::findOrFail($id);
			return view('app.users.edit', compact('user'));
	}


	public function update(Request $request,$id)
	{
 $data = $this->validate(request(), [
        'email' => 'required|email'
          ]);
    try{
    $user= User::findOrFail($id);

if($request->password2){
if($request->password1){


if($request->password2 == $request->password1){

$user->password = bcrypt($request->password1);


}
}
}



        $user->username = $request->username;
        $user->save();
        }catch(\Exception $e){

            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
            }
        $message ='User updated! ';
	 	\Session::flash('message',$message);
        return redirect()->route('user.index');
	}



    public function destroy($id)
{

 $item = User::findOrFail($id);

 if($item->status){
$item->status = 0;
$message="User inactive";
}
else{

$item->status = 1;
$message ="User active";

}

 $item->save();
        \Session::flash('message',$message);

 return back()->with('success', $message);

}



   
	



	public function show($id)
	{

$user = User::findOrFail($id);
return view('app.users.show', compact('user'));

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
