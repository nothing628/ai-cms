<div class="row">
	<div class="col-xs-12">
		<div class="block block-xs">
			<ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
				<li class="active"><a href="#popular">Popular</a></li>
				<li><a href="#view">Views</a></li>
				<li><a href="#random">Random</a></li>
			</ul>
			<div class="block-content tab-content remove-padding">
				<div id="popular" class="tab-pane active">
					<div class="block-content row items-push-10 bg-white bc-xs">
						<div class="col-md-3 col-xl-2 col-sm-4 col-xs-6" v-for="a in 4">
							<div class="img-container ribbon ribbon-modern ribbon-danger ribbon-left">
								<img :src="'{{ url('images/medium') }}' + '/Cover 00' + a + '.jpg'" alt="" class="img-responsive">
								<div class="ribbon-box">
									<a href="#" class="ribbon-link"><i class="fa fa-fw fa-ellipsis-h"></i></a>
									<i class="fa fa-fw fa-fire"></i>
									999
								</div>
								<div class="img-overlay text-center">
									<a href="#">
										<h2 class="rf-title">Title Here</h2>
									</a>
									<div class="rf-info">
										<h4 class="h6 text-muted">
											<b>[Category]</b> By Uploader
										</h4>
										<div class="rating">
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-gray"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="view" class="tab-pane"></div>
				<div id="random" class="tab-pane"></div>
			</div>
		</div>
		<h3 class="title">Most Popular</h3>
	</div>
</div>