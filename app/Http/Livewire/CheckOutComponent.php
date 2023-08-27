<?php

namespace App\Http\Livewire;

use App\Mail\confirmOrderMail;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CheckOutComponent extends Component
{
    
    public $email;
    public $user_name;
    public $user_phone;
    public $user_address;
    public $notes;
    public $status= false;
    public function updated($field){
        $this->validateOnly($field,[
            'email'=>'required |email',
            'user_name'=>'required',
            'user_phone'=>"required|numeric",
            "user_address"=>"required",
        ]);
    }

    public function placeOrder(){
        $this->validate([
            'email'=>'required| email',
            'user_name'=>'required',
            'user_phone'=>"required|numeric",
            "user_address"=>"required",
        ]);
        $order=new Order();
        $order->user_id=Auth::user()->id;
        $order->total=str_replace(',','',Cart::instance('cart')->total()) ;
        $order->email=$this->email;
        $order->user_name=$this->user_name;
        $order->user_phone=$this->user_phone;
        $order->user_address=$this->user_address;
        $order->notes=$this->notes;
        $order->status=false;
        $order->save();
        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderDetails =new OrderDetails();
            
            $orderDetails->product_id= $item->id;
            $orderDetails->order_id=$order->id;
            $orderDetails->regular_price=$item->price;
            $orderDetails->quantity=$item->qty;
            $product=Product::find($orderDetails->product_id);
            $product->quantity= $product->quantity -  $orderDetails->quantity;
            $product->save();
            $orderDetails->save();
        }
        
        
        // $order_id=$order->id;
        // $orderD =OrderDetails::where('order_id',$order_id)->get();
        
        Mail::to($order->email)->send(new confirmOrderMail($order));
        Cart::instance('cart')->destroy();
        session()->flash('message','Orderd successfully');
        return redirect(route('thankyou'));
        
       

    }
    public function render()
    {
        return view('livewire.check-out-component');
    }
}
