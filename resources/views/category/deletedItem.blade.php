@extends('adminpanel')
@section('admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" integrity="sha512-hievggED+/IcfxhYRSr4Auo1jbiOczpqpLZwfTVL/6hFACdbI3WQ8S9NCX50gsM9QVE+zLk/8wb9TlgriFbX+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deleted Attribute Value List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Id</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Main Attribute</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($attribute_values as $attribute)
                                <tr>
                                    <td>{{ $attribute->id }}</td>
                                    <td>{{ $attribute->attribute->name }}</td>
                                    <td>{{ $attribute->name }}</td>
                                    <td>
                                        <input class="roll-back-attribute-value" type="checkbox" data-id="{{ $attribute->id }}" data-toggle="toggle" {{ ($attribute->is_deleted==0)?'checked':'' }} data-on="Active" data-off="Roll Back" data-onstyle="success" data-offstyle="danger">
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deleted Subcategory Item</h4>
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
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subcategories as $row)
                                <tr class="{{ (!empty(Session::get('subcategory_id')) && Session::get('subcategory_id')==$row->id)?'table-primary':'' }}">
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->description }}	</td>
                                    <td>{{ $row->get_category->title }}</td>
                                    <td>{{ date('M/d/Y',strtotime($row->created_at)) }}</td>
                                    <td>
                                        <input class="roll-back-subcategory-status" type="checkbox" data-id="{{ $row->id }}" data-toggle="toggle" {{ ($row->is_deleted==0)?'checked':'' }} data-on="Active" data-off="Rollback" data-onstyle="success" data-offstyle="danger">
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Exam Toppers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:50px;">
                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                            <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Discription</strong></th>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong></strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                            <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                            <label class="form-check-label" for="customCheckBox2"></label>
                                        </div>
                                    </td>

                                    <td><div class="d-flex align-items-center"><img src="images/avatar/1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Dr. Jackson</span></div></td>
                                    <td>example@example.com	</td>
                                    <td>01 August 2020</td>
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
                                <tr>
                                    <td>
                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                            <input type="checkbox" class="form-check-input" id="customCheckBox3" required="">
                                            <label class="form-check-label" for="customCheckBox3"></label>
                                        </div>
                                    </td>

                                    <td><div class="d-flex align-items-center"><img src="images/avatar/2.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Dr. Jackson</span></div></td>
                                    <td>example@example.com	</td>
                                    <td>01 August 2020</td>
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
                                <tr>
                                    <td>
                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                            <input type="checkbox" class="form-check-input" id="customCheckBox4" required="">
                                            <label class="form-check-label" for="customCheckBox4"></label>
                                        </div>
                                    </td>

                                    <td><div class="d-flex align-items-center"><img src="images/avatar/3.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Dr. Jackson</span></div></td>
                                    <td>example@example.com	</td>
                                    <td>01 August 2020</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop