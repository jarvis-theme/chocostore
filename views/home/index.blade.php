		<!--Middle Part Start-->
		<section id="content">
			{{ Theme::partial('slider') }}  
			<section class="box">
				<div class="box-heading">Produk Kami</div>
				<div class="box-content">
					<div class="box-product">
						@foreach(home_product() as $item1)
						<div>
							<div class="image">
								<img class="ribbon" src="{{url(dirTemaToko().'chocostore/assets/images/badge-pita.png')}}" alt="Pita">
								<a href="{{product_url($item1)}}">
									{{HTML::image(product_image_url($item1->gambar1,'medium'), $item1->nama, array('width'=>165,'height'=>165))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item1)}}">{{$item1->nama}}</a></div>
							<div class="price">{{price($item1->hargaJual)}}</div>
							<div class="abs">
								<div>
									<p>{{short_description($item1->deskripsi, 145)}}</p>
									<a class="btn-buy" title="Beli" href="{{product_url($item1)}}">
										<span>Beli</span>
									</a>
								</div>
							</div>
						</div>
						@endforeach 
					</div>
				</div>
			</section>
			<!--Featured Product End-->

			<!-- Advertisement Banner Start -->
			<section id="banner" class="banner">
				@foreach(horizontal_banner() as $item2)
				<div>
					<a target="_blank" href="{{URL::to($item2->url)}}">
						{{HTML::image(banner_image_url($item2->gambar), 'Info Promo', array('width'=>'962px'))}}
					</a>
				</div>
				@endforeach
			</section>
			<!-- Advertisement Banner End-->
		</section>
		<!-- Middle Part End -->
		<div class="clear"></div>