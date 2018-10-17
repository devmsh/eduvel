@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Messages</li>
  </ol>

  @include('admin.layouts.message')

  	
 	<div class="box_general">
		<h4>Message</h4>
		<div class="list_general">
			<ul>
				@foreach($contacts as $contact)
					<li style="padding-left: 30px;">
						<span> {{ $contact->created_at}} </span>
						<h4>{{ $contact->name_contact }} {{ $contact->lastname_contact }} 
							
							@if( $contact->created_at <= '23 hours ago')
								<i class="unread bg-success"> New Message</i>
							@endif
						</h4>
						<span class="float-left">
							<i class="fa fa-user-circle"></i> E-mail : {{ $contact->email_contact }} 
						</span>
						<span class="float-left pl-4">
							<i class="fa fa-phone"></i> Phone : {{ $contact->phone_contact }}
						</span> <br>
						<p>{{ $contact->message_contact }}.</p>
						<div class="text-right">
							@if($contact->done_read == 0)
							<a href="messages/{{ $contact->id }}/done-read" class="btn_1 bg-primary"><i class="fa fa-fw fa-eye fa-lg"></i> Done Read</a>
							@endif
							<a href="messages/{{ $contact->id }}/destroy" class="btn_1 bg-danger" data-toggle="modal" data-target="#sureDeleteMessage"><i class="fa fa-fw fa-close"></i> Deleted</a>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- /box_general-->

	<link rel="stylesheet" type="text/css" href="{{ url('/design/adminpanel') }}/css/pagenation-admin.css">
    {{ $contacts->links() }}
    <!-- /pagination-->


    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="sureDeleteMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message Sure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you're sorry?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-danger">Delete</button> -->
        <a href="messages/{{ $contact->id }}/destroy" class="btn btn-danger"><i class="fa fa-fw fa-close"></i> Deleted</a>
      </div>
    </div>
  </div>
</div>

    

@endsection