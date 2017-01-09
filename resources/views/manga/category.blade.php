@extends('layouts.base')

@section('title')
@parent - Category List
@endsection

@section('content')
<div class="row">
	@foreach ($categories as $key => $category)
	<div class="col-md-3">
		{{ $category->category }}
	</div>
	@endforeach
</div>
@endsection
