<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ShoppingCartRepositoryInterface;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //

    /** Group of model as vars */
    protected $shoppingCartRepositoryInterface;


    /** Construct to handel inject models */
    public function __construct(ShoppingCartRepositoryInterface $shoppingCartRepository){
        $this->shoppingCartRepositoryInterface = $shoppingCartRepository;
    }



    public function cart(){
       return $this->shoppingCartRepositoryInterface->cart();
    }

    public function add(Request $request){

        return $this->shoppingCartRepositoryInterface->add($request);
    }

    public function update(Request $request){
        return $this->shoppingCartRepositoryInterface->update($request);
    }

    public function clear(Request $request){
        return $this->shoppingCartRepositoryInterface->clear($request);
    }

    public function remove(Request $request){
        return $this->shoppingCartRepositoryInterface->remove($request);
    }







}
