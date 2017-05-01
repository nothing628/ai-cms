@extends ('layouts.web.base')

@section('title')
@parent - Browse Manga
@endsection

@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
				Manga List
			</h1>
		</div>
	</div>
</div>
<div class="content">
	<vue-block :is-themed="true">
		<vue-block-head :data-class="['bg-primary-dark']"><i class="fa fa-gear"></i> Browse Manga</vue-block-head>
		<div is="manga-grid" data-source="{{ route('api.manga.search') }}"
		:data-options="{{ json_encode(['query' => 'test']) }}">
			@foreach ($mangas as $manga)
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
	</vue-block>
</div>
@endsection
