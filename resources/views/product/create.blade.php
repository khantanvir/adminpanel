@extends('adminpanel')
@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Product</h4>
                </div>
                <div>
                    <form method="post" action="{{ URL::to('store-product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form">
                                <h5 class="card-title">Title</h5>
                                <div class="mb-3">
                                    <input type="text" name="title" value="{{ (!empty($category->title))?$category->title:old('title') }}" class="form-control input-default ">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div><br>
                                <h5 class="card-title">Short Description</h5>
                                <div class="mb-3">
                                    <textarea name="short_description" class="form-control" rows="3" id="comment"></textarea>
                                    @if ($errors->has('short_description'))
                                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div><br>
                                <h5 class="card-title">Category</h5>
                                <div class="mb-3">
                                    <select onchange="getSubcategory()" name="category_id" id="select_category_id" class="default-select form-control wide mb-3">
                                        <option selected="">Choose...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div><br>
                                <h5 class="card-title">Subcategory</h5>
                                <div class="mb-3">
                                    <div id="select_subcategory_id">
                                        <select id="" name="subcategory_id" class="default-select form-control wide mb-3">
                                            <option selected="">--Select Category First--</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('subcategory_id'))
                                        <span class="text-danger">{{ $errors->first('subcategory_id') }}</span>
                                    @endif
                                </div><br>
                                <h5 class="card-title">Description</h5>
                                <div class="mb-3">
                                    <div class="card-body custom-ekeditor">
                                        <textarea id="ckeditor" name="description" class="form-control"></textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div><br>
                                <div id="addR">
                                    <span class="input-group-btn">
                                        <button id="addAttributeButton" type="button" class="btn btn-success add-product-div"><i class="glyphicon glyphicon-plus"></i>+</button>
                                    </span>
                                    <div id="select-wrapper">
                                        <div id="element-wrapper" class="row">
                                            @foreach ($all_attribute as $key=>$attributes)
                                            @if($attributes->name=="size(s/m/l)")
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">{{ $attributes->name }}</label>
                                                        <input type="hidden" name="main_attribute_id[]" value="{{ $attributes->id }}">
                                                        <select name="attribute_size_s_m_l[]" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @foreach ($attributes->attribute_value as $attr_value)
                                                                <option value="{{ $attr_value->name }}">{{ $attr_value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($attributes->name=="size(xl/xs)")
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">{{ $attributes->name }}</label>
                                                        <input type="hidden" name="main_attribute_id[]" value="{{ $attributes->id }}">
                                                        <select name="attribute_size_xl_xs[]" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @foreach ($attributes->attribute_value as $attr_value)
                                                                <option value="{{ $attr_value->name }}">{{ $attr_value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($attributes->name=="size(30/32/34)")
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">{{ $attributes->name }}</label>
                                                        <input type="hidden" name="main_attribute_id[]" value="{{ $attributes->id }}">
                                                        <select name="attribute_size_30_32[]" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @foreach ($attributes->attribute_value as $attr_value)
                                                                <option value="{{ $attr_value->name }}">{{ $attr_value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($attributes->name=="color")
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">{{ $attributes->name }}</label>
                                                        <input type="hidden" name="main_attribute_id[]" value="{{ $attributes->id }}">
                                                        <select name="attribute_color[]" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @foreach ($attributes->attribute_value as $attr_value)
                                                                <option value="{{ $attr_value->name }}">{{ $attr_value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($attributes->name=="design")
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">{{ $attributes->name }}</label>
                                                        <input type="hidden" name="main_attribute_id[]" value="{{ $attributes->id }}">
                                                        <select name="attribute_design[]" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @foreach ($attributes->attribute_value as $attr_value)
                                                                <option value="{{ $attr_value->name }}">{{ $attr_value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($attributes->name=="weight")
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">{{ $attributes->name }}</label>
                                                        <input type="hidden" name="main_attribute_id[]" value="{{ $attributes->id }}">
                                                        <select name="attribute_weight[]" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @foreach ($attributes->attribute_value as $attr_value)
                                                                <option value="{{ $attr_value->name }}">{{ $attr_value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                            @endforeach
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">Quantity</label>
                                                        <input type="text" name="quantity[]" value="" class="form-control input-default ">
                                                        @if ($errors->has('quantity'))
                                                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">Vendor Price</label>
                                                        <input type="text" name="vendor_price[]" value="" class="form-control input-default ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">Stock Price</label>
                                                        <input type="text" name="stock_price[]" value="" class="txt-stock-price form-control input-default ">
                                                        @if ($errors->has('stock_price'))
                                                            <span class="text-danger">{{ $errors->first('stock_price') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-2">
                                                <div class="align-items-center">
                                                    <div class="col-auto my-1">
                                                        <label class="me-sm-2">Selling Price</label>
                                                        <input type="text" name="selling_price[]" value="" class="form-control input-default ">
                                                        @if ($errors->has('selling_price'))
                                                            <span class="text-danger">{{ $errors->first('selling_price') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <br><span class="input-group-btn"><button type="button" class="btn btn-danger remove-attribute-element"><i class="glyphicon glyphicon-minus"></i>-</button></span>
                                        </div>
                                    </div>
                                </div><br>
                                <h4 class="card-title">Main Image</h4>
                                <div class="col-8 input-group">
                                    <div class="form-file">
                                        <input placeholder="choose main image" type="file" name="main_image" class="form-file-input form-control">
                                    </div>
                                    @if ($errors->has('main_image'))
                                        <span class="text-danger">{{ $errors->first('main_image') }}</span>
                                    @endif
                                </div><br>
                                <div class="mb-3">
                                    <div class="textbox-wrapper-img">
                                        <div class="input-wrapper-img">
                                            <h4 class="card-title">More Images</h4>
                                            <div class="input-group">
                                                <input type="file" name="more_zoom_images[]" class="form-file-input form-control" />
                                            </div><br>
                                            <div class="col-8 input-group">
                                                <input type="file" name="more_images[]" class="form-file-input form-control" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-success add-textbox-img"><i class="glyphicon glyphicon-plus"></i>+</button>
                                                </span>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
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