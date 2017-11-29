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
    <h1 class="page-header">expense Management</h1>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Edit expense Data</div>
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
              <label>Date</label>
              <p>{{ date("d-M-Y", strtotime($expense->date)) }}</p>
            </div>
            <div class="form-group">
              <label>expense Name</label>
              <p>{{ decrypt($expense->info) }}</p>
            </div>
            <div class="form-group">
              <label>Value</label>
              <p>{{ decrypt($expense->value) }}</p>
            </div>
            <div class="form-group">
              <label>expense Recipt</label>
              <img height="500" width="auto" src="{{ $expense->file }}" />
            </div>
            <a href="{{ route('expenses.edit', $expense->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
            <form style="display: inline" action="{{ route('expenses.destroy', $expense->id) }}" method="POST" accept-charset="utf-8">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
               <button type="submit" class="btn btn-danger">Delete</button>
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
