@extends('layouts.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
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
                            <h3 class="card-title color-red"><b>Testimonials Info</b></h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="modal" role="button"
                                            data-target="#addtestimonial"><i class="fas fa-plus"></i> Add New</a>
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $key => $testi)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $testi->t_heading }}</td>
                                        <td><img src="{{ asset('images/testimonials/' . $testi->t_image) }}"
                                                style="height:100px;"></td>
                                        <td>{{ $testi->t_name }}</td>
                                        <td>
                                            <center>
                                                <button class="btn btn-warning btn-sm color-white"
                                                    data-toggle="modal" data-target="#edit_page{{ $testi->id }}"><i
                                                        class="fas fa-edit"></i></button>
                                                
                                                <a class="btn btn-danger btn-sm color-white"
                                                    href="{{ route('testimonial_delete', ['id' => $testi->id]) }}"
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

<div class="modal fade" id="addtestimonial" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Testimonial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" role="form" method="post" autocomplete="off" action="{{ route('testimonial_add') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_heading">Heading</label>
                                <input type="text" class="form-control" name="t_heading" id="t_heading" value="" required minlength="3">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_image">Image</label>
                                <input type="file" name="t_image" id="t_image" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_name">Name</label>
                                <input name="t_name" class="form-control" id="t_name" required>
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_description">Description</label>
                                <textarea name="t_description" class="form-control" id="t_description" row="3" required></textarea>
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


@foreach ($testimonials as $testi)
<!-- /.modal -->
<div class="modal fade" id="edit_page{{ $testi->id }}" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Testimonial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="{{ route('testimonial_update') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_heading">Heading</label>
                                <input type="hidden" name="testimonial_id" value="{{ $testi->id }}" />
                                <input type="text" class="form-control" id="t_heading" name="t_heading" value="{{ $testi->t_heading }}" required minlength="3">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_image">Image</label>
                                <input type="file" class="form-control" name="t_image" id="t_image">
                                <?php if (isset($testi->t_image)) { ?>
                                    <img src="{{ asset('images/testimonials/' . $testi->t_image) }}"
                                        style="height:100px;" class="img-responsive">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_name">Name</label>
                                <input name="t_name" class="form-control" id="t_name" required value="{{ $testi->t_name }}">
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="t_description">Description</label>
                                <textarea name="t_description" class="form-control" id="t_description" row="3" required>{{$testi->t_description}}</textarea>
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