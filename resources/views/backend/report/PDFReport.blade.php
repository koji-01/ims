@extends('backend.layouts.app')
@section('content')
    <style>
        body {
            background-color: #000;
        }

        .padding {
            padding: 2rem !important;
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            margin: 20mm;
            /* Added margin */
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2;
        }

        h3 {
            font-size: 20px;
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium';
        }

        .text-dark {
            color: #3d405c !important;
        }
    </style>

    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" data-abc="true" style="color: #D48E15;">ARKOD SMART LOGITECH SDN BHD
                    (1396015-V)</a>
                <div class="float-right">
                    <p class="text-right" style="font-family: Arial; font-size: 8px;">
                        <span class="text-muted">www.arkod.com.my</span><br>
                        GF LOT 1451, SECTION 66, KTLD, JALAN KELULI<br>
                        BINTAWA INDUSTRIAL ESTATE<br>
                        93450 KUCHING SARAWAK<br>
                        sales@arkod.com.my<br>
                        (6012) 323 - 1698
                    </p>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">To:</h5>
                        <h3 class="text-dark mb-1">{{ $data->first()->company_name }}</h3>
                        <div>{{ $data->first()->address }}</div>
                        <div>Email: {{ $data->first()->email }}</div>
                        <div>Phone: {{ $data->first()->phone_number }}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <h3>Items in inventory</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th class="right">Price per unit</th>
                                <th class="center">Stock count</th>
                                <th class="right">Stock value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td class="center">{{ $row->id }}</td>
                                    <td class="left strong">{{ $row->product_name }}</td>
                                    <td class="left">{{ $row->product_desc }}</td>
                                    <td class="right">RM {{ $row->product_price }}</td>
                                    <td class="center">{{ $row->total_quantity }}</td>
                                    <td class="right">RM {{ $row->total_quantity * $row->product_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-sm">
                    <h3>Report Details</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Beginning of month inventory count </th>
                            <td>{{ $beginningInventory }} units</td>
                        </tr>
                        <tr>
                            <th>End of month inventory count </th>
                            <td>{{ $endingInventory }} units</td>
                        </tr>
                        <tr>
                            <th>Warehouse capacity utilization rate </th>
                            <td>{{ $utilizationRate }} %</td>
                        </tr>
                        <tr>
                            <th>Number of orders fulfilled during the month </th>
                            <td>{{ $ordersFulfilled }} units</td>
                        </tr>
                        <tr>
                            <th>Top selling products </th>
                            <td>
                                @if (!empty($topSellingProducts))
                                    <ul>
                                        @foreach ($topSellingProducts as $product)
                                            <li>{{ $product->product_name }} - Cartons:
                                                {{ $product->sold_carton_quantity }}, Items:
                                                {{ $product->sold_item_quantity }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No top-selling products found.</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Least selling products </th>
                            <td>
                                <!-- Display the low-selling products -->
                                @if (!empty($lowSellingProducts))
                                    <ul>
                                        @foreach ($lowSellingProducts as $product)
                                            <li>{{ $product->product_name }} - Cartons:
                                                {{ $product->sold_carton_quantity }}, Items:
                                                {{ $product->sold_item_quantity }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No low-selling products found.</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Total Sales Volume </th>
                            <td>{{ $totalSalesVolume }} units sold this month</td>
                        </tr>
                        <tr>
                            <th>Revenue generated </th>
                            <td>RM {{ $totalRevenue }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">ARKOD SMART LOGITECH SDN BHD (1396015-V)</p>
            </div>
        </div>
    </div>

    <div>
        <button class=".btn-block" href="#">Print Report</button>
    </div>
@endsection
