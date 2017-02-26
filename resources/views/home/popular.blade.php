<div class="row">
	<div class="col-xs-12">
		<vue-block :is-themed="true">
			<ul class="nav nav-tabs nav-tabs-alt nav-justified">
				<li class="active"><a data-toggle="tab" href="#popular">Most Popular</a></li>
				<li><a data-toggle="tab" href="#view">Most Viewed</a></li>
				<li><a data-toggle="tab" href="#random">Random</a></li>
			</ul>
			<vue-block-content :data-class="['remove-padding','tab-content']" id="lts-grp">
				<div role="tabpanel" id="popular" class="tab-pane active">
					<manga-grid data-source="{{ route('api.manga.get') }}" :data-options="{scope: 'popular'}">Most Popular Manga</manga-grid>
				</div>
				<div role="tabpanel" id="view" class="tab-pane">
					<manga-grid data-source="{{ route('api.manga.get') }}" :data-options="{scope: 'view'}">Most View Manga</manga-grid>
				</div>
				<div role="tabpanel" id="random" class="tab-pane">
					<manga-grid data-source="{{ route('api.manga.get') }}" :data-options="{scope: 'random'}">Random Manga</manga-grid>
				</div>
			</vue-block-content>
		</vue-block>
	</div>
</div>
