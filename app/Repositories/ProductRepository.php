<?php 
namespace App\Repositories;
use App\Product;
use Validator;
class ProductRepository implements ProductRepositoryInterface
{
public function getAll(){
return Product::all();
}

public function getProduct($id){
return Product::findOrFail($id);
}

////////////////////////Start Create Product ///////////////////////////

public function createProduct($product)
{
	
$validation = Validator::make($product, [
'product_name' => ['required'],
'purchasing_price'=>['required','numeric'],
'selling_price'=>['required','numeric'],

]);

if($validation->passes())
{

	return Product::create($product);

}
else{
	return response()->json('error',500);
}

}
////////////////////////End Create Product //////////////////////////////////

////////////////////////Start Update Product ////////////////////////////////

public function updateProduct($product,$id)
{

$validation = Validator::make($product, [
'product_name' => ['required'],
'purchasing_price'=>['required','numeric'],
'selling_price'=>['required','numeric'],

]);

if($validation->passes())
{

if(Product::findOrFail($id))
{
return Product::whereId($id)->update($product);
}

}

else{
return response()->json('error',500);
}

}

////////////////////////End Update Product ////////////////////////////////

////////////////////////Start Get Count of Products //////////////////////
public function getcountproducts()
{
return Product::count();
}
////////////////////////End Get Count of Products //////////////////////


}