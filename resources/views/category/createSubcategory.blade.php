@extends('adminpanel')
@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create sub-category</h4>
                </div>
                <form method="post" action="{{ URL::to('store-subcategory') }}">
                    @csrf
                    <div class="card-body">
                        <div class="basic-form">
                            <input type="hidden" name="subcategory_id" value="" class="form-control input-default ">
                            <h4 class="card-title">Title</h4>
                            <div class="mb-3">
                                <input type="text" name="title" value="" class="form-control input-default ">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div><br>
                            <h4 class="card-title">Discription</h4>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="4" id="comment"></textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div><br>
                            <div class="mb-3">
                                <h4 class="card-title">Select Category</h4>
                                <select name="category_id" class="default-select form-control wide mb-3">
                                    <option value="">Select Category</option>
                                    @foreach($all_categories as $key => $row)
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div><br>
                            <button type="submit" class="btn btn-primary">Middle</button>
                     </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop