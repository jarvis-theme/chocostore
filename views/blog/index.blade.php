﻿		<!--Breadcrumb Part Start-->
		<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Blog</div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right" class="rcategory">
			@if(list_blog_category()->count() > 0)
			<!--Categories Part Start-->
			<div class="box">
				<div class="box-heading align-left">Kategori Blog</div>
				<div class="box-content box-category">
				<ul>
				  @foreach(list_blog_category() as $key=>$value)
					<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
				  @endforeach  
				</ul>
			  </div>
			</div>
			<!--Categories Part End-->
			@endif
			@if(best_seller()->count() > 0)
			<section class="box">
				<div class="box-heading align-left"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
					@foreach(best_seller() as $item)
					<div>
						<div class="image">
							<a href="{{product_url($item)}}">
								{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>'50','height'=>'50'))}}
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
			<h1>Blog</h1>
			@if(count(list_blog(null, @$blog_category)) > 0)  
				@foreach(list_blog() as $key=>$value)
				<article>
					<a href="{{blog_url($value)}}"><h2>{{$value->judul}}</h2></a>
					<p><small class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($value->created_at))}}</small> | oleh: <small>{{@$value->authors->nama}}</small></p>
					<div class="blog">
						<img src="{{ imgString($value->isi) }}" class="blog-img" />
						{{short_description($value->isi,250)}}
					</div>
					<p><a href="{{blog_url($value)}}" class="theme">Baca Selengkapnya →</a></p>
				</article>
				<h1></h1>
				@endforeach   
			@else
				<center><p class="not-found">Blog tidak ditemukan.</p></center>
			@endif  
			
			{{list_blog(null, @$blog_category)->links()}}
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>