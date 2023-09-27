@extends('backend.layouts.app')


@section('content')
    <title>Assign Product Pickup</title>
    <!-- Product List -->
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header info">
                    <h3 class="card-title">Product List</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Rack Location</th>
                                <th>Floor Location</th>
                                <th>Product Name</th>
                                <th>Stock</th>
                                <th>Choose Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $product)
                                <tr>
                                    <td><img src="{{ asset('storage/Image/' . $product->product_image) }}"
                                            style="height: 40px; width: 60px;"></td>
                                    <td>
                                        @if ($product->location_code)
                                            {{ $product->location_code }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->location_codes)
                                            {{ $product->location_codes }}
                                        @endif
                                    </td>

                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->remaining_quantity }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                            @csrf
                                            <div class="input-group input-group-sm">
                                                <input type="hidden" value="{{ $product->id }}" name="id">
                                                <input type="hidden" value="{{ $product->product_name }}"
                                                    name="product_name">
                                                <input type="hidden" value="{{ $product->location_code }}"
                                                    name="location_code">
                                                <input type="hidden" value="{{ $product->location_codes }}"
                                                    name="location_codes">
                                                <input type="hidden" value="{{ $product->weight_per_item }}"
                                                    name="weight_per_item">
                                                <input type="hidden" value="{{ $product->product_image }}"
                                                    name="product_image">
                                                <input type="hidden" value="1" name="quantity">
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-info btn-flat">Select
                                                        Product</button>
                                                </span>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Cart -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selected Product</h3>
                    @if (!empty(session('cart')))
                        <form method="POST" action="{{ route('cart.clear') }}">
                            @csrf
                            <button type="submit" class="btn btn-warning float-right">Clear Cart</button>
                        </form>
                    @endif
                </div>
                @if (empty(session('cart')))
                    <p class="m-4">Your cart is empty.</p>
                @else
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('cart') as $id => $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('cart.update', $id) }}">
                                                @csrf
                                                <div class="input-group input-group-sm">
                                                    <input min="0" name="quantity" value="{{ $item['quantity'] }}"
                                                        type="number" class="form-control">
                                                    <span class="input-group-append">
                                                        <button type="submit"
                                                            class="btn btn-info btn-flat">Confirm</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td><img src="{{ asset('storage/Image/' . $item['image']) }}"
                                                style="height: 40px; width: 60px;"></td>
                                        <td>
                                            <form method="POST" action="{{ route('cart.remove', $id) }}">
                                                @csrf
                                                <button type="submit" class="close">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            <form method="POST" action="{{ route('assign.index') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="picker">Assign to:</label>
                                    <select name="user_id" class="form-control">
                                        <option value="">Select Picker</option>
                                        @foreach ($users as $user)
                                            @if ($user->role == 2)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="order_no">Delivery Order No:</label>
                                    <select name="order_no" class="form-control">
                                        <option value="">Select Order No</option>
                                        @foreach ($deliveries as $deliveryOrder)
                                            <option value="{{ $deliveryOrder->id }}">{{ $deliveryOrder->order_no }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </div>
                        </form>
                @endif
            </div>
        </div>
    </div>
    </div>


@endsection
