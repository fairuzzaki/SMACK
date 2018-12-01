@extends('layouts.master')

@section('title','SMACK | PRODUCT')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				@foreach($menu as $menu)
				<div class="col-sm-12 ">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<!--Code for Zoom-->
							<div class="view-product">
								<img id="zoom_01" src='{{ url('images/home/'.$menu->photo)}}' data-zoom-image="images/product-details/roy.jpg"/>
							</div>
							<!--Code for zoom ends-->
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<div class="row">
									<div class="col-md-3">
											<h2>{{$menu->name}}</h2>
									</div>
									<div class="col-md-5">
										@for($i=0; $i<$menu->rating; $i++)
					                        @if( $menu->rating - $i >= 1)
					                          <i class="fa fa-star" style="color: gold"></i>
					                        @else
					                          <i class="fa fa-star-half-o" style="color: gold"></i>
					                        @endif
					                    @endfor
									</div>
									<div class="col-md-4">
										@if(auth()->check())
										<button class="btn btn-default" onclick="rating({{$menu->id}})">Beri Rating</button>
										@else
										<button class="btn btn-default" onclick="popup()">Beri Rating</button>
										@endif
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<h1 style="color: #FE980F">{{ $menu->price}} K</h1>
									</div>
									<div class="col-md-9">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
											<p><strong>Description</strong></p>
									</div>
									<div class="col-md-9">
										: {{$menu->description}}
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<p><strong>Outlet</strong></p>
									</div>
									<div class="col-md-9">
										<p>: {{ $menu->user->username }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<p><strong>Availability</strong></p>
									</div>
									<div class="col-md-9">
										<p<strong style="color: #FE980F">: {{ $menu->stock}}</strong></i></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<p><strong>Type Quantity</strong></p>
									</div>
									<div class="col-md-9">
										<form method="post" action="{{ url('checkout')}}">
											<input type="hidden" name="id" value="{{$menu->id}}">
												<select name="jumlah">
													@for($i = 0; $i <= $menu->stock; $i++)
													<option value="{{$i}}">{{$i}}</option>
													@endfor
												</select>
											</p>
											@if(auth()->check())
											<input type="submit" name="form_details" value="SUBMIT" class="cart cart_wishlist" style="padding:6px 36px;margin-top:20px;width: 170px">
											{{csrf_field()}}
											@else
											<input type="button" name="form" value="SUBMIT" class="btn btn-primary" onclick="return popup()">
											@endif
										</form>
									</div>
								</div>

							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				</div>
				@endforeach
			</div>
		</div>
		<br>
		<br>
	</section>

	@endsection


	<div class="container">
        <!-- Modal -->
        <div class="modal fade" id="rating">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Input Cars</h4>
              </div>
              <div class="modal-body">
                
                <form name="form_rating" action="{{ url('/rating')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id">
                <div class="row">
                  <div class="col-md-2">Rating</div>
                  <div class="col-md-10">
                    <select name="rating" id="">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
                <br>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
                <input type="submit" class="btn btn-default" value="SIMPAN">
              </div>
                {{csrf_field()}}
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->

    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>
        function popup()
          {
          	alert("Silahkan melakukan Login dahulu");
          }
        function rating(id)
            {
              document.forms['form_rating']['id'].value=id;
              $('#rating').modal('show');
            }
    </script>