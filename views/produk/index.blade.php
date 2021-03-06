		<!--Breadcrumb Part Start-->
		<div class="breadcrumb">
			{{breadcrumbProduk(null,'; <span>»</span>',';', true, @$category, @$colection)}}
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
					@foreach(list_category() as $item1)
						@if($item1->parent==0)
						<li><a href="{{category_url($item1)}}">{{$item1->nama}}</a>
						@endif
					@endforeach
					</ul>
				</div>
			</div>
			<!--Categories Part End-->
			@endif
			@if(best_seller()->count() >0)
			<section class="box">
				<div class="box-heading align-left"><span>Produk Terlaris</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item2)
						<div>
							<div class="image">
								<a href="{{product_url($item2)}}">
									{{HTML::image(product_image_url($item2->gambar1,'thumb'), $item2->nama, array('width'=>50,'height'=>50))}}
								</a>
							</div>
						</div>
						@endforeach	
					</div>
				</div>
			</section>
			@endif
			@if(count(featured_product()) > 0)
			<section class="box">
				<div class="box-heading align-left"><span>Top Product</span></div>
				<div class="box-content">
					<div class="box-product1">
						@foreach(featured_product() as $item3)
						<div>
							<div class="image">
								<a href="{{product_url($item3)}}">
									{{HTML::image(product_image_url($item3->gambar1,'thumb'), $item3->nama, array('width'=>50,'height'=>50))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item3)}}">{{$item3->nama}}</a></div>
							<div class="price">
								<span class="price-old">{{($item3->hargaCoret!='' || $item3->hargaCoret!=0) ? price($item3->hargaCoret) : ''}}</span>
								<span class="price-new">{{price($item3->hargaJual)}}</span>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>
			@endif
			@if(new_product()->count() > 0)
			<section class="box">
				<div class="box-heading align-left"><span>New Product</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(new_product() as $item4)
						<div>
							<div class="image">
								<a href="{{product_url($item4)}}">
									{{HTML::image(product_image_url($item4->gambar1,'thumb'), $item4->nama, array('width'=>50,'height'=>50))}}
								</a>
							</div>
						</div>
						@endforeach 
					</div>
				</div>
			</section>
			@endif
			<section class="plugin">
				{{pluginSidePowerup()}}
			</section>
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"></div>
			<!--Breadcrumb Part End-->
			<h1>{{$name}}</h1>
			<div class="product-filter">
				<div class="display"><b>Display:</b> 
					@if($view=='' || $view=='grid')
					<span class="list1-icon" title="Grid View">Grid</span>
					<a href="{{buatLink(URL::current(),array('view'=>'list'))}}" class="grid-icon" title="List View">List</a>
					@else
					<a href="{{buatLink(URL::current(),array('view'=>'grid'))}}" class="list1-icon" title="Grid View">Grid</a>
					<span class="grid-icon" title="List View">List</span>
					@endif
				</div>
				<div class="limit"><b>Show:</b>
					<select id="show" data-rel="{{URL::current()}}">
						<option value="12" {{Input::get('show')==12?'selected="selected"':''}}>12</option>
						<option value="24" {{Input::get('show')==24?'selected="selected"':''}}>24</option>
						<option value="36" {{Input::get('show')==36?'selected="selected"':''}}>36</option>
						<option value="48" {{Input::get('show')==48?'selected="selected"':''}}>48</option>
					</select>
				</div>
			</div>
			@if($view=='' || $view=='grid')
			<!--Product Grid Start-->
			<div class="product-grid">
				@foreach(list_product(Input::get('show'), @$category, @$colection) as $item5)	
				<div style="position:relative; width:175px; height:240px;">
					<div class="image" style="min-height:170px">
						<a href="{{product_url($item5)}}">
							{{HTML::image(product_image_url($item5->gambar1,'medium'),$item5->nama,array('width'=>165,'height'=>165))}}
						</a>
					</div>
					<div class="name"><a href="{{product_url($item5)}}">{{short_description($item5->nama,20)}}</a></div>
					<div class="price">{{price($item5->hargaJual)}}</div>
					<div class="abs">
						<div>
							<p>{{short_description($item5->deskripsi, 145)}}</p>
							<a class="btn-buy" title="Beli" href="{{product_url($item5)}}">
								<span>Beli</span>
							</a>
						</div>
					</div>
				</div>
				@endforeach  
			</div>
			<!--Product Grid End-->
			@endif
			@if($view=='list')
			<!--Product List Start-->
			<div class="product-list">
				@foreach(list_product(Input::get('show'), @$category, @$collection) as $item)
				<div>
					<div class="list-view">
						<div class="image">
							<a href="{{product_url($item)}}">
								{{HTML::image(product_image_url($item->gambar1,'medium'), $item->nama,array('width'=>165,'height'=>165))}}
							</a>
						</div>
						<div class="name">
							<a href="{{product_url($item)}}">{{short_description($item->nama, 50)}}</a>
							<div class="description">{{shortDescription($item->deskripsi,200)}}</div>
						</div>
						<div class="cart">
							<div class="price">{{price($item->hargaJual)}}</div>
							<a href="{{product_url($item)}}"><input type="button" value="Detail" class="button" /></a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<!--Product List End-->
			@endif
			{{list_product(Input::get('show'), @$category, @$collection)->appends(array('show' => Input::get('show'), 'view' => Input::get('view')))->links()}}
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>