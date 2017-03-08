@extends('admin.base')

@section('title')
@parent Manga Detail
@endsection

@section('breadcrumb')
<li><a>Manga</a></li>
<li><a class="link-effect">Manga</a></li>
<li><a class="link-effect">Chapter List</a></li>
@endsection

@section('page-content')
<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']">Detail</vue-block-head>
	<vue-block-content>
		<div class="row">
			<div class="col-md-3">
				<img src="{{ url('images/small/' . $manga->cover )}}" class="img-responsive" >
			</div>
			<div class="col-md-9">
				<table class="table table-bordered" style="margin-top: 15px;">
					<tbody>
						<tr>
							<td width="200">Title</td>
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
							<td>Total Pages</td>
							<td>{{ $manga->total_page }}</td>
						</tr>
						<tr>
							<td>Views</td>
							<td>{{ $manga->views }}</td>
						</tr>
					</tbody>
				</table>

				<div class="push-15-t">
					<a href="{{ route('admin.manga.index') }}" class="btn btn-danger btn-line btn-flat"><i class="fa fa-mail-reply"></i> Back</a>
					<a href="{{ route('admin.manga.edit', $manga->id) }}" class="btn btn-primary btn-line btn-flat"><i class="fa fa-pencil"></i> Edit</a>
				</div>
			</div>
		</div>
	</vue-block-content>
</vue-block>

<vue-block :is-themed="true">
	<vue-block-head :data-class="['bg-modern-dark']" :with-refresh="true">Chapter List</vue-block-head>
	<vue-block-content>
		<a href="{{ route('admin.chapter.create', $manga->id) }}" class="btn btn-success btn-line btn-flat">
			<i class="fa fa-upload"></i> Upload New Chapter
		</a>

		<vue-table :data-class="['push-15-t']" data-name="table" data-target="bdata">
			<vue-table-head :data-column="[
			'Chapter Title',
			{value:'Chapter Number', class:'text-center'},
			{value:'Page', class:'text-center'},
			{value:'Release At', class:'text-center'},
			{value:'Action', class:'text-center'}]"></vue-table-head>
			<vue-table-body data-source="{{ route('api.chapter.get') }}"
			:data-options="{'manga_id': {{$manga->id}} }"
			:data-map="[
			'chapter_title',
			{key: 'chapter_num', class: 'text-center'},
			{key: 'page', class: 'text-center'},
			{key: 'release_date', class: 'text-center'}
			]" :is-action="true">
				<template scope="props">
					<div class="btn-group btn-group-sm">
						<chapter-order :data-item="props.item" data-link="{{ route('api.chapter.order') }}"></chapter-order>
						<vue-action :data-item = "props.item" data-link="{{ route('admin.chapter.upload') }}/{0}"><i class="fa fa-upload text-primary"></i></vue-action>
						<vue-action :data-item = "props.item" :is-delete="true" data-link="{{ route('api.chapter.delete') }}"><i class="fa fa-times text-danger"></i></vue-action>
					</div>
				</template>
			</vue-table-body>
		</vue-table>

		<div class="row">
			<div class="col-md-6"><record-status data-name="bdata"></record-status></div>
			<div class="col-md-6"><vue-pagination data-name="bdata" data-target="table"></vue-pagination></div>
		</div>
	</vue-block-content>
</vue-block>
@endsection
