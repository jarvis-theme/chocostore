		<!--Breadcrumb Part Start-->
		<div class="breadcrumb"><a href="{{url('/')}}">Home</a> » Kontak</div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right" class="rcategory">
			@if(best_seller()->count() > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'), short_description($item->nama,10),array('width'=>50,'height'=>50))}}
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
			<h1>Kontak</h1>
			<div class="contact-info">
				<div class="content">
					<!-- Replace data-center with your address -->
					<iframe class="fl-right" width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe>
					<div class="left">
						<h4><b>Alamat:</b></h4>
						<p>{{$kontak->alamat}}</p>
					</div>
					<div class="right">
						<h4><b>Email:</b></h4>
						{{$kontak->email}}
						<h4><b>Telepon:</b></h4>
						{{$kontak->telepon}}<br>
						{{$kontak->hp}}
						@if(!empty($kontak->bb))  
						<h4><b>BBM:</b></h4>
						{{$kontak->bb}}
						@endif  
					</div>
				</div>
			</div>
			<h2>Hubungi Kami</h2>
			<form action="{{url('kontak')}}" class="wrap contactform" method="post">
				<div class="content"> <b>Nama:</b><br>
					<input class="large-field" type="text" placeholder="Nama" name="namaKontak" required>
					<br><br>
					<b>Email:</b><br>
					<input class="large-field" type="text" placeholder="your@email.com" name="emailKontak" required>
					<br><br>
					<b>Pesan:</b><br>
					<textarea class="w96" rows="10" cols="40" name="messageKontak" required></textarea>
				</div>
				<div class="buttons">
					<div class="right">
						<input type="submit" class="button" value="Kirim">
					</div>
				</div>
			</form>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>