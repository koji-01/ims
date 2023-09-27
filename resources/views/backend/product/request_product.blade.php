@extends('backend.layouts.app')
@section('content')
    <title>Request Product Form</title>
    <form role="form" action="{{ URL::to('/request_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Fill in the detail of your product</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_id">My Company</label>
                            <select name="company_id" class="form-control select2 select2-hidden-accessible"
                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select Company Name</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name"
                                class="form-control @error('product_name') is-invalid @enderror" id="product_name"
                                placeholder="Enter Product Name">
                            @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_desc">Product Description</label>
                            <input type="text" name="product_desc"
                                class="form-control @error('product_desc') is-invalid @enderror" id="product_desc"
                                placeholder="Enter Product Description">
                            @error('product_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="carton_quantity">Carton Quantity</label>
                            <input type="number" name="carton_quantity"
                                class="form-control @error('carton_quantity') is-invalid @enderror" id="carton_quantity"
                                placeholder="Enter Quantity">
                            @error('carton_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="item_per_carton">Item Per Carton</label>
                            <input type="number" name="item_per_carton"
                                class="form-control @error('item_per_carton') is-invalid @enderror" id="item_per_carton"
                                placeholder="Enter Quantity">
                            @error('item_per_carton')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_dimensions">Product Dimension</label>
                            <input type="text" name="product_dimensions"
                                class="form-control @error('product_dimensions') is-invalid @enderror"
                                id="product_dimensions" placeholder="Enter Product Dimension">
                            @error('product_dimensions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight Per Item (kg)</label>
                            <<input type="text" name="weight_per_item"
                                class="form-control @error('title') is-invalid @enderror" id="weight_per_item"
                                placeholder="Weight Per Item" step="0.1">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight Per Carton (kg)</label>
                            <input type="text" name="weight_per_carton"
                                class="form-control @error('title') is-invalid @enderror" id="weight_per_carton"
                                placeholder="Weight Per Carton" step="0.1">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Total Weight (kg)</label>
                            <input type="text" name="total_weight" id="total_weight"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <input type="text" name="product_price"
                                class="form-control @error('product_price') is-invalid @enderror" id="product_price"
                                placeholder="Enter Product Price">
                            @error('product_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" name="product_image"
                                class="form-control-file @error('product_image') is-invalid @enderror" id="product_image">
                            @error('product_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Fill in the address detail</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_id">My Company</label>
                            <select name="company_id" id="company_id"
                                class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select Company Name</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" data-address="{{ $company->address }}"
                                        data-phone_number="{{ $company->phone_number }}"
                                        data-email="{{ $company->email }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror" id="address"
                                placeholder="Enter Address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                placeholder="Enter Phone Number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Enter Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>

    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        const cartonQuantity = document.getElementById('carton_quantity');
        const weightPerCarton = document.getElementById('weight_per_carton');
        const totalWeightOutput = document.getElementById('total_weight');

        cartonQuantity.addEventListener('input', updateTotalWeight);
        weightPerCarton.addEventListener('input', updateTotalWeight);

        function updateTotalWeight() {
            const cartonQuantityValue = parseFloat(cartonQuantity.value) || 0;
            const weightPerCartonValue = parseFloat(weightPerCarton.value) || 0;
            const totalWeight = cartonQuantityValue * weightPerCartonValue;
            totalWeightOutput.value = totalWeight.toFixed(2);
        }
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var companySelect = document.getElementById('company_id');
            var addressField = document.getElementById('address');
            var phoneField = document.getElementById('phone_number');
            var emailField = document.getElementById('email');

            companySelect.addEventListener('change', function() {
                var selectedOption = companySelect.options[companySelect.selectedIndex];
                addressField.value = selectedOption.getAttribute('data-address');
                phoneField.value = selectedOption.getAttribute('data-phone_number');
                emailField.value = selectedOption.getAttribute('data-email');
            });
        });
    </script>
@endsection
