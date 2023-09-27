<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<body>
    <style>
        #table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }
    </style>
    <div>
        <h2>{{ $data->first()->company_name }}</h2>
        <p>{{ $data->first()->address }}</p>
        <p>Email: {{ $data->first()->email }}</p>
        <p>Phone: {{ $data->first()->phone_number }}</p>
    </div>

    <div>
        <h3>Monthly Report</h3>
        <p>Date: {{ $startDate->format('Y-m-d') }} - {{ $endDate->format('Y-m-d') }}</p>          
        <p>Created on: {{ now()->format('Y-m-d') }}</p>                      
    </div>

    <div>
        <table id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Price
                    </th>
                    <th>
                        Quantity on Hand</th>
                    <th>Stock Value</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->product_desc }}</td>
                        <td>RM {{ $row->product_price }}</td>
                        <td>{{ $row->remaining_quantity }}</td>
                        <td>RM{{ $row->remaining_quantity * $row->product_price }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <br>
        
        <h3>Report Details</h3>

        <table id="table">
            <span></span>
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
        </table>
    </div>

    <h3>Return Details</h3>

    <table id="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $currentProduct = null;
            @endphp
            @foreach ($returnMetrics as $row)
                <tr>
                    @if ($currentProduct !== $row->product_name)
                        <td rowspan="{{ $rowspanValue[$row->product_name] }}">{{ $row->product_name }}
                        </td>
                        @php
                            $currentProduct = $row->product_name;
                        @endphp
                    @endif
                    <td>{{ $row->total_quantity }}</td>
                    <td>{{ $row->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
