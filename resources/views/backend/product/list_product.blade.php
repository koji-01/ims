@extends('backend.layouts.app')

@section('content')
    <title>Product List</title>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header info">
                    <h3 class="card-title">Product List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="searchButton">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company</th>
                                @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                    <th>Rack Location</th>
                                    <th>Floor Location</th>
                                @endif
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Total Weight In Stock (kg)</th>
                                <th>Product Image</th>
                                @if (Auth::user()->role == 1)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->company_name }}</td>
                                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                        <td>{{ $row->location_code ?? '-' }}</td>
                                        <td>{{ $row->location_codes ?? '-' }}</td>
                                    @endif
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{ $row->remaining_quantity }}</td>
                                    <td>{{ $row->weight_of_product }}</td>
                                    <td>
                                        <img src="{{ asset('storage/Image/' . $row->product_image) }}"
                                            style="height: 100px; width: 150px;">
                                    </td>
                                    @if (Auth::user()->role == 1)
                                        <td>
                                            <a href="{{ URL::to('/edit_product/' . $row->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ URL::to('delete_product/' . $row->id) }}"
                                                class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            var searchButton = document.getElementById('searchButton');
            var table = document.getElementById('example1');
            var rows = table.getElementsByTagName('tr');

            searchButton.addEventListener('click', function() {
                var searchText = searchInput.value.toLowerCase();

                for (var i = 1; i < rows.length; i++) {
                    var idCell = rows[i].getElementsByTagName('td')[0];
                    var idText = idCell.textContent.toLowerCase();

                    var companyCell = rows[i].getElementsByTagName('td')[1];
                    var companyText = companyCell.textContent.toLowerCase();

                    var rackLocationCell = rows[i].getElementsByTagName('td')[2];
                    var rackLocationText = rackLocationCell.textContent.toLowerCase();

                    var productNameCell = rows[i].getElementsByTagName('td')[3];
                    var productNameText = productNameCell.textContent.toLowerCase();

                    var isVisible = idText.includes(searchText) || companyText.includes(searchText) ||
                        rackLocationText.includes(searchText) || productNameText.includes(searchText);

                    if (isVisible) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection
