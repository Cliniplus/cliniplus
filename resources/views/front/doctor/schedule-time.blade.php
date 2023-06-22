@extends('front.layouts.doctor-dashboard')
@section('title','Schedule Time')  
@section('content')
    <div class="col-md-12 col-width-lg">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add</a>
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-hover table-center text-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Day </th>
                                                <th>Date</th>
                                                <th>Time From</th>
                                                <th>Time To</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td class="fw-bold">1</td>
                                                <td class="fw-bold">1</td>
                                                <td class="fw-bold">1</td>
                                                <td class="fw-bold">1</td>
                                                <td class="fw-bold">1</td>
                                                <td class="fw-bold">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <i class="fa-solid fa-trash text-danger"></i>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    	<!-- Add Time Slot Modal -->
	<div class="modal fade custom-modal" id="add_time_slot">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Time Slots</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('postScheduleTime')}}">
                        @csrf
                        <div>
                            <div class="row">
                                <h4>Schedule Timings</h4>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input id="duration" name="duration" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Time and Date</label>
                                        <input id="date" name="date" type="date" class="form-control" value="Wilson">
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center py-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label class="fw-bold">From</label>
                                            <input name="from" type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group px-3">
                                            <label class="fw-bold">To</label>
                                            <input name="to" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center py-5">
                                <button type="submit" class="cart-btn fw-bold my-2">Save Changes</button>
                            </div>
                        </div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Time Slot Modal -->
@endsection


{{-- <div>
    <div class="row">
        <h4>Schedule Timings</h4>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label>Duration</label>
                <input id="duration" name="duration" type="text" class="form-control">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label>Time and Date</label>
                <input id="date" name="date" type="date" class="form-control" value="Wilson">
            </div>
        </div>
    </div>
    <div
        class="row d-flex justify-content-center align-items-center py-4">
        <h4>Create Time Slots</h4>
       
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="form-group">
                    <label class="fw-bold">From</label>
                    <div class="form-group px-3">
                        <select class="form-control select" id="fromTime">
                            <option>8:00am</option>
                            <option>8:30am</option>
                            <option>9:00am</option>
                            <option>9:30am</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group px-3">
                    <label class="fw-bold">To</label>
                    <select class="form-control select" id="toTime">
                        <option>12:30pm</option>
                        <option>01:00pm</option>
                        <option>01:30pm</option>
                        <option>02:00pm</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group d-flex justify-content-center align-items-center">
                    <button class="cart-btn marr" onclick="addTime()">Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="my-2 text-center" id="timeSlots">
        <!-- Time slots will be dynamically added here -->
    </div>

    <div class="text-center py-5">
        <button id="saveButton" class="cart-btn fw-bold my-2">Save Changes</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</div> --}}