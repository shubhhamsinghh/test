@extends('layouts.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Company Info</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Company Info</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-primary">
        <div class="card-header">
                <h3 class="card-title color-red"><b>Company Info Details</b></h3>
        </div>
          <form method="POST" action="{{route('company_info_update')}}">
            @csrf
          <div class="card-body">
 
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email1">Website Email</label>
                  <input type="email" class="form-control" name="c_email1" id="email1" placeholder="Website Email - I" value="<?php if(isset($company_info->comp_email1)){echo $company_info->comp_email1; } ?>" minlength="3" maxlength="80" required>
                </div>
              </div>
            
            <div class="col-md-12">
                <div class="form-group">
                  <label for="no1">Contact No</label>
                  <input type="text" class="form-control" id="no1" placeholder="Contact No - I" name="c_no1" value="<?php if(isset($company_info->comp_contact1)){echo $company_info->comp_contact1; } ?>" minlength="5" maxlength="15" required>
                </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="address">Company Address</label>
                <input type="text" class="form-control" id="address" placeholder="Company Address" name="c_adrs" value="<?php if(isset($company_info->comp_address)){echo $company_info->comp_address; } ?>" minlength="5" maxlength="300" required>
              </div>
            </div>

            <div class="row">
            
              <div class="col-md-12">
                <div class="form-group">
                  <label for="map">Google Map Link</label>
                  <input type="text" class="form-control" id="map" placeholder="Google Map Link" name="c_map" value="{{$company_info->comp_map}}" minlength="5">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fb">Social Media [Facebook]</label>
                  <input type="text" class="form-control" id="fb" placeholder="Social Media Link" name="c_sm1" value="<?php if(isset($company_info->comp_sm1)){echo $company_info->comp_sm1; } ?>" minlength="5">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="insta">Social Media [Instagram]</label>
                  <input type="text" class="form-control" id="insta" placeholder="Social Media Link" name="c_sm2" value="<?php if(isset($company_info->comp_sm2)){echo $company_info->comp_sm2; } ?>" minlength="5">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="youtube">Social Media [Youtube]</label>
                  <input type="text" class="form-control" id="youtube" placeholder="Social Media Link" name="c_sm3" value="<?php if(isset($company_info->comp_sm3)){echo $company_info->comp_sm3; } ?>" minlength="5">
                </div>
              </div>
            
              <div class="col-md-6">
                <div class="form-group">
                  <label for="youtube">Social Media [Whatsapp]</label>
                  <input type="text" class="form-control" id="Whatsapp" placeholder="Social Media Link" name="c_sm4" value="<?php if(isset($company_info->comp_sm3)){echo $company_info->comp_sm4; } ?>" minlength="5" >
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
          <button type="submit" class="btn btn-primary float-right">Update</button>
          </div>
          <form>
        </div>
        <!-- /.col-->
      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
