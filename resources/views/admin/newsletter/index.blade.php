@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Newsletter</li>
  </ol>

  @include('admin.layouts.message')


  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Newsletter
          {{-- <a href="{{ url('admin/newsletter/create') }}" class="btn btn-success mr-2" style="float: right;"><i class="fa fa-edit"></i>Add New</a> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Created At</th>
                  <th>Control</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Created At</th>
                  <th>Control</th>
                </tr>
              </tfoot>
              <tbody>
              	<span hidden>{{ $count = 0 }}</span>
                @foreach($newsletter as $value)
                <tr>
                  <td>{{ $count = $count + 1 }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>
                    <a href="{{ url('/admin/newsletter/'.$value->id.'/destroy') }}" class="btn btn-outline-danger" ><i class="fa fa-close"></i> Delete</a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
	  <!-- /tables-->

@endsection