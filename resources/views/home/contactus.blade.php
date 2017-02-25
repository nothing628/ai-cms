@extends('layouts.base')

@section('title')
@parent - Contact Us
@endsection

@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
				Support <small>Contact Us</small>
			</h1>
		</div>
	</div>
</div>
<div class="bg-white">
	<div class="content content-boxed">
		<vue-block :is-themed="true">
			<vue-block-content :data-class="['block-content-full']">
				<address>
					<strong>Twitter, Inc.</strong><br>
					795 Folsom Ave, Suite 600<br>
					San Francisco, CA 94107<br>
					<abbr title="Phone">P:</abbr> (123) 456-7890
				</address>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</vue-block-content>
		</vue-block>
	</div>
</div>
@endsection
