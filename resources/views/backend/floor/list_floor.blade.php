@extends('backend.layouts.app')
@section('content')
    <title>Floor List</title>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header info">
                    <h3 class="card-title">Floor Location</h3>
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
                                <th>Floor Location</th>
                                <th>Company</th>
                                <th>Product Name</th>
                                <th>Weight (KG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flooring->groupBy('location_codes') as $location => $rows)
                                @php
                                    $totalWeight = 0; // Initialize the total weight for each floor location
                                    $firstProduct = $rows->first(); // Get the first product in the floor location
                                @endphp
                                <tr>
                                    <td rowspan="{{ count($rows) }}">{{ $location }}</td>
                                    @foreach ($rows as $index => $row)
                                        @if ($index > 0)
                                <tr>
                            @endif
                            <td>{{ $row->company_name }}</td>
                            <td>{{ $row->product_name }}</td>
                            @if ($index === 0)
                                <td rowspan="{{ count($rows) }}">{{ $firstProduct->occupied }}/3000</td>
                            @endif
                            @if ($index > 0)
                                </tr>
                            @endif
                            @endforeach
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
                    var rackLocationCell = rows[i].getElementsByTagName('td')[0];
                    var rackLocationText = rackLocationCell.textContent.toLowerCase();

                    var companyCell = rows[i].getElementsByTagName('td')[1];
                    var companyText = companyCell.textContent.toLowerCase();

                    var productNameCell = rows[i].getElementsByTagName('td')[2];
                    var productNameText = productNameCell.textContent.toLowerCase();

                    var isVisible = rackLocationText.includes(searchText) || companyText.includes(
                        searchText) || productNameText.includes(searchText);

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
