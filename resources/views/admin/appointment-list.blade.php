@extends('admin.layouts.layout')
@section('title','Appointments')

@section('content')
	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">
		
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">Appointments</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Appointments</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			<div class="row">
				<div class="col-md-12">
				
					<!-- Recent Orders -->
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="datatable table table-hover table-center mb-0">
									<thead>
										<tr>
											<th>Doctor Name</th>
											<th>Speciality</th>
											<th>Patient Name</th>
											<th>Apointment Time</th>
											<th>Status</th>
											<th class="text-right">Amount</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$url.$appointment['doctorImage']}}" alt="User Image"></a>
                                                    <a href="profile.html">{{$appointment['doctorName']}}</a>
                                                </h2>
                                            </td>
                                            <td>{{$appointment['specialty']}}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$url.$appointment['patientImge']}}" alt="User Image"></a>
                                                    <a href="profile.html">{{$appointment['patientName']}}</a>
                                                </h2>
                                            </td>
                                            <?php
                                                $parts = explode(" ", $appointment['appointmentDate']);
                                                $date = $parts[0];
                                                $time = $parts[2].$parts[3].$parts[4];
                                            ?>
                                            <td>{{$date}}<span class="text-primary d-block">{{$time}}</span></td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_1" class="check" checked>
                                                    <label for="status_1" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                $200.00
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Recent Orders -->
					
				</div>
			</div>
		</div>			
	</div>
	<!-- /Page Wrapper -->
	@endsection