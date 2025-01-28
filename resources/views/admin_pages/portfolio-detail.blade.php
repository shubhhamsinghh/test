@extends('layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Portfolio Detail [{{$details[0]->portfolio->p_heading}}]</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Portfolio Detail [{{$details[0]->portfolio->p_heading}}]</li>
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
                                <h3 class="card-title color-red"><b>Portfolio Detail Info</b></h3>
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
                                            <th>Tab</th>
                                            <th>Heading</th>
                                            <th>Cover Image</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $key => $data)
                                        
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $data->tab->tab }}</td>
                                                <td>{{ $data->pd_heading }}</td>
                                                <td><img src="{{ asset('images/portfolio-detail/' . $data->pd_image) }}"
                                                        style="height:100px;"></td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-warning btn-sm color-white"
                                                            data-toggle="modal"
                                                            data-target="#show_detail{{ $data->id }}"><i
                                                                class="fas fa-edit"></i></button>
                                                        <a class="btn btn-danger btn-sm color-white"
                                                            href="{{ route('portfolio_detail_delete', ['id' => $data->id]) }}"
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
<!-- /.content-wrapper -->

<div class="modal fade" id="add_detail" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Portfolio Details [{{$details[0]->portfolio->p_heading}}]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" role="form" method="post" autocomplete="off" action="{{ route('portfolio_detail_add') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="portfolio_id" value="{{$details[0]->portfolio->id}}" />
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

@foreach ($details as $data)
<div class="modal fade" id="show_detail{{$data->id}}" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Portfolio Details [{{$data->portfolio->p_heading}}]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" role="form" method="post" autocomplete="off" action="{{ route('portfolio_detail_update') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tab_id">Portfolio Tab</label>
                                <input type="hidden" name="id" value="{{$data->id}}" >
                               <select name="tab_id" id="tab_id" class="form-control" required>
                                <option value="">-- Select Tab-- </option>
                                @foreach($tabs as $tab)
                                <option value="{{$tab->id}}" {{($tab->id == $data->tab_id?'selected':'')}}>{{$tab->tab}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pd_heading">Heading</label>
                                <input type="text" class="form-control" name="pd_heading" id="pd_heading" value="{{$data->pd_heading}}" required minlength="3">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pd_image">Cover Image</label>
                                <input type="file" name="pd_image" id="pd_image" class="form-control">
                                <?php if(isset($data->pd_image)){ ?>
                                        <img src="{{ asset('images/portfolio-detail/' . $data->pd_image) }}" style="height:100px;" class="img-responsive">
                                        <?php } ?>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_dec_description">Video Link</label>
                                <input type="text" name="pd_video" id="pd_video" class="form-control" value="{{$data->pd_video}}" required>
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
    </script>
@endsection
