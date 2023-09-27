@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Weekly Report</h1>

        <form method="GET" action="{{ URL::to('/admin/generate-weekly-report') }}" style="padding-bottom: 2vh">
            @csrf
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Generate</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Week Number</th>
                    <th>Total Inflow Quantity</th>
                    <th>Total Outflow Quantity</th>
                    <th>Net Change Quantity</th>
                    <th>Remaining Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weeklyReports as $report)
                    <tr>
                        <td>{{ $report->company_name}}</td>
                        <td>{{ $report->week_number }}</td>
                        <td>{{ $report->total_inflow_quantity }}</td>
                        <td>{{ $report->total_outflow_quantity }}</td>
                        <td>{{ $report->net_change_quantity }}</td>
                        <td>{{ $report->remaining_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
