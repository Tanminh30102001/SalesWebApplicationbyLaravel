
<div >
    <style>
        .hidden {
                display: none;
            }
           
    </style>
    <main class="main">
        <div class="row">
            <div class="col-12">      
                
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="text-center"> <h1>Your Order </h1> 
                    @if(Session::has('cancel_message'))
                            <div class="alert alert-success"> 
                                <strong> {{Session::get('cancel_message')}}</strong>
                            </div>
                    @endif
                    @if(Session::has('review_message'))
                    <div class="alert alert-success"> 
                        <strong> {{Session::get('review_message')}}</strong>
                    </div>
                    @endif
                    @if($order->status_delivery != 'canceled')
                    <div class="d-flex justify-content-end"><a href="#" id="showFormButton"class="btn btn-danger" wire:click.prevent="showForm">Cancel Order</a> </div>
                    @endif
                    <div class="d-flex justify-content-start"><a href="{{route('user.order')}}" class="btn btn-danger" >Your all Order</a></div>
                <div id="formContainer" @if($showForm) class="" @else class="hidden" @endif>
                    <textarea name="reason_cancel" placeholder="Write your reason here..." cols="30" rows="10"  wire:model='reason_cancel'></textarea>
                    
                    <a href="#" type="button" class="btn btn-danger" id="cancelButton" wire:click.prevent="cancelOrder">Xác nhận Hủy</a>
                </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    
                <div class="table-responsive">
                    <table class="table shopping-summery text-center clean">
                        {{-- <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                @if($order->status_delivery=='delivered')
                                <th scope="col"> Review</th>
                                @endif
                            </tr>
                        </thead> --}}
                        <tbody>
                               
                            @foreach($order->orderDetails as $item)
                            <tr>
                                <td class="image product-thumbnail"><img src="{{asset('assets/imgs/products')}}/{{$item->product->image}}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h5 class="product-name"><a href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a></h5>
                                    {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.
                                    </p> --}}
                                </td>
                                <td class="price" data-title="Price"><span>{{$item->product->regular_price}} </span></td>
                                <td class="text-center" data-title="Stock">
                                    <div class="detail-qty   m-auto">
                                        <span class="qty-val">{{$item->quantity}}</span>
                                    </div>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    <span>${{$item->quantity * $item->product->regular_price}} </span>
                                </td>
                                @if($order->status_delivery=='delivered'&& $item->rstatus== false)
                                <td>
                                    <a href="{{route('user.review',['order_details_id'=>$item->id])}}"> Write Review</a>
                                </td>
                                @endif
                                
                            </tr>
                            
                            @endforeach

                        </tbody>
                       
                    </table>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <tbody>
                                    {{-- @foreach($order->orderDetails as $item) --}}
                                    <tr>
                                        <td class="cart_total_label" >Sub Total</td>
                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{$order->total - round($order->total * (0.1/1.1),1)}}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tax</td>
                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{round($order->total * (0.1/1.1),1)}}</span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="cart_total_label">Shipping</td>
                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{$order->total}}</span></strong></td>
                                    </tr>
                                </tbody>
                            </table> 

                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>


@push('scripts')
<script>
    // $(document).ready(function() {
    //         $("#showFormButton").click(function() {
    //             $("#formContainer").removeClass("hidden");
    //             event.stopPropagation();
    //         });





        // }); 
        // $("#cancelButton").click(function(event) {
        // event.preventDefault(); // Ngăn mặc định hành vi click
        // @this.call('cancelOrder');
        // Livewire.emit('cancelOrder'); // Gọi phương thức Livewire thông qua sự kiện
        
    });
    function deleteSlide(){
        @this.call('cancelOrder');
        
    }
  </script>
@endpush