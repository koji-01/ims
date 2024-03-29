@extends('backend.layouts.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User for {{ $edit->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ URL::to('/update_user/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @php 
                                    if($edit->role == 1) {
                                        echo 'Present Permission is: <b>Admin</b>';
                                    }
                                    if($edit->role == 2) {
                                        echo 'Present Permission is: <b>Picker</b>';
                                    }
                                    if($edit->role == 3) {
                                        echo 'Present Permission is: <b>User</b>';
                                    }
                                @endphp
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Change the Permission</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="role" required>
                                    <option value="" disabled selected>Select Permission</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Picker</option>
                                    <option value="3">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Change the User's Name</label>
                                <input type="text" class="form-control" id="exampleInputName" name="name" value="{{ $edit->name }}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- /.row -->
    </div>
@endsection
