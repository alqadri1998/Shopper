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
                                <form role="form" method="post" action="{{route('product.store')}}"
                                enctype="multipart/form-data" id="product_form"
                                >
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


                                            <!-- text input -->
                                            <div class="form-group">
                                                <label> Name</label>
                                                <input name="name" value='{{old('name')}}'
                                                       type="text" class="form-control"
                                                       placeholder="Enter  name...">
                                            </div>
                                            <div class="form-group ">
                                                <label>Select Category</label>
                                                <select class="form-control" id="category_id" name="category_id">
                                                    <option value="-1">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"
                                                                @if(old('category_id')) @if(old('category_id') == $category->id) selected @endif @endif>{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label> details</label>
                                                <input name="details" value='{{old('details')}}'
                                                       type="text" class="form-control"
                                                       placeholder="Enter  details...">
                                            </div>



                                            <div class="form-group">

                                                    <label for="points">count:</label>
                                                    <input type="number" id="points" value="{{ old('count') }}"  name="count" step="1" min="0">



                                            </div>



                                            <div class="form-group">

                                                    <label for="points">Price:</label>
                                                    <input type="number" id="points"  value="{{ old('count') }}" name="price" step="5" min="0">


                                            </div>


                                            <div class="form-group">

                                                    <label for="points">Sell Price:</label>
                                                    <input type="number" id="points"  value="{{ old('count') }}" name="sell_price" step="5" min="0">


                                            </div>




                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Male" type="radio" name="gender"
                                                    @if(old('gender')=='Male')
                                                    checked
                                                    @endif

                                                    >
                                                    <label class="form-check-label">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Female" type="radio" name="gender"

                                                    @if(old('gender')=='Female')
                                                    checked
                                                    @endif>
                                                    <label class="form-check-label">Female</label>
                                                </div>
                                            </div>


                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="size">Choose a Size:</label>

                                                <select id="size" name="size">
                                                    @if(old('size'))
                                                    <option value="{{old('size')}}"selected>{{ old('size') }}</option>
                                                    @else
                                                    <option value="Choose One"selected>Choose One</option>
                                                    @endif


                                                  <option value="Small">Small</option>
                                                  <option value="Medium">Meduim</option>
                                                  <option value="Large">Large</option>
                                                  <option value="xl" >xl</option>
                                                  <option value="xxl" >xxl</option>
                                                  <option value="xxxl" >xxxl</option>

                                                </select>
                                            </div>

                                        <div class="form-group">
                                            <label for="type">Choose a Type:</label>

                                            <select id="type" name="type">
                                                @if(old('type'))
                                                    <option value="{{old('type')}}"selected>{{ old('type') }}</option>
                                                    @else
                                                    <option value="Choose One"selected>Choose One</option>
                                                    @endif
                                              <option value="Kid">Kid</option>
                                              <option value="Teenger">Teenger</option>
                                              <option value="Old">Old</option>


                                            </select>
                                        </div>

                                    <div class="form-group">
                                        <label for="season">Choose a Season:</label>

                                        <select id="season" name="season">

                                            @if(old('season'))
                                                    <option value="{{old('season')}}"selected>{{ old('season') }}</option>
                                                    @else
                                                    <option value="Choose One"selected>Choose One</option>
                                                    @endif
                                          <option value="Summer">Summer</option>
                                          <option value="Winter">Winter</option>
                                          <option value="Fall">Fall</option>
                                          <option value="Spring" >Spring</option>


                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input name="status" type="checkbox"
                                                   @if(old('status') == "on")
                                                       checked
                                                   @endif
                                                   class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Admin
                                                Status</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <label for="avatar">Choose a profile picture:</label>

                                            <input type="file"
                                                   id="image" name="product_image"


                                                   accept="image/png, image/jpeg">

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

    <script>

        $('#product_form').validate({
                    errorClass: "custom-error-class",
                     validClass: "custom-valid-class",
                    rules: {
                        size: {
                            valueNotEquals: "Choose One"
                        },
                        type: {
                            valueNotEquals: "Choose One"
                        },
                        season: {
                            valueNotEquals: "Choose One"
                        },
                        category_id :{
                            valueNotEquals: "-1"

                        }

                    });
    </script>

@endsection
