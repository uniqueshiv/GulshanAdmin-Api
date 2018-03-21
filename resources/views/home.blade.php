@extends('layouts.master')

@section('content')

    {{ Auth::user()->email }}
              <section class="panel">
                  <header class="panel-heading">
                      All Users
                  </header>
                  <div class="panel-body">
                      <div class="adv-table">
                          <div class="clearfix">
                              <div class="btn-group">
                                  <a href="{{ url('/register') }}" class="btn btn-primary"><i class="fa fa-btn fa-user"></i> Register New User</a>
                              </div>
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Print</a></li>
                                      <li><a href="#">Save as PDF</a></li>

                                  </ul>
                              </div>
                          </div>


                          <div class="table-responsive">

                          <table class="table table-striped table-hover table-bordered" >
                              <thead>
                              <tr>
                                  <th>Username</th>
                                  <th>Email Id</th>
                                  <th>Role</th>
                                  <th>Edit Role</th>
                                 <!--  <th>Save</th> -->
                              </tr>
                              </thead>
                              <tbody>
                              <tr class="">
                                  <td>Jondi Rose</td>
                                  <td>Alfred Jondi Rose</td>
                                  <td>1234</td>
                                  <td ><select name="role_id" class="form-control">

                                  </select></td>
                                <!--   <td><a class="edit" href="javascript:;">Edit</a></td>
                                  <td><a class="delete" href="javascript:;">Delete</a></td> -->
                              </tr>


                              </tbody>
                          </table>

                          </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->



@endsection
