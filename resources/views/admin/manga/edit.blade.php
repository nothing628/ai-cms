@extends('admin.base')

@section('title')
Edit Manga
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Manga</a></li>
<li><a>{{ $manga->title }}</a></li>
@endsection

@section ('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']">Edit Manga</vue-block-head>
	<vue-block-content :data-class="['block-content-narrow']">
		<vue-form :data-class="['form-horizontal', 'push-10-t']" data-enctype="multipart/form-data"
		data-action="{{ route('api.manga.update') }}">
			{!! csrf_field() !!}
			<input type="hidden" name="manga_id" value="{{ $manga->id }}">
			<vue-form-group>
				<vue-input data-name="title" data-value="{{ $manga->title }}" :data-col="['col-md-12']" data-label="Manga Title" :is-required="true" data-placeholder="Manga Title"></vue-input>
			</vue-form-group>
			<vue-form-group>
				<label class="control-label col-md-2">Artist</label>
				<div class="col-md-3">
					<input type="text" name="artist" value="{{ $manga->meta['artist'] }}" class="form-control" placeholder="Artist">
				</div>
				<label class="control-label col-md-2">Author</label>
				<div class="col-md-3">
					<input type="text" name="author" value="{{ $manga->meta['author'] }}" class="form-control" placeholder="Author">
				</div>
			</vue-form-group>
			<vue-form-group>
				<label class="control-label col-md-2">Category</label>
				<div class="col-md-3">
					<select class="form-control" name="category_id" required="">
						@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->category }}</option>
						@endforeach
					</select>
				</div>
			</vue-form-group>
			<vue-form-group>
				<label class="control-label col-md-2">Genre</label>
				<div class="col-md-6">
					<input type="text" name="genre" class="form-control">
				</div>
			</vue-form-group>
			<vue-form-group>
				<label class="control-label col-md-2">Synopsis</label>
				<div class="col-md-6">
					<textarea class="form-control" name="desc" required="">{{$manga->meta['desc']}}</textarea>
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
					<a href="{{ route('admin.manga.index') }}" class="btn btn-danger btn-line btn-flat">Cancel</a>
				</div>
			</vue-form-group>
		</vue-form>
	</vue-block-content>
</vue-block>
@endsection
