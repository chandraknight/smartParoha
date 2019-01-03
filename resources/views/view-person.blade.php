<!DOCTYPE html>
<html>
<head>
	@include('include.head')
	<link rel="stylesheet" type="text/css" href="src/plugins/cropperjs/dist/cropper.css">
</head>
<body>
	 @include('include.header')
	@include('include.sidebar')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 bg-white border-radius-4 box-shadow">
							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								@if($person->image != null)
									<img src="{{URL::asset('storage/personphoto/'.$person->photo)}}" alt="" class="avatar-photo">
									@else
								<img src="{{URL::asset('assets/vendors/images/noimage.png')}}" alt="" class="avatar-photo">
								@endif
									<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													@if($person->image != null)
													<img id="image" src="{{URL::asset('storage/personphoto/'.$person->photo)}}" alt="Picture">
														@else
														<img id="image" src="{{URL::asset('assets/vendors/images/noimage.png')}}" alt="Picture">
													@endif
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center">{{$person->first_name}} {{$person->middle_name}} {{$person->last_name}}</h5>
							<p class="text-center text-muted">Lorem ipsum dolor sit amet</p>
							<div class="profile-info">
								<h5 class="mb-20 weight-500">Contact Information</h5>
								<ul>
									@if($person->email != null)
									<li>
										<span>Email Address:</span>
										{{$person->email}}
									</li>
									@endif
									@if($person->contact != null)
									<li>
										<span>Phone Number:</span>
										{{$person->contact}}
									</li>
										@endif
										@if($person->nationality != null)
									<li>
										<span>Nationality:</span>
										{{$person->nationality}}
									</li>
										@endif
										@if($person->religion != null)
									<li>
										<span>Religion</span>
										{{$person->religion}}
									</li>
											@endif
									@if($person->caste != null)
										<li>
											<span>Caste</span>
											{{$person->caste}}
										</li>
										@endif
									<li>
										<span>Marital </span>
										{{$person->marital_status}}
									</li>
										<li>
											<span>Gender </span>
											{{$person->gender}}
										</li>
										<li>
											<span>DOB </span>
											{{\Carbon\Carbon::parse($person->DOB_en)->toFormattedDateString()}}
										</li>
								</ul>
							</div>


						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#identity" role="tab">Identity</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#family" role="tab">Family</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#education" role="tab">Education</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#address" role="tab">Address</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#language" role="tab">Language</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="identity" role="tabpanel">
											<div class="pd-20">
												<div class="profile-timeline">
													@foreach($person->identityDetails as $identity)
													<div class="timeline-month">
														<h5>{{$identity->id_type}}</h5>
													</div>
													<div class="profile-timeline-list">
														<ul>
															<li>
																<div class="date">{{$identity->id_no}}</div>

															</li>
														</ul>
													</div>
														@endforeach
												</div>
											</div>
										</div>
										<!-- Timeline Tab End -->
										<!-- Tasks Tab start -->
										<div class="tab-pane fade" id="family" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">
													<!-- Open Task start -->
													<div class="task-title row align-items-center">
														<div class="col-md-8 col-sm-12">
															<h5>Related People</h5>
														</div>
														{{--<div class="col-md-4 col-sm-12 text-right">--}}
															{{--<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Add</a>--}}
														{{--</div>--}}
													</div>
													<div class="profile-task-list pb-30">
														<ul>
															@foreach($person->familyDetails as $family)
															<li>

																<div class="task-type">{{$family->relationship_type}}</div>
																{{$family->related_person_id}}
																<div class="task-assign">Citizenship Number <div class="due-date">{{$family->related_person_citizenship}}</div></div>
															</li>
															@endforeach
														</ul>
													</div>


												</div>
											</div>
										</div>
										<!-- family Tab End -->
										<!-- education Tab start -->
										<div class="tab-pane fade height-100-p" id="education" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">
													<div class="task-title row align-items-center">
														<div class="col-md-8 col-sm-12">
															<h5>Academic Information</h5>
														</div></div>
											<div class="profile-task-list pb-30">
												<ul>
													@foreach($person->educationDetails as $education)
														<li>

															<div class="task-type">{{$education->degree}}</div>
															@if($education->board_university != null)
															{{$education->board_university}}
															@endif
															@if($education->stream != null)
															<div class="task-assign">Stream <div class="due-date">{{$education->stream}}</div></div>
															@endif
															@if($education->college != null)
															<div class="task-assign">College <div class="due-date">{{$education->college}}</div></div>
															@endif
															@if($education->year_of_start != null)
															<div class="task-assign">From <div class="due-date">{{$education->year_of_start}}</div></div>
															@endif
															@if($education->year_of_completion != null)
															<div class="task-assign">Till <div class="due-date">{{$education->year_of_completion}}</div></div>
															@endif
														</li>
													@endforeach
												</ul>
											</div>
												</div>
											</div>
										</div>
										<!-- education Tab End -->

										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="address" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">
													<div class="task-title row align-items-center">
														<div class="col-md-8 col-sm-12">
															<h5>Residential Information</h5>
														</div></div>
													<div class="profile-task-list pb-30">
														<ul>
															@foreach($person->addressDetails as $address)
																<li>

																	<div class="task-type">{{$address->address_type}}</div>
																	@if($address->country != null)
																		{{$address->country}}
																	@endif
																	@if($address->state != null)
																		<div class="task-assign">State <div class="due-date">{{$address->state}}</div></div>
																	@endif
																	@if($address->District != null)
																		<div class="task-assign">District <div class="due-date">{{$address->district}}</div></div>
																	@endif
																	@if($address->muncipality != null)
																		<div class="task-assign">Municipality <div class="due-date">{{$address->muncipality}}</div></div>
																	@endif
																	@if($address->ward != null)
																		<div class="task-assign">Ward <div class="due-date">{{$address->ward}}</div></div>
																	@endif
																	@if($address->village != null)
																		<div class="task-assign">Village <div class="due-date">{{$address->village}}</div></div>
																	@endif
																	@if($address->tole != null)
																		<div class="task-assign">Tole <div class="due-date">{{$address->tole}}</div></div>
																	@endif
																	@if($address->house != null)
																		<div class="task-assign">House <div class="due-date">{{$address->house}}</div></div>
																	@endif

																</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Setting Tab End -->
										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="language" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">
													<div class="task-title row align-items-center">
														<div class="col-md-8 col-sm-12">
															<h5>Language Information</h5>
														</div></div>
													<div class="profile-task-list pb-30">
														<ul>
															@foreach($person->languageDetails as $language)
																<li>

																	<div class="task-type">{{$language->language}}</div>

																	@if($language->can_read != null)
																		<div class="task-assign">Can Read <div class="due-date">{{$language->can_read}}</div></div>
																	@endif

																	@if($language->can_write != null)
																		<div class="task-assign">Can Write <div class="due-date">{{$language->can_write}}</div></div>
																	@endif
																</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('include.script')
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>