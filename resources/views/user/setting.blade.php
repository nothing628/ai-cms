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
<div class="content content-boxed">
	<div class="row">
		<div class="col-md-6">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-gear"></i> Account Setting</vue-block-head>
				<vue-block-content>
					<vue-form :data-class="['form-horizontal']" data-action="{{ route('api.user.profile.store') }}" data-name="form-create">
						<vue-form-group>
							<vue-input data-name="username" data-value="{{ Auth::user()->username }}" data-placeholder="your email here" data-label="Username" :data-col="['col-md-12']"></vue-input>
						</vue-form-group>
						<vue-form-group>
							<vue-input data-name="email" data-value="{{ Auth::user()->email }}" data-placeholder="your email here" data-label="Email" :data-col="['col-md-12']"></vue-input>
						</vue-form-group>
						<vue-form-group>
							<vue-input data-name="current_password" data-type="password" data-placeholder="Current Password" data-label="Current Password" :data-col="['col-md-12']"></vue-input>
						</vue-form-group>
						<vue-form-group>
							<vue-input data-name="new_password" data-type="password" data-placeholder="New Password" data-label="New Password" :data-col="['col-md-12']"></vue-input>
						</vue-form-group>
						<vue-form-group>
							<vue-input data-name="repeat_password" data-type="password" data-placeholder="Repeat Password" data-label="Repeat Password" :data-col="['col-md-12']"></vue-input>
						</vue-form-group>
						<vue-form-group>
							<div class="col-md-12">
								<button type="submit" class="btn btn-success">Save Setting</button>
							</div>
						</vue-form-group>
					</vue-form>
				</vue-block-content>
			</vue-block>
		</div>
		<div class="col-md-6">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-gear"></i> Reader Setting</vue-block-head>
				<vue-block-content>
					<vue-form :data-class="['form-horizontal']" data-action="{{ route('api.comment.store') }}" data-name="form-create">

						<vue-form-group>
							<div class="col-xs-8">
								<div class="font-s13 font-w600">Enable Infinite Reading Mode <b class="text-danger">[Default: Single Reading Mode]</b></div>
								<div class="font-s13 font-w400 text-muted">Display next image when you reach the bottom of the reader page while browsing.</div>
							</div>
							<vue-checkbox data-col="['col-sm-4','text-right']" data-name="test1"></vue-checkbox>
						</vue-form-group>
						<vue-form-group>
							<div class="col-xs-8">
								<div class="font-s13 font-w600">Enable Information Tooltip <b class="text-danger">[Default: Enabled]</b></div>
								<div class="font-s13 font-w400 text-muted">Display manga information in a small window when you hover over a manga title.</div>
							</div>
							<vue-checkbox data-col="['col-sm-4','text-right']" data-name="test2"></vue-checkbox>
						</vue-form-group>
						<vue-form-group>
							<div class="col-xs-8">
								<div class="font-s13 font-w600">Enable Night Mode <b class="text-danger">[Default: Disabled]</b></div>
								<div class="font-s13 font-w400 text-muted">Switch background color to black for easier reading.</div>
							</div>
							<vue-checkbox data-col="['col-sm-4','text-right']" data-name="test3"></vue-checkbox>
						</vue-form-group>
						<vue-form-group>
							<div class="col-xs-8">
								<div class="font-s13 font-w600">Hide Blacklisted Manga <b class="text-danger">[Default: Disabled]</b></div>
								<div class="font-s13 font-w400 text-muted">Hide series that belong to a blacklisted tag.</div>
							</div>
							<vue-checkbox data-col="['col-sm-4','text-right']" data-name="test4"></vue-checkbox>
						</vue-form-group>

						<vue-form-group>
							<div class="col-md-12">
								<button type="submit" class="btn btn-success">Save Setting</button>
							</div>
						</vue-form-group>
					</vue-form>
				</vue-block-content>
			</vue-block>
		</div>
	</div>
</div>
@endsection
