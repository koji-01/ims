@extends('backend.layouts.app')

@section('content')
    <title>Task List</title>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card bg-gradient-warning">
                        <div class="card-header">
                            <h3 class="card-title">TASK : Product To Be Collected</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Rack Location</th>
                                    <th>Floor Location</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Date of Pick Up</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickers as $picker)
                                    <tr>
                                        <td>{{ $picker->order_no }}</td>
                                        <td>{{ $picker->location_code }}</td>
                                        <td>{{ $picker->location_codes }}</td>
                                        <td>{{ $picker->product->product_name }}</td>
                                        <td>{{ $picker->quantity }}</td>
                                        <td>{{ $picker->created_at->format('d M, Y') }}</td>
                                        <td>
                                            @if ($picker->status == 'Collected')
                                                <span class="badge bg-success">{{ $picker->status }}</span>
                                            @elseif($picker->status == 'Pending')
                                                <span class="badge bg-warning">{{ $picker->status }}</span>
                                            @elseif($picker->status == 'Reracking')
                                                <span class="badge bg-warning">Please rerack</span>
                                            @else
                                                <span class="badge bg-danger">{{ $picker->status }}</span>
                                            @endif
                                        </td>
                                        <td class="status-cell">
                                            @if ($picker->status == 'Collected')
                                                <span class="badge bg-success">{{ $picker->status }}</span>
                                            @elseif($picker->status == 'Pending')
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-collect"
                                                    data-toggle="modal"
                                                    data-target="#collectModal{{ $picker->id }}">Collect</button>

                                                <!-- Collect Modal -->
                                                <div class="modal fade" id="collectModal{{ $picker->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="collectModalLabel{{ $picker->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="collectModalLabel{{ $picker->id }}">Collect
                                                                    Product</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('picker.confirm', ['id' => $picker->id, 'quantity' => $picker->quantity]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="report{{ $picker->id }}">Report:</label>
                                                                        <select class="form-control"
                                                                            id="status{{ $picker->id }}" name="report">
                                                                            <option value="Completed">Completed</option>
                                                                            <option value="Insufficient">Insufficient
                                                                            </option>
                                                                            <option value="Damaged">Damaged</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="remark{{ $picker->id }}">Remark:</label>
                                                                        <textarea class="form-control" id="remark{{ $picker->id }}" name="remark" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Proceed</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($picker->status == 'Reracking')
                                                <button type="button" class="btn btn-dark btn-sm btn-rerack"
                                                    data-toggle="modal"
                                                    data-target="#rerackModal{{ $picker->id }}">Rerack</button>

                                                <!-- Rerack Modal -->
                                                <div class="modal fade" id="rerackModal{{ $picker->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="rerackModalLabel{{ $picker->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="rerackModalLabel{{ $picker->id }}">Rerack Product
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('rerackProductPicker', ['pickerId' => $picker->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to rerack this product?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-dark">Rerack</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($picker->status == 'Disposing')
                                                <button type="button" class="btn btn-danger btn-sm btn-dispose"
                                                    data-toggle="modal"
                                                    data-target="#disposeModal{{ $picker->id }}">Dispose</button>

                                                <!-- Dispose Modal -->
                                                <div class="modal fade" id="disposeModal{{ $picker->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="disposeModalLabel{{ $picker->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="disposeModalLabel{{ $picker->id }}">Dispose
                                                                    Damaged Product</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('disposeProductPicker', ['pickerId' => $picker->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to dispose of this damaged
                                                                        product?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Dispose</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="badge bg-primary">Collected</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-success" id="proceed-to-packing"
                        @if (count($pickers->where('status', 'Pending'))) disabled @endif>Proceed to Packing</button>
                </div>

            </div>
        </div>
    </div>
@endsection
