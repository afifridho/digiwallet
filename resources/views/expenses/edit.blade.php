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
    <h1 class="page-header">Expense Management</h1>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Edit Expense Data</div>
      <div class="panel-body">
        <div class="col-md-6">
          <form action="{{ route('expenses.update', $expense->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label>Date</label>
              <input class="datepicker form-control" name="date" placeholder="Fill the date here" value="{{ date("d-M-Y", strtotime($expense->date)) }}">
            </div>
            <div class="form-group">
              <label>Expense Name</label>
              <input class="form-control" name="info" placeholder="Fill expense name here" value="{{ decrypt($expense->info) }}">
            </div>
            <div class="form-group">
              <label>Value</label>
              <input type="number" class="form-control" name="value" placeholder="Fill expense value here" value="{{ decrypt($expense->value) }}">
            </div>
            <div class="form-group">
              <label>Expense Recipt</label>
              <input type="file" name="file">
              <p class="help-block">Put the expense recipt file here.</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit Button</button>
            <button type="reset" class="btn btn-default">Reset Button</button>
          </form>
        </div>
      </div>
    </div><!-- /.panel-->
  </div><!-- /.col-->
@endsection
@section('additional-js')
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'dd-M-yyyy',
    todayHighlight: true,
  });
</script>
@endsection
