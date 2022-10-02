@extends('sale')
@section('salepanel')
<div class="col-lg-8 col-md-12 col-sm-12 padding-y-sm card pl-5">
<ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
    <li class="nav-item">
        <a class=" active show category-part" data-toggle="pill" href="#nav-tab-card">
        <i class="fa fa-tags"></i> All</a></li>
    <li class="nav-item">
        <a class="category-part" data-toggle="pill" href="#nav-tab-paypal">
        <i class="fa fa-tags "></i>  Category 1</a></li>
    <li class="nav-item">
        <a class="category-part" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 2</a></li>
     <li class="nav-item">
        <a class="category-part" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 3</a></li>
    <li class="nav-item">
        <a class="category-part" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 4</a></li>
    <li class="nav-item">
        <a class="category-part" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 5</a></li>
</ul>
<span   id="items">
<div class="row">
    <div class="col-lg-3 col-md-4">
    <figure class="card card-product p-2">
        <span class="new-product"> NEW </span>
        <div class="img-wrap"> 
            <img src="{{ asset('sale/assets/images/items/3.jpg ') }}">
            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>Details</a>
        </div>
        <figcaption class="info-wrap">
            <a href="#" class="title text-dark">Good item name</a>
            <div class="action-wrap">
                <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
                <div class="price-wrap h5">
                    <span class="price-new text-danger">$1280</span>
                </div> <!-- price-wrap.// -->
            </div> <!-- action-wrap -->
        </figcaption>
    </figure> <!-- card // -->
    </div> <!-- col // -->
<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/4.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Details</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/5.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Details</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">Name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$280</span>
                <del class="price-old">$1980</del>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/6.jpg ') }}">
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Details</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<!-- row.// -->

<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> 
        <img src="{{ asset('sale/assets/images/items/1.jpg ') }}">
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Details</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">Good item name</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$1280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/2.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Details</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/7.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">Name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$280</span>
                <del class="price-old">$1980</del>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/comp.png ') }}">
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>Details</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$280</span>
            </div>
        </div>
    </figcaption>
</figure>
</div>
<div class="col-lg-3 col-md-4">
<figure class="card card-product p-2">
    <span class="new-product"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/comp.png ') }}">
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i>Details</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title text-dark">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn add-button btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new text-danger">$280</span>
            </div>
        </div>
    </figcaption>
</figure>
</div>
</div>
</span>
</div>
@endsection
