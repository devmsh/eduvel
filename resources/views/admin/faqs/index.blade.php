@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Faqs</li>
  </ol>

  @include('admin.layouts.message')

  	
  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Links Social Media
          <a href="{{ url('admin/faq/create') }}" class="btn btn-success mr-2" style="float: right;"><i class="fa fa-edit"></i>Add New</a>
      	</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#ID</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Category Faq</th>
                  <th>Created At</th>
                  <th>Control</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#ID</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Category Faq</th>
                  <th>Created At</th>
                  <th>Control</th>
                </tr>
              </tfoot>
              <tbody>
              	<span hidden="hidden">{{ $count=0 }}</span>
              	@foreach($faqs as $value)
                <tr>
                  <td>{{ $count = $count+1 }}</td>
                  <td>{!! substr($value->title, 0, 15) !!} ...</td>
                  <td>{!! substr($value->content, 0, 25) !!} ...</td>
                  <td>{{ $value->category_faq }}</td>
                  <td>{{ $value->created_at->toDayDateTimeString() }}</td>
                  <td>
                  	<a href="faq/{{ $value->id }}" class="btn_1 bg-sucsses"><i class="fa fa-fw fa-eye"></i> Show</a>
                    <a href="faq/{{ $value->id }}/edit" class="btn_1 bg-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
                    <a href="faq/{{ $value->id }}/destroy" class="btn_1 bg-danger"><i class="fa fa-fw fa-close"></i> Deleted</a>
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