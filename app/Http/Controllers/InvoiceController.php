<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use DNS1D;
use DNS2D;
class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createinvoice()
    {
        $products=DB::table("products")->get();  
        return view("createinvoice",compact("products"));
    } 
   
    public function create_invoice_form_ajax_url(Request $request)
    {

        if(request()->ajax()) {
            $validation = Validator::make($request->all(), [
            'product_quantity' => ['required','numeric'],
            'product_id'=>['required'],

            ]);



            if($validation->passes())
            {
                $getproduct=DB::table("products")->where("id",$request->product_id)->get();

                if($request->invoices_id =="")
                {
                $invo_number=time();    
                $invoices_id=DB::table("invoices")->insertGetId([
                "activity_name"=>"Marketing",
                "invoice_number"=>$invo_number,
                "tax_number"=>"123456789",
                "tax_amount"=>"20",
                ]);
                }
                else{
                $invoices_id=$request->invoices_id;
                $in_numo=DB::table("invoices")->where("id",$invoices_id)->get();
                $invo_number=$in_numo[0]->invoice_number;;
                }


                DB::table("invoice_content")->insert([
                "related_invoice_id"=>$invoices_id,
                "product_quantity"=>$request->product_quantity,
                "product_name"=>$getproduct[0]->product_name,
                "total"=>$request->product_quantity*$getproduct[0]->selling_price,
                ]);



                $gettotal=DB::table("invoice_content")->where("related_invoice_id",$invoices_id)->get();

                $totaloftotal=0;

                foreach($gettotal as $total)
                {
                    $totaloftotal+=$total->total;
                }


                DB::table("invoices")->where("id",$invoices_id)->update([

                "total_price"=>$totaloftotal,

                ]); 

                $after_tax=$totaloftotal+20;

                $nc=" اسم النشاط:سوق تجارى";
                $inn=" رقم الفاتورة : ".$invo_number;
                $da="الرقم الضريبي: 123456789";
                $tyr="مبلغ الضريبة: 20";
                $dfd="اجمالى المبلغ :".$after_tax;

                $barcode_content=$nc.$inn.$da.$tyr.$dfd;

                return[
                "<tr>
                <th>".$getproduct[0]->product_name."</th>
                <th>".$request->product_quantity."</th>
                <th>".$getproduct[0]->selling_price."</th>
                <th>".$request->product_quantity*$getproduct[0]->selling_price."</th>
                </tr>"
                ,number_format($totaloftotal),$invoices_id,$invo_number,

                '<img src="data:image/png;base64,'.DNS2D::getBarcodePNG($barcode_content, "QRCODE").'" alt="barcode" />',

                ];


            }

        }

    }
   
    public function viewinvoices()
    {
        $allinvoices=DB::table("invoices")->get();
        return view("viewinvoices",compact("allinvoices"));
    }

    public function viewinvoice($id)
    {
        $invoice=DB::table("invoices")->join("invoice_content","id","related_invoice_id")->where("related_invoice_id",$id)->get();
        return view("viewinvoice",compact("invoice"));
    }

 
}
