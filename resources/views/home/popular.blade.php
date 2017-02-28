<div class="row">
	<div class="col-xs-12">
		<vue-block :is-themed="true">
			<ul class="nav nav-tabs nav-tabs-alt nav-justified">
				<li class="active"><a data-toggle="tab" href="#popular">Most Popular</a></li>
				<li><a data-toggle="tab" href="#view">Most Viewed</a></li>
				<li><a data-toggle="tab" href="#random">Random</a></li>
			</ul>
			<vue-block-content :data-class="['remove-padding','tab-content']" id="lts-grp">
				<div role="tabpanel" id="popular" class="tab-pane active">
					<div is="manga-grid" data-source="{{ route('api.manga.get') }}" :data-options="{scope: 'popular'}">
						@foreach ($popular as $manga)
						<a href="{{$manga->manga_url}}">
							<span>Title : {{$manga->title}}</span>
							<span>Artist : {{$manga->meta['artist']}}</span>
							<span>Author : {{$manga->meta['author']}}</span>
							<span>Synopsis : {{$manga->meta['desc']}}</span>
							<span>Tag : {{$manga->tag_names}}</span>
							<img src="{{$manga->thumb_url}}" alt="{{$manga->title}}">
						</a>
						@endforeach
					</div>
				</div>
				<div role="tabpanel" id="view" class="tab-pane">
					<div is="manga-grid" data-source="{{ route('api.manga.get') }}" :data-options="{scope: 'view'}">
						@foreach ($view as $manga)
						<a href="{{$manga->manga_url}}">
							<span>Title : {{$manga->title}}</span>
							<span>Artist : {{$manga->meta['artist']}}</span>
							<span>Author : {{$manga->meta['author']}}</span>
							<span>Synopsis : {{$manga->meta['desc']}}</span>
							<span>Tag : {{$manga->tag_names}}</span>
							<img src="{{$manga->thumb_url}}" alt="{{$manga->title}}">
						</a>
						@endforeach
					</div>
				</div>
				<div role="tabpanel" id="random" class="tab-pane">
					<div is="manga-grid" data-source="{{ route('api.manga.get') }}" :data-options="{scope: 'random'}">
						@foreach ($random as $manga)
						<a href="{{$manga->manga_url}}">
							<span>Title : {{$manga->title}}</span>
							<span>Artist : {{$manga->meta['artist']}}</span>
							<span>Author : {{$manga->meta['author']}}</span>
							<span>Synopsis : {{$manga->meta['desc']}}</span>
							<span>Tag : {{$manga->tag_names}}</span>
							<img src="{{$manga->thumb_url}}" alt="{{$manga->title}}">
						</a>
						@endforeach
					</div>
				</div>
			</vue-block-content>
		</vue-block>
	</div>
</div>
