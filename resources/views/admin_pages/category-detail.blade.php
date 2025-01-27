@extends('layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Detail [{{$data[0]->category->cat_name}}]</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Category Detail [{{$data[0]->category->cat_name}}]</li>
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
                                <h3 class="card-title color-red"><b>Category Detail Info</b></h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="modal" role="button"
                                                data-target="#add_detail"><i class="fas fa-plus"></i> Add New</a>
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
                                            <th>Cover Image</th>
                                            <th>Banner Image</th>
                                            <th>Home Page</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $category)
                                        
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $category->cat_dec_heading }}</td>
                                                <td><img src="{{ asset('images/category/' . $category->cat_des_image) }}"
                                                        style="height:100px;"></td>
                                                <td><img src="{{ asset('images/category/' . $category->cat_des_ban_image) }}"
                                                        style="height:100px;"></td>
                                                        <td><input type="checkbox" class="form-control" onclick="is_home('{{$category->id}}')" {{($category->is_home == 1)?'checked':''}} ></td>
                                                <td>
                                                    <center>
                                                      <button class="btn btn-warning btn-sm color-white"
                                                            data-toggle="modal" data-target="#show_detail{{ $category->id }}"><i class="fas fa-edit"></i></button>
                                                      <a class="btn btn-danger btn-sm color-white" href="{{ route('category_detail_delete', ['id' => $category->id]) }}"
                                                        onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash"></i></a>
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
<!-- /.content-wrapper -->

<div class="modal fade" id="add_detail" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category Details [{{$data[0]->category->cat_name}}]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" method="post" autocomplete="off" action="{{ route('category_detail_add') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="category_id" value="{{ $data[0]->category->id }}" />
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

@foreach ($data as $category)
<div class="modal fade" id="show_detail{{ $category->id }}" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category Details [{{$category->category->cat_name}}]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" role="form" method="post" autocomplete="off" action="{{ route('category_detail_update',['id' => $category->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_heading">Heading</label>
                                <input type="text" class="form-control" name="cat_dec_heading" id="cat_dec_heading" value="{{$category->cat_dec_heading}}" required minlength="3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_des_image">Cover Image</label>
                                <input type="file" name="cat_des_image" id="cat_des_image" class="form-control">
                                <?php if(isset($category->cat_des_image)){ ?>
                                    <img src="{{ asset('images/category/' . $category->cat_des_image) }}"
                                        style="height:100px;" class="img-responsive"> 
                                    <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_des_ban_image">Banner Image</label>
                                <input type="file" name="cat_des_ban_image" id="cat_des_ban_image" class="form-control">
                                <?php if(isset($category->cat_des_ban_image)){ ?>
                                    <img src="{{ asset('images/category/' . $category->cat_des_ban_image) }}"
                                        style="height:100px;" class="img-responsive"> 
                                    <?php } ?>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_description">Description</label>
                                <textarea name="cat_dec_description" class="form-control" id="cat_dec_description" row="3">{{$category->cat_dec_description}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_meta">Meta</label>
                                <textarea name="cat_dec_meta" class="form-control" id="cat_dec_meta">{{$category->cat_dec_meta}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_des_cimg">Gallery Images</label>
                                <input type="file" name="cat_des_cimg[]" id="cat_des_cimg" class="form-control" multiple >
                                <div class="image-container{{$category->id}}">
                                <?php if(isset($category->cat_images)){ 
                                    foreach($category->cat_images as $img){ ?>
                                    <img src="{{ asset('images/category-detail/' . $img->cat_des_cimg) }}"
                                        style="height:50px;" class="img-responsive"> 
                                        <a class="btn btn-danger btn-sm color-white" onclick="deleteImage('{{$img->id}}','{{$category->id}}')"><i class="fas fa-trash"></i></a>
                                <?php } } ?>
                                </div>
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

        function deleteImage(id,apid){
            if(confirm("Are you sure to delete this image?")){
                $.ajax({
                url: "{{ url('admin/category-detail-img-delete') }}/"+id,
                type: 'get',
                data: {apid : apid},
                success: function(result) {
                    if(result.status){
                        $(".image-container"+apid).html(result.data);
                        toastr.success('Image deleted.');
                    }else{
                        toastr.error('Failed to deleted image!');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                    toastr.error('Failed to deleted image!');
                }
            });
            }
        }
    </script>

<script>
    function is_home(id){
        $.ajax({
            type: "GET",
            url: "{{url('admin/is_home')}}/"+id,
            success: function( data ) {
              if(data.success){
                toastr.success('Data saved!')
              }else{
                toastr.error('Failed to save data!')
              }
            }
        });
    }
</script>
@endsection
