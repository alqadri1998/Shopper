@extends('cms.index')

@section('title','Dashboard')

@section('styles')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('cms/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>details</th>
                                    <th>count</th>
                                    <th>price</th>
                                    <th>sell price</th>
                                    <th>gender</th>
                                    <th>size</th>
                                    <th>type</th>
                                    <th>season</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($product_active as $product_active)
                                    <tr>
                                        <td>{{$product_active->id}}</td>
                                        <td><img width="100" height="100" src="{{ url('images/products/'.$product_active->product_image) }} "></td>
                                        <td>{{ $product_active->name }}</td>
                                        <td>{{$product_active->details}}</td>
                                        <td>{{$product_active->count}}</td>
                                        <td>{{$product_active->price}}</td>
                                        <td>{{ $product_active->sell_price }}</td>

                                        @if($product_active->gender != 'Female')
                                        <td style="color:blue">{{$product_active->gender}}</td>
                                         @else
                                        <td style="color:rgb(196, 53, 77)">{{$product_active->gender}}</td>
                                         @endif
                                         <td>{{ $product_active->size }}</td>
                                         <td>{{ $product_active->type }}</td>
                                         <td>{{ $product_active->season }}</td>
                                         @if($product_active->status == 'Visibile')
                                         <td style="color: green">{{$product_active->status}}</td>
                                     @else
                                         <td style="color: red">{{$product_active->status}}</td>
                                     @endif
                                        <td>{{$product_active->created_at}}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('product.edit',[$product_active->id])}}">Edit</a>
                                                </li>
                                                <li><a href="{{route('product.destroy',[$product_active->id])}}"
                                                       style="color: red">Delete</a>
                                                </li>

                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($product_blocked as $product_blocked)
                                <tr>
                                    <td>{{$product_blocked->id}}</td>
                                    <td><img src="{{ url('images/products/'.$product_blocked->product_image) }} "></td>
                                    <td>{{ $product_blocked->name }}</td>
                                    <td>{{$product_blocked->details}}</td>
                                    <td>{{$product_blocked->count}}</td>
                                    <td>{{$product_blocked->price}}</td>
                                    <td>{{ $product_blocked->sell_price }}</td>

                                    @if($product_blocked->gender != 'Female')
                                    <td style="color:blue">{{$product_blocked->gender}}</td>
                                     @else
                                    <td style="color:rgb(196, 53, 77)">{{$product_blocked->gender}}</td>
                                     @endif
                                     <td>{{ $product_blocked->size }}</td>
                                     <td>{{ $product_blocked->type }}</td>
                                     <td>{{ $product_blocked->season }}</td>
                                     @if($product_blocked->status == 'Visibile')
                                     <td style="color: green">{{$product_blocked->status}}</td>
                                 @else
                                     <td style="color: red">{{$product_blocked->status}}</td>
                                 @endif
                                    <td>{{$product_blocked->created_at}}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{route('product.edit',[$product_blocked->id])}}">Edit</a>
                                            </li>
                                            <li><a href="{{route('product.destroy',[$product_blocked->id])}}"
                                                   style="color: red">Delete</a>
                                            </li>

                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>details</th>
                                    <th>count</th>
                                    <th>price</th>
                                    <th>sell price</th>
                                    <th>gender</th>
                                    <th>size</th>
                                    <th>type</th>
                                    <th>season</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Settings</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('cms/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('cms/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('cms/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
