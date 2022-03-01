@extends('dashboard')

@section('content')
<h2 class="mt-3">Sub User Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item active">Sub Management</li>	
  	</ol>
</nav>

<div class="mt-4 mb-4">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">Sub User Management</div>
				<div class="col col-md-6">
					
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="user_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
$(function(){

	var table = $('#user_table').DataTable({
		processing:true,
		serverSide:true,
		ajax:"{{ route('sub_user.fetchall') }}",
		columns:[
			{
				data:'name',
				name:'name'
			},
			{
				data:'email',
				name:'email'
			},
			{
				data:'created_at',
				name:'created_at'
			},
			{
				data:'updated_at',
				name:'updated_at'
			},
			{
				data:'action',
				name:'action',
				orderable:false
			}
		]
	});

})
</script>
@endsection