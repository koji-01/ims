@extends('backend.layouts.app')

@section('content')
<title>Home</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role == 1 )
                    <div class="row">
                        <div class="col-lg-4 col-6">
                        
                        <div class="small-box bg-info">
                        <div class="inner">
                        <h3>{{ $productsCount }}</h3>
                        <p>Products in Warehouse</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{URL::to('/list_product')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        </div>
                        
                        <div class="col-lg-4 col-6">
                        
                        <div class="small-box bg-success">
                        <div class="inner">
                        <h3>{{  $ordersCount }}</h3>
                        <p>Product Ordered</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        </div>
                        
                        <div class="col-lg-4 col-6">
                        
                        <div class="small-box bg-warning">
                        <div class="inner">
                        <h3>{{  $usersCount }}</h3>
                        <p>User Registered</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{URL::to('/user_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        </div>
                    
                        
                        </div>

                        @endif

                        @if(Auth::user()->role == 2 )
                        <div class="row">
                            <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $completedOrdersCount }}</h3>
                            <p>Completed Delivery Order</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ URL::to('/history') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </div>
                            
                            <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-success">
                            <div class="inner">
                            <h3>{{  $completedReturnOrdersCount }}</h3>
                            <p>Completed Return Order Task</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </div>
                            
                            <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-warning">
                            <div class="inner">
                            <h3>{{ $incomingDeliveryTask }}</h3>
                            <p>Pending Pick and Pack Task</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{URL::to('/picker_task')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </div>
                            
                            <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-danger">
                            <div class="inner">
                            <h3>{{ $incomingReturnOrderTask }}</h3>
                            <p>Pending Return Order Task</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('/return-order-task')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </div>
                            
                            </div>
                        @endif

                        @if(Auth::user()->role == 3 )


                        <div class="row">

                            <div class="col-lg-4 col-6">
                            
                            <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $userProductsCount }}</h3>
                            <p>Product In Warehouse</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{URL::to('/list_product')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </div>
                            
                            <div class="col-lg-4 col-6">
                            
                            <div class="small-box bg-success">
                            <div class="inner">
                            <h3>{{ $completedReturnStocksCount }}</h3>
                            <p>Completed Return Stock</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{URL::to('/return-stock-status')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </div>
                            
                            <div class="col-lg-4 col-6">
                            
                            <div class="small-box bg-warning">
                            <div class="inner">
                            <h3>{{ $receivedDeliveryCount }}</h3>
                            <p>Delivery Order Made</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            </div>
                            
                            
                            </div>
                        @endif
                   <b> {{ Auth::user()->name }} </b>  {{ __('You are logged in!') }}

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
