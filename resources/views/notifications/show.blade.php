@extends('layouts.master')
@push('css')

  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/sweetalert.css')}}">
 @endpush

@section('content')
  <div id="notification">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Notifications</span>
                <div class="pull-right">
                    <a href="{{route('notifications.index')}}" class="btn btn-default">Back</a>
                    
                   
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Post Title</label>
                        <p>{{$notifications->post_title}}</p>
                    </div>
                    <div class="form-group">
                        <label>Notification Title</label>
                        <p class="pre">{{$notifications->notification_title}}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Catagory</label>
                        <p class="pre">{{$notifications->catagory}}</p>
                    </div>
                    <div class="form-group">
                        <label>Html Content</label>
                        <p>{{!!html_entity_decode($notifications->html_content)!!}} </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label> Notification Content </label>
                        <p>{{$notifications->notification_content}}</p>
                    </div>
                   
                        <div class="form-group">
                            <label>mobile no</label>
                            <p>{{$notifications->post_title}}</p>
                        </div>
                   
                </div>
            </div>
           <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Content Image</label>
                        <img style="width:200px; height:auto;" class="img-responsive" src="{{$notifications->content_image}}"/>
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Notification Image</label>
                        <img style="width:200px; height:auto;" class="img-responsive" src="{{$notifications->notification_image}}"/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label> Schedule Date  </label>
                        <p>{{$notifications-> schedule_date}}</p>
                    </div>
                   
           
                </div>
            </div>
            <hr>
            @if($notifications->status=='sent')
              <div class="text-center ">
               		<h4>This Notification Has Already Been Sent, So It Can't Be Updated Or Deleted</h4>
                </div> 

	   @else
	   <div class="text-center ">
                 <a href="{{route('notifications.edit', $notifications->id)}}" class="btn btn-primary "><i class="fa fa-pencil"></i> Edit</a>
                 <a class="btn btn-danger" id="onDelete"  notificationid="{{$notifications->id}}" onclick="Deletebtn(this)"><i class="fa fa-trash-o"></i> Delete</a>
                <button class="finish btn btn-danger" @click="sendmassage" >send notifications</button>  </div> 
		
	   @endif
            </div>
        </div>
    </div>

@endsection


@push('scripts')

<script src="{{URL::asset('js/vue.min.js')}}"></script>
    <script src="{{URL::asset('js/vue-resource.min.js')}}"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';
        
        window._form = {!! $notifications->toJson() !!};


    </script>

<script type="text/javascript">

function Deletebtn(btn){
 var notificationid=btn.getAttribute("notificationid");

            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                  $.get('/gulshanhomz/destroynotification/' + notificationid, function(data, status){
                        if(data.deleted){
                           window.location.href = 'http://paltani.com/gulshanhomz/notifications';
                        }
                        else{
                          toastr.warning("Some Error Occured", " ");
                          console.log('not deleted');
                        }
                  });             
                } 
            });

};
      
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

 <script src="{{URL::asset('js/notification.js')}}"></script>

@endpush
