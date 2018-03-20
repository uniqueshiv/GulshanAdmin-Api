@extends('layouts.master')
@push('css')

  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/sweetalert.css')}}">
 @endpush

@section('content')


              <header class="panel-heading">
                All Notification
              </header>

              <div class="panel-body">
                  <div class="adv-table">
                       @if($notifications->count())
           <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                    <tr>
                        <th>S.no.</th>
                        <th>Post Title</th>
                        <th>Notification Title</th>
                        <th>Catagory</th>
                        <th>Scheduled For</th>
                        <th>Created At</th>
                        <th>Action</th>

                    </tr>
                </thead>
  <tbody>
                    @foreach($notifications as $index=>$notification)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$notification->post_title}}</td>
                            <td>{{$notification->notification_title}}</td>
                            <td>{{$notification->catagory}}</td>
                            <td><?php echo (date('d-m-Y ' ,strtotime($notification->schedule_date))); ?></td>
                            <td><?php echo (date('d-m-Y ' ,strtotime($notification->created_at))); ?></td>
                            <td class="text-right">
                                <div class="float-left"><a href="{{route('notifications.show', $notification->id)}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a></div>
                          </td>

                        </tr>
                    @endforeach
                </tbody>
             </table>
                  </div>



            @else
                <div class="invoice-empty">
                    <p class="invoice-empty-title">
                        No Notification were created.
                        <a href="{{route('notifications.create')}}">Create Now!</a>
                    </p>
                </div>
            @endif
  </div>

@endsection

@push('scripts')

    <script type="text/javascript" language="javascript" src="{{URL::asset('assets/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assets/data-tables/DT_bootstrap.js')}}"></script>


    <!--common script for all pages-->

     <script src="{{URL::asset('assets/js/dynamic_table_init.js')}}"></script>
    <script src="{{URL::asset('assets/js/dynamic-table.js')}}"></script>

    <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">



    @if (notify()->ready())
      swal({
        title : "{{ notify()->message() }}",
        type: "{{notify()->type()}}",
         timer: 2000,
        showConfirmButton: false,
        animation: "slide-from-top"

      });
      @endif

    </script>



@endpush
