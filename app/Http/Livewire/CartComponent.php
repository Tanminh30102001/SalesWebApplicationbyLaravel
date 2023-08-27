<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
    $product = Cart::instance('cart')->get($rowId);
    $qty=$product->qty+1;
    Cart::instance('cart')->update($rowId,$qty);
    $this->emitTo('cart-icon-component','refreshcomponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty=$product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshcomponent');
    }
    public function destroy($id){
            Cart::instance('cart')->remove($id);
            session()->flash('sucess_message','Item has been removed ');
            $this->emitTo('cart-icon-component','refreshcomponent');
    }
    public function clearAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component','refreshcomponent');
    }
    public function render()
    {
        return view('livewire.cart-component');
    }
}
