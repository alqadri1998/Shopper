@extends('cms.index')

@section('title','Dashboard')

@section('styles')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- general form elements disabled -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">General Elements</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="post"
                                action="{{route('admin.update',[$admins->id])}}">
                                    @csrf
                                    @method('PUT')
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-sm-9">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label> Name</label>
                                                <input name="name" value='{{ $admins->name }}'
                                                       type="text" class="form-control"
                                                       placeholder="Enter  name...">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-9">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" value='{{ $admins->email }}'
                                                       type="email" class="form-control"
                                                       placeholder="Enter email...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input name="mobile" value='{{ $admins->mobile }}'
                                                       type="tel" class="form-control"
                                                       placeholder="Enter mobile...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label> Age</label>
                                                <input name="age" value='{{ $admins->age }}'
                                                       type="text" class="form-control"
                                                       placeholder="Enter  age...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-9">
                                            <!-- radio -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Male"
                                                     type="radio" name="gender"
                                                     @if($admins->gender == "Male")
                                                     checked


                                                 @endif

                                                     >
                                                    <label class="form-check-label">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Female" type="radio" name="gender"
                                                    @if($admins->gender == "Female")
                                                     checked


                                                 @endif
                                                    >
                                                    <label class="form-check-label">Female</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input name="status" type="checkbox"
                                                   @if($admins->status == "Active")
                                                       checked


                                                   @endif

                                                   class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Admin
                                                Status</label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <!-- general form elements disabled -->
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{asset('cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('cms/dist/js/demo.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
@endsection
