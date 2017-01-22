@extends('admin.base')

@section('title')
@parent New Manga
@endsection

@section('breadcrumb')
<li><a>Home</a></li>
<li><a>Category</a></li>
<li><a>Edit</a></li>
@endsection

@section ('page-content')
<form method="post" class="form-horizontal" enctype="multipart/form-data">
	{!! csrf_field() !!}
</form>
@endsection
