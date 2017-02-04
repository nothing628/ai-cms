<div class="row push-10-t">
	<div class="col-xs-12">
		<div class="block block-themed">
			<div class="block-header bg-modern-dark">
				<h3 class="block-title"><i class="fa fa-upload"></i> Recently Upload</h3>
			</div>

			<div class="block-content remove-padding bg-black" id="lts-grp">
				<ul class="nav-users" v-for="m in 4">
					<li class="js-lts-grp ribbon ribbon-modern ribbon-primary ribbon-right">
						<div class="ribbon-box"><i class="fa fa-fw fa-heartbeat"></i></div>
						<a href="#" class="link-effect">
							<img src="{{ url('images/small/bg.jpg') }}" class="img-avatar" alt="">
							Title Here
							<br>
							<b class="arf-small">
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-gray"></i>
								[Category here]
							</b>
						</a>
						<ul class="nav-users">
							<li>
								<a href="" class="link-effect">
									<h6 class="text-ellipsis">
										1
										<i class="fa fa-angle-double-right"></i>
										Chapter Title
										<span class="pull-right">2 days ago</span>
									</h6>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>