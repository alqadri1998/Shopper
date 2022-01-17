@extends('cms.index')

@section('title','Dashboard')

@section('styles')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        .custom-error-class {
            color: #FF0000; /* red */
        }

        .custom-valid-class {
            color: #00CC00; /* green */
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

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
                                <form role="form" method="post" action="{{route('category.store')}}">
                                    @csrf
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
                                                <input name="category_name" value='{{old('category_name')}}'
                                                       type="text" class="form-control"
                                                       placeholder="Enter  category_name...">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input name="status" type="checkbox"
                                                   @if(old('status') == "on")
                                                       checked
                                                   @endif
                                                   class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Category
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
