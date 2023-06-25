@extends('admin.layouts.layout')
@section('title','Specialilties')

@section('content')
<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				    <span>@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif</span>
                	<span>@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif</span>
					<span>@error('speciality')<div class="alert alert-danger">{{ $message }}</div>@enderror</span>
					<span>@error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror</span>

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Specialities</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Specialities</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
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
													<th>#</th>
													<th>Specialities</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($specialties as $specialty)
												<tr>
													<td>{{$specialty['id']}}</td>
													
													<td>
														<h2 class="table-avatar">
															<a href="" class="avatar avatar-sm mr-2">
																<img class="avatar-img" src="{{$url.$specialty['image']}}" alt="Speciality">
															</a>
															<a href="">{{$specialty['specialtyName']}}</a>
														</h2>
													</td>
												
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" data-target="#edit_specialities_details{{$specialty['id']}}">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal{{$specialty['id']}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<!-- Edit Details Modal -->
												<div class="modal fade" id="edit_specialities_details$originalName" aria-hidden="true" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document" >
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit Specialities</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form  id="editForm" method="POST" action="{{route('speciality.update',$specialty['id'])}}" enctype="multipart/form-data">
																	@method('PUT')
																	@csrf
																	<div class="row form-row">
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Specialities</label>
																				<input value="{{$specialty['specialtyName']}}" name="speciality" type="text" class="form-control">
																			</div>
																		</div>
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Image</label>
																				<input name="image" type="file"  class="form-control">
																			</div>
																		</div>
																	</div>
																	<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- /Edit Details Modal -->
												
												<!-- Delete Modal -->
												<div class="modal fade" id="delete_modal{{$specialty['id']}}" aria-hidden="true" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document" >
														<div class="modal-content">
															<div class="modal-body">
																<form method="POST" action="{{route('speciality.destroy',$specialty['id'])}}">
																@method('delete')
																	@csrf
																	<div class="form-content p-2">
																		<h4 class="modal-title">Delete</h4>
																		<p class="mb-4">Are you sure want to delete?</p>
																		<button type="submit" class="btn btn-primary">Save </button>
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- /Delete Modal -->
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
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Specialities</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="{{route('speciality.store')}}" enctype="multipart/form-data">
								@csrf
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Specialities</label>
											<input name="speciality" type="text" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<input name="image" type="file"  class="form-control">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			
			@endsection