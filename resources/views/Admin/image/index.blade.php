@extends('Admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Recognition List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item">Recognition List</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
                          
            <div class="col-lg-12" id="example">
                    <div class="card-body">
                      <a href="/attendance/today"><button type="button" class="btn btn-primary mb-1">Today</button></a>
                      <a href="/attendance/thisWeek"><button type="button" class="btn btn-primary mb-1">This Week</button></a>
                      <a href="/attendance/thisMonth"><button type="button" class="btn btn-primary mb-1">This Month</button></a>
                      <div class='input-group date' >
                        <form action="/attendance" method="get">
                            <input type="date" id="from" name="from" required>
                            <label for="to">To</label>
                            <input type="date" id="to" name="to" required>
                            <button type="submit" class="btn btn-primary mb-1"><i class="fas fa-search fa-fw"></i></button>
                        </form>
                     </div>
                    </div>
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Recognition List</h6>
                    </div>
                    <div class="table-responsive p-3">

                        @if(count($faceList) > 0)
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Birthday</th>
                                    <th>Attendant</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($faceList as $face)
                                {{-- {{dd($product->category_child()->first()->name)}} --}}
                                <tr>
                                    <td>{{$face->iduser}}</td>
                                    <td>{{@$face->userinfo()->first()->name}}</td>
                                    <td>{{@$face->userinfo()->first()->class}}</td>
                                    <td>{{@$face->userinfo()->first()->bday}}</td>
                                    <td>{{$face->quantity}}</td>
                                    <td>
                                        <div class="boxDetail">
                                            <ul>
                                                @forelse ($face->detailRecognition as $attendant)
                                                <li style="font-size: 15px">{{$attendant->date_time}}</li>
                                                @empty
                                                    <p style="color: red">Empty</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                                                    
                                @empty
                                
                                @endforelse

                            </tbody>
                        </table>
                        @else
                        
                        <img src="/image/notfound.jpg" alt="Result Not Found" style="display: block;margin-left: auto;margin-right: auto"/>
                        @endif
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
