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
				<vue-input data-name="title" data-label="Chapter Title" :data-required="false" data-placeholder="Chapter Title" :data-col="['col-md-6', 'col-md-offset-3']"></vue-input>
			</vue-form-group>
			<vue-form-group>
				<vue-file data-name="cover" data-label="Cover" :data-col="['col-md-6', 'col-md-offset-3']"></vue-file>
			</vue-form-group>
			<vue-form-group>
				<vue-dropzone :data-col="['col-md-9','col-md-offset-3']"></vue-dropzone>
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
