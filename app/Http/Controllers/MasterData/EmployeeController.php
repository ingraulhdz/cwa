<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\User;
use App\Models\Status;
use App\Models\Car;
use App\Models\Dealer;
use App\Models\Employee;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\Input;
use DB;
use Image;

use Illuminate\Routing\Route;

class EmployeeController extends Controller
{
    

     public function index()
    {


    	$employees = Employee::orderBy('id', 'ASC')->get();

        return view('app.employees.index', compact('employees'));
    }



	public function create()
{



        return view('app.employees.create');
	}


	public function store(Request $request)
	{

 $data = $this->validate(request(), [
        'name' => 'required',
        'last_name' => 'required',
            'phone' => 'required|digits:10|numeric|unique:dealers',
        'zip_code' =>  'required|digits:5|numeric',
            'email' => 'required|email|unique:dealers',
            'address' => 'required',
            'rol_id' => 'required',
  ]);




try{


$employee = new employee($request->all());
$employee->save();



if($request->photo){

    $employee = employee::findOrFail($employee->id);
	$ext= $request->file('photo')->getClientOriginalExtension();
	$path= 'img/employees/';
	$file_name= $employee->id.'.'.$ext;
    \Image::make($request->file('photo'))->resize(144,144)->save($path.$file_name);
		$employee->photo = $file_name;
		$employee->save();

					}





 $message ='The employee: '.$employee->name.' was created!.';
 \Session::flash('message',$message);
 return redirect()->route('employee.index');

 }catch(\Exception $e){

            $messageError = "Someting is worng...: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

    
	}



public function edit($id)
	{


 $employee = employee::findOrFail($id);

 return view('app.employees.edit',compact('employee'));
	}



public function destroy($id)
	{


 $employee = Employee::findOrFail($id);

 if($employee->status){
$employee->status = 0;
         $message =$employee->name. ' was updated to INACTIVE! ';
}
else{

$employee->status = 1;
         $message =$employee->name. ' was updated to ACTIVE! ';

}
 $employee->save();



		\Session::flash('message',$message);
        return redirect()->route('employee.index');
        return back()->with('success', $message);

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
        'last_name' => 'required',
            'phone' => 'required|digits:10|numeric|unique:dealers',
        'zip_code' =>  'required|digits:5|numeric',
            'email' => 'required|email|unique:dealers',
            'address' => 'required',
            'rol_id' => 'required',
  ]);



try{

		$employee= employee::findOrFail($id);
        $employee->fill($request->all());
       $employee->save();



if($request->photo){

	$ext= $request->file('photo')->getClientOriginalExtension();
	$path= 'img/employees/';
	$file_name= $employee->id.'.'.$ext;
    \Image::make($request->file('photo'))->resize(144,144)->save($path.$file_name);
		$employee->photo = $file_name;
		$employee->save();

					}




         $message ='Empoyee updated! ';
		\Session::flash('message',$message);
        return redirect()->back()->withInput();

 }catch(\Exception $e){

            $messageError = "Someting is worng...: ".$e->getMessage();
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
	


	public function show($id)
	{
		$total_cars=100;
		$today_cars=2;
		$cars_month=2;
		$total=2000;

		$employee = Employee::findOrFail($id);
		return view('app.employees.show', compact('employee','total_cars','today_cars','cars_month','total'));
	}












}
