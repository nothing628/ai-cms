@extends('admin.base')

@section('title')
@parent Chapter Upload
@endsection

@section('breadcrumb')
<li><a>Manga</a></li>
<li><a class="link-effect">Manga</a></li>
<li><a class="link-effect">Chapter List</a></li>
<li><a class="link-effect">Chapter Upload</a></li>
@endsection

@section('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']">Upload Page file</vue-block-head>
	<vue-block-content>
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-enctype="multipart/form-data"
		data-action="{{ route('api.chapter.update') }}" data-name="form-create">
			{!! csrf_field() !!}
			<input type="hidden" name="id" value="{{ $chapter->id }}">
			<vue-form-group>
				<vue-input data-label="Manga Title / Chapter Title" :data-col="['col-md-5','col-md-offset-2']" data-name="manga_name" data-value="{{ $chapter->manga->title }} / {{ $chapter->chapter_title }}" :is-readonly="true"></vue-input>
				<vue-input data-label="Chapter Num" :data-col="['col-md-2']" data-name="chapter_num" data-value="{{ $chapter->chapter_num }}" :is-readonly="true"></vue-input>
			</vue-form-group>
			<vue-form-group v-if="false">
				<vue-dropzone :data-col="['col-md-8','col-md-offset-2']"
				data-upload="{{ route('api.upload.page') }}"
				data-name="pages"
				data-accept="application/zip"
				data-chunk-size="750kb"
				:data-options="{chapter_id: {{$chapter->id}} }"
				:is-auto-upload="true"
				:submit-after-complete="true"></vue-dropzone>
			</vue-form-group>
			<vue-form-group>
				<page-selector :data-col="['col-md-12']"
				data-name="pages"
				data-upload="{{ route('api.upload.page') }}"
				data-delete="{{ route('api.page.delete') }}"
				data-order="{{ route('api.page.move') }}"
				data-src="{{ route('api.chapter.pages', ['chapter_id' => $chapter->id]) }}"
				:data-options="{ chapter_id: {{ $chapter->id }} }"></page-selector>
			</vue-form-group>
			<vue-form-group>
				<div class="col-md-offset-2 col-md-8">
					<vue-form-submit :data-class="['btn-success']">Submit</vue-form-submit>
					<a href="{{ route('admin.manga.chapter', $chapter->manga_id) }}" class="btn btn-default">Cancel</a>
				</div>
			</vue-form-group>
		</vue-form>
	</vue-block-content>
</vue-block>
@endsection
