@extends('layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sub-Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sub-Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title color-red"><b>Sub-Category Info</b></h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="modal" role="button"
                                                data-target="#addcategory"><i class="fas fa-plus"></i> Add New</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Sub Category</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Alt</th>
                                            <th>Serial No</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_categories as $key => $category)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $category->sub_cat_name }}</td>
                                                <td>{{ $category->category->cat_name }}</td>
                                                <td><img src="{{ asset('images/sub_category/' . $category->sub_cat_image) }}" style="height:100px;"></td>
                                                <td>{{ $category->image_alt }}</td>
                                                <td>
                                                    <form class="form-inline sr_form" data-id="{{$category->id}}">
                                                      <div class="form-group">
                                                        <input type="text" class="form-control sr_no" onkeypress="return isNumberKey(event)" value="{{$category->sr_no}}" required>
                                                      </div>
                                                      <button type="submit" class="btn btn-primary">Go</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-warning btn-sm color-white"
                                                            data-toggle="modal"
                                                            data-target="#edit_page{{ $category->id }}"><i
                                                                class="fas fa-edit"></i></button>
                                                        <a class="btn btn-danger btn-sm color-white"
                                                            href="{{ route('sub_category_delete', ['id' => $category->id]) }}"
                                                            onclick="return confirm('Are you sure to delete?')"><i
                                                                class="fas fa-trash"></i></a>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="addcategory" aria-modal="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Sub-Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" role="form" method="post" autocomplete="off"
                    action="{{ route('sub_category_add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prod_cat">Choose a Category:</label>
                                    <select class="form-control" name="prod_cat" id="prod_cat" required>
                                        <option value="">--Select Category--</option>
                                        @foreach ($cat_data as $c_d)
                                            <option value="{{ $c_d->id }}">{{ $c_d->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sub_cat_name">Name</label>
                                    <input type="text" class="form-control" name="sub_cat_name" id="sub_cat_name"
                                        value="" required minlength="3" maxlength="200">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sub_cat_image">Image</label>
                                    <input type="file" name="sub_cat_image" id="sub_cat_image" class="form-control"
                                        required minlength="3" maxlength="200">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_alt">Alt Tag</label>
                                    <input name="image_alt" id="image_alt" class="form-control" required minlength="3"
                                        maxlength="200">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content-wrapper -->

    @foreach ($sub_categories as $category)
        <!-- /.modal -->
        <div class="modal fade" id="edit_page{{ $category->id }}" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sub-Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('sub_category_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prod_cat">Choose a Category:</label>
                                        <select class="form-control" name="prod_cat" id="prod_cat" required>
                                            <option value="">--Select Category--</option>
                                            @foreach ($cat_data as $c_d)
                                                <option value="{{ $c_d->id }}"
                                                    {{ $c_d->id == $category->cat_id ? 'selected' : '' }}>
                                                    {{ $c_d->cat_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="hidden" name="sub_cat_id" value="{{ $category->id }}" />
                                        <input type="text" class="form-control" id="name" name="sub_cat_name"
                                            placeholder="Name" value="{{ $category->sub_cat_name }}" required
                                            minlength="3" maxlength="200">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sub_cat_image">Image</label>
                                        <input type="file" class="form-control" name="sub_cat_image"
                                            id="sub_cat_image">
                                        <?php if(isset($category->sub_cat_image)){ ?>
                                        <img src="{{ asset('images/sub_category/' . $category->sub_cat_image) }}"
                                            style="height:100px;" class="img-responsive">
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image_alt">Alt Tag</label>
                                        <input type="text" class="form-control" name="image_alt" id="keyword"
                                            placeholder="Alt Tag" value="{{ $category->image_alt }}" minlength="3"
                                            maxlength="200">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        $(function() {
            $('#table1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        
        $(".sr_form").on('submit',function(e){
            e.preventDefault();
            let form = $(this);
            let sub_cat_id = form.data('id');
            let sr_no = form.find('.sr_no').val();

            $.ajax({
                url: "{{ url('admin/serial_no') }}",
                type: 'get',
                data: {
                    id: sub_cat_id,
                    sr_no: sr_no
                  },
                success: function(result) {
                    if(result.success == true){
                        alert('Serial No Saved!');
                    }else{
                        alert('Failed to save data!');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                    alert('Failed to save data!');
                }
            }); 
        })
           
        
    </script>
@endsection
