@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('extra-styles')
<link rel="stylesheet" type="text/css" href="\assets\pages\message\message.css">
@endsection

@section('content')
   <div class="row">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-yellow update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h5 class="text-white">{{number_format($tenants->count())}}</h5>
                            <h6 class="text-white m-b-0 mt-2">Overall</h6>
                        </div>
                        <div class="col-4 text-right">
                            <canvas id="update-chart-1" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="icofont icofont-company text-white f-14 m-r-10"></i>Tenants</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-green update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h4 class="text-white">{{number_format($tenants->where('account_status',1)->count())}}</h4>
                            <h6 class="text-white m-b-0">Active</h6>
                        </div>
                        <div class="col-4 text-right">
                            <canvas id="update-chart-2" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="icofont icofont-company text-white f-14 m-r-10"></i>Tenants</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-pink update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h4 class="text-white">{{number_format($tenants->where('account_status',2)->count())}}</h4>
                            <h6 class="text-white m-b-0">Deactivated</h6>
                        </div>
                        <div class="col-4 text-right">
                            <canvas id="update-chart-3" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="icofont icofont-company text-white f-14 m-r-10"></i>Tenants</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-lite-green update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h4 class="text-white">{{number_format($tenants->where('account_status',3)->count())}}</h4>
                            <h6 class="text-white m-b-0">Trial</h6>
                        </div>
                        <div class="col-4 text-right">
                            <canvas id="update-chart-4" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="icofont icofont-company text-white f-14 m-r-10"></i>Tenants</p>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Recent Tenants</h5>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-hover  table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Email Address</th>
                                    <th>Phone</th>
                                    <th>Start</th>
                                    <th>End</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($tenants->take(10) as $item)
                                    <tr>
                                        <td>{{$serial++}}</td>
                                        <td><a href="{{route('view-tenant', $item->slug)}}">{{$item->company_name ?? ''}}</a></td>
                                        <td><a href="mailto:{{$item->email ?? ''}}">{{$item->email ?? ''}}</a></td>
                                        <td><a href="tel:{{$item->phone ?? ''}}">{{$item->phone ?? ''}}</a></td>
                                        <td class="text-primary">{{!is_null($item->start) ? date('d-M-Y', strtotime($item->start)) : '-' }}</td>
                                        <td class="text-danger">{{!is_null($item->end) ? date('d-M-Y', strtotime($item->end)) : '-' }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="{{route('tenants')}}" class=" b-b-primary text-primary">View All Tenants</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection

@section('extra-scripts')
<script type="text/javascript" src="\assets\pages\dashboard\custom-dashboard.js"></script>
<script type="text/javascript" src="\assets\pages\message\message.js"></script>
@endsection
