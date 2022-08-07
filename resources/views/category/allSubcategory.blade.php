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
                                    <th><strong>Discription</strong></th>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong></strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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