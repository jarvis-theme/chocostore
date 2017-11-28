		<!--Breadcrumb Part Start-->
		<div class="breadcrumb">
			<a href="{{url('home')}}">Home</a> » <a href="{{url('blog')}}">Blog</a> » {{$detailblog->judul}}
		</div>
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
						<li><a href="{{blog_url($value)}}">{{$value->nama}}</a></li>
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
									{{HTML::image(product_image_url($item->gambar1,'thumb', short_description($item->nama,10), array('width'=>'50','height'=>'50')))}}
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
			<h1>{{$detailblog->judul}}</h1>
			<div class="blog">
				{{$detailblog->isi}}
			</div>
			<h1>&nbsp;</h1>
			<div class="buttons">
			@if($next!=null)
				<div class="right"><a class="button" href="{{$next->slug}}">Selanjutnya &rarr;</a></div>
			@endif
			@if($prev!=null)
				<div class="left"><a class="button" href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
			@endif
			</div>
			{{$fbscript}}
			{{fbcommentbox(blog_url($detailblog), '100%', '10', 'light')}}
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>