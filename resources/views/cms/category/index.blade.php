@extends('cms.index')

@section('title','Dashboard')

@section('styles')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('cms/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>



                    </div>

            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" left>
                           Ctegory
                           @can('create-categories')
                           <a href="#" class="btn btn-success" data-toggle="modal" data-target="#categoryModal">Add New Category</a>

                           @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>



                                    <th>Status</th>

                                    <th>Created At</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $categories)
                                    <tr>
                                        <td>{{$categories->id}}</td>
                                        <td>{{ $categories->category_name }}</td>


                                        @if($categories->status == 'Visible')
                                            <td style="color: green">{{$categories->status}}</td>
                                        @else
                                            <td style="color: red">{{$categories->status}}</td>
                                        @endif

                                        <td>{{$categories->created_at}}</td>
                                        <td>
                                            @can('edit-categories')

                                            <a href="{{route('category.edit',[$categories->id])}}"
                                                class="btn btn-xs btn-info" style="color: white;">Edit</a>


                                            @endcan
                                            @can('delete-categories')

                                            <a href="#" onclick="confirmDelete(this, '{{$categories->id}}')"
                                                class="btn btn-xs btn-danger" style="color: white;">Delete</a>

                                            @endcan




                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>



                                    <th>Status</th>

                                    <th>Created At</th>
                                    <th>Settings</th>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="categoryForm">
              @csrf
              <div class="form-group">
                <label> Name</label>
                <input name="category_name"
                       type="text" id="categoryname" class="form-control"
                       placeholder="Enter  category_name...">
            </div>
              <div class="form-group">
                <div class="custom-control custom-switch">
                    <input name="status" type="checkbox"

                           class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Category
                        Status</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

          </form>
        </div>

      </div>
    </div>
  </div>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('cms/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('cms/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('cms/dist/js/demo.js')}}"></script>
    <script>
        $("#categoryForm").submit(function(e){
            e.preventDefault();
            let categoryname = $("#categoryname").val();
            let status = $("#customSwitch1").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('category.ajax.store') }}",
                method:"POST",
                data:{
                    categoryname:categoryname,
                    status:status,
                    _token:_token

                },
                success:function(response)
                {
                    if(response)
                    {
                        $("#example1 tbody").prepend('<tr><td>'+response.id+'</td><td>'+response.category_name+'</td><td>'+response.status+'</td><td>'+response.created_at+'</td></tr>');
                        $("#categoryForm")[0].reset();
                        $("#categoryModal").modal('hide');
                        $('.modal-backdrop ').remove()
                    }
                }
            });

        });


    </script>
    <!-- page script -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    function confirmDelete(app, id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                deleteCategory(app, id)
            }
        })
    }

    function  deleteCategory(app, id) {
        axios.delete('/categoryView/destroy/'+id+'/delete')
            .then(function (response) {
                // handle success (Status Code: 200)
                console.log(response);
                console.log(response.data);
                showMessage(response.data);
                app.closest('tr').remove();
            })
            .catch(function (error) {
                // handle error (Status Code: 400)
                console.log(error);
                console.log(error.response.data);
                showMessage(error.response.data);
            })
            .then(function () {
                // always executed
            });
    }

    function showMessage(data) {
        Swal.fire({
            position: 'center',
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
@endsection

