<?php
namespace App\Http\Interfaces;

interface ProductRepositoryInterface{


    public function shop();


    public function search($request);

    public function filterProduct($request);


}