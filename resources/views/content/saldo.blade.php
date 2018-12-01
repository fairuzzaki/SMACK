@extends('layouts.master')

@section('title','SMACK | CONTACT US')

@section('content')
	<div id="contact-page" class="container">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
    	<div class="bg">	
    		<div class="row">
    		<div class="col-sm-3"></div>  	
	    		<div class="col-sm-5">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Pilih jumlah saldo</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="{{ url('/isiSaldo')}}" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="row">
				            <div class="col-md-2">Jumlah </div>
			                  <input type="hidden" name="id">
			                  <input type="hidden" name="jumlah">
			                  <div class="col-md-10">
								<select name="saldo">
									<option value="20">20K</option>
									<option value="50">50K</option>
									<option value="100">100K</option>
									<option value="150">150K</option>
									<option value="200">200K</option>
									<option value="500">500K</option>
								</select>
			                  </div>
			                  </div>                      
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" onclick="return alert('Berhasil Menambah Saldo')" value="Submit">
				            </div>
				            {{csrf_field()}}
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-3">	
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
		<br>
		<br>
		<br>
    </div><!--/#contact-page-->

	@endsection