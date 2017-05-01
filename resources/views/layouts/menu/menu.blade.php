@if (isset($submenus))
<li>
	<a class="nav-submenu" data-toggle="nav-submenu" href="{{ $menu->href }}">
		{!! $menu->html !!}
	</a>

	<ul>
		@foreach ($submenus as $sub)
		{!! $sub !!}
		@endforeach
	</ul>
</li>
@else
<li>
	<a href="{{$menu->href}}">
		{!! $menu->html !!}
	</a>
</li>
@endif
