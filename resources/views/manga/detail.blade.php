@extends('layouts.base')

@section('title')
@parent - {{ $manga->title }}
@endsection

@section('content')
@if(Auth::check())
@set('user', Auth::user())
@set('favor', $user->favorites()->where('manga_id', $manga->id)->get())
@else
@set('favor', collect())
@endif

@set('is_favorited', $favor->count() > 0?'true':'false')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
				{{ $manga->title }}
			</h1>
		</div>
		@if (Auth::check())
		<div class="col-md-5">
			<manga-favorite :data-class="['pull-right', 'btn-square']" data-manga-id="{{ $manga->id }}" data-submit="{{ route('api.manga.favorite') }}" :is-favorited="{{ $is_favorited }}"></manga-favorite>
			<manga-bookmark data-manga-id="{{ $manga->id }}" data-submit="{{ route('api.manga.bookmark') }}" :data-value="{{ $manga->bookmarkStatus($user) }}"></manga-bookmark>
		</div>
		@endif
	</div>
</div>
<div class="content">
	<div class="row">
		<div class="col-md-8">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="si si-layers"></i> Detail</vue-block-head>
				<vue-block-content :data-class="['block-content-full']">
					<div class="row">
						<div class="col-md-3">
							<img class="img-responsive" src="{{ url('images/medium/' . $manga->cover) }}" alt="{{ $manga->title }}">
						</div>
						<div class="col-md-9">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td>Title</td>
										<td>{{ $manga->title }}</td>
									</tr>
									<tr>
										<td>Artist</td>
										<td>{{ $manga->meta['artist'] }}</td>
									</tr>
									<tr>
										<td>Author</td>
										<td>{{ $manga->meta['author'] }}</td>
									</tr>
									<tr>
										<td>Category</td>
										<td>{{ $manga->category->category }}</td>
									</tr>
									<tr>
										<td>Tags</td>
										<td>{{ $manga->tag_names }}</td>
									</tr>
									<tr>
										<td>Views</td>
										<td>{{ $manga->views }}</td>
									</tr>
									<tr>
										<td>Total Pages</td>
										<td>{{ $manga->total_page }}</td>
									</tr>
									<tr>
										<td>Synopsis</td>
										<td>{{ $manga->meta['desc'] }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</vue-block-content>
			</vue-block>
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="si si-list"></i> Chapter List</vue-block-head>
				<vue-block-content :data-class="['block-content-full']">
					<div id="lts-grp">
					<ul class="nav-users left-padding-fix">
						@foreach($manga->chapters->sortByDesc('chapter_num') as $chapter)
						<li>
							<a href="{{ $chapter->chapter_url }}" class="link-effect">
								<h6 class="text-ellipsis">
									{{ $chapter->chapter_num }}
									<i class="fa fa-angle-double-right"></i>
									{{ $chapter->chapter_title }}
									<span class="pull-right">{{$chapter->release_date}}</span>
								</h6>
							</a>
						</li>
						@endforeach
					</ul>
					</div>
				</vue-block-content>
			</vue-block>
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="si si-comment"></i> Comment</vue-block-head>
				<vue-block-content :data-class="['block-content-full', 'bg-gray-lighter']">
					@foreach($manga->comments as $comment)
					<div class="media push-15" >
						<div class="media-left">
							<a href="javascript:void(0)">
								<img class="img-avatar img-avatar32" src="{{ url('images/medium/bg.jpg')}}" alt="">
							</a>
						</div>
						<div class="media-body font-s13">
							<a class="font-w600" href="javascript:void(0)">{{ $comment->user->username }}</a>
							<div class="push-5">{{ $comment->comment }}</div>
							<div class="font-s12">
								<!-- <a href="javascript:void(0)">Like!</a> - -->
								<!-- <a href="javascript:void(0)">Reply</a> - -->
								<span class="text-muted"><em>{{ $comment->created_at->diffForHumans() }}</em></span>
							</div>
						</div>
					</div>
					@endforeach

					@if(Auth::check())
					<vue-form :data-class="['form-horizontal']" data-action="{{ route('api.comment.store') }}" data-name="form-create">
						<input type="hidden" value="{{ url('') }}" name="redirect_url">
						<input type="hidden" value="{{ $manga->id }}" name="manga_id">
						<input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
						<input class="form-control" placeholder="Write a comment.." name="comment" required="" type="text">
					</vue-form>
					@endif
				</vue-block-content>
			</vue-block>
		</div>
		<div class="col-md-4">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="si si-badge"></i> Popular</vue-block-head>
				<vue-block-content :data-class="['block-content-full']">
					//
				</vue-block-content>
			</vue-block>
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-primary-dark']"><i class="si si-link"></i> Related Manga</vue-block-head>
				<vue-block-content :data-class="['block-content-full']">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute</p>
				</vue-block-content>
			</vue-block>
		</div>
	</div>
</div>
@endsection
