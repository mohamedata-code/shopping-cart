<?php
namespace App\Http\Interfaces;

interface ShoppingCartRepositoryInterface{


    public function cart();

    public function add($request);
    public function update($request);
    public function remove($request);
    public function clear($request);


}