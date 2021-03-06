﻿		<!--Breadcrumb Part Start-->
		<div class="breadcrumb">
			{{breadcrumbProduk($produk,'; <span>»</span>',';', true, $produk->kategori)}}
		</div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right" class="rcategory">
			@if(list_category()->count() > 0)
			<!--Categories Part Start-->
			<div class="box">
				<div class="box-heading align-left">Kategori</div>
				<div class="box-content box-category">
					<ul>
					@foreach(list_category() as $item)
						@if($item->parent==0)
						<li><a href="{{category_url($item)}}">{{$item->nama}}</a>
						@endif
					@endforeach 
					</ul>
				</div>
			</div>
			<!--Categories Part End-->
			@endif
			@if(count(best_seller()) > 0)
			<section class="box">
				<div class="box-heading align-left"><span>Best Sellers</span></div>
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
			@if(count(new_product()) > 0)
			<section class="box">
				<div class="box-heading align-left"><span>New Product</span></div>
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
			<div class="product-info">
				<div class="left">
					<div class="image">
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
							{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>250,'height'=>250,'id'=>"image"))}}
						</a>
					</div>
					<div class="image-additional">
					@if($produk->gambar2!='')
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
							{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>62))}}
						</a>
					@endif
					@if($produk->gambar3!='')
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
						{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>62))}}
						</a>
					@endif
					@if($produk->gambar4!='')
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
						{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>62))}}
						</a>
					@endif  
					</div>
				</div>
				<div class="right">
					<div class="tab-content" id="tab-information">
						<div class="description" style="min-height: 35px;">
							<h3>{{$produk->nama}}</h3>
						</div>
						<div class="price">
							<span class="price-old">{{$produk->hargaCoret!='' || $produk->hargaCoret!=0 ? price($produk->hargaCoret):''}}</span>
							<span class="price-new">{{price($produk->hargaJual)}}</span>
						</div>
						<form action="#" id='addorder'>
							@if($opsiproduk->count()>0)
							<div class="options">
								<h2>Available Options</h2>
								<br>
								<div class="option" id="option-256">
									<select name="option[256]">
										<option value=""> --- Please Select --- </option>
										@foreach ($opsiproduk as $key => $opsi)
										<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
										{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
										</option>
										@endforeach
									</select>
								</div><br>
							</div>
							@endif	
							<div class="cart">
								<div>
									Jumlah: &nbsp;
									<input type="text" value="1" size="2" class="w30" name="qty" pattern="[0-9]">
									<input type="hidden" value="36" size="2" name="product_id"> &nbsp;
									<input type="submit" class="button" id="button-cart" value="Beli">
								</div>
							</div>
						</form>
						<div class="sosmed">
							{{sosialShare(product_url($produk))}}
						</div>
					</div>
					<div class="tab-content" id="tab-description">
						<div>
							{{$produk->deskripsi}}
						</div>
					</div>
				</div>
			</div>
			@if(count(other_product($produk)) > 0)
			<!-- Related Products Start -->
			<div class="box">
				<div class="box-heading">Related Products</div>
				<div class="box-content">
					<div class="box-product related">
						@foreach(other_product($produk) as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1), $item->nama, array('width'=>165,'height'=>165))}}
								</a>
							</div>
							<div class="name">
								<a href="{{product_url($item)}}">{{short_description($item->nama,20)}}</a>
							</div>
							<div class="price">{{price($item->hargaJual)}}</div>
							<div class="abs">
								<div>
									<p>{{short_description($item->deskripsi, 145)}}</p>
									<a class="btn-buy" title="Detail" href="{{product_url($item)}}">
										<span>Detail</span>
									</a>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
				</div>
			</div>
			<!-- Related Products End -->
			@endif
			<div class="box">
				<div class="box-heading">Reviews Product</div>
				<div class="box-content">
        			{{ pluginComment(product_url($produk), @$produk) }}
				</div>
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>