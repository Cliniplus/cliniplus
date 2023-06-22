@extends('front.layouts.chat-layout')
@section('title','profile')
@section('content')
  <!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="chat-window">

							<!-- Chat Left -->
							<div class="chat-cont-left">
								<div class="chat-header">
									<span>Chats</span>
									<a href="javascript:void(0)" class="chat-compose">
										<i class="material-icons">control_point</i>
									</a>
								</div>
								<form class="chat-search">
									<div class="input-group">
										<div class="input-group-prepend">
											<i class="fas fa-search"></i>
										</div>
										<input type="text" class="form-control" placeholder="Search">
									</div>
								</form>
								<div class="chat-users-list">
									<div class="chat-scroll d-flex ">
										<!-- <a href="javascript:void(0);" class="media read-chat">
											<div class="align-items-center justify-content-start">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="assets/img/doctors/doctor-thumb-07.jpg"
															alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Dr. Deborah Angel</div>
														<div class="user-last-chat">Give me a full explanation about our
															project</div>
													</div>
													<div>
														<div class="last-chat-time block">7:30 PM</div>
														<div class="badge badge-success badge-pill">3</div>
													</div>
												</div>
											</div>
										</a> -->
										<div>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="chat-new d-flex justify-content-bettwen align-items-center">
													<div class="chat-img">
														<img src="assets/img/doctors/doctor-thumb-07.jpg"
															alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="d-flex justify-content-bettwen align-items-center  ">
														<div class="ps-2">
															<div class="user-name fw-bold fs-6">Dr. Deborah Angel</div>
															<div class="user-last-chat fsize">Give me a full explanation
																about our
																project</div>
														</div>
														<div class="new-left">
															<div class="last-chat-time block">7:30 PM</div>
															<div class="badge badge-success badge-pill">3</div>
														</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div
													class="chat-new d-flex justify-content-bettwen align-items-center py-2">
													<div class="chat-img">
														<img src="assets/img/doctors/doctor-thumb-07.jpg"
															alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="d-flex justify-content-bettwen align-items-center  ">
														<div class="ps-2">
															<div class="user-name fw-bold fs-7">Dr. Deborah Angel</div>
															<div class="user-last-chat fsize">Give me a full explanation
																about our
																project</div>
														</div>
														<div class="new-left">
															<div class="last-chat-time block">7:30 PM</div>
															<div class="badge badge-success badge-pill">3</div>
														</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div
													class="chat-new d-flex justify-content-bettwen align-items-center py-2">
													<div class="chat-img">
														<img src="assets/img/doctors/doctor-thumb-07.jpg"
															alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="d-flex justify-content-bettwen align-items-center  ">
														<div class="ps-2">
															<div class="user-name fw-bold fs-7">Dr. Deborah Angel</div>
															<div class="user-last-chat fsize">Give me a full explanation
																about our
																project</div>
														</div>
														<div class="new-left">
															<div class="last-chat-time block">7:30 PM</div>
															<div class="badge badge-success badge-pill">3</div>
														</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div
													class="chat-new d-flex justify-content-bettwen align-items-center py-2">
													<div class="chat-img">
														<img src="assets/img/doctors/doctor-thumb-07.jpg"
															alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="d-flex justify-content-bettwen align-items-center  ">
														<div class="ps-2">
															<div class="user-name fw-bold fs-7">Dr. Deborah Angel</div>
															<div class="user-last-chat fsize">Give me a full explanation
																about our
																project</div>
														</div>
														<div class="new-left">
															<div class="last-chat-time block">7:30 PM</div>
															<div class="badge badge-success badge-pill">3</div>
														</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="chat-new d-flex justify-content-bettwen align-items-center py-2">
													<div class="chat-img">
														<img src="assets/img/doctors/doctor-thumb-07.jpg"
															alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="d-flex justify-content-bettwen align-items-center  ">
														<div class="ps-2">
															<div class="user-name fw-bold fs-7">Dr. Deborah Angel</div>
															<div class="user-last-chat fsize">Give me a full explanation
																about our
																project</div>
														</div>
														<div class="new-left">
															<div class="last-chat-time block">7:30 PM</div>
															<div class="badge badge-success badge-pill">3</div>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Chat Left -->

							<!-- Chat Right -->
							<div class="chat-cont-right">
								<div class="chat-header">
									<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
										<i class="material-icons">chevron_left</i>
									</a>
									<div class="chat-new d-flex justify-content-bettwen align-items-center">
										<div class="chat-img">
											<img src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image" class="avatar-img rounded-circle">
										</div>
										<div class="d-flex justify-content-bettwen align-items-center  ">
											<div class="ps-2">
												<div class="user-name fw-bold fs-7">Dr. Deborah Angel</div>
												<div class="user-last-chat fsize">Online </div>
									
											</div>
										</div>
									</div>
									<div class="chat-options">
										<a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
											<i class="material-icons">local_phone</i>
										</a>
										<a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
											<i class="material-icons">videocam</i>
										</a>
										<a href="javascript:void(0)">
											<i class="material-icons">more_vert</i>
										</a>
									</div>
								</div>
								<div class="chat-body">
									<div class="chat-scroll">
										<ul class="list-unstyled">
											<li class="media sent">
												<div class="media-body">
													<div class="msg-box">
														<div>
															<p>Hello. What can I do for you?</p>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:30 AM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li class="media received">
												<div class="avatar">
													<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"
														class="avatar-img rounded-circle">
												</div>
												<div class="media-body">
													<div class="msg-box">
														<div>
															<p>I'm just looking around.</p>
															<p>Will you tell me something about yourself?</p>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:35 AM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
													<div class="msg-box">
														<div>
															<p>Are you there? That time!</p>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:40 AM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
													<div class="msg-box">
														<div>
															<div class="chat-msg-attachments">
																<div class="chat-attachment">
																	<img src="assets/img/img-02.jpg" alt="Attachment">
																	<div class="chat-attach-caption">placeholder.jpg
																	</div>
																	<a href="#" class="chat-attach-download">
																		<i class="fas fa-download"></i>
																	</a>
																</div>
																<div class="chat-attachment">
																	<img src="assets/img/img-03.jpg" alt="Attachment">
																	<div class="chat-attach-caption">placeholder.jpg
																	</div>
																	<a href="#" class="chat-attach-download">
																		<i class="fas fa-download"></i>
																	</a>
																</div>
															</div>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:41 AM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li class="media sent">
												<div class="media-body">
													<div class="msg-box">
														<div>
															<p>Where?</p>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:42 AM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
													<div class="msg-box">
														<div>
															<p>OK, my name is Limingqiang. I like singing, playing
																basketballand so on.</p>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:42 AM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
													<div class="msg-box">
														<div>
															<div class="chat-msg-attachments">
																<div class="chat-attachment">
																	<img src="assets/img/img-04.jpg" alt="Attachment">
																	<div class="chat-attach-caption">placeholder.jpg
																	</div>
																	<a href="#" class="chat-attach-download">
																		<i class="fas fa-download"></i>
																	</a>
																</div>
															</div>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:50 AM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li class="media received">
												<div class="avatar">
													<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"
														class="avatar-img rounded-circle">
												</div>
												<div class="media-body">
													<div class="msg-box">
														<div>
															<p>You wait for notice.</p>
															<p>Consectetuorem ipsum dolor sit?</p>
															<p>Ok?</p>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>8:55 PM</span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li class="chat-date">Today</li>
											<li class="media received">
												<div class="avatar">
													<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"
														class="avatar-img rounded-circle">
												</div>
												<div class="media-body">
													<div class="msg-box">
														<div>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
															</p>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>10:17 AM</span>
																	</div>
																</li>
																<li><a href="#">Edit</a></li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li class="media sent">
												<div class="media-body">
													<div class="msg-box">
														<div>
															<p>Lorem ipsum dollar sit</p>
															<div class="chat-msg-actions dropdown">
																<a href="#" data-toggle="dropdown" aria-haspopup="true"
																	aria-expanded="false">
																	<i class="fe fe-elipsis-v"></i>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="#">Delete</a>
																</div>
															</div>
															<ul class="chat-msg-info">
																<li>
																	<div class="chat-time">
																		<span>10:19 AM</span>
																	</div>
																</li>
																<li><a href="#">Edit</a></li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li class="media received">
												<div class="avatar">
													<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"
														class="avatar-img rounded-circle">
												</div>
												<div class="media-body">
													<div class="msg-box">
														<div>
															<div class="msg-typing">
																<span></span>
																<span></span>
																<span></span>
															</div>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="chat-footer">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="btn-file btn">
												<i class="fa fa-paperclip"></i>
												<input type="file">
											</div>
										</div>
										<input type="text" class="input-msg-send form-control"
											placeholder="Type something">
										<div class="input-group-append">
											<button type="button" class="btn msg-send-btn"><i
													class="fab fa-telegram-plane"></i></button>
										</div>
									</div>
								</div>
							</div>
							<!-- /Chat Right -->

						</div>
					</div>
				</div>
				<!-- /Row -->

			</div>

		</div>
		<!-- /Page Content -->
    @endsection