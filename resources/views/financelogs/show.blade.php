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
    <h1 class="page-header">Income Management</h1>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Edit Income Data</div>
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
              <label>Date</label>
              <p>{{ date("d-M-Y", strtotime($income->date)) }}</p>
            </div>
            <div class="form-group">
              <label>Income Name</label>
              <p>{{ decrypt($income->info) }}</p>
            </div>
            <div class="form-group">
              <label>Value</label>
              <p>{{ decrypt($income->value) }}</p>
            </div>
            <div class="form-group">
              <label>Income Recipt</label>
              <img height="500" width="auto" src="{{ $income->file }}" />
            </div>
            <a href="{{ route('incomes.edit', $income->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
            <form style="display: inline" action="{{ route('incomes.destroy', $income->id) }}" method="POST" accept-charset="utf-8">
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
