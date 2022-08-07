@extends('adminpanel')
@section('admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" integrity="sha512-hievggED+/IcfxhYRSr4Auo1jbiOczpqpLZwfTVL/6hFACdbI3WQ8S9NCX50gsM9QVE+zLk/8wb9TlgriFbX+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-body">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card col-md-8">
                <div class="card-header">
                    <h4 class="card-title">Add Attributes</h4>
                </div>
                <form method="post" action="{{ URL::to('store-attribute') }}">
                    @csrf
                    <div class="card-body">
                        <div class="basic-form">
                            <h4 class="card-title">Attribute List</h4>
                            <div class="mb-3">
                                <select name="main_attribute" class="default-select form-control wide mb-3">
                                    <option value="">Select Attribute</option>
                                    @foreach($attribute_list as $key => $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('main_attribute'))
                                    <span class="text-danger">{{ $errors->first('main_attribute') }}</span>
                                @endif
                            </div><br>
                            <div class="mb-3">
                                <div class="textbox-wrapper">
                                    <div class="input-wrapper">
                                        <div class="input-group">
                                            <input type="text" name="attribute_arr[]" class="form-control" />
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success add-textbox"><i class="glyphicon glyphicon-plus"></i>+</button>
                                            </span>
                                        </div><br>
                                    </div>
                                </div>
                                @if ($errors->has('attribute_arr'))
                                    <span class="text-danger">{{ $errors->first('attribute_arr') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>  
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Attribute Value List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Id</strong></th>
                                    <th><strong>Attribute Name</strong></th>
                                    <th><strong>Attribute Value</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($attribute_values as $row)
                                <tr class="{{ (!empty(Session::get('attribue_value_id')) && Session::get('attribue_value_id')==$row->id)?'table-primary':'' }}">
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->attribute->name }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <input class="change-attribute-status" type="checkbox" data-id="{{ $row->id }}" data-toggle="toggle" {{ ($row->status==0)?'checked':'' }} data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a title="Edit" href="{{ URL::to('') }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a title="Delete" href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <p class="bg-danger text-white p-1">No Item Found</p>
                                @endforelse
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination pagination-xs pagination-gutter  pagination-warning">
                                {!! $attribute_values->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop