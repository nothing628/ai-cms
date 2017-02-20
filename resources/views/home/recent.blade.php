<div class="row push-10-t">
	<div class="col-xs-12">
		<vue-block :is-themed="true">
			<vue-block-head :data-class="['bg-modern-dark']"><i class="fa fa-upload"></i> Recently Upload</vue-block-head>
			<vue-block-content :data-class="['remove-padding','bg-modern-dark']" id="lts-grp">
				<manga-list data-source="{{ route('api.manga.get') }}" :data-options="{scope: 'recent'}"></manga-list>
			</vue-block-content>
		</vue-block>
	</div>
</div>