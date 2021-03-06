﻿		<!--Breadcrumb Part Start-->
		<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Daftar Pembelian </div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right" class="rcategory">
			<!--Account Links End-->
			@if(count(best_seller()) > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
							 	<a href="{{product_url($item)}}">
							 		{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,15),array('width'=>50,'height'=>50))}}
						 		</a>
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
									{{HTML::image(product_image_url($item->gambar1,'thumb'), $item->nama, array('width'=>50,'height'=>50))}}
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
			<h1>Daftar Pembelian</h1>
			<div class="cart-info">
				<table>
					<thead>
						<tr>
							<td class="image">Kode Order</td>
							<td class="name">Detail</td>
							<td class="name">Total</td>
							<td class="name">Status</td>
						</tr>
					</thead>
					<tbody>
						@foreach(list_order() as $item)
					 	<tr>
							<td>
								{{prefixOrder().$item->kodeOrder}}<br>
								@if($item->status==0)
									<a href="{{url('konfirmasiorder/'.$item->id)}}" class="button">Konfirmasi</a>
								@endif
							</td>
							<td>
								{{$item->tanggalOrder}}<br>
								<ul>
								@foreach ($item->detailorder as $detail)
									<li>
									{{@$detail->produk->nama}} {{@$detail->opsiSkuId !=0 ? '('.@$detail->opsisku->opsi1.(@$detail->opsisku->opsi2 != '' ? ' / '.@$detail->opsisku->opsi2:'').(@$detail->opsisku->opsi3 !='' ? ' / '.@$detail->opsisku->opsi3:'').')':''}} - {{@$detail->qty}}<br>
									</li>
								@endforeach
								</ul>
							</td>
							<td>
								{{ price($item->total)}}<br>
								{{ !empty($item->noResi) ? 'No resi : '.$item->noResi : ''}}
							</td>
							<td>
								@if($item->status==0)
								<span class="label label-warning">Pending</span>
								@elseif($item->status==1)
								<span class="label label-danger">Konfirmasi diterima</span>
								@elseif($item->status==2)
								<span class="label label-info">Pembayaran diterima</span>
								@elseif($item->status==3)
								<span class="label label-success">Terkirim</span>
								@elseif($item->status==4)
								<span class="label label-default">Batal</span>
								@endif
							</td>
						</tr>
						@endforeach    
					</tbody>
				</table>
                {{list_order()->links()}} 
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>