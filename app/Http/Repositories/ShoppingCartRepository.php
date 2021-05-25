<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ShoppingCartRepositoryInterface;

class ShoppingCartRepository implements ShoppingCartRepositoryInterface {

    protected $product;


    public function add($request)
    {
        // TODO: Implement add() method.

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));

        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');

    }


    public function clear($request)
    {
        // TODO: Implement clear() method.

        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');

    }


    public function update($request)
    {
        // TODO: Implement update() method.

        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');

    }


    public function remove($request)
    {
        // TODO: Implement remove() method.

        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');

    }


    public function cart()
    {
        // TODO: Implement cart() method.

        $cartCollection = \Cart::getContent();

        return view('cart',compact('cartCollection'));
    }



}