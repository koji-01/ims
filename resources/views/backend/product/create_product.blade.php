@extends('backend.layouts.app')
@section('content')
    <title>Add Product</title>
    <div class="card-body">
        <div class="row">

            <div class="col-md-2">

      </div>
                     <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card bg-warning">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('/insert_product')}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">


                            <div class="form-group">
                                <label for="company_id">Company Name</label>
                                <select name="company_id" class="form-control" id="company_id">
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
                                <label for="rack_ids">Rack Location</label>
                                <select name="rack_id" class="form-control" id="rack_id">
                                    <option value="">Select Rack Location</option>
                                    @foreach ($racks as $location)
                                        <option value="{{ $location->id }}">{{ $location->location_code }}</option>
                                    @endforeach
                                </select>
                                @error('rack_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                <div class="form-group">
                  <label for="floor_ids">Floor Location</label>
                  <select name="floor_id" class="form-control" id="floor_id">
                      <option value="">Select Floor Location</option>
                      @foreach($floors as $location)
                          <option value="{{ $location->id }}">{{ $location->location_codes }}</option>
                      @endforeach
                  </select>
                  @error('floor_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>       

                <div class="form-group">
                  <label for="floor_ids">Floor Location</label>
                  <select name="floor_id" class="form-control" id="floor_id">
                      <option value="">Select Floor Location</option>
                      @foreach($floors as $location)
                          <option value="{{ $location->id }}">{{ $location->location_codes }}</option>
                      @endforeach
                  </select>
                  @error('floor_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>       

<div class="form-group">
<label for="exampleInputEmail1">Product Name</label>
<input type="text" name="product_name"  class="form-control @error('title') is-invalid @enderror"
 id="exampleInputEmail1" placeholder="Enter Product Name" value="{{ old('product_name') }}">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

<div class="form-group">
    <label for="product_price">Product Price (Per Item)</label>
    <input type="text" name="product_price" class="form-control @error('product_price') is-invalid @enderror" id="product_price" placeholder="Enter Product Price">
    @error('product_price')
    <span class="invalid-feedback" role="alert" value="{{ old('product_price') }}">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Product Description</label>
  <input type="text" name="product_desc"  class="form-control @error('title') is-invalid @enderror"
   id="exampleInputEmail1" placeholder="Enter Product Description" value="{{ old('product_desc') }}">
  
  @error('title')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>



<div class="form-group">
  <label for="exampleInputEmail1">Total Carton Quantity</label>
  <input type="number" name="carton_quantity"  class="form-control @error('title') is-invalid @enderror"
   id="carton_quantity" placeholder="Enter Quantity" value="{{ old('carton_quantity') }}>
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Item Per Carton</label>
                                <input type="number" name="item_per_carton"
                                    class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                    placeholder="Enter Quantity">

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Dimension</label>
                                <input type="text" name="product_dimensions"
                                    class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                    placeholder="Product Dimensions">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
  <label for="exampleInputEmail1">Total Weight (kg)   [Total Weight Must Not Exceed 200kg When Adding Product to Rack]</label>
  <input type="text" name="total_weight" id="total_weight" class="form-control @error('title') is-invalid @enderror" readonly>
  @error('title')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Image</label>
                                <input type="file" name="product_image"
                                    class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                    placeholder="Upload Image">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Date to be stored</label>
                                <input type="date" name="date_to_be_stored"
                                    class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                    placeholder="Date">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>
                        <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>


            <div class="col-md-2">

            </div>


        </div>
        <!-- /.row -->
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
@endsection
