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
                            <h3 class="card-title">Admin Views</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
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

                                @foreach($admin_active as $admin_active)
                                    <tr>
                                        <td>{{$admin_active->id}}</td>
                                        <td>{{ $admin_active->name }}</td>
                                        <td>{{$admin_active->email}}</td>
                                        <td>{{$admin_active->mobile}}</td>
                                        <td>{{$admin_active->age}}</td>
                                        @if($admin_active->status == 'Active')
                                            <td style="color: green">{{$admin_active->status}}</td>
                                        @else
                                            <td style="color: red">{{$admin_active->status}}</td>
                                        @endif
                                        @if($admin_active->gender != 'Female')
                                        <td style="color:blue">{{$admin_active->gender}}</td>
                                         @else
                                        <td style="color:rgb(196, 53, 77)">{{$admin_active->gender}}</td>
                                         @endif
                                        <td>{{$admin_active->created_at}}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('admin.edit',[$admin_active->id])}}">Edit</a>
                                                </li>
                                                <li><a href="{{route('admin.destroy',[$admin_active->id])}}"
                                                       style="color: red">Delete</a>
                                                </li>

                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($admin_blocked as $admin_blocked)
                                <tr>
                                    <td>{{$admin_blocked->id}}</td>
                                    <td>{{$admin_blocked->name}}</td>
                                    <td>{{$admin_blocked->email}}</td>
                                    <td>{{$admin_blocked->mobile}}</td>
                                    <td>{{$admin_blocked->age}}</td>

                                    @if($admin_blocked->status == 'Active')
                                        <td style="color: green">{{$admin_blocked->status}}</td>
                                    @else
                                        <td style="color: red">{{$admin_blocked->status}}</td>
                                    @endif
                                    @if($admin_blocked->gender == 'Male')
                                    <td style="color:blue">{{$admin_blocked->gender}}</td>
                                     @else
                                    <td style="color:rgb(196, 53, 77)">{{$admin_blocked->gender}}</td>
                                     @endif
                                    <td>{{$admin_blocked->created_at}}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{route('admin.edit',[$admin_blocked->id])}}">Edit</a>
                                            </li>
                                            <li><a href="{{route('admin.destroy',[$admin_blocked->id])}}"
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
                                    <th>name</th>
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
