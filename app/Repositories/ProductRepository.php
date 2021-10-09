<?php 
namespace App\Repositories;
use App\Product;
use Validator;
class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::all();
    }

    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }

    public function createProduct($product)
    {
        $validation = Validator::make($product, [
        'product_name' => ['required'],
        'purchasing_price'=>['required','numeric'],
        'selling_price'=>['required','numeric'],

        ]);
        return $validation->passes()?Product::create($product):response()->json('error',500);
    }
    
    public function updateProduct($product,$id)
    {
        $validation = Validator::make($product, [
        'product_name' => ['required'],
        'purchasing_price'=>['required','numeric'],
        'selling_price'=>['required','numeric'],
        ]);
        return $validation->passes()?Product::findOrFail($id)->update($product):response()->json('error',500);
    }

    public function getcountproducts()
    {
        return Product::count();
    }
    


}
