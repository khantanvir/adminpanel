@extends('adminpanel')
@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Category</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Id</strong></th>
                                    <th><strong>Discription</strong></th>
                                    <th><strong>Main Category</strong></th>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subcategories as $row)
                                <tr>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->description }}	</td>
                                    <td>{{ $row->get_category->title }}</td>
                                    <td>{{ date('M/d/Y',strtotime($row->created_at)) }}</td>
                                    <td><span class="badge light badge-success">Successful</span></td>
                                    <td><span class="badge light badge-danger">Canceled</span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a title="Deactivate" href="#" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fas fa-duotone fa-toggle-off"></i></a>
                                            <a title="Activate" href="#" class="btn btn-warning shadow btn-xs sharp me-1"><i class="fas fa-toggle-on"></i></a>
                                            <a title="Edit" href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a title="Delete" href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <p class="bg-danger text-white p-1">No Item Found</p>
                                @endforelse
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop