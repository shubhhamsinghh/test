@extends('layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Portfolio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Portfolio</li>
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
                                <h3 class="card-title color-red"><b>Portfolio Info</b></h3>
                                <!-- <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="modal" role="button"
                                                data-target="#addtab"><i class="fas fa-plus"></i> Add Tab</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Heading</th>
                                            <th>Image</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($portfolio as $key => $data)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $data->p_heading }}</td>
                                                <td><img src="{{ asset('images/portfolio/' . $data->p_image) }}" style="height:100px;"></td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-warning btn-sm color-white"
                                                            data-toggle="modal" data-target="#edit_page{{ $data->id }}"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-success btn-sm color-white" data-toggle="modal" data-target="#add_detail{{ $data->id }}"><i
                                                        class="fas fa-plus"></i></button>
                                                        <?php
                                                        if ($data->port_details()->count() > 0) { ?>
                                                        <a class="btn btn-primary btn-sm color-white" href="{{route('portfolio_detail',['url' => $data->p_url])}}"><i
                                                            class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                        <!-- <a class="btn btn-danger btn-sm color-white" href="{{ route('portfolio_delete', ['id' => $data->id]) }}"
                                                        onclick="return confirm('Are you sure to delete?')"><i
                                                            class="fas fa-trash"></i></a> -->
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

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title color-red"><b>Tabs Info</b></h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="modal" role="button"
                                                data-target="#addtab"><i class="fas fa-plus"></i> Add Tab</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Tab</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tabs as $key => $tab)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $tab->tab }}</td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-warning btn-sm color-white"
                                                            data-toggle="modal" data-target="#edit_tab{{ $tab->id }}"><i class="fas fa-edit"></i></button>
                                                        <a class="btn btn-danger btn-sm color-white" href="{{ route('tab_delete', ['id' => $tab->id]) }}"
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

    <div class="modal fade" id="addtab" aria-modal="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Portfolio Tab</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" role="form" method="post" autocomplete="off"
                    action="{{ route('tab_add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tab">Tab Name</label>
                                    <input type="text" class="form-control" name="tab" id="tab" require>
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

    @foreach($tabs as $tab)
    <div class="modal fade" id="edit_tab{{$tab->id}}" aria-modal="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Portfolio Tab</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" role="form" method="post" autocomplete="off"
                    action="{{ route('tab_update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tab">Tab Name</label>
                                    <input type="hidden" name="id" value="{{$tab->id}}">
                                    <input type="text" class="form-control" name="tab" id="tab" require  value="{{$tab->tab}}">
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
    <!-- /.content-wrapper -->

    @foreach ($portfolio as $data)
        <!-- /.modal -->
        <div class="modal fade" id="edit_page{{ $data->id }}" aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Portfolio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('portfolio_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="p_heading">Heading</label>
                                        <input type="hidden" name="id" value="{{ $data->id }}" />
                                        <input type="text" class="form-control" id="p_heading" name="p_heading"  value="{{ $data->p_heading }}" required
                                            minlength="3" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="p_imge">Banner Image</label>
                                        <input type="file" class="form-control" name="p_image"
                                            id="p_imge">
                                        <?php if(isset($data->p_image)){ ?>
                                        <img src="{{ asset('images/portfolio/' . $data->p_image) }}" style="height:100px;" class="img-responsive">
                                        <?php } ?>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="p_description">Description</label>
                                        <textarea class="form-control" name="p_description" id="p_description" rows="5">{{ $data->p_description }}</textarea>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="p_description">Meta</label>
                                        <textarea class="form-control" name="p_meta" id="p_meta" rows="5">{{ $data->p_meta }}</textarea>
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

   <div class="modal fade" id="add_detail{{ $data->id }}" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Portfolio Details [{{$data->p_heading}}]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" role="form" method="post" autocomplete="off" action="{{ route('portfolio_detail_add') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="portfolio_id" value="{{ $data->id }}" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tab_id">Portfolio Tab</label>
                               <select name="tab_id" id="tab_id" class="form-control" required>
                                <option value="">-- Select Tab-- </option>
                                @foreach($tabs as $tab)
                                <option value="{{$tab->id}}">{{$tab->tab}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pd_heading">Heading</label>
                                <input type="text" class="form-control" name="pd_heading" id="pd_heading" value="" required minlength="3">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pd_image">Cover Image</label>
                                <input type="file" name="pd_image" id="pd_image" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_description">Video Link</label>
                                <input type="text" name="pd_video" id="pd_video" class="form-control" required>
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
            $('#table2').DataTable({
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
