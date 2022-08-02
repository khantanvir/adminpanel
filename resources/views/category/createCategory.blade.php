@extends('adminpanel')
@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create table</h4>
                </div>
                <div class="">
                           <div>
                            <form>
                            <div class="card-body">
                                <div class="basic-form">
                                <h4 class="card-title">Title</h4>
                                    <div class="mb-3">
                                        <input type="text" class="form-control input-default " placeholder="Product-name">
                                    </div><br>
                                    <h4 class="card-title">Add Discription</h4>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="4" id="comment"></textarea>
                                </div>
                                </div>

                                    <button type="button" class="btn btn-primary">Middle</button>

                            </div>

                            </form>
                        </div>
                       
                    <div>

        </div>
    </div>
</div>
@stop