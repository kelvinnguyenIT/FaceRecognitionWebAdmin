@extends('Admin.layouts.app')

@section('title', 'Addition Image Product')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Addition Image Product</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Admin</a></li>
                <li class="breadcrumb-item">Image Product</li>
                <li class="breadcrumb-item active" aria-current="page">Addition Image Product</li>
            </ol>
        </div>
        <form action="{{ route('image-product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Form Basic -->

                <div class="col-sm-6">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Product Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter image product name" name="name">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="img">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter product name" name="product_name">
                        </div>

                    </div>
                </div>
            </div>
            <center style="margin: 2%"><button type="submit" class="btn btn-primary">Add Image Product</button></center>
        </form>
        <!--Row-->

        <!-- Documentation Link -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                        target="_blank">
                        bootstrap forms documentations.</a> and <a
                        href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                        groups documentations</a></p>
            </div>
        </div>

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="login.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
@endsection
