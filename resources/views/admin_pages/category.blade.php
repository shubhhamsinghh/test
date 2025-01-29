@extends('layouts.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title color-red"><b>Category Info</b></h3>
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
                                        <th>Heading</th>
                                        <th>Thumbnail Image</th>
                                        <th>Banner Image</th>
                                       
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category->cat_name }}</td>
                                        <td><img src="{{ asset('images/category/' . $category->cat_image) }}"
                                                style="height:100px;"></td>
                                        <td><img src="{{ asset('images/category/' . $category->cat_ban_image) }}"
                                                style="height:100px;"></td>
                                        <td>
                                            <center>
                                                <button class="btn btn-warning btn-sm color-white"
                                                    data-toggle="modal"
                                                    data-target="#edit_page{{ $category->id }}"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="btn btn-success btn-sm color-white"
                                                    data-toggle="modal" data-target="#add_detail{{ $category->id }}"><i
                                                        class="fas fa-plus"></i></button>
                                                <?php
                                                if ($category->cat_description()->count() > 0) { ?>
                                                    <a class="btn btn-primary btn-sm color-white"
                                                        href="{{route('category_detail',['url' => $category->cat_url])}}"><i
                                                            class="fas fa-eye"></i></a>
                                                <?php } ?>
                                                <a class="btn btn-danger btn-sm color-white"
                                                    href="{{ route('category_delete', ['id' => $category->id]) }}"
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" role="form" method="post" autocomplete="off" action="{{ route('category_add') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_name">Heading</label>
                                <input type="text" class="form-control" name="cat_name" id="cat_name" value="" required minlength="3">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_image">Thumbnail Image</label>
                                <input type="file" name="cat_image" id="cat_image" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_ban_image">Banner Image</label>
                                <input type="file" name="cat_ban_image" id="cat_ban_image" class="form-control" required>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_description">Description</label>
                                <textarea name="cat_description" class="form-control" id="cat_description" row="3"></textarea>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_detail_des">Detail Description</label>
                                <textarea name="cat_detail_des" class="form-control summernote" id="cat_detail_des" row="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_meta">Meta</label>
                                <textarea name="cat_meta" class="form-control" id="cat_meta"></textarea>
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


@foreach ($categories as $category)
<!-- /.modal -->
<div class="modal fade" id="edit_page{{ $category->id }}" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="{{ route('category_update') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Heading</label>
                                <input type="hidden" name="cat_id" value="{{ $category->id }}" />
                                <input type="text" class="form-control" id="name" name="cat_name" value="{{ $category->cat_name }}" required minlength="3">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_image">Thumbnail Image</label>
                                <input type="file" class="form-control" name="cat_image" id="cat_image">
                                <?php if (isset($category->cat_image)) { ?>
                                    <img src="{{ asset('images/category/' . $category->cat_image) }}"
                                        style="height:100px;" class="img-responsive">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_ban_image">Banner Image</label>
                                <input type="file" name="cat_ban_image" id="cat_ban_image" class="form-control">
                                <?php if (isset($category->cat_ban_image)) { ?>
                                    <img src="{{ asset('images/category/' . $category->cat_ban_image) }}"
                                        style="height:100px;" class="img-responsive">
                                <?php } ?>
                            </div>
                        </div>

                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="cat_description" class="form-control" id="cat_description" row="3">{{ $category->cat_description}}</textarea>
                            </div>
                        </div> -->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_detail_des">Detail Description</label>
                                <textarea name="cat_detail_des" class="form-control summernote" id="cat_detail_des" row="3">{{ $category->cat_detail_des}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta">Meta</label>
                                <textarea name="cat_meta" class="form-control" id="description">{{ $category->cat_meta }}</textarea>
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


<div class="modal fade" id="add_detail{{ $category->id }}" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category Details [{{$category->cat_name}}]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" role="form" method="post" autocomplete="off" action="{{ route('category_detail_add') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="category_id" value="{{ $category->id }}" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_heading">Heading</label>
                                <input type="text" class="form-control" name="cat_dec_heading" id="cat_dec_heading" value="" required minlength="3">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_des_image">Cover Image</label>
                                <input type="file" name="cat_des_image" id="cat_des_image" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_des_ban_image">Banner Image</label>
                                <input type="file" name="cat_des_ban_image" id="cat_des_ban_image" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_des_cimg">Gallery Images</label>
                                <input type="file" name="cat_des_cimg[]" id="cat_des_cimg" class="form-control" multiple required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_description">Description</label>
                                <textarea name="cat_dec_description" class="form-control" id="cat_dec_description" row="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_meta">Meta</label>
                                <textarea name="cat_dec_meta" class="form-control" id="cat_dec_meta"></textarea>
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
</script>

@endsection