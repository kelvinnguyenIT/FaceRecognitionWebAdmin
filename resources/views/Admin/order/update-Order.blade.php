@extends('Admin.layouts.app')

@section('title', 'Update Product')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Admin</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active" aria-current="page">Update Product</li>
            </ol>
        </div>
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            {{-- {{dd($product->flavor())}} --}}
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Form Basic -->

                <div class="col-sm-6">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Product</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{ $product->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Flavor</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="flavor">
                                <option>{{ $product->flavor()->first()->id }} - {{ $product->flavor()->first()->name }}
                                </option>
                                @forelse ($flavorList->except($product->flavor()->first()->id) as $flavor)
                                    <option>{{ $flavor->id }} - {{ $flavor->name }}</option>
                                @empty
                                    <p>Empty</p>
                                @endforelse

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category">
                                <option>{{ $product->category()->first()->id }} - {{ $product->category()->first()->name }}
                                </option>
                                @forelse ($categoryList->except($product->category()->first()->id) as $category)
                                    <option>{{ $category->id }} - {{ $category->name }}</option>
                                @empty
                                    <p>Empty</p>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category Child</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category_child">
                                <option>{{ $product->category_child()->first()->id }} -
                                    {{ $product->category_child()->first()->name }}</option>
                                @forelse ($categoryChildList->except($product->category_child()->first()->id) as $categoryChild)
                                    <option>{{ $categoryChild->id }} - {{ $categoryChild->name }}</option>
                                @empty
                                    <p>Empty</p>
                                @endforelse
                            </select>
                        </div>


                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{ $product->price }}" name="price">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Discount Price</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                value="{{ $product->discount_price }}" name="discount_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                value="{{ $product->brand }}" name="brand">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sell</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        value="{{ $product->sell }}" name="sell">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Reviews</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        value="{{ $product->reviews }}" name="reviews">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12">
                <textarea name="editor1"></textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </div>


    </div>
    <center style="margin: 2%"><button type="submit" class="btn btn-primary">Add Product</button></center>
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
