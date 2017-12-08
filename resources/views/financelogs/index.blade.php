@extends('layouts.layout')

@section('additional-css')
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

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
    <h1 class="page-header">Financial Logs</h1>
  </div>
</div><!--/.row-->


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Log List</div>
      <div class="panel-body">
        <div class="col-md-12">

          <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Info</th>
                      <th>Income/Expense</th>
                      <th>Income/Expense Value</th>
                      <th>Balance</th>
                  </tr>
              </thead>
              <tbody>
                  @if (!is_null($financelogs))
                    @foreach ($financelogs as $key => $financelog)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        @if(!is_null($financelog->income))
                        <td>{{ $financelog->income->date }}</td>
                        <td><a href="{{ url('/incomes/'.$financelog->incomes_id) }}" class="">{{ decrypt($financelog->income->info) }}</a></td>
                        <td>Income</td>
                        <td>+ {{ decrypt($financelog->income->value) }}</td>
                        @else
                        <td>{{ $financelog->expense->date }}</td>
                        <td><a href="{{ url('/expenses/'.$financelog->expenses_id) }}" class="">{{ decrypt($financelog->expense->info) }}</a></td>
                        <td>Expense</td>
                        <td>- {{ decrypt($financelog->expense->value) }}</td>
                        @endif
                        <td>{{ decrypt($financelog->balance) }}</td>
                    </tr>
                    @endforeach
                  @endif
              </tbody>
          </table>
        </div>
        </div>
      </div>
    </div><!-- /.panel-->
  </div>
</div>
@endsection
@section('additional-js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
@endsection
