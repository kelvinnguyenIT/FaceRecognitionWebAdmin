@extends('Admin.layouts.app')

@section('title', 'Order Product')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item">Order</li>
                <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Order Code</th>
                                    <th>Product Name</th>
                                    <th>Image Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>User Name</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($orderList as $order)
                                {{-- {{dd($order->user()->first()->info_account()->first()->address)}} --}}
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_code}}</td>
                                    <td>{{@$order->product()->first()->name}}</td>
                                    <td>
                                        <img src="{{@$order->product()->first()->image()->first()->src}}" alt="{{@$order->product()->first()->image()->first()->src == "" ? "No Image" : "Image Error"}}" style="width: 80px;height: 80px;" /> 
                                    </td>
                                    <td>{{@$order->product()->first()->price}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>{{@$order->user()->first()->info_account()->first()->name}}</td>
                                    <td>{{@$order->user()->first()->info_account()->first()->address}}</td>
                                    <td>{{@$order->user()->first()->info_account()->first()->phone_number}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                                                                    
                                @empty
                                <tr style="color: red">Product Empty</tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Row-->

        <!-- Documentation Link -->
        <div class="row">
            <div class="col-lg-12">
                <p>DataTables is a third party plugin that is used to generate the demo table below. For more information
                    about DataTables, please visit the official <a href="https://datatables.net/" target="_blank">DataTables
                        documentation.</a></p>
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
