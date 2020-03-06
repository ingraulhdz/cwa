<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Car;
use App\Models\Detailer;
use App\Models\Customer;
use App\Models\Dealer;
use App\Models\Body;
use App\Models\Extra;
use App\Models\Employee;
use App\Models\Invoice;


class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

public $id;
public $invoice;
public $cars;
public $name;
public $customer;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //$id=1;
 
 $invoice = Invoice::findOrFail($id);
 $cars= Car::where('invoice_id',$id)->get();
 


        if($invoice->dealer_id){

            $customer = Dealer::where('id',$invoice->dealer_id)->first();
         
            }else{

            $customer = Customer::where('id',$invoice->customer_id)->first();

            }

$pdf = \PDF::loadView('app.invoices.pdf',compact('cars','invoice','customer'));
             $pdf->save(storage_path('invoices/pdf.pdf'));
             $this->cars = $cars;
             $this->id = $id;
             $this->invoice = $invoice;
             $this->customer = $customer;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

                  

          

        return $this->markdown('app.invoices.pdf')->subject('Your Invoice from Magic Touch Auto Spa')->attach(storage_path('invoices/pdf.pdf'));
    }
}
