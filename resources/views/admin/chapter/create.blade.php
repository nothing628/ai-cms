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
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-enctype="multipart/form-data"
		data-action="{{ route('api.chapter.store') }}" data-name="form-create">
			{!! csrf_field() !!}
			<input type="hidden" name="manga_id" value="{{ $manga->id }}">
			<vue-form-group>
				<vue-input data-name="title" data-label="Chapter Title" :data-required="false" data-placeholder="Chapter Title" :data-col="['col-md-6', 'col-md-offset-3']"></vue-input>
			</vue-form-group>
			<!-- vue-form-group>
				<vue-file data-name="cover" data-label="Cover" :data-col="['col-md-6', 'col-md-offset-3']"></vue-file>
			</vue-form-group> -->
			<vue-form-group>
				<div class="col-md-offset-3 col-md-9">
					<vue-form-submit :data-class="['btn-success']">Submit</vue-form-submit>
					<a href="{{ route('admin.manga.chapter', $manga->id) }}" class="btn btn-default">Cancel</a>
				</div>
			</vue-form-group>
		</vue-form>
	</vue-block-content>
</vue-block>
@endsection
