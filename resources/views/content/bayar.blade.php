@extends('layouts.master')

@section('title','SMACK | HOME')

@section('content')
	<section id="cart_items" style="padding-bottom:50px">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="container">
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
							<a href="" onclick="return popup2()"><img src="{{ url('images/payment1.png')}}" width="50" height="50">
								<span>Bayar dengan Gopay</span> (proses lebih cepat)
							</a>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</section>

	@endsection

	<script>
		function popup1(){
			alert('Silahkan bayar ke kasir');
		}
		function popup2(){
			alert('Proses pembayaran berhasil');
		}
	</script>