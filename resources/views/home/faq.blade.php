@extends ('layouts.base') @section('title') @parent - Frequently Asked Questions @endsection @section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">
				FAQ <small>Check out answers to the most common questions.</small>
			</h1>
		</div>
	</div>
</div>
<section class="content bg-white">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h2 class="h3 font-w600 push-20-t push">Introduction</h2>
			<div id="frontend-faq1" class="panel-group" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#frontend-faq1" href="#frontend-faq1_q1">Welcome to our service!</a>
						</h3>
					</div>
					<div id="frontend-faq1_q1" class="panel-collapse collapse">
						<div class="panel-body">
							<p>Potenti elit lectus augu</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#frontend-faq1" href="#frontend-faq1_q2">Who are we?</a>
						</h3>
					</div>
					<div id="frontend-faq1_q2" class="panel-collapse collapse">
						<div class="panel-body">
							<p>Potenti elit </p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<a class="accordion-toggle" aria-expanded="true" aria-controls="frontend-faq1_q3" data-toggle="collapse" data-parent="#frontend-faq1" href="#frontend-faq1_q3">What are our values?</a>
						</h3>
					</div>
					<div id="frontend-faq1_q3" class="panel-collapse collapse">
						<div class="panel-body">
							<p>Potenti elit l</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
