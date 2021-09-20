<?php namespace App\Repositories;

interface ProductRepositoryInterface{
	
	public function getAll();

	public function getProduct($id);

    public function createProduct($product);

    public function updateProduct($product,$id);

    public function getcountproducts();


}