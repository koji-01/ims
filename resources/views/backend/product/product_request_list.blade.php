@extends('backend.layouts.app')

@section('content')
    <title>Product Request List</title>
    <div class="card">
        <div class="card-header">
            <strong>New Product By Customer</strong>
        </div>

        <div class="card-body">
            <table id="example1" class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">Company</th>
                        <th>Product</th>
                        <th>Total Weight</th>
                        <th>Product Price</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allRequestProduct as $allRequestProducts)
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>{{ $allRequestProducts->company_id }}</td>
                            <td>{{ $allRequestProducts->product_name }}</td>
                            <td>{{ $allRequestProducts->total_weight }}</td>
                            <td>{{ $allRequestProducts->product_price }}</td>
                            <td>
                                <a href="{{ URL::to('/retrieve_product/' . $allRequestProducts->id) }}"
                                    class="btn btn-sm btn-success">Retrieve Product</a>
                                <a href="{{ URL::to('/return_product/' . $allRequestProducts->id) }}"
                                    class="btn btn-sm btn-danger">Return Product</a>
                            </td>
                        </tr>
                        <tr class="expandable-body">
                            <td colspan="6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Description:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $allRequestProducts->product_desc }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Weight per Item:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $allRequestProducts->weight_per_item }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Weight per Carton:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $allRequestProducts->weight_per_carton }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Item per Carton:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $allRequestProducts->item_per_carton }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Carton Quantity:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $allRequestProducts->carton_quantity }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            // Enable expandable tables
            $('[data-widget="expandable-table"]').ExpandableTable();
        });
    </script>
@endpush
