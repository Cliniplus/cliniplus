@extends('admin.layouts.layout')
@section('title','Doctors')

@section('content')
<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">
		
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">List of Doctors</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
							<li class="breadcrumb-item active">Doctor</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="datatable table table-hover table-center mb-0">
									<thead>
										<tr>
											<th>Doctor Name</th>
											<th>Speciality</th>
										
											
										</tr>
									</thead>
									<tbody>
										@foreach ($doctors as $doctor)
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$url.$doctor['doctorImage']}}" alt="User Image"></a>
													<a href="profile.html">{{$doctor['name']}}</a>
												</h2>
											</td>
											<td>{{$doctor['specialty']}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>			
			</div>
			
		</div>			
	</div>
	<!-- /Page Wrapper -->
	@endsection