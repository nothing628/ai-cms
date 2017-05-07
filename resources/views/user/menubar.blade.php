@set('user', Auth::user())

<li>
	<div class="btn-group">
		<button class="btn btn-image dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
			<img src="{{ asset('images/small/bg.jpg') }}" alt="Avatar">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu dropdown-menu-right">
			<li class="dropdown-header">Profile</li>
			<li>
				<a tabindex="-1">
					<i class="si si-envelope-open pull-right"></i>
					<span class="badge badge-primary pull-right">3</span>Inbox
				</a>
			</li>
			<li>
				<a tabindex="-1" href="{{ route('user.profile') }}">
					<i class="si si-user pull-right"></i>
					<span class="badge badge-success pull-right">1</span>Profile
				</a>
			</li>
			<li>
				<a tabindex="-1" href="{{ route('user.setting') }}">
					<i class="si si-settings pull-right"></i>Settings
				</a>
			</li>
			<li class="divider"></li>
			<li class="dropdown-header">Actions</li>
			@if ($user->is_admin)
			<li><a tabindex="-1" href="{{ route('admin.home') }}"><i class="si si-lock pull-right"></i>Admin Panel</a></li>
			<li><a tabindex="-1" href="{{ route('home') }}"><i class="si si-action-undo pull-right"></i> Homepage</a></li>
			@endif
			<li><a tabindex="-1" href="{{ route('logout') }}"><i class="si si-logout pull-right"></i>Log out</a></li>
		</ul>
	</div>
</li>
<li>
	<button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
		<i class="fa fa-tasks"></i>
	</button>
</li>
