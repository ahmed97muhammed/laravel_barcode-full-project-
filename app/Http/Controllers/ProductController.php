<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;
use Validator;

class ProductController extends Controller
{

    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository=$repository; 

        $this->middleware('auth');

    }
    
    public function viewproducts()
    {
        $allproducts=$this->repository->getAll();

        return view("viewproducts",compact("allproducts"));
    } 

    public function addproduct()
    {
        return view("addproduct");
    } 


    public function addproduct_form_ajax_url(Request $request)
    {
        if(request()->ajax()) {
            $product=[
            "product_name"=>$request->product_name,
            "purchasing_price"=>$request->purchasing_price,
            "selling_price"=>$request->selling_price,
            ]; 

            $createproduct=$this->repository->createProduct($product);

            if ($createproduct["content"]=="error")
            {
                return response()->json('error',500);
            }

        }

    } 

    public function get_editproduct_form_ajax_url(Request $request)
    {
        if(request()->ajax())
        {
            
            $getproduct=$this->repository->getProduct($request->id);
            return $getproduct;

        }

    }

    public function edit_product_form_ajax_url(Request $request)
    {

        if(request()->ajax()) {

            $getp=$this->repository->getProduct($request->id);

            $product=[
            "product_name"=>$request->product_name,
            "purchasing_price"=>$request->purchasing_price,
            "selling_price"=>$request->selling_price,
            ]; 

            $updateproduct=$this->repository->updateProduct($product,$request->id);

            if ($updateproduct["content"]=="error")
            {
                return response()->json('error',500);
            }

            else
            {
                if($request->purchasing_price != $getp['purchasing_price'])
                {

                $getproducts_count=$this->repository->getcountproducts();
                $getproducts=$this->repository->getAll();

                $total_purchase_price=0;
                $total_selling_price=0;

                foreach($getproducts as $product)
                {
                $total_purchase_price+=$product->purchasing_price;

                $total_selling_price+=$product->selling_price;

                }

                $p_avg=$total_purchase_price/$getproducts_count;
                $s_avg=$total_selling_price/$getproducts_count;

                $purchase_average=number_format($p_avg);
                $selling_average=number_format($s_avg);;

                return [
                $request->id,
                $request->product_name,
                $request->purchasing_price,
                $request->selling_price,
                $purchase_average,
                $selling_average,
                ];
                }
                else{
                return [
                $request->id,
                $request->product_name,
                $request->purchasing_price,
                $request->selling_price,
                "",
                ];
                }


            }

        }

    } 

}
