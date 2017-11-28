@extends('layouts.layout')
@section('content')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="#">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Forms</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Agency Management</h1>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Create New Agency Category</div>
      <div class="panel-body">
        <div class="col-md-6">
          <form action="{{ route('agencycategories.store') }}" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
              <label>Category Name</label>
              <input class="form-control" name="name" placeholder="Fill category name here">
            </div>
            <button type="submit" class="btn btn-primary">Submit Button</button>
            <button type="reset" class="btn btn-default">Reset Button</button>
          </form>
        </div>
      </div>
    </div><!-- /.panel-->
  </div><!-- /.col-->
@endsection
