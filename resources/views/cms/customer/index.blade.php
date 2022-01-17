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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>email</th>

                                    <th>mobile</th>
                                    <th>age</th>
                                    <th>Status</th>
                                    <th>Gender</th>
                                    <th>Created At</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($customer_active as $customer_active)
                                    <tr>
                                        <td>{{$customer_active->id}}</td>
                                        <td>{{ $customer_active->first_name }}</td>
                                        <td>{{ $customer_active->last_name }}</td>
                                        <td>{{$customer_active->email}}</td>
                                        <td>{{$customer_active->mobile}}</td>
                                        <td>{{$customer_active->age}}</td>
                                        @if($customer_active->status == 'Active')
                                            <td style="color: green">{{$customer_active->status}}</td>
                                        @else
                                            <td style="color: red">{{$customer_active->status}}</td>
                                        @endif
                                        @if($customer_active->gender != 'Female')
                                        <td style="color:blue">{{$customer_active->gender}}</td>
                                         @else
                                        <td style="color:rgb(196, 53, 77)">{{$customer_active->gender}}</td>
                                         @endif
                                        <td>{{$customer_active->created_at}}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('customer.edit',[$customer_active->id])}}">Edit</a>
                                                </li>
                                                <li><a href="{{route('customer.destroy',[$customer_active->id])}}"
                                                       style="color: red">Delete</a>
                                                </li>

                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($customer_blocked as $customer_blocked)
                                <tr>
                                    <td>{{$customer_blocked->id}}</td>
                                    <td>{{$customer_blocked->first_name}}</td>
                                    <td>{{$customer_blocked->last_name}}</td>
                                    <td>{{$customer_blocked->email}}</td>
                                    <td>{{$customer_blocked->mobile}}</td>
                                    <td>{{$customer_blocked->age}}</td>

                                    @if($customer_blocked->status == 'Active')
                                        <td style="color: green">{{$customer_blocked->status}}</td>
                                    @else
                                        <td style="color: red">{{$customer_blocked->status}}</td>
                                    @endif
                                    @if($customer_blocked->gender == 'Male')
                                    <td style="color:blue">{{$customer_blocked->gender}}</td>
                                     @else
                                    <td style="color:rgb(196, 53, 77)">{{$customer_blocked->gender}}</td>
                                     @endif
                                    <td>{{$customer_blocked->created_at}}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{route('admin.edit',[$customer_blocked->id])}}">Edit</a>
                                            </li>
                                            <li><a href="{{route('admin.destroy',[$customer_blocked->id])}}"
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
                                    <th>First_name</th>
                                    <th>Last name</th>
                                    <th>email</th>

                                    <th>mobile</th>
                                    <th>age</th>
                                    <th>Status</th>
                                    <th>Gender</th>
                                    <th>Created At</th>
                                    <th>Settings</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
