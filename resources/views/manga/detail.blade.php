@extends('layouts.base') @section('title') @parent - {{ $manga->title }} @endsection @section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
				{{ $manga->title }}
			</h1>
		</div>
		<div class="col-md-5">
			<button class="btn btn-danger pull-right"><i class="fa fa-heart"></i></button>
		</div>
	</div>
</div>
<div class="content">
	<div class="row">
		<div class="col-md-8">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-muted']"><i class="si si-layers"></i> Detail</vue-block-head>
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
										<td>Total Views</td>
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
							<button class="btn btn-line btn-flat btn-danger"><i class="fa fa-love"></i> Favorite</button>
						</div>
					</div>
				</vue-block-content>
			</vue-block>
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-muted']"><i class="si si-list"></i> Chapter List</vue-block-head>
				<vue-block-content :data-class="['block-content-full']">
					<div id="lts-grp">
					<ul class="nav-users">
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
				<vue-block-head :data-class="['bg-muted']"><i class="si si-comment"></i> Comment</vue-block-head>
				<vue-block-content :data-class="['block-content-full', 'bg-gray-lighter']">
					<div class="media push-15">
						<div class="media-left">
							<a href="javascript:void(0)">
								<img class="img-avatar img-avatar32" src="{{ url('images/medium/bg.jpg')}}" alt="">
							</a>
						</div>
						<div class="media-body font-s13">
							<a class="font-w600" href="javascript:void(0)">Rebecca Gray</a>
							<div class="push-5">It was awesome! Looking forward for the new roadtrip!</div>
							<div class="font-s12">
								<a href="javascript:void(0)">Like!</a> -
								<a href="javascript:void(0)">Reply</a> -
								<span class="text-muted"><em>10 min ago</em></span>
							</div>
						</div>
					</div>
					<form class="form-horizontal" action="base_ui_timeline_social.php" method="post" onsubmit="return false;">
						<input class="form-control" placeholder="Write a comment.." type="text">
					</form>
				</vue-block-content>
			</vue-block>
		</div>
		<div class="col-md-4">
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-muted']"><i class="si si-badge"></i> Popular</vue-block-head>
				<vue-block-content :data-class="['block-content-full']">
					//
				</vue-block-content>
			</vue-block>
			<vue-block :is-themed="true">
				<vue-block-head :data-class="['bg-muted']"><i class="si si-link"></i> Related Manga</vue-block-head>
				<vue-block-content :data-class="['block-content-full']">
					//
				</vue-block-content>
			</vue-block>
		</div>
	</div>
</div>
@endsection
