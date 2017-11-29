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
    <h1 class="page-header">Income Logs</h1>
  </div>
</div><!--/.row-->


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Log List</div>
      <div class="panel-body">
        <div class="col-md-12">
          <div class="col-md-12">
            <a href="{{ url('/incomes/create') }}"><button type="button" class="btn btn-lg btn-primary pull-right">Add Income</button></a>
          </div>
          <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Info</th>
                      <th>Values</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @if (!is_null($incomes))
                    @foreach ($incomes as $key => $income)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><a href="{{ url('/incomes/'.$income->id) }}" class="">{{ $income->date }}</a></td>
                        <td>{{ decrypt($income->info) }}</td>
                        <td>{{ decrypt($income->value) }}</td>
                        <td>
                          <a href="{{ route('incomes.edit', $income->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                          <form style="display: inline" action="{{ route('incomes.destroy', $income->id) }}" method="POST" accept-charset="utf-8">
                           {{ csrf_field() }}
                           {{ method_field('DELETE') }}
                             <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
                        </td>
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
