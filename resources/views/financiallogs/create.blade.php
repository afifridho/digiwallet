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
      <div class="panel-heading">Create New Agency</div>
      <div class="panel-body">
        <div class="col-md-6">
          <form action="{{ route('agencies.store') }}" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
              <label>Agency Name</label>
              <input class="form-control" name="name" placeholder="Fill agency name here">
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" name="address" rows="3" placeholder="fill agency address here"></textarea>
            </div>
            <div class="form-group">
              <label>Agency Categories</label>
              <select class="form-control" name="category">
                @foreach ($agencycategories as $key => $agencycategory)
                <option value="{{ $agencycategory->id }}">{{ $agencycategory->name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Button</button>
            <button type="reset" class="btn btn-default">Reset Button</button>
          </form>
        </div>
      </div>
    </div><!-- /.panel-->
  </div><!-- /.col-->
@endsection
