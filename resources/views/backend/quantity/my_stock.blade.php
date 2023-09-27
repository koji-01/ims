@extends('backend.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <strong>Product Stock Level</strong>
    </div>
       
    <div class="card-body">

        @if($stockLevel)
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
            Warning stock level is low, please reorder.
        </div>
        @endif
        
        <table id="example1" class="table">
            <thead>
                <tr>
                    <th style="width: 10px">Company</th>
                    <th>Product</th>
                    <th>Remaining Quantity</th>
                    <th>Stock Level</th>
                    <th style="width: 40px">%</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quantities as $quantity)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $quantity->company_name }}</td>
                    <td>{{ $quantity->product_name }}</td>
                    <td>{{ $quantity->remaining_quantity }}/{{ $quantity->total_quantity }}</td>
                    <td>
                        @php
                            $progress = ($quantity->remaining_quantity / $quantity->total_quantity) * 100;
                            $labelClass = $progress < 25 ? 'danger' : ($progress < 50 ? 'warning' : ($progress < 75 ? 'primary' : 'success'));
                        @endphp
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-{{ $labelClass }}" style="width: {{ $progress }}%"></div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-{{ $labelClass }}">{{ round($progress) }}%</span>
                    </td>
                    <td>
                        <a href="{{ URL::to('/restock_form/'.$quantity->id) }}" class="btn btn-sm btn-info">Restock</a>
                        <a href="{{ URL::to('/product-report/'.$quantity->id) }}" class="btn btn-sm btn-danger">Report</a>
                    </td>
                </tr>
                <tr class="expandable-body">
                    <td colspan="6">
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Description:</strong>
                            </div>
                            <div class="col-md-9">
                                {{ $quantity->product_desc }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Weight per Item:</strong>
                            </div>
                            <div class="col-md-9">
                                {{ $quantity->weight_per_item }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Weight per Carton:</strong>
                            </div>
                            <div class="col-md-9">
                                {{ $quantity->weight_per_carton }}
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function () {
        // Enable expandable tables
        $('[data-widget="expandable-table"]').ExpandableTable();

        // Check stock level and display alert if necessary
        var stockLevel = <?php echo json_encode($stockLevel); ?>;
        if (stockLevel <= 30) {
            $('.alert-stock-level').show();
        }
    });
</script>
@endpush
