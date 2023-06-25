@extends('front.layouts.chat-layout')
@section('title','profile')
@section('content')
@php
    use Carbon\Carbon;
	$i = 0;
@endphp
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
										<div>
											@foreach ($chatList as $item)
											@php
											$i++;
											$date = Carbon::parse($item['createdDate'])->diffForHumans()
											@endphp
											<a onclick="get_chat({{$i}})" href="javascript:void(0);" class="media read-chat-{{$i}}" data-doctor="{{$item['user']['name']}}" data-image="{{$item['user']['image']}}" data-url="{{route('doctorChat')}}" data-id="{{$item['user']['id']}}">
												<div class="chat-new d-flex justify-content-bettwen align-items-center">
													<div class="chat-img">
														<img src="{{$url.$item['user']['image']}}"
															alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="d-flex justify-content-bettwen align-items-center  ">
														<div class="ps-2">
															<div class="user-name fw-bold fs-6">{{$item['user']['name']}}</div>
															<div class="user-last-chat fsize">{{$item['lastMessage']}}</div>
														</div>
														<div class="new-left">
															<div class="last-chat-time block">{{$date}}</div>
															<div class="badge badge-success badge-pill">3</div>
														</div>
													</div>
												</div>
											</a>
											@endforeach

										</div>
									</div>
								</div>
							</div>
							<!-- /Chat Left -->

							<!-- Chat Right -->
							<div id="chat_list" class="chat-cont-right">
							
							</div>
							<!-- /Chat Right -->

						</div>
					</div>
				</div>
				<!-- /Row -->

			</div>

		</div>
		<!-- /Page Content -->

		<script>
			function get_chat($id){
				
				var urlx = $(".read-chat-"+$id).attr("data-url");
				var id = $(".read-chat-"+$id).attr("data-id");
				var doctor = $(".read-chat-"+$id).attr("data-doctor");
				var image = $(".read-chat-"+$id).attr("data-image");
				$.ajax({
					type: "GET",
					data: { id: id,doctor:doctor,image:image },
					url: urlx,
					success: function (data) {
						$("#chat_list").html(data);
					},
				});
				return false;
			}
			
		</script>
    @endsection