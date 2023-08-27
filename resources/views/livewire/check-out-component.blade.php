<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Have a coupon?</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                        </div>
                        <div class="panel-collapse collapse coupon_form " id="coupon">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Coupon Code...">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn  btn-md" name="login">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details </h4>
                        </div>
                        {{-- @php
                             dd($orderD);
                        @endphp --}}
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert"> {{Session::get('message')}}</div>
                        @endif
                        {{-- @php
                            // {{dd(Session::get('cart')->subtotal())}}
                            $cart=Session::get('cart');
                           $subtotal=Cart::instance('cart')->total();
                             dd($subtotal);
                        @endphp --}}
                        <form wire:submit.prevent="placeOrder">
                           
                            <div class="form-group">
                                <input type="text" required="" name="email" placeholder="{{Auth::user()->email}}" wire:model="email"/>
                                @error('email')
                                        <p class="text-danger">{{$message}} </p>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="name" placeholder="{{Auth::user()->name}}"wire:model="user_name"/>
                                @error('user_name')
                                        <p class="text-danger">{{$message}} </p>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="phone" placeholder="{{Auth::user()->phone}} "wire:model="user_phone"/>
                                @error('user_phone')
                                        <p class="text-danger">{{$message}} </p>
                                        @enderror
                            </div>
                            
                            <div class="form-group">
                                <input type="text"  required="" name="address" placeholder="{{Auth::user()->address}}"wire:model="user_address"/>
                                @error('user_address')
                                        <p class="text-danger">{{$message}} </p>
                                    @enderror
                            </div>
                            
                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" name="address" placeholder="Order notes" wire:model="notes"></textarea>
                            </div>
                        
                            </div>
                            <div class="col-md-6">
                             <div class="order_review">
                                <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::instance('cart')->content() as $item)
                                        <tr>
                                           
                                            <td class="image product-thumbnail"><img src="{{asset('assets/imgs/products')}}/{{$item->model->image}}" alt="#"></td>
                                            <td>
                                                <h5><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h5> <span class="product-qty">x {{$item->qty}}</span>
                                            </td>
                                            <td>${{$item->subtotal}}</td>
                                        </tr>
                                        
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">${{Cart::subtotal()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{Cart::total()}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3"/>
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                                    </div>
                                    {{-- <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <a href="#" type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</a> --}}
                            <button type="submit"class="btn btn-fill-out btn-block mt-30" >Place Order</button>
                         </div>
                        </form>
                </div>
            </div>
        </section>
    </main>
</div>
