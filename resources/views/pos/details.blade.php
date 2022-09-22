@extends('sale')
@section('salepanel')
<div class="details-page">
    <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class=" d-flex">
					<div class="preview mr-5">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1">
                            <img class="details-image zoom-image" src="https://static-01.daraz.com.bd/p/b854680b82b5d93c190c276b4b58d783.jpg" /></div>
						  <div class="tab-pane pic-2" id="pic-2">
							<img class="zoom-image" src="https://img.freepik.com/free-psd/isolated-black-t-shirt-front_125540-1167.jpg" />
							
						</div>
						  <div class="tab-pane" id="pic-3">
							<img class="zoom-image" src="https://spito.com.bd/wp-content/uploads/2022/04/Men-Stylist-T-Shirt-Single-500x408.png" />
						</div>
						  <div class="tab-pane" id="pic-4">
							<img class="zoom-image" src="https://cdn.shopify.com/s/files/1/2987/0758/products/Marais_T-Shirt-T-Shirt-LDM101091-522522-Olive_Night_600x.jpg" />
						</div>
						  <div class="tab-pane" id="pic-5">
							<img class="zoom-image" src="https://img.freepik.com/free-psd/isolated-black-t-shirt-front_125540-1167.jpg" />
						</div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs sub-image">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="https://static-01.daraz.com.bd/p/b854680b82b5d93c190c276b4b58d783.jpg" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="https://spito.com.bd/wp-content/uploads/2022/04/Men-Stylist-T-Shirt-Single-500x408.png" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="https://cdn.shopify.com/s/files/1/2987/0758/products/Marais_T-Shirt-T-Shirt-LDM101091-522522-Olive_Night_600x.jpg" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="https://media.gq.com/photos/5ca7ad6d1656fe4e4c2710d7/master/w_1280%2Cc_limit/GQ-Best-Stuff-T's-lemongrass-3x2.jpg" /></a></li>
						</ul>
						
					</div>
					<div class="col-7">
						<h3 class="product-title">men's shoes fashion</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">current price: <span>$180</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action">
							<button class="add-to-cart bg-dark btn btn-default" type="button">add to cart</button>
							<button class="like bg-info btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection