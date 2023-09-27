@extends('backend.layouts.app')

@section('content')
    <title>Task List</title>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card bg-gradient-warning">
                        <div class="card-header">
                            <h3 class="card-title">TASK FOR RETURNED ORDER</h3>
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
                                    <th>Return No.</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickers as $picker)
                                    @if ($picker->status == 'Dispose' || $picker->status == 'Refurbish')
                                        <tr>
                                            <td>{{ $picker->return_no }}</td>
                                            <td>{{ $picker->product->product_name }}</td>
                                            <td>{{ $picker->quantity }}</td>
                                            <td>
                                                @if ($picker->status == 'Dispose')
                                                    <span class="badge bg-danger">{{ $picker->status }}</span>
                                                @elseif($picker->status == 'Refurbish')
                                                    <span class="badge bg-warning">{{ $picker->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $picker->remark }}</td>
                                            <td class="status-cell">
                                                @if ($picker->status == 'Dispose')
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger btn-sm btn-dispose"
                                                        data-toggle="modal"
                                                        data-target="#disposeModal{{ $picker->id }}">Dispose this
                                                        item</button>

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
                                                                        Product</h5>
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
                                                                        <p>Are you sure you want to dispose of this product?
                                                                        </p>
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
                                                @elseif($picker->status == 'Refurbish')
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-dark btn-sm btn-rerack"
                                                        data-toggle="modal"
                                                        data-target="#rerackModal{{ $picker->id }}">Refurbish this
                                                        item</button>

                                                    <!-- Rerack Modal -->
                                                    <div class="modal fade" id="rerackModal{{ $picker->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="rerackModalLabel{{ $picker->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="rerackModalLabel{{ $picker->id }}">Rerack
                                                                        Product</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('refurbishedProduct', ['pickerId' => $picker->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to rerack this product?</p>
                                                                        <div class="form-group"> 
                                                                            <label
                                                                                for="rackLocation{{ $picker->id }}">Rack
                                                                                Location:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="rackLocation{{ $picker->id }}"
                                                                                name="rack_location"
                                                                                value="{{ $picker->product->rack->location_code ?? null}}"
                                                                                readonly>
                                                                            <label
                                                                                for="floorLocation{{ $picker->id }}">Floor
                                                                                Location:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="floorLocation{{ $picker->id }}"
                                                                                name="floor_location"
                                                                                value="{{ $picker->product->rack->location_codes ?? null}}"
                                                                                readonly>
                                                                        </div>
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
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
