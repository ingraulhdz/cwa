<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Dealer;
use App\Models\Extra;
use App\Models\Car;
use App\Models\Car_Extra;
use DB;
use Mail;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   


    public function index()
    {
      



        $cars =  new Car();

        $invoice = new Invoice();
        $invoices =  Invoice::where('is_paid',0)->get();

        return view('app.invoices.index', compact('cars','invoices','invoice')); //
    }


    public function create(Request $request)
    {
           
         try
        {  $dealer = Dealer::findOrFail( $request->id);
            $cars = new car();
            $cars = $cars->invoice()->where('dealer_id', $dealer->id);




    if($cars->count() == 0){
  $messageError = $dealer->name ."has not cars to invoice";
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
         
}else{      

    
        

$fecha = date("Y-m-d");
            $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
            $dueDate = date ('Y-m-d' , $nuevafecha );


        $due=0;
        foreach ($cars as $car) 
        {
            $due = $due + ($car->price) ;
        }
        
        return view('app.invoices.create',compact('cars','dealer','due','dueDate','request'));
}
        }catch(\Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }        
    }
  
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('app.invoices.edit', compact('car'));
    }

  

    public function update(Request $request,$id)
    {

 try
            {

    $car= Car::findOrFail($id);
    $car->fill($request->all());
    $price= $request->price; // 
    $array_extras = Car_Extra::where('car_id',$car->id)->pluck('extra_id')->all(); //get all current extras



            if($request->extras)//ask if any extras exists. 
                {
            
                 $add = array_values(array_diff( $request->extras, $array_extras)); // get elements to  add
                 $remove = array_values(array_diff( $array_extras,  $request->extras)); // get extros to remove


                       if($add)
                               {
                                 for($i=0; $i < count($add); $i++)
                                     {
                                       if(!(in_array($add[$i],$array_extras)))
                                          {
                                            $new = new Car_Extra();
                                            $new->extra_id = $add[$i];
                                            $new->car_id = $car->id;
                                            $new->save();
                                            $extra= Extra::findOrFail($new->extra_id);
                                            $price = $price + $extra->price;
                                           }
                                       }
                                }
                     if($remove)
                                {
                                for($i=0; $i< count($remove); $i++)
                                    {                                           
                                        $extra= Extra::findOrFail($remove[$i]);
                                        $price = $price - $extra->price;
                                        $extraCar = Car_Extra::where('car_id',$car->id)->where('extra_id',$remove[$i])->delete();
                                    }
                                }
                }else
                      {
                           $extraCar = Car_Extra::where('car_id',$car->id)->get();
                              foreach ($extraCar as $extra) 
                                    {
                                     $extra = Extra::findOrFail($extra->extra_id);
                                     $price =$price - $extra->price;
                                    }                                         
                                     Car_Extra::where('car_id', $car->id)->delete();
                    }


    $car->price = $price;
    $car->save();
   
    $fecha = date('m/d/y');
    $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
    $dueDate = date ( 'm/d/y' , $nuevafecha );       
    $cars = new car();


  if($request->stock)
        {
             $dealer = Dealer::findOrFail( $car->dealer_id);
             $cars = $cars->where('level_id',3)->where('dealer_id', $dealer->id);

        }
     else
     {
         $dealer = Customer::findOrFail( $car->customer_id);
         $cars = $cars->where('level_id',3)->where('customer_id', $dealer->id);
     }
       

            $due=0;
                foreach ($cars as $car) 
                    {
                        $due = $due + ($car->price) ;
                    }
 
              $message =' Car Updated! ';
             \Session::flash('message',$message);
             return view('app.invoices.create',compact('cars','dealer','due','dueDate','request'));

 
            }catch(Exception $e)
                {
                    $messageError = "Someting is worng: ".$e->getMessage();
                    \Session::flash('error',$messageError);
                    return \Redirect::back()->withInput()->withErrors($messageError);
                }
    }     


    public function store(Request $request)
    {

 try
        {



        $cars = new Car();
        $invoice = new Invoice($request->all()); //create new object 

        if(isset($request->is_dealer)){ //if invoice is for dealer or for customer

        $invoice->dealer_id = $request->dealer_id;
        $invoice->customer_id = null; //is not customer
        $invoice->payment_id = null; //is not customer
        $invoice->is_paid = 0; //is not customer
        $invoice->save();
        $cars->where('level_id',3)->where('dealer_id', $request->dealer_id)->update(['invoice_id' => $invoice->id, 'level_id' => 4]);
//set each car status to 4 or Due when it has benn delivered  and invoiced but unpaid.
        }

        else{// if not dealer is for customer       
                   $id = $request->dealer_id;
                 $invoice->customer_id = $request->dealer_id;
                     $invoice->dealer_id = null; //is not dealer
                     $invoice->is_paid = 1; //is not dealer
                     $invoice->payment_id = $request->payment_id; //is not dealer
                    $invoice->save();

              $cars->where('level_id',3)->where('customer_id',$request->dealer_id)->update(['invoice_id' => $invoice->id, 'level_id' => 4]);



        }

   //Mail::to('raulhernandezing@gmail.com')->send(new \App\Mail\SendInvoice($invoice->id));


        $invoice->send_times = 1;
        $invoice->save();
        $invoices = Invoice::where('is_paid',0);
        $invoice = new Invoice();

   $msj = "Someting is done: ";
            \Session::flash('info',$msj);
        return view('app.invoices.index', compact('cars','invoices','invoice'));


       
        }catch(\Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        }

    }





    public function send($id)
    {

        $invoice = Invoice::findOrFail($id);
        Mail::to('raulhernandezing@gmail.com')->send(new \App\Mail\SendInvoice($invoice->id));
        $invoice->send_times= $invoice->send_times + 1;
        $invoice->save();
        $invoices = Invoice::where('is_paid',0);
        $cars = new Car();

        return view('app.invoices.index', compact('cars','invoices'));

    }




    public function print($id)
    {

$invoice = Invoice::findOrFail($id);
$cars= Car::orderBy('id','ASC')->where('invoice_id',$id)->get();


 $pdf = \PDF::loadView('app.invoices.pdf',compact('cars','invoice'));
 $pdf->save(storage_path('invoices/pdf.pdf'));

 return $pdf->stream();




    }

    public function getDataInvoiceIndex(Request $request)
    { 
return response()->json([ 
          'due' => Car::where('level_id', '!=', 4)->sum('price'),
          'invoiced' => Car::where('level_id', 3)->count(),
          'dealers' => Dealer::hasInvoice()->count(),
          'cars' => Car::where('level_id', 2)->count(),

        ]);

}
     public function getDataInvoice(Request $request)
    {

$cars = Car::where('level_id',3)->where('dealer_id',$request->dealer);
$extras = $cars->sum('price_plus');
$subtotal = $cars->sum('price');
$total = $subtotal + $extras;
        return response()->json([ 
          'count_cars' => $cars->count(), 
          'price' => $total,

        ]);




    } 
    public function toInvoice(Request $request)
    {

$car = Car::findOrFail($request->id);
$car->level_id = 3;
$car->save();

        return response()->json($car);



    }

    public function deleteCarInvoice(Request $request)
    {
        
$car = Car::findOrFail($request->id);
$car->level_id = 2;
$car->save();
$cars = Car::where('level_id',3)->where('dealer_id',$car->dealer_id);

        return response()->json(['car' => $car, 'price' => $cars->count(), 'count_cars' =>$cars->sum('price')]);

    }
   

    
    public function show($id)
    {
        try
        {

            $invoice = Invoice::findOrFail($id);

            return view('app.invoices.show', compact('invoice'));
       
        }catch(\Exception $e){
            $messageError = "Someting is worng: ".$e->getMessage();
            \Session::flash('error',$messageError);
            return \Redirect::back()->withInput()->withErrors($messageError);
        } 
        //
    }

public function paid(){
$invoices = Invoice::where('is_paid',1);



$cars = new Car();
    return view('app.invoices.paid', compact('invoices','cars'));
}
   
   
   public function pay(Request $request){

    $invoice = Invoice::findOrFail($request->id);
    $invoice->is_paid = 1;
    $invoice->payment_id =$request->payment_id;
        $invoice->save();

     Car::where('invoice_id', $invoice->id)
        ->update(['level_id' => 5]);





  $message = "Someting is paid: ";
  \Session::flash('message',$message);
  return \Redirect::back()->withInput()->with($message);

   }
   

   public function view(){
    $invoices = Invoice::where('is_paid',0)->get();
    $invoice = new Invoice();
 $cars = new Car();

return view('app.invoices.view',compact('invoices','cars','invoice'));



   }
     




}
