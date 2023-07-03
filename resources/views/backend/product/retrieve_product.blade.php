@extends('backend.layouts.app')

@section('content')
<title>Incoming Requested Products</title>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Product Request</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <table id="restock-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newrequest as $request)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$request->company_name}}</td>
                    <td>{{$request->product_name}}</td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#approveModal{{$request->id}}">Approve</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal{{$request->id}}">Reject</button>
                    </td>
                </tr>
                <tr class="expandable-body">
                    <td colspan="3">
                        <!-- Display the product details here -->
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Product Description:</strong> {{$request->product_desc}}</p>
                                <p><strong>Carton Quantity:</strong> {{$request->carton_quantity}}</p>
                                <p><strong>Items per Carton:</strong> {{$request->item_per_carton}}</p>
                                <p><strong>Product Dimensions:</strong> {{$request->product_dimensions}}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Weight per Item:</strong> {{$request->weight_per_item}}</p>
                                <p><strong>Weight per Carton:</strong> {{$request->weight_per_carton}}</p>
                                <p><strong>Total Weight:</strong> {{$request->total_weight}}</p>
                                <p><strong>Product Price:</strong> {{$request->product_price}}</p>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <p><strong>Product Image:</strong></p>
                            <img src="{{ asset('storage/Image/'.$request->product_image)}}" alt="Product Image" style="height: 100px; width: 150px;">
                        </div>
                        
                            <div class="col-md-6">
                                <p><strong>Address:</strong> {{$request->address}}</p>
                                <p><strong>Phone Number:</strong> {{$request->phone_number}}</p>
                                <p><strong>Email:</strong> {{$request->email}}</p>
                            </div>
                        </div>
                        <!-- End of product details -->
                    </td>
                </tr>

                <!-- Add modal for approve and reject actions (optional) -->
                <div class="modal fade" id="approveModal{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel{{$request->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('approveProductRequest', ['id' => $request->id]) }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="approveModalLabel{{$request->id}}">Approve Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Please set the rack location and date to be stored for this product</p>
                                
                                    <div class="form-group">
                                        <label for="rack_id">Rack Location</label>
                                        <select name="rack_id" class="form-control" id="rack_id" onchange="updateRackId(this)">
                                            <option value="">Select Rack Location</option>
                                            @foreach($racks as $location)
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
                                      <label for="date_to_be_stored">Date to be Stored</label>
                                      <input type="date" name="date_to_be_stored" class="form-control" id="date_to_be_stored">
                                      @error('date_to_be_stored')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  

                                    <!-- Hidden input field to store the selected rack_id -->
                                    <input type="hidden" id="hidden_rack_id" name="hidden_rack_id" value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="rejectModal{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel{{$request->id}}" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="rejectModalLabel{{$request->id}}">Reject Request</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <p>Are you sure you want to reject this request?</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <a href="{{ route('rejectProductRequest', ['id' => $request->id]) }}" class="btn btn-danger">Reject</a>
                          </div>
                      </div>
                  </div>
              </div>
              
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<script>
    function updateRackId(selectElement) {
        var rackId = selectElement.value;
        document.getElementById('hidden_rack_id').value = rackId;
    }

    function submitForm(linkElement) {
        var rackId = document.getElementById('hidden_rack_id').value;
        var href = linkElement.getAttribute('href');

        // Append rack_id to the form action URL
        var updatedHref = href + '?rack_id=' + rackId;

        // Update the href attribute of the Approve link
        linkElement.setAttribute('href', updatedHref);

        // Submit the form
        linkElement.click();
    }

    $(function () {
        $("#restock-table").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [
                { "className": "expand-control", "orderable": false, "targets": 0 },
                { "className": "expand-content", "orderable": false, "targets": 1 },
                { "className": "action-buttons", "orderable": false, "targets": 2 }
            ],
            "order": [[1, 'asc']]
        });

        // Expandable table logic
        $('table').on('click', 'tr.expandable-body', function () {
            $(this).toggleClass('open');
        });
    });
</script>

@endsection
