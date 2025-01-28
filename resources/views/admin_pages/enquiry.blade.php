@extends('layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Enquiries</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Enquiries</li>
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
                                <h3 class="card-title color-red"><b>Enquiries Info</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Date & Time</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiries as $key => $enquiry)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $enquiry->name }}</td>
                                                <td>{{ $enquiry->phone }}</td>
                                                <td>{{ $enquiry->email }}</td>
                                                <td>{{ date('d-M-Y',strtotime($enquiry->created_at)) }}</td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-info btn-sm color-white" data-toggle="modal"
                                                            data-target="#view_page{{ $enquiry->id }}"><i
                                                                class="fas fa-eye"></i></button>
                                                        &nbsp;
                                                        <a class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Do you really want to delete this enquiry!!')"
                                                            href="{{ url('admin/enquiry-delete', $enquiry->id) }}"> <i
                                                                class="fas fa-trash"></i> </a>
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

    @foreach ($enquiries as $enquiry)
        <!-- /.modal -->
        <div class="modal fade" id="view_page{{ $enquiry->id }}" aria-modal="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Contact Enquiry Info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 mt-2 mb-2">
                                <b>Name :</b>
                            </div>
                            <div class="col-md-9 mt-2 mb-2">
                                {{ $enquiry->name }}
                            </div>

                            <div class="col-md-3 mt-2 mb-2">
                                <b>Email :</b>
                            </div>
                            <div class="col-md-9 mt-2 mb-2">
                                {{ $enquiry->email }}
                            </div>

                            <div class="col-md-3 mt-2 mb-2">
                                <b>Phone :</b>
                            </div>
                            <div class="col-md-9 mt-2 mb-2">
                                {{ $enquiry->phone }}
                            </div>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
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
