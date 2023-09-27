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
                <table class="table table-striped">
                    <tr>
                        <th>Total units sold </th>
                        <td>{{ $totalUnitsSold }} units</td>
                    </tr>
                    <tr>
                        <th>Revenue generated </th>
                        <td>RM {{ $revenue }}</td>
                    </tr>
                    <tr>
                        <th>Inventory at the beginning of the month </th>
                        <td>{{ $beginningInventory }} units</td>
                    </tr>
                    <tr>
                        <th>Inventory at the end of the month </th>
                        <td>{{ $endingInventory }} units</td>
                    </tr>
                    <tr>
                        <th>Total return for the product this month </th>
                        <td>{{ $totalCustomers }} units</td>
                    </tr>
                </table>
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
