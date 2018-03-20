@extends('layouts.master')

@section('content')

              <section class="panel">
                  <header class="panel-heading">
                      All Users
                  </header>
                  <div class="panel-body">
                      <div class="adv-table">
                          <div class="clearfix">
                        
                          </div>
                          
                          <div class="table-responsive">

                          <table class="table table-striped table-hover table-bordered" >
                              <thead>
                              <tr>
                                  <th>Username</th>
                                  <th>Email Id</th>
                                
                                  <th>Role</th>
                                  <th>Edit Role</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              
                              @foreach($usrrol as $d)
                              <tr class="">
                              
                                  <td>{{ $d->name}}</td>
                                  <td>{{$d->email}}</td>
                                   
                                  
                                  <td>{{$d->display_name}}</td>
                                 
                                  <td ><select name="role_id" class="form-control">
                                      <?php
                                      foreach ($data as $r) {

                                        ?>
                                            <option value="<?= $r->id ?>" <?php if($d->role_id==$r->id) echo 'selected' ?> > <?= $r->name ?></option>
                                        <?php
                                         
                                      }

                                      ?>
                                  </select>
                                  </td >
                      
                                 
                              </tr>
                               @endforeach


                              </tbody>
                          </table>

                          </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->

@endsection
@push('scripts')
     <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
    
    <script type="text/javascript">
      
    @if (notify()->ready())
      swal({
        title : "{{notify()->message() }}", 
        type: "{{notify()->type()}}"

      });
      @endif

    </script>
@endpush
