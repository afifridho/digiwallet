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
    <h1 class="page-header">Agency Management</h1>
  </div>
</div><!--/.row-->


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Agency lists</div>
      <div class="panel-body">
        <div class="col-md-12">
          <div class="col-md-12">
            <a href="{{ url('/agencies/create') }}"><button type="button" class="btn btn-lg btn-primary pull-right">Add Agency</button></a>
          </div>
          <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Categories</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @if (!is_null($agencies))
                    @foreach ($agencies as $key => $agency)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $agency->name }}</td>
                        <td>{{ $agency->agencycategory->name }}</td>
                        <td>
                          <a href="{{ route('agencies.edit', $agency->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                          <a href="{{ route('agencies.destroy', $agency->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
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
