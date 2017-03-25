@extends('layouts.base')

@section('content')
<div class="content bg-image" style="background-image: url('{{ url('images/large/bg.jpg') }}');background-position:top center;">
	<div class="push-50-t push-10 clearfix">
		<div class="push-15-r pull-left animated fadeIn">
			<img class="img-avatar img-avatar-thumb" src="{{ url('images/small/bg.jpg') }}" alt="">
		</div>
		<h1 class="h2 text-white push-5-t animated zoomIn">{{ Auth::user()->username }}</h1>
	</div>
</div>
<div class="content bg-white border-b">
	<div class="row items-push text-uppercase">
		<div class="col-xs-6 col-sm-3">
			<div class="font-w700 text-gray-darker animated fadeIn">Days Watched</div>
			<a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">107</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<div class="font-w700 text-gray-darker animated fadeIn">Chapters Read</div>
			<a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">237</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<div class="font-w700 text-gray-darker animated fadeIn">Favourites</div>
			<a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">12</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<div class="font-w700 text-gray-darker animated fadeIn">739 Ratings</div>
			<div class="text-warning push-10-t animated flipInX">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
				<span class="text-muted">(4.9)</span>
			</div>
		</div>
	</div>
</div>
<div class="content content-boxed">
	<div class="row">
		<div class="col-sm-7 col-lg-7">
			<vue-block :is-themed="true" :data-class="['block-bordered']">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-comment"></i> About Me</vue-block-head>
				<vue-block-content>
					<p>This is my profile</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute</p>
				</vue-block-content>
			</vue-block>
		</div>
		<div class="col-md-5 col-lg-5">
			<a class="block block-bordered block-link-hover3 text-center">
				<div class="block-content block-content-full">
					<div class="h1 font-w700">232</div>
					<div class="h5 text-muted text-uppercase push-5-t">Chapter Read</div>
				</div>
				<div class="block-content border-t">
					<div class="row items-push text-center">
						<div class="col-xs-3 border-r">
							<div class="push-5">Total</div>
							<div class="h5 font-w300 text-muted">23</div>
						</div>
						<div class="col-xs-3 border-r">
							<div class="push-5">Plan To Read</div>
							<div class="h5 font-w300 text-muted">11</div>
						</div>
						<div class="col-xs-3 border-r">
							<div class="push-5">Reading</div>
							<div class="h5 font-w300 text-muted">11</div>
						</div>
						<div class="col-xs-3">
							<div class="push-5">Completed</div>
							<div class="h5 font-w300 text-muted">11</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-lg-6">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-sort"></i> Last Bookmarked</vue-block-head>
				<vue-block-content>
					<div class="pull-r-l">
						<table class="table table-hover table-vcenter">
							<tbody>
								<tr>
									<td style="width: 80px;">
										<div class="img-container">
											<img src="{{ url('images/small/test-2.jpeg') }}" class="img-responsive">
										</div>
									</td>
									<td>
										<a class="font-w600" href="#">Welcome to our service</a>
										<div class="text-muted push-5-t">It's a pleasure to have you on our service..</div>
									</td>
									<td class="visible-lg text-muted" style="width: 120px;"><em>2 min ago</em></td>
								</tr>
							</tbody>
						</table>
					</div>
				</vue-block-content>
			</vue-block>
		</div>
		<div class="col-md-6 col-lg-6">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-sort"></i> Recommeded</vue-block-head>
				<vue-block-content>
					<div class="pull-r-l">
						<table class="table table-hover table-vcenter">
							<tbody>
								<tr>
									<td style="width: 80px;">
										<div class="img-container">
											<img src="{{ url('images/small/test-2.jpeg') }}" class="img-responsive">
										</div>
									</td>
									<td>
										<a class="font-w600" href="#">Welcome to our service</a>
										<div class="text-muted push-5-t">It's a pleasure to have you on our service..</div>
									</td>
									<td class="visible-lg text-muted" style="width: 120px;"><em>2 min ago</em></td>
								</tr>
							</tbody>
						</table>
					</div>
				</vue-block-content>
			</vue-block>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-lg-6">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-newspaper-o"></i> Activity</vue-block-head>
				<vue-block-content>
					<vue-block :data-class="['block-transparent', 'pull-r-l']">
						<div class="block-header bg-gray-lighter">
							<ul class="block-options">
								<li><span><em class="text-muted">3 hrs ago</em></span></li>
							</ul>
							<h3 class="block-title">Plan to Read</h3>
						</div>
						<vue-block-content>
							<a class="col-xs-3" href="#">
								<div class="img-container">
									<img class="img-responsive" src="{{ url('images/small/test.jpeg') }}">
								</div>
							</a>
							<a class="col-xs-3" href="#">
								<div class="img-container">
									<img class="img-responsive" src="{{ url('images/small/test-2.jpeg') }}">
								</div>
							</a>
							<a class="col-xs-3" href="#">
								<div class="img-container">
									<img class="img-responsive" src="{{ url('images/small/Test/Page-01.jpg') }}">
								</div>
							</a>
							<div class="clearfix"></div>
						</vue-block-content>
					</vue-block>
					<vue-block :data-class="['block-transparent', 'pull-r-l']">
						<div class="block-header bg-gray-lighter">
							<ul class="block-options">
								<li><span><em class="text-muted">6 hrs ago</em></span></li>
							</ul>
							<h3 class="block-title">Completed</h3>
						</div>
						<vue-block-content>
							<a class="col-xs-3" href="#">
								<div class="img-container">
									<img class="img-responsive" src="{{ url('images/small/test-2.jpeg') }}">
								</div>
							</a>
							<div class="clearfix"></div>
						</vue-block-content>
					</vue-block>
				</vue-block-content>
			</vue-block>
		</div>
		<div class="col-md-6 col-lg-6">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-envelope"></i> Notification</vue-block-head>
				<vue-block-content>
					
				</vue-block-content>
			</vue-block>
		</div>
	</div>
</div>
@endsection
