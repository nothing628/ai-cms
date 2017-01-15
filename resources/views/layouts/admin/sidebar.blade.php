@if (isRoute(['admin.setting.page', 'admin.setting.user']))
@set('class', 'collapse in')
@else
@set('class', 'collapse')
@endif

<ul class="nav nav-pills nav-stacked">
	<li @if(isRoute('admin.home')) class="active" @endif ><a href="{{ route('admin.home') }}">Home</a></li>
	<li @if(isRoute('admin.manga.index')) class="active" @endif ><a href="{{ route('admin.manga.index') }}">Manga</a></li>
	<li @if(isRoute('admin.category')) class="active" @endif ><a href="{{ route('admin.category') }}">Category</a></li>
	<li @if(isRoute('admin.comment')) class="active" @endif ><a href="{{ route('admin.comment') }}">Comment</a></li>
	<li>
		<a data-toggle="collapse" data-target="#set-coll">Setting</a>
		<div class="{{ $class }}" id="set-coll">
			<ul class="nav nav-pills nav-stacked">
				<li @if(isRoute('admin.setting.page')) class="active" @endif ><a href="{{ route('admin.setting.page') }}">Page</a></li>
				<li @if(isRoute('admin.setting.user')) class="active" @endif ><a href="{{ route('admin.setting.user') }}">User</a></li>
			</ul>
		</div>
	</li>
</ul>
