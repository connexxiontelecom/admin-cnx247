@extends('layouts.app')

@section('title')
    My Profile
@endsection

@section('extra-styles')
<link rel="stylesheet" type="text/css" href="\assets\pages\toolbar\jquery.toolbar.css">
<link rel="stylesheet" type="text/css" href="\assets\pages\toolbar\custom-toolbar.css">
@endsection

@section('content')
    @livewire('backend.user.my-profile')
    <div class="row" style="margin-top:-25px;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingOne">
                                <h3 class="card-title accordion-title">
                                <a class="accordion-msg scale_active active" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Personal Info
                                </a>
                            </h3>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in active" role="tabpanel" aria-labelledby="headingOne">
                                <div class="accordion-content accordion-desc">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(Auth::check())
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row" class="tx-11 text-uppercase" style="font-size:12px;">Full Name</th>
                                                                <td>{{Auth::user()->first_name ?? ''}} {{Auth::user()->surname ?? ''}} </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" class="tx-11 text-uppercase" style="font-size:12px;">Mobile No.</th>
                                                                <td>{{Auth::user()->mobile_no ?? ''}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" class="tx-11 text-uppercase" style="font-size:12px;">Email</th>
                                                                <td>{{Auth::user()->email ?? ''}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                {{route('signin')}}
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('dialog-section')
    @include('backend.user.common._user-modals')
@endsection

@section('extra-scripts')
<script type="text/javascript" src="/assets/pages/accordion/accordion.js"></script>
<script type="text/javascript" src="/assets/bower_components/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/assets/js/cus/tinymce.js"></script>
<script type="text/javascript" src="/assets/js/cus/profile.js"></script>
@stack('profile-script')
@endsection
