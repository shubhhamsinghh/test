@extends('layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                <h3 class="card-title color-red"><b>Products Info</b></h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="modal" role="button"
                                                data-target="#addprod"><i class="fas fa-plus"></i> Add New</a>
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
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Model No.</th>
                                            <th>Image</th>
                                            <th>Trending Product</th>
                                            <th>Tab Products</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $product->prod_name }}</td>
                                                <td>{{ $product->category->cat_name }}</td>
                                                <td>{{ $product->sub_category->sub_cat_name }}</td>
                                                <td>{{ $product->model_no }}</td>
                                                <td><img src="{{ asset('images/products/' . $product->prod_image) }}"
                                                        style="height:100px;"></td>
                                                <td><input type="checkbox" class="form-control"
                                                        {{ $product->is_trending == '1' ? 'checked' : '' }}
                                                        onclick="is_trending('{{ $product->id }}')"></td>
                                                <td><input type="checkbox" class="form-control"
                                                        {{ $product->tab_product == '1' ? 'checked' : '' }}
                                                        onclick="is_tab('{{ $product->id }}')"></td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-warning btn-sm color-white"
                                                            data-toggle="modal"
                                                            data-target="#edit_page{{ $product->id }}"><i
                                                                class="fas fa-edit"></i></button>
                                                        <a class="btn btn-danger btn-sm color-white"
                                                            href="{{ route('product_delete', ['id' => $product->id]) }}"
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

    <div class="modal fade" id="addprod" aria-modal="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" role="form" method="post" autocomplete="off" action="{{ route('product_add') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prod_cat">Choose a Category:</label>
                                    <select class="form-control" name="prod_cat" id="prod_cat" required
                                        onchange="cat_change()">
                                        <option value="">--Select Category--</option>
                                        @foreach ($cat_data as $c_d)
                                            <option value="{{ $c_d->id }}">{{ $c_d->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prod_sub_cat">Choose a Sub-Category:</label>
                                    <select class="form-control" name="prod_sub_cat" id="prod_sub_cat" required>
                                        <option value="">--Select Sub-Category--</option>
                                        {{-- @foreach ($sub_cat_data as $c_d)
                                            <option value="{{ $c_d->id }}">{{ $c_d->sub_cat_name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prod_name">Name</label>
                                    <input type="text" class="form-control" name="prod_name" id="prod_name"
                                        value="" required minlength="3" maxlength="200" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prod_image">Image</label>
                                    <input type="file" name="prod_image" id="prod_image" class="form-control" required
                                        minlength="3" maxlength="200" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_alt">Alt Tag</label>
                                    <input name="image_alt" id="image_alt" class="form-control" required minlength="3"
                                        maxlength="200" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="model_no">Model No.</label>
                                    <input name="model_no" id="model_no" class="form-control" required minlength="3"
                                        maxlength="200" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prod_desc">Description</label>
                                    <textarea id="prod_desc" class="summernote" name="prod_desc" rows="4" cols="50" required>
                                    </textarea>
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

    @foreach ($products as $product)
        <!-- /.modal -->
        <div class="modal fade" id="edit_page{{ $product->id }}" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('product_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="prod_id" value="{{ $product->id }}" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prod_update_cat">Choose a Category:</label>
                                        <select class="form-control" name="prod_cat" id="prod_update_cat" required
                                            onchange="cat_update_change()">
                                            <option value="">--Select Category--</option>
                                            @foreach ($cat_data as $c_d)
                                                <option value="{{ $c_d->id }}"
                                                    {{ $c_d->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $c_d->cat_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prod_sub_update_cat">Choose a Sub-Category:</label>
                                        <select class="form-control prod_sub_update_cat" name="prod_sub_cat" id="prod_sub_update_cat"
                                            required>
                                            <option value="">--Select Sub Category--</option>
                                            <?php $sub_cat_data = \App\Models\Sub_Category::where('cat_id', $product->category_id)->get(); ?>
                                            @foreach ($sub_cat_data as $c_d)
                                                <option value="{{ $c_d->id }}"
                                                    {{ $c_d->id == $product->sub_category_id ? 'selected' : '' }}>
                                                    {{ $c_d->sub_cat_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prod_name">Name</label>
                                        <input type="text" class="form-control" id="prod_name" name="prod_name"
                                            placeholder="Name" value="{{ $product->prod_name }}" required minlength="3"
                                            maxlength="200">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prod_image">Image</label>
                                        <input type="file" class="form-control" name="prod_image" id="prod_image">
                                        <?php if(isset($product->sub_cat_image)){ ?>
                                        <img src="{{ asset('images/products/' . $product->prod_image) }}"
                                            style="height:100px;" class="img-responsive">
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image_alt">Alt Tag</label>
                                        <input type="text" class="form-control" name="image_alt" id="image_alt"
                                            placeholder="Alt Tag" value="{{ $product->image_alt }}" minlength="3"
                                            maxlength="200" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="model_no">Model No.</label>
                                        <input type="text" class="form-control" name="model_no" id="model_no"
                                            placeholder="Model No." value="{{ $product->model_no }}" minlength="3"
                                            maxlength="200" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prod_desc">Description</label>
                                        <textarea id="prod_desc" class="summernote" name="prod_desc" rows="4" cols="50" required>
                                            {{ $product->description }}
                                        </textarea>
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
        function cat_change() {
            var cat_id = $("#prod_cat").val()
            $.ajax({
                url: "{{ url('admin/get_sub_cat/') }}/" + cat_id,
                type: 'get',
                success: function(result) {
                    $("#prod_sub_cat").html(result);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }

        function cat_update_change() {
            var cat_id = $("#prod_update_cat").val()
            $.ajax({
                url: "{{ url('admin/get_sub_cat/') }}/" + cat_id,
                type: 'get',
                success: function(result) {
                    $(".prod_sub_update_cat").html(result);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }

        function is_trending(id) {
            $.ajax({
                url: "{{ url('admin/is_trending/') }}/" + id,
                type: 'get',
                success: function(result) {

                },
                error: function(e) {
                    console.log(e)
                }
            });
        }

        function is_tab(id) {
            $.ajax({
                url: "{{ url('admin/is_tab/') }}/" + id,
                type: 'get',
                success: function(result) {

                },
                error: function(e) {
                    console.log(e)
                }
            });
        }

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
    </script>
@endsection
