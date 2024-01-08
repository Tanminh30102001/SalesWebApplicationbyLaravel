<div>
   
    <div class="container">
        <div class="col">
            <h1 class="text-center">Admin dashborad</h1>
          </div>
          <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Revenue </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$totalRevenue}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Revenue(Daily) </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$dailyRevenue}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Revenue(Monthly) </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$monthlyRevenue}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Pending Requests Card Example -->
           
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Order</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalAcept}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Deliverd Order</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalSale}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Canceled Order</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalCancel}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
        <div class="row">
            <div class="col">
                <h1> Recent order</h1>
              </div>
            <table class="table table-striped">
                <thead> 
                    <tr>
                        
                        <th> Order ID</th>
                        <th> Status</th>
                        <th>Status of Delivery</th>
                        <th>Total</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            {{-- <td> {{$item->id}}</td> --}}
                            
                            <td>{{$item->id}}</td>
                            <td>{{$item->status== 1?'Payed':'Not Pay'}}</td>
                            <td>{{$item->status_delivery}}</td>
                            <td> ${{$item->total}}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>
