@extends('adminpanel')
@section('admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" integrity="sha512-hievggED+/IcfxhYRSr4Auo1jbiOczpqpLZwfTVL/6hFACdbI3WQ8S9NCX50gsM9QVE+zLk/8wb9TlgriFbX+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Product</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Id</strong></th>
                                    <th><strong>Discription</strong></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Quantity</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($all_product as $row)
                                <tr class="{{ (!empty(Session::get('product_id')) && Session::get('product_id')==$row->id)?'table-primary':'' }}">
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->short_description }}</td>
                                    <td><img src="{{ asset('main/image/'.$row->image) }}" width="50" height="70"><a onclick="change_main_image({{ $row->id }})" href="javascript://" data-bs-toggle="modal" data-bs-target="#productEditModal"><i class='far fa-edit'></i></a></td>
                                    <td>{{ $row->total_stock }}</td>
                                    <td>
                                        <input class="change-product-status" type="checkbox" data-id="{{ $row->id }}" data-toggle="toggle" {{ ($row->status==0)?'checked':'' }} data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a title="Edit" href="{{ URL::to('edit-product/'.$row->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a title="Product Attributes" href="{{ URL::to('product-attributes/'.$row->id) }}" class="btn btn-info shadow btn-xs sharp me-1"><i class="fas fa-chart-bar"></i></a>
                                            <a title="Product Images" href="{{ URL::to('product-images/'.$row->id) }}" class="btn btn-info shadow btn-xs sharp me-1"><i class="fas fa-file-image"></i></a>
                                            <a href="javascript:void(0)" onclick="if(confirm('Are you sure to Delete this Product Data?')) location.href='{{ URL::to('delete-product/'.$row->id) }}'; return false;" title="Delete" href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                                {!! $all_product->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="modal fade" id="productEditModal">
                    <form method="post" action="{{ URL::to('change-main-image-post') }}" enctype="multipart/form-data">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Change Main Image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-file">
                                        <input type="hidden" name="product_id" id="product_id" value="">
                                        <input placeholder="choose main image" type="file" name="main_image" class="form-file-input form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop