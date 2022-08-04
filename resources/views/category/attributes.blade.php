@extends('adminpanel')
@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card mb-8">
                <div class="card-header">
                    <h4 class="card-title">Create table</h4>
                </div>
                <form method="post" action="{{ URL::to('') }}">
                    @csrf
                    <div class="card-body">
                        <div class="basic-form">
                            <h4 class="card-title">Attribute List</h4>
                            <div class="mb-3">
                                <select class="default-select form-control wide mb-3">
                                    <option value="">Select Attribute</option>
                                    @foreach($attribute_list as $key => $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div><br>
                            <div class="mb-3">
                                <div class="textbox-wrapper">
                                    <div class="input-group">
                                        <input type="text" name="text_arr[]" class="form-control" />
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success add-textbox"><i class="glyphicon glyphicon-plus"></i>+</button>
                                        </span>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Middle</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
@stop