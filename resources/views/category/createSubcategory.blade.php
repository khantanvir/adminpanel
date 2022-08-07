@extends('adminpanel')
@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create sub-category</h4>
                </div>
                    <div class="card-body">
                                <div class="basic-form">
                                    <input type="hidden" name="category_id" value="" class="form-control input-default ">
                                <h4 class="card-title">Title</h4>
                                    <div class="mb-3">
                                        <input type="text" name="title" value="" class="form-control input-default ">
                                                                            </div><br>
                                    <h4 class="card-title">Discription</h4>
                                <div class="mb-3">
                                    <textarea name="description" class="form-control" rows="4" id="comment"></textarea>
                                </div>
                                <div class="nice-select default-select form-control wide mb-3" tabindex="0"><span class="current">Select Attribute</span><ul class="list"><li data-value="" class="option selected">Select Attribute</li><li data-value="1" class="option">size(s/m/l)</li><li data-value="2" class="option">color</li><li data-value="3" class="option">size(xl/xs)</li><li data-value="4" class="option">design</li><li data-value="5" class="option">weight</li><li data-value="6" class="option">size(30/32/34)</li></ul></div>
                                </div>

                                    <button type="submit" class="btn btn-primary">Middle</button>

                     </div>
            </div>
        </div>
    </div>
</div>
@stop