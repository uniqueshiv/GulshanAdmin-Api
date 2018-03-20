@extends('layouts.master')
@push('css')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/jquery.steps.css')}}" />
     <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/assets/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/assets/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/assets/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/assets/bootstrap-datetimepicker/css/datetimepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/assets/jquery-multi-select/css/multi-select.css')}}" />



@endpush

@section('content')
    <div id="notification">
        <div class="container">
            <div class="row padtop">
                <div class="col-md-8">
                    <div class="panel panel-default" v-cloak>
                        <div class="panel-heading">
                            <div class="clearfix">
                                <span class="panel-title">Add Notification</span>
                                
                            </div>
                        </div>
                     
          <section class="wrapper site-min-height">
          
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                           <div id="loader-wrapper" style="display:none;">
                             <div id="loader"></div>
                             <div class="loader-section section-left"></div>
                           </div>
                           <div class="stepy-tab">
			    <ul id="default-titles" class="stepy-titles clearfix">
			      <li id="default-title-0" class="current-step">
			         <div>Step 1</div>
			      </li>
			      <li id="default-title-1" class="">
			         <div>Step 2</div>
			      </li>
			      <li id="default-title-2" class="">
			         <div>Step 3</div>
			      </li>
			   </ul>
			</div>
			<form class="form-horizontal" id="profileForm">
                           @include('notifications.form')
                          <input  class="finish btn btn-danger" @click="create" :disabled="isProcessing" value="Finish"/>
                       </form>
                          </div>
                      </section>
                  </div>
              </div>


      </section>
                           
                           
                        </div>
                       
                    </div>
                </div>
            </div>
         </div>
   

@endsection

@push('scripts')
<script type="text/javascript" src="{{URL::asset('/assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('/assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
<!--   <script type="text/javascript" src="{{URL::asset('/assets/assets/bootstrap-daterangepicker/moment.min.js')}}"></script> -->
  <script type="text/javascript" src="{{URL::asset('/assets/assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('/assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('/assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
  <script src="{{URL::asset('/assets/js/advanced-form-components.js')}}"></script>
  <!--Form Wizard-->
  <script src="{{URL::asset('assets/js/jquery.steps.min.js')}}" type="text/javascript"></script>
  

    <!--script for this page-->
    <script src="{{URL::asset('assets/js/jquery.stepy.js')}}"></script>

    <!--common script for all pages-->
    
    <script src="{{URL::asset('js/vue.min.js')}}"></script>
    <script src="{{URL::asset('js/vue-resource.min.js')}}"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {
            post_title: '',
            content_image: '',
            catagory: '',
            html_content: '',
            notification_title: '',
            notification_content: '',
            notification_image: '',
            schedule_date: '',          
        };


    </script>


     <script>

    jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[ a-z]+$/i.test(value);
}, "Letters only please"); 
      
   

      //step wizard
     
      $(document).ready(function () {


          
          $('#profileForm').stepy({
              backLabel: 'Previous',
              block: true,
              nextLabel: 'Next',
              titleClick: true,
              titleTarget: '.stepy-tab',
              transition: 'slide',
              validate: true,
             

          });


     
        
      });
  </script>



    <script src="{{URL::asset('js/notification.js')}}"></script>
@endpush