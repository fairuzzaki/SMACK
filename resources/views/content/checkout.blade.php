@extends('layouts.master')

@section('title','SMACK | HOME')

@section('content')
	<section id="cart_items" style="padding-bottom:50px">
		<div class="container">
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">SALDO</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ url('images/home/'.$menu->photo)}}" alt="" style="width: 150px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$menu->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$menu->price}} K</p>
							</td>
							<td class="cart_price" style="padding-left: 20px">
								<p>{{$jumlah}}</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$total = $menu->price*$jumlah}} K</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$user->saldo}} K</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
			@if($total > $user->saldo)
			<div class="row">
				<div class="col-md-1">
					Ket :
				</div>
				<div class="col-md-11">
					Saldo Anda Tidak Cukup, Silahkan Mengisi saldo atau membayar langsung di kasir
				</div>
			</div>
			@endif

			<div class="row">
				<div class="col-md-10">
					
				</div>
				<div class="col-md-2 ">
					<a class="btn btn-primary" target="_blank" href="{{ url('/saldo')}}">ISI SALDO</a>
				</div>
			</div>


		<br>
		<hr>
		<div class="shopper-informations">
				<div class="step-one">
					<h2 class="heading">Please choose your payment method</h2>
				</div>
				<div class="row">
					<div class="col-sm-6">
							<div class="shopper-info payment1">
							<a href="" onclick="return popup1()"><img src="{{ url('images/payment5.png')}}" width="50" height="50">
								<span> Bayar langsung di kasir </span> 
							</a>
						</div>
					</div>
					<div class="col-sm-1 ">
						<div class="shopper-info"style="margin-left:8px;">
							<p style="color: #fff;margin-top:23px;" class="or">OR</p>
						</div>
					</div>
					<div class="col-sm-5">	
						<div class="shopper-info payment2">
							<a onclick="return bayar('{{$menu->id}}',{{$jumlah}},'{{$total}}')"><img src="{{ url('images/payment1.png')}}" width="50" height="50">
								<span>Bayar dengan Gopay</span> (proses lebih cepat)
							</a>
						</div>
					</div>					
				</div>
			</div>

		</div>
	</section>




    <!-- pop up delete data member yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="bayar">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <form name="form_bayar" action="{{ url('/pembayaran')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">
                  	<input type="hidden" name="id">
					<input type="hidden" name="total">
					<input type="hidden" name="jumlah">
                  </div>
                  <p>Proses pembayaran ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-default" value="Ya" onclick="return alert('Pembayara berhasil !')">
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
        function bayar(id,jumlah,total)
          {
              document.forms['form_bayar']['id'].value=id;
              document.forms['form_bayar']['jumlah'].value=jumlah;
              document.forms['form_bayar']['total'].value=total;
              $('#bayar').modal('show');
          }
    </script>

	@endsection