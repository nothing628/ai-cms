@extends('admin.base')

@section('title')
@parent New Chapter
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a class="link-effect">Manga</a></li>
<li><a class="link-effect">Chapter</a></li>
<li><a class="link-effect">Upload</a></li>
@endsection

@section('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']">Upload New Chapter</vue-block-head>
	<vue-block-content>
		<form method="post" class="form-horizontal" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<input type="hidden" name="manga_id" value="{{ $manga->id }}">
			<vue-form-group>
				<label class="control-label col-md-2">Chapter Title</label>
				<div class="col-md-6">
					<input type="text" name="title" class="form-control" placeholder="Chapter Title" required="">
				</div>
			</vue-form-group>
			<vue-form-group>
				<label class="control-label col-md-2">Cover</label>
				<div class="col-md-6">
					<input type="file" name="cover" accept="image/*">
				</div>
			</vue-form-group>
			<vue-form-group>
				<div class="col-md-offset-2 col-md-9">
					<button class="btn btn-success btn-flat btn-line">Submit</button>
					<a href="{{ route('admin.manga.chapter', $manga->id) }}" class="btn btn-danger btn-line btn-flat">Cancel</a>
				</div>
			</vue-form-group>
		</form>
	</vue-block-content>
</vue-block>
@endsection
