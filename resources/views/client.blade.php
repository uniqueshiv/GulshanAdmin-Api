@extends('layouts.client')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Client's Dashboard</div>

                <div class="panel-body">
                   <div class="about-section">
  
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

@endpush