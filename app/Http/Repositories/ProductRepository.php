<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\ProductRepositoryInterface;
use App\Product;

class ProductRepository implements ProductRepositoryInterface {

    public $product;



    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function shop()
    {
        // TODO: Implement shop() method.
        $products = Product::all();

        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function search($request)
    {
        // TODO: Implement search() method.



        $title = $request->get('title');
        $products = $this->product::where('name','LIKE',"%$title%")->get();



        return view('shop', compact('products'));


    }

    public function filterProduct($request)
    {

        // TODO: Implement filterProduct() method.

        $min = $request->get('min');
        $max = $request->get('max');

        $products = $this->product::where('price','>=',$min)->where('price','<=',$max)->get();



        return view('products.ajax',compact('products'));

    }


}