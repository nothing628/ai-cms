@extends('layouts.admin.base')

@section('content')
<parent parent-name="test3">
	<child data-name="test1"></child>
</parent>

<parent parent-name="test2">
	<child data-name="test2"></child>
</parent>
@endsection
