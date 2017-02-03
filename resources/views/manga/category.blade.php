@extends('layouts.base')

@section('title')
@parent - Category List
@endsection

@section('content')
<div class="row content">
	<div class="col-xs-12">
		<div class="block block-xs">
			<ul class="nav nav-tabs nav-justified nav-tabs-alt">
				<li class="active"><a data-toggle="tab" href="#tab-category"><i class="si fa-fw si-tag"></i> Category</a></li>
				<li><a data-toggle="tab" href="#tab-tag"><i class="si fa-fw si-tag"></i> Tag</a></li>
				<li><a data-toggle="tab" href="#tab-parody"><i class="si fa-fw si-tag"></i> Parody</a></li>
			</ul>
		</div>
		<div class="block-content tab-content padding-none-bmk">
			<div class="tab-pane fade active in" id="tab-category">
				<div class="block-header bg-black bh-xs">
					<h3 class="block-title"><i class="si si-tag"></i> All Categories</h3>
					<div class="form-horizontal push-5-t">
						<div class="input-group input-group-sm">
							<input class="form-control rf-filter" placeholder="Search category.." data-mode="category" type="text">
							<div class="input-group-btn">
								<button class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="block-content row remove-padding bg-white bc-xs">
					<ul class="nav-users">
						@foreach ($categories as $key => $category)
						<li class="col-xs-6 col-sm-4 col-md-3 fl-category">
							<a href="http://hentai2read.com/hentai-list/category/Adult/" class="link-effect">
								<img class="img-avatar" src="//hentaicdn.com/cdn/v2/assets/img/other/tag.png?x86889" alt="">
								<span>{{ $category->category }}</span>
								<div class="font-w400 text-muted"><small>[Category]</small></div>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="tab-pane fade in" id="tab-tag">
				<div class="block-header bg-black bh-xs">
					<h3 class="block-title"><i class="si si-tag"></i> All Tags</h3>
					<div class="form-horizontal push-5-t">
						<div class="input-group input-group-sm">
							<input class="form-control rf-filter" placeholder="Search tag.." data-mode="tag" type="text">
							<div class="input-group-btn">
								<button class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="block-content row remove-padding bg-white bc-xs">
					<ul class="nav-users">
						<li class="col-xs-6 col-sm-4 fl-tag">
							<a href="http://hentai2read.com/hentai-list/category/Young%20Master/" class="link-effect text-ellipsis">
								<img class="img-avatar" src="//hentaicdn.com/cdn/v2/assets/img/other/tag.png?x86889" alt="">
								<span>Young Master</span>
								<div class="font-w400 text-muted"><small>[Tag]</small></div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="tab-pane fade in" id="tab-parody">
				<div class="block-header bg-black bh-xs">
					<h3 class="block-title"><i class="si si-tag"></i> All Parodies</h3>
					<div class="form-horizontal push-5-t">
						<div class="input-group input-group-sm">
							<input class="form-control rf-filter" placeholder="Search parody.." data-mode="parody" type="text">
							<div class="input-group-btn">
								<button class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="block-content row remove-padding bg-white bc-xs">
					<ul class="nav-users">
						<li class="col-xs-6 col-sm-4 fl-parody">
							<a href="http://hentai2read.com/hentai-list/category/Yumekui%20Merry%20dj./" class="link-effect text-ellipsis">
								<img class="img-avatar" src="//hentaicdn.com/cdn/v2/assets/img/other/tag.png?x86889" alt="">
								<span>Yumekui Merry dj.</span>
								<div class="font-w400 text-muted"><small>[Parody]</small></div>
							</a>
						</li>
					</ul>
				</div>
				<!-- END block-content -->
			</div>
			<!-- END Parody Block -->
		</div>
		<!-- END tab-content -->
	</div>
</div>
@endsection
