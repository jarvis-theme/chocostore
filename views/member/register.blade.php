		<!--Breadcrumb Part Start-->
		<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Register </div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right" class="rcategory">
			<!--Account Links End-->
			@if(best_seller()->count() > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>50,'height'=>50))}}
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
									{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>50,'height'=>50))}}
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
									{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>50,'height'=>50))}}
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
			<h1>Detail Account</h1>
			{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
				<h2>Data Personal</h2>
				<div class="content">
					<table class="form">
						<tbody>
							<tr>
								<td><span class="required">*</span> Nama:</td>
								<td><input class="large-field" type="text" name="nama" value="{{Input::old('nama')}}" required></td>
							</tr>
							<tr>
								<td><span class="required">*</span> E-Mail:</td>
								<td><input class="large-field" type="text" name="email" value="{{Input::old('email')}}" required></td>
							</tr>
							<tr>
								<td><span class="required">*</span> Password Baru:</td>
								<td><input class="large-field" type="password" value="" name="password" required></td>
							</tr>
							<tr>
								<td><span class="required">*</span> Password Confirm:</td>
								<td><input class="large-field" type="password" value="" name="password_confirmation" required> </td>
							</tr>
							<tr>
								<td><span class="required">*</span> Captcha:</td>
								<td>
									{{ HTML::image(Captcha::img(), 'Captcha image') }}<br>
									<input type="text" name="captcha" placeholder="Masukan Kode di atas" class="input-text" required>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h2>Informasi Alamat</h2>
				<div class="content">
					<table class="form">
						<tbody>
							<tr>
								<td><span class="required">*</span> Alamat :</td>
								<td><textarea class="span6" name="alamat" required>{{Input::old("alamat")}}</textarea></td>
							</tr>
							<tr>
								<td><span class="required">*</span> Telepon :</td>
								<td><input class="large-field" type="text" name="telp" value="{{Input::old('telp')}}" required></td>
							</tr>
							<tr>
								<td><span class="required">*</span> Negara:</td>
								<td>
									{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, (Input::old("negara")), array('required'=>'', 'id'=>'negara'))}}
								</td>
							</tr>
							<tr>
								<td><span class="required">*</span> Provinsi:</td>
								<td>
									{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"),array('required', "id"=>"provinsi", "data-rel"=>"chosen"))}}
								</td>
							</tr>
							<tr>
								<td><span class="required">*</span> Kota:</td>
								<td>
									{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required'=>'','id'=>'kota'))}}
								</td>
							</tr>
							<tr>
								<td><span class="required" id="postcode-required">*</span> Kode Pos:</td>
								<td><input class="large-field" type="text" name="kodepos" value="{{Input::old('kodepos')}}" required></td>
							</tr>
						</tbody>
					</table>
				</div> 
				<input type="checkbox" name="readme" value="1" checked> Saya telah membaca dan menyetujui <a target="_blank" href="{{url('service')}}">Persyaratan Member</a>
				<div class="buttons">
					<div class="right">
						<input type="submit" class="button" value="Register">
					</div>
				</div>
			</form>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>