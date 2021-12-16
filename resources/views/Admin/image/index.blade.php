@extends('Admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Image List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item">Image</li>
                <li class="breadcrumb-item active" aria-current="page">Image List</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
                          
            <div class="col-lg-12" id="example">
                    <div class="card-body">
                      <button type="button" class="btn btn-primary mb-1">Today</button>
                      <button type="button" class="btn btn-primary mb-1">This Week</button>
                      <button type="button" class="btn btn-primary mb-1">This Month</button>
                      <div class='input-group date' >
                        <form action="" method="get">
                            <input type="date" id="from" name="from">
                            <label for="to">To</label>
                            <input type="date" id="to" name="to">
                            <button type="submit" class="btn btn-primary mb-1"><i class="fas fa-search fa-fw"></i></button>
                        </form>
                     </div>
                    </div>
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Image List</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Birthday</th>
                                    <th>Date</th>
                                    <th>Perform</th>
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
                                    <td>{{$face->date}}</td>
                                    <td>
                                        <a href="" style="float: left"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                          </svg></a>
                                          {{-- <form action="" method="POST">
                                            @csrf
                                            @method('DELETE') --}}
                                          <button type="submit" style="background: none;border: 0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                          </svg>
                                          </button>
                                          {{-- </form> --}}
                                    </td>
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