@extends('layouts.layout')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
             <h2 class="page-header" style="text-transform: capitalize"><i class="fa fa-th-large fa-fw"></i> {{auth()->user()->user_type}}  | Dashboard</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            {{--  @if(isset($count))  --}}
                            {{-- <div class="huge">{{ $active_count }}</div> --}}
                            {{--  @endif  --}}

                            {{-- <div class="huge">{{ $count }}</div>  --}}

                            <div>Active Visitors</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('dashboard.active-visitor')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-sign-out fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            {{--  @if(isset($count))  --}}
                            {{-- <div class="huge">{{ $exited_count }}</div> --}}
                            {{--  @endif  --}}

                            
                            {{-- <div class="huge">{{ $count }}</div>  --}}

                            <div>Exited Visitors</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('dashboard.exited-visitor')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-times-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            {{--  @if(isset($count))  --}}
                            {{-- <div class="huge">{{ $blocked_count }}</div> --}}
                            {{--  @endif  --}}

                            
                            {{-- <div class="huge">{{ $count }}</div>  --}}

                            <div>Block Visitors</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('dashboard.blocked-visitor')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            {{--  @if(isset($count))  --}}
                            {{-- <div class="huge">{{ $total_count }}</div> --}}
                            {{--  @endif  --}}

                            
                            {{-- <div class="huge">{{ $count }}</div>  --}}
                            
                            <div>Total Visitors</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('dashboard.total-visitor')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @can('isAdmin')
        @include('dashboard-content')
    @endcan
@endsection