@extends('adminpanel')
@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Product</h4>
                </div>
                <div>
                    <form method="post" action="{{ URL::to('edit-product-post') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $get_product->id }}">
                        <div class="card-body">
                            <div class="basic-form">
                                <h5 class="card-title">Title</h5>
                                <div class="mb-3">
                                    <input type="text" name="title" value="{{ (!empty($get_product->title))?$get_product->title:old('title') }}" class="form-control input-default ">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div><br>
                                <h5 class="card-title">Short Description</h5>
                                <div class="mb-3">
                                    <textarea name="short_description" class="form-control" rows="3" id="comment">{{ (!empty($get_product->short_description))?$get_product->short_description:old('short_description') }}</textarea>
                                    @if ($errors->has('short_description'))
                                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div><br>
                                <h5 class="card-title">Vendor</h5>
                                <div class="mb-3">
                                    <select name="vendor_id" class="default-select form-control wide mb-3">
                                        <option>...Choose...</option>
                                        @foreach($vendors as $vendor)
                                            <option {{ (!empty($get_product->vendor_id) && $get_product->vendor_id==$vendor->id)?'selected':'' }} value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div><br>
                                <h5 class="card-title">Category</h5>
                                <div class="mb-3">
                                    <select onchange="getSubcategory()" name="category" id="select_category_id" class="default-select form-control wide mb-3">
                                        <option selected="">Choose...</option>
                                        @foreach($categories as $category)
                                            <option {{ (!empty($get_product->category_id) && $get_product->category_id==$category->id)?'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div><br>
                                <h5 class="card-title">Subcategory</h5>
                                <div class="mb-3">
                                    <div id="select_subcategory_id">
                                        <select id="" name="subcategory" class="default-select form-control wide mb-3">
                                            <option>--Select Subcategory First--</option>
                                            @foreach($subcategories as $subcategory)
                                                <option {{ (!empty($get_product->subcategory_id) && $get_product->subcategory_id==$subcategory->id)?'selected':'' }} value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('subcategory'))
                                            <span class="text-danger">{{ $errors->first('subcategory') }}</span>
                                        @endif
                                    </div>
                                </div><br>
                                <h5 class="card-title">Description</h5>
                                <div class="mb-3">
                                    <div class="card-body custom-ekeditor">
                                        <textarea id="ckeditor" name="description" class="form-control">{{ (!empty($get_product->description))?$get_product->description:old('description') }}</textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div><br>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop