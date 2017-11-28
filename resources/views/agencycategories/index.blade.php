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
    <h1 class="page-header">Agency Categories Management</h1>
  </div>
</div><!--/.row-->


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Agency Category Lists</div>
      <div class="panel-body">
        <div class="col-md-12">
          <div class="col-md-12">
            <a href="{{ url('/agencycategories/create') }}"><button type="button" class="btn btn-lg btn-primary pull-right">Add Agency Category</button></a>
          </div>
          <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                  </tr>
              </thead>
              <tbody>
                  @if (!is_null($agencycategories))
                    @foreach ($agencycategories as $key => $agencycategory)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $agencycategory->name }}</td>
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
