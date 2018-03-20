@extends('layouts.client')
@push('css')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">

@endpush

@section('content')
    <div id="customer">
        <div class="container">
            <div class="row padtop">
                <div class="col-md-8">
                    <div class="panel panel-default" v-cloak>
                        <div class="panel-heading">
                            <div class="clearfix">
                                <span class="panel-title">Add Customer</span>
                                <a href="{{route('customers.index')}}" class="btn btn-default pull-right">Back</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('customers.form')
                            <div class="footer pull-right">
                            <a href="{{route('customers.index')}}" class="btn btn-primary ">CANCEL</a>
                            <button class="btn btn-success btn-middle" @click="create" :disabled="isProcessing">CREATE</button>
                        </div>
                        </div>
                       
                    </div>
                </div>
            </div>
         </div>
    </div>
@endsection

@push('scripts')
    <script src="{{URL::asset('assets/js/jquery.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{URL::asset('assets/js/jquery.dcjqaccordion.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/slidebars.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/js/respond.min.js')}}" ></script>

    <!--common script for all pages-->
    <script src="{{URL::asset('assets/js/common-scripts.js')}}"></script>
    <script src="{{URL::asset('js/vue.min.js')}}"></script>
    <script src="{{URL::asset('js/vue-resource.min.js')}}"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {
            customer_name: '',
            customer_address: '',
            customer_ship_add: '',
            customer_email: '',
            description: '',
            mobile_no: ''
           
        };
    </script>
    <script src="{{URL::asset('js/custapp.js')}}"></script>
@endpush