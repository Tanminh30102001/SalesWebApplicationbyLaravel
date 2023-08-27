<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
        </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> All Order
                  
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">All Order</div>
                                <div class="col-md-6">                      
                                </div>
                            </div>
                        </div>
                            <div class="card-body">
                                @if(Session::has('message') )
                                <div class="alert alert-success" role="alert"> {{Session::get('message')}}</div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->status_delivery}}</</td>
                                                <td>${{$item->total}} </td>
                                                <td><a href="{{route('user.orderdetails',['order_id'=>$item->id])}}">View</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{$orders->links()}}
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>



