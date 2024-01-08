<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use App\Models\Coupon;
use Carbon\Carbon;

class CartComponent extends Component
{
    public $couponcode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;

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
    public function applyCoupon(){
        
        $coupon = Coupon::where('code',$this->couponcode)->where('expiry_date','>=',now())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        // dd($coupon->expiry_date,Carbon::now()->toDateString());
        // dd(today());
        if(!$coupon){
            session()->flash('cp_mess','Code coupon invalid');
            return;
        }
        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value
        ]);
        session()->flash('cp_applied','Coupon applied');
    }
    public function removeCoupon(){
        session()->forget('coupon');
    }
    public function calculateDiscount(){
        if(session()->has('coupon')){
            if(session()->get('coupon')['type']=='fixed'){
                $this->discount=floatval(session()->get('coupon')['value']);
                // dd($this->discount);
            }
            else{
                $this->discount=(Cart::instance('cart')->subtotal()*session()->get('coupon')['value'])/100;
            }
            // dd(gettype(Cart::instance('cart')->subtotal()),Cart::instance('cart')->subtotal());
            $this->subtotalAfterDiscount= intval(str_replace(',', '', Cart::instance('cart')->subtotal())) - intval(session()->get('coupon')['value']);
            // dd(intval(str_replace(',', '', Cart::instance('cart')->subtotal())));
            $this->totalAfterDiscount=$this->subtotalAfterDiscount+config('cart.tax');
        }
    }
    public function setAmountToCheckout(){
        if(session()->has('coupon')){
            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'total'=>$this->totalAfterDiscount
            ]);

        }
        else{
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'total' => (Cart::instance('cart')->total()) 
            ]);
        }
    }
    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal()< session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }
            else{
                $this->calculateDiscount();
            }
        }
        $this->setAmountToCheckout();
        return view('livewire.cart-component');
    }
}
