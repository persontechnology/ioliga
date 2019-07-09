<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	   <!--  <link href="{
	   {
	    asset('assets/css/bootstrap.min.css') 
	    }

	}
	" rel="stylesheet" type="text/css"> -->
<style type="text/css">
@charset "UTF-8";

	
		body{
		margin:0;font-family:Roboto,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:.8125rem;font-weight:400;line-height:1.5385;color:#333;text-align:left;background-color:#eeeded
		}


		h1,h2,h3,h4,h5,h6{
		margin-top:0;margin-bottom:.625rem
		}
		p{
		margin-top:0;margin-bottom:.625rem
		}
		figure{
		margin:0 0 1rem
		}
		img{
		vertical-align:middle;border-style:none
		}
		svg{
		overflow:hidden;vertical-align:middle
		}		
		.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{
		margin-bottom:.625rem;font-weight:400;line-height:1.5385
		}
		.h1,h1{
		font-size:1.5625rem
		}
		.h2,h2{
		font-size:1.4375rem
		}
		.h3,h3{
		font-size:1.3125rem
		}
		.h4,h4{
		font-size:1.1875rem
		}
		.h5,h5{
		font-size:1.0625rem
		}
		.h6,h6{
		font-size:.9375rem
		}
		
		
		.img-fluid{
		max-width:100%;height:auto
		}
		.img-thumbnail{
		padding:.25rem;background-color:#eeeded;border:1px solid rgba(0,0,0,.125);border-radius:.1875rem;box-shadow:0 1px 2px rgba(0,0,0,.075);max-width:100%;height:auto
		}
		.figure{
		display:inline-block
		}
		.figure-img{
		margin-bottom:.625rem;line-height:1
		}
		.figure-caption{
		font-size:90%;color:#999
		}		
	
		.container-fluid{
		width:100%;padding-right:.625rem;padding-left:.625rem;margin-right:auto;margin-left:auto
		}
		.row{
		display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-.625rem;margin-left:-.625rem
		}
		.no-gutters{
		margin-right:0;margin-left:0
		}
		.no-gutters>.col,.no-gutters>[class*=col-]{
		padding-right:0;padding-left:0
		}
		.col,.col-1,.col-10,.col-11,.col-12,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-auto,.col-lg,.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-auto,.col-md,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-auto,.col-sm,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-auto,.col-xl,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-auto{
		position:relative;width:100%;padding-right:.625rem;padding-left:.625rem
		}
		.col{
		-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%
		}
		.col-auto{
		-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:100%
		}
	
	
		@media (min-width:768px){
		.col-md{
		-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%
		}
		.col-md-auto{
		-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:100%
		}
		.col-md-1{
		-ms-flex:0 0 8.33333%;flex:0 0 8.33333%;max-width:8.33333%
		}
		.col-md-2{
		-ms-flex:0 0 16.66667%;flex:0 0 16.66667%;max-width:16.66667%
		}
		.col-md-3{
		-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%
		}
		.col-md-4{
		-ms-flex:0 0 33.33333%;flex:0 0 33.33333%;max-width:33.33333%
		}
		.col-md-5{
		-ms-flex:0 0 41.66667%;flex:0 0 41.66667%;max-width:41.66667%
		}
		.col-md-6{
		-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%
		}
		.col-md-7{
		-ms-flex:0 0 58.33333%;flex:0 0 58.33333%;max-width:58.33333%
		}
		.col-md-8{
		-ms-flex:0 0 66.66667%;flex:0 0 66.66667%;max-width:66.66667%
		}
		.col-md-9{
		-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%
		}
		.col-md-10{
		-ms-flex:0 0 83.33333%;flex:0 0 83.33333%;max-width:83.33333%
		}
		.col-md-11{
		-ms-flex:0 0 91.66667%;flex:0 0 91.66667%;max-width:91.66667%
		}
		.col-md-12{
		-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%
		}
		.order-md-first{
		-ms-flex-order:-1;order:-1
		}
		.order-md-last{
		-ms-flex-order:13;order:13
		}
		.order-md-0{
		-ms-flex-order:0;order:0
		}
		.order-md-1{
		-ms-flex-order:1;order:1
		}
		.order-md-2{
		-ms-flex-order:2;order:2
		}
		.order-md-3{
		-ms-flex-order:3;order:3
		}
		.order-md-4{
		-ms-flex-order:4;order:4
		}
		.order-md-5{
		-ms-flex-order:5;order:5
		}
		.order-md-6{
		-ms-flex-order:6;order:6
		}
		.order-md-7{
		-ms-flex-order:7;order:7
		}
		.order-md-8{
		-ms-flex-order:8;order:8
		}
		.order-md-9{
		-ms-flex-order:9;order:9
		}
		.order-md-10{
		-ms-flex-order:10;order:10
		}
		.order-md-11{
		-ms-flex-order:11;order:11
		}
		.order-md-12{
		-ms-flex-order:12;order:12
		}
		.offset-md-0{
		margin-left:0
		}
		.offset-md-1{
		margin-left:8.33333%
		}
		.offset-md-2{
		margin-left:16.66667%
		}
		.offset-md-3{
		margin-left:25%
		}
		.offset-md-4{
		margin-left:33.33333%
		}
		.offset-md-5{
		margin-left:41.66667%
		}
		.offset-md-6{
		margin-left:50%
		}
		.offset-md-7{
		margin-left:58.33333%
		}
		.offset-md-8{
		margin-left:66.66667%
		
		}
	
	

		@media (min-width:576px){
		.card{
		position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.1875rem
		}
		.card>hr{
		margin-right:0;margin-left:0
		}
		.card>.list-group:first-child .list-group-item:first-child{
		border-top-left-radius:.1875rem;border-top-right-radius:.1875rem
		}
		.card>.list-group:last-child .list-group-item:last-child{
		border-bottom-right-radius:.1875rem;border-bottom-left-radius:.1875rem
		}
		.card-body{
		-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem
		}
		.card-title{
		margin-bottom:.9375rem
		}
		.card-subtitle{
		margin-top:-.46875rem;margin-bottom:0
		}
		.card-text:last-child{
		margin-bottom:0
		}
		.card-link:hover{
		text-decoration:none
		}
		.card-link+.card-link{
		margin-left:1.25rem
		}
		.card-header{
		padding:.9375rem 1.25rem;margin-bottom:0;background-color:rgba(0,0,0,.02);border-bottom:1px solid rgba(0,0,0,.125)
		}
		.card-header:first-child{
		border-radius:.125rem .125rem 0 0
		}
		.card-header+.list-group .list-group-item:first-child{
		border-top:0
		}
		.card-footer{
		padding:.9375rem 1.25rem;background-color:rgba(0,0,0,.02);border-top:1px solid rgba(0,0,0,.125)
		}
		.card-footer:last-child{
		border-radius:0 0 .125rem .125rem
		}
		.card-header-tabs{
		margin-right:-.625rem;margin-bottom:-.9375rem;margin-left:-.625rem;border-bottom:0
		}
		.card-header-pills{
		margin-right:-.625rem;margin-left:-.625rem
		}
		.card-img-overlay{
		position:absolute;top:0;right:0;bottom:0;left:0;padding:1.25rem
		}
		.card-img{
		width:100%;border-radius:.125rem
		}
		.card-img-top{
		width:100%;border-top-left-radius:.125rem;border-top-right-radius:.125rem
		}
		.card-img-bottom{
		width:100%;border-bottom-right-radius:.125rem;border-bottom-left-radius:.125rem
		}
		.card-deck{
		display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column
		}
		.card-deck .card{
		margin-bottom:1.25rem
		}
		@media (min-width:576px){
		.card-deck{
		-ms-flex-flow:row wrap;flex-flow:row wrap;margin-right:-1.25rem;margin-left:-1.25rem
		}
		.card-deck .card{
		display:-ms-flexbox;display:flex;-ms-flex:1 0 0%;flex:1 0 0%;-ms-flex-direction:column;flex-direction:column;margin-right:1.25rem;margin-bottom:0;margin-left:1.25rem
	}
</style>
</head>
<body>
	@php($nos=ioliga\Models\Nosotro::first())
	<br>
	<br>
	<br>
	<div class="container-fluid">
		<div class="raw">

			<table>
				<tbody>
					<tr>
						<td>
							<div class="card" >
							  <div class="row no-gutters">
							    <div class="col-md-4">    
							         @if(isset($nos->logo))
								        <img class="card-img" src="{{Storage::url('public/nosotros/'.$nos->logo) }}
								         " alt="" />
								      @else
								        <img class="card-img" src="{{asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}
								         " alt=""/>
								      @endif
							    </div>
							    <div class="col-md-8">
							      <div class="card-body">
							        <h5 class="card-title">Card title</h5>
							        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							      </div>
							    </div>
						  </div>
						</div>
										
						</td>
						<td>
							<div class="card" >
							    <div class="row no-gutters">
								    <div class="col-md-4">    
								         @if(isset($nos->logo))
									        <img class="card-img" src="{{Storage::url('public/nosotros/'.$nos->logo) }}
									         " alt="" />
									      @else
									        <img class="card-img" src="{{asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}
									         " alt=""/>
									      @endif
								    </div>
								    <div class="col-md-8">
								      <div class="card-body">
								        <h5 class="card-title">Card title</h5>
								        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								      </div>
								    </div>
							  </div>
							</div>
							
						</td>
					</tr>
				</tbody>
			</table>
	

	</div>
</div>
</body>
</html>