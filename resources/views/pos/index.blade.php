@extends('sale')
@section('salepanel')
<div class="col-md-8 card padding-y-sm card ">
<ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" data-toggle="pill" href="#nav-tab-card">
        <i class="fa fa-tags"></i> All</a></li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
        <i class="fa fa-tags "></i>  Category 1</a></li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 2</a></li>
     <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 3</a></li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 4</a></li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
        <i class="fa fa-tags "></i>  Category 5</a></li>
</ul>
<span   id="items">
<div class="row">
    <div class="col-md-3">
    <figure class="card card-product">
        <span class="badge-new"> NEW </span>
        <div class="img-wrap"> 
            <img src="{{ asset('sale/assets/images/items/3.jpg ') }}">
            <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
        </div>
        <figcaption class="info-wrap">
            <a href="#" class="title">Good item name</a>
            <div class="action-wrap">
                <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
                <div class="price-wrap h5">
                    <span class="price-new">$1280</span>
                </div> <!-- price-wrap.// -->
            </div> <!-- action-wrap -->
        </figcaption>
    </figure> <!-- card // -->
    </div> <!-- col // -->
<div class="col-md-3">
<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/4.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new">$280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/5.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title">Name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new">$280</span>
                <del class="price-old">$1980</del>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/6.jpg ') }}">
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new">$280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
</div> <!-- row.// -->
<div class="row">
<div class="col-md-3">
<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <div class="img-wrap"> 
        <img src="{{ asset('sale/assets/images/items/1.jpg ') }}">
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title">Good item name</a>
        <div class="action-wrap">
            <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new">$1280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/2.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new">$280</span>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/7.jpg ') }}">
    <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title">Name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new">$280</span>
                <del class="price-old">$1980</del>
            </div> <!-- price-wrap.// -->
        </div> <!-- action-wrap -->
    </figcaption>
</figure> <!-- card // -->
</div> <!-- col // -->
<div class="col-md-3">
<figure class="card card-product">
    <span class="badge-new"> NEW </span>
    <div class="img-wrap"> <img src="{{ asset('sale/assets/images/items/comp.png ') }}">
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
    </div>
    <figcaption class="info-wrap">
        <a href="#" class="title">The name of product</a>
        <div class="action-wrap">
            <a href="#" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </a>
            <div class="price-wrap h5">
                <span class="price-new">$280</span>
            </div>
        </div>
    </figcaption>
</figure>
</div>
</div>
</span>
</div>
@endsection
