
@extends('layouts.master')

@push('css')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/jquery.steps.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">

@endpush

@section('content')
    <div id="register">
    
        <div class="container">
            <div class="row padtop">
                <div class="col-md-8">
                    <div class="panel panel-default" v-cloak>
                        <div class="panel-heading">
                            <div class="clearfix">
                                <span class="panel-title">Add Client</span>
                                
                            </div>
                        </div>
                     
          <section class="wrapper site-min-height">
          
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
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
                                       <li id="default-title-3" class="">
                                          <div>Step 4</div>
                                      </li>
                                    
                                  </ul>
                              </div>
                              <form class="form-horizontal" id="profileForm">
                                  <fieldset title="Step1" class="step" id="default-step-0">
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Company Name</label>
                                          <div class="col-lg-9">
                                              <input type="text" id="name" name="name" minlength="2" class="form-control lettersonly" v-model="form.name" placeholder="Full Name" required >
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Email</label>
                                          <div class="col-lg-9">
                                              <input type="email" name="email" class="form-control" id="email"  v-model="form.email" placeholder="Email Address" required>
                                             
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Mobile Number</label>
                                          <div class="col-lg-9">
                                              <input type="text" name="mobil_no" class="valid number form-control"  v-model="form.mobile" placeholder="Number" required>
                                          </div>
                                      </div>

                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Address</label>
                                          <div class="col-lg-9">
                                              <textarea class=" valid required  form-control" name="address" v-model=" form.address" cols="60" rows="2"></textarea>
                                          </div>
                                      </div>

                                        <div class="form-group">
                                             <label for="password" class="col-md-3 control-label">Password</label>

                                            <div class="col-md-9">
                                                <input id="password" type="password" minlength="6" class="form-control" name="password" v-model="form.password">

                                            </div>
                                        </div>
                                      

                                  </fieldset>
                                   <fieldset title="Step 2" class="step" id="default-step-1" >
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Bank Name</label>
                                          <div class="col-lg-9">
                                              <input id="bankname" type="text" name="bankname" class="valid form-control" v-model="form.bankname" placeholder="Bank Name" required>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Beneficiary Name</label>
                                          <div class="col-lg-9">
                                              <input id="beneficiary_name" type="text" name="beneficiary_name" class="valid lettersonly form-control" v-model="form.beneficiary_name" placeholder="Name" required>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Account Number</label>
                                          <div class="col-lg-9">
                                              <input id="beneficiarynum" type="text" name="beneficiarynum" class="valid number form-control" v-model="form.beneficiarynum" placeholder="Number" required>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">IFSC Code</label>
                                          <div class="col-lg-9">
                                              <input id="beneficiaryifsc" type="text" name="beneficiaryifsc" maxlength="10" class="valid  form-control" v-model="form.beneficiaryifsc" placeholder="IFSC Code" required>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Swift Code</label>
                                          <div class="col-lg-9">
                                              <input id="beneficiaryswift" type="text" name="beneficiaryswift" class="valid  form-control" v-model="form.beneficiaryswift" placeholder="Swift Code" >
                                          </div>
                                      </div>
                                      
                             </fieldset>

                                  <fieldset title="Step 3" class="step" id="default-step-2" >
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">CIN</label>
                                          <div class="col-lg-9">
                                              <input id="cin" type="text" name="cin" class="valid name form-control" v-model="form.cin" placeholder="CIN" required>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Commissionerate</label>
                                          <div class="col-lg-9">
                                              <input id="commissionerate" type="text" name="commissionerate" class="valid lettersonly form-control" v-model="form.commissionerate" placeholder="Commissionerate"  required>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Pan Number</label>
                                          <div class="col-lg-9">
                                              <input id="pannumber" type="text" name="pannumber" class="valid  form-control" v-model="form.pannumber" placeholder="Number" required>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">GST Code</label>
                                          <div class="col-lg-9">
                                              <input id="gst" type="text" name="gst" class="valid form-control" v-model="form.gst" placeholder="Number" required>
                                          </div>
                                      </div>
                                     

                                      

                                  </fieldset>


                                 

                            <fieldset title="Step 4" class="step" id="default-step-3" >
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Company Name</label>
                                          <div class="col-lg-8">
                                              <p class="form-control-static">@{{form.name}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Email</label>
                                          <div class="col-lg-8">
                                              <p class="form-control-static">@{{form.email}}</p>
                                              
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Mobile Number</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">@{{form.mobile}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Address</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">@{{form.address}}</p>
                                             
                                          </div>
                                      </div>
                                      
                                    
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Pan Number</label>
                                          <div class="col-lg-8">
                                              <p class="form-control-static">@{{form.pannumber}}</p>
                                              
                                          </div>
                                      </div>
                                                                                 
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Bank Name</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.bankname}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Beneficiary Name</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.beneficiary_name}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Account Number</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.beneficiarynum}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">IFSC Code</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.beneficiaryifsc}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Swift Code</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.beneficiaryswift}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">CIN</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.cin}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Commissionerate</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.commissionerate}}</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">GST</label>
                                          <div class="col-lg-9">
                                              <p class="form-control-static">
                                                 @{{form.gst}}</p>
                                          </div>
                                      </div>                                      

                                      <p>*Please Check The Above Details To Make Sure It Is All Correct*</p>
                                  </fieldset>
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
  
  <!--Form Wizard-->
  <!-- <script src="{{URL::asset('assets/js/jquery.steps.min.js')}}" type="text/javascript"></script> -->
  

    <!--script for this page-->
    <script src="{{URL::asset('assets/js/jquery.stepy.js')}}"></script>

    <!--common script for all pages-->
    
    <script src="{{URL::asset('js/vue.min.js')}}"></script>
    <script src="{{URL::asset('js/vue-resource.min.js')}}"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {
            name: '',
            mobile: '',
            email: '',
            address: '',
            beneficiarynum: '',
            bankname: '',
            beneficiary_name: '',
            beneficiaryifsc: '',
            beneficiaryswift: '',
            pannumber: '',
            password: '',
            cin:'',
            gst:'',
            commissionerate:'',

            
        };


    </script>


     <script>

     
      $(document).ready(function () {

jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[ a-z]+$/i.test(value);
}, "Letters only please"); 

          
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
 <script src="{{URL::asset('js/register.js')}}"></script>
@endpush