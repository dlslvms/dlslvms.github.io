@extends('layouts.layout')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-times-circle fa-fw"></i>Blocked Visitors</h2>
        </div>
    </div>
    @include('page.message')   
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
            </div>      
            <div class="panel-body">   
                @if(isset($visitors))       
                <table width="100%" class="table table-bordered table-hover dataTable" id="visitorTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5px;">No.</th>
                            <bold>
                            <th class="text-center" style="width: 80px;">Visitor Name</th>
                            <th class="text-center" style="width: 80px;">Visitor Access Card Number</th>
                            </bold>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($visitors as $index => $visitor)
                    <tr>
                        <td class="text-center">{{$index + $visitors->firstItem()}} </td>
                        <td class="text-center">{{$visitor->firstname}} {{$visitor->lastname}} </td>
                        <td class="text-center">{{$visitor->accesscard_number}}</td>
                    </tr>
                    @endforeach
                </tbody>                
                </table>         
                <div class="pull-left">
                    <div class="dataTables_paginate pull-left" id="visitorPaginate" role="status" aria-live="polite">
                        {!! $visitors->links() !!}                          
                    </div>
                </div>
                <div class="pull-right">
                    <div class="dataTables_info pull-right" id="visitorInfo">
                        Showing {{($visitors->currentpage()-1)*$visitors->perpage()+1}} 
                        -{{(($visitors->currentpage()-1)*$visitors->perpage())+$visitors->count()}} 
                        of {{$visitors->total()}} entries                         
                    </div>
                </div>
                @else
                    <div class="alert text-danger">
                        <h2>{{$message}}</h2>
                    </div> 
                @endif 
            </div>    
            <!-- /.table-responsive -->
        </div>       
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->    
</div>
<!-- /.col-lg-6 -->
@endsection