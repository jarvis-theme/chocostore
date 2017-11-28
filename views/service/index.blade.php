		<!--Breadcrumb Part Start-->
		<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Syarat dan Ketentuan</div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right" class="rcategory">
			<!--Categories Part End-->
			@if(best_seller()->count() > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
						</div>
						@endforeach 
					</div>
				</div>
			</section>
			@endif
			@if(featured_product()->count() > 0)
			<section class="box">
				<div class="box-heading"><span>Top Product</span></div>
				<div class="box-content">
					<div class="box-product1">
						@foreach(featured_product() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item)}}">{{$item->nama}}</a></div>
							<div class="price">
								<span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ? price($item->hargaCoret ): ''}}</span>
								<span class="price-new">{{price($item->hargaJual)}}</span>
							</div>
						</div>
						@endforeach 
					</div>
				</div>
			</section>
			@endif
			@if(new_product()->count() > 0)
			<section class="box">
				<div class="box-heading"><span>New Product</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(new_product() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
						</div>
						@endforeach 
					</div>
				</div>
			</section>
			@endif
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!-- <h1>Term and Service</h1> -->
			<div class="accordion">
				<div class="accordion-heading">Kebijakan Layanan</div>
				<div class="accordion-content" style="display: block">{{$service->tos}}</div>
			</div>
			<div class="accordion">
				<div class="accordion-heading">Kebijakan Pengembalian</div>
				<div class="accordion-content"> {{$service->refund}}</div>
			</div>
			<div class="accordion">
				<div class="accordion-heading">Kebijakan Privasi</div>
				<div class="accordion-content">{{$service->privacy}}</div>
			</div>
			<br>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>