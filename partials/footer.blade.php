			<!-- About Store information Start -->
			<div class="triangle"></div>
			<section id="footer-top-outside">
				<div class="line-bottom">
					<div id="customHome" class="container_12">
						<div id="about_us_footer" class="grid_3">
							<h2>{{about_us()->judul}}</h2>
							{{shortDescription(about_us()->isi,300)}}
						</div>

						<div id="twitter_footer" class="grid_3">
							<h2>Testimonial</h2>
							<br>
							@foreach(list_testimonial() as $items)	
							<div class="twitter_footer">
								<strong>{{$items->nama}}</strong></small>
								<p>{{$items->isi}}</p>      
							</div>
							@endforeach	
							<br>
							<small><strong><a href="{{url('testimoni')}}">Lihat lebih banyak..</a></strong></small>
						</div>
						<div id="contact_footer" class="grid_3">
							<h2>Contact Us</h2>
							<ul>
								<li>
									@if($kontak->telepon)	
									<!-- TELEPHONE -->
									<ul id="tel" class="contact_column">
										<li id="footer_telephone">{{$kontak->telepon}}</li>
										@if($kontak->hp)	
										<li id="footer_telephone2">{{$kontak->hp}}</li>
										@endif	
									</ul>
									@endif	
									<!-- EMAIL -->
									<ul id="mail" class="contact_column">
										<li id="footer_email">
											<a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a>
										</li>
									</ul>
									@if(!empty($kontak->bb))	
									<!-- bb -->
									<ul class="contact_column">
										<li>
											<div class="pull-left" id="bbm">
												<img src="{{url('img/bbm.png')}}" style="width: 40px;">
											</div>
											<span>{{$kontak->bb}}</span>
										</li>
									</ul>
									@endif	
								</li>
							</ul>
						</div>
						@if(!empty($kontak))
						<!--  FACEBOOK -->
						<div id="facebook_footer" class="grid_3">
							{{facebookWidget($kontak,null,'250','400')}}
							<div class="facebook-outer">
								<div id="facebook">
								</div>
							</div>
						</div>
						@endif
					</div>
					<div class="clear"></div>
				<div class="line-bottom1"></div>
				</div>
			</section>
			<div class="triangles"></div>
			<footer id="footer-main">
				<div id="footer">
				@foreach(all_menu() as $key=>$group)	
					@if($key==0 || $key>2)	
					<div class="column">
						<h3>{{$group->nama}}</h3>
						<ul>
						@foreach($group->link as $key=>$link)	
							@if($group->id==$link->tautanId)	
							<li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
							@endif	
						@endforeach	
						</ul>
					</div>
					@else 	
					<div class="column">
						<h3>{{$group->nama}}</h3>
						<ul>
						@foreach($group->link as $key=>$link)	
							@if($group->id==$link->tautanId)	
							<li><a href='{{menu_url($link)}}'>{{$link->nama}}</a></li>
							@endif	
						@endforeach	
						</ul>
					</div>
					@endif	
				@endforeach   
				
					<div class="column">
						<h3>Metode Pembayaran</h3>
						<ul>
						@foreach(list_banks() as $value)	
							<li>{{HTML::image(bank_logo($value), $value->bankdefault->nama)}}</li>
						@endforeach	
						@foreach(list_payments() as $pay)
                        	@if($pay->nama == 'paypal' && $pay->aktif == 1)
                            <li><img src="{{url('img/bank/paypal.png')}}" alt="Paypal" title="Paypal" /></li>
                        	@endif
                            @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                            <li><img src="{{url('img/bank/ipaymu.jpg')}}" alt="Ipaymu" title="Ipaymu" /></li>
                            @endif
                        	@if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                            <li><img src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Bitcoin" /></li>
                        	@endif
                        @endforeach
						@if(count(list_dokus()) > 0 && list_dokus()->status == 1)
						    <li><img src="{{url('img/bank/doku.jpg')}}" alt="Doku" title="Doku" /></li>
						@endif
						</ul>
					</div>
				</div>
				<div class="powered-main">
					<div id="powered">
						<div class="fl">&copy; {{date('Y')}} {{ Theme::place('title') }}. Powered by <a target="_blank" href="http://jarvis-store.com">Jarvis Store</a></div>
						<div class="back-to-top" id="back-top">
							<a title="Back to Top" href="javascript:void(0)" class="backtotop">Top</a>
						</div>
					</div>
				</div>
			</footer>