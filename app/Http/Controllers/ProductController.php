<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    /** Group of model as vars */
    protected $productRepositoryInterface;


    /** Construct to handel inject models */
    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepositoryInterface = $productRepository;
    }


    public function shop(){

        return $this->productRepositoryInterface->shop();
    }

    public function search(Request $request){
        return $this->productRepositoryInterface->search($request);
    }

    public function filterProduct(Request $request){
        return $this->productRepositoryInterface->filterProduct($request);
    }
}
