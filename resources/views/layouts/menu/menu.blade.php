@if ($menu->hasSubmenu())
<li>
	<a class="nav-submenu" data-toggle="nav-submenu" href="{{ $menu->href }}">
		@if ($menu->isRaw)
			{!! $menu->html !!}
		@else
			@if ($menu->icon != '')
				<i class="{{$menu->icon}}"></i>
			@endif
			<span class="sidebar-mini-hide">{{$menu->title}}</span>
		@endif
	</a>
	<ul>
		@foreach ($menu->submenus as $sub)
			{!! $sub->render() !!}
		@endforeach
	</ul>
</li>
@else
<li>
	<a href="{{$menu->href}}">
		@if ($menu->isRaw)
			{!! $menu->html !!}
		@else
			@if ($menu->icon != '')
			<i class="{{$menu->icon}}"></i>
			@endif
			<span class="sidebar-mini-hide">{{$menu->title}}</span>
		@endif
	</a>
</li>
@endif
