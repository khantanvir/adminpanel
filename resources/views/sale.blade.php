<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">
<title>POS</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('sale/assets/images/logos/squanchy.jpg') }}" >
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('sale/assets/images/logos/squanchy.jpg') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('sale/assets/images/logos/squanchy.jpg') }}">
<!-- jQuery -->
<!-- Bootstrap4 files-->
<link href="{{ asset('sale/assets/css/bootstrap.css ') }}" rel="stylesheet" type="text/css"/> 
<link href="{{ asset('sale/assets/css/ui.css ') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('sale/assets/fonts/fontawesome/css/fontawesome-all.min.css ') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('sale/assets/css/OverlayScrollbars.css ') }}" type="text/css" rel="stylesheet"/>
<link href="{{ asset('sale/assets/custom/css/custom.css ') }}" rel="stylesheet" type="text/css"/>
<!-- Font awesome 5 -->
<style>
	.avatar {
  vertical-align: middle;
  width: 35px;
  height: 35px;
  border-radius: 50%;
}
.bg-default, .btn-default{
	background-color: #f2f3f8;
}
.btn-error{
	color: #ef5f5f;
}
</style>
<!-- custom style -->
</head>
<body>
<section class="header-main">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-3">
	<div class="brand-wrap">
		<img class="logo" src="{{ asset('sale/assets/images/logos/squanchy.jpg') }}">
		<h2 class="logo-text my-text">Squanchy POS</h2>
	</div> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-6">
		<form action="#" class="search-wrap">
			<div class="input-group">
			    <input type="text" class="form-control" placeholder="Search Products">
			    <div class="input-group-append">
			      <button class="btn search-button" type="submit">
			        <i class="fa fa-search"></i>
			      </button>
			    </div>
		    </div>
		</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-3 col-sm-6">
		<div class="widgets-wrap d-flex justify-content-end">
			<div class="widget-header">
				<a href="#" class="icontext">
					<a href="#" class="btn home-button m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-home"></i>
														</a>
				</a>
			</div> <!-- widget .// -->
			<div class="widget-header dropdown">
				<a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
					<img src="{{ asset('sale/assets/images/avatars/bshbsh.png') }}" class="avatar" alt="">
				</a>
				<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>
				</div> <!--  dropdown-menu .// -->
			</div> <!-- widget  dropdown.// -->
		</div>	<!-- widgets-wrap.// -->	
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg-default ">
<div class="container-fluid">
<div class="row">
	@yield('salepanel')
	<div class="col-md-4">
<div class="card">
	<span id="cart">
<table class="table cart-table table-hover">
<thead class="text-muted">
<tr>
  <th scope="col">Item</th>
  <th scope="col" width="120">Qty</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Delete</th>
</tr>
</thead>
<tbody>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap cart-image"><img src="{{ asset('sale/assets/images/items/1.jpg') }}" class="img-thumbnail img-xs"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name </h6>
	</figcaption>
</figure> 
	</td>
	<td class="text-center"> 
		<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-minus"></i></button>
																		<button type="button" class="m-btn btn btn-default" disabled>3</button>
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-plus"></i></button>
																	</div>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price text-dark">$145</var> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a href="" class="btn del-button"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{ asset('sale/assets/images/items/5.jpg') }}" class="img-thumbnail img-xs"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name  </h6>
	</figcaption>
</figure> 
	</td>
	<td class="text-center"> 
				<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-minus"></i></button>
																		<button type="button" class="m-btn btn btn-default" disabled>1</button>
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-plus"></i></button>
										</div>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price text-dark">$35</var> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a href="" class="btn del-button btn-round"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{ asset('sale/assets/images/items/4.jpg') }}" class="img-thumbnail img-xs"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name  </h6>
	</figcaption>
</figure> 
	</td>
	<td class="text-center"> 
				<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-minus"></i></button>
																		<button type="button" class="m-btn btn btn-default" disabled>5</button>
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-plus"></i></button>
																	</div>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price text-dark">$45</var> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
		<a href="" class="btn del-button btn-round"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{ asset('sale/assets/images/items/2.jpg') }}" class="img-thumbnail img-xs"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name  </h6>
	</figcaption>
</figure> 
	</td>
	<td class="text-center"> 
				<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-minus"></i></button>
																		<button type="button" class="m-btn btn btn-default" disabled>2</button>
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-plus"></i></button>
																	</div>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price text-dark">$45</var> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
		<a href="" class="btn del-button btn-round"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{ asset('sale/assets/images/items/3.jpg') }}" class="img-thumbnail img-xs"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name  </h6>
	</figcaption>
</figure> 
	</td>
	<td class="text-center"> 
				<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-minus"></i></button>
																		<button type="button" class="m-btn btn btn-default" disabled>1</button>
																		<button type="button" class="m-btn btn btn-default"><i class="fa fa-plus"></i></button>
																	</div>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price text-dark">$45</var> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
		<a href="" class="btn del-button btn-round"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
</tbody>
</table>
</span>
</div> <!-- card.// -->
<div class="box">
<dl class="dlist-align">
  <dt>Tax: </dt>
  <dd class="text-right">12%</dd>
</dl>
<dl class="dlist-align">
  <dt>Discount:</dt>
  <dd class="text-right"><a class="discount-amount" href="#">0%</a></dd>
</dl>
<dl class="dlist-align">
  <dt>Sub Total:</dt>
  <dd class="text-right">$215</dd>
</dl>
<dl class="dlist-align">
  <dt>Total: </dt>
  <dd class="text-right h4 b text-danger"> $215 </dd>
</dl>
<div class="row">
	<div class="col-md-6">
		<a href="#" class="btn  btn-default btn-error btn-lg btn-block"><i class="fa fa-times-circle "></i> Cancel </a>
	</div>
	<div class="col-md-6">
		<a href="#" class="btn charge-button  btn-lg btn-block"><i class="fa fa-shopping-bag"></i> Charge </a>
	</div>
</div>
</div> <!-- box.// -->
	</div>
</div>
</div><!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script src="{{ asset('sale/assets/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('sale/assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('sale/assets/js/OverlayScrollbars.js') }}" type="text/javascript"></script>
<script>
	$(function() {
	//The passed argument has to be at least a empty object or a object with your desired options
	//$("body").overlayScrollbars({ });
	$("#items").height(552);
	$("#items").overlayScrollbars({overflowBehavior : {
		x : "hidden",
		y : "scroll"
	} });
	$("#cart").height(445);
	$("#cart").overlayScrollbars({ });
});
</script>
</body>
</html>