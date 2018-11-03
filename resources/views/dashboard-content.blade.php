<div class="row">
    <div class="col-lg-8">
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Actions
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Another action</a>
                            </li>
                            <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <!-- /.col-lg-4 (nested) -->
                    <div class="col-lg-8">
                        <div id="morris-bar-chart"></div>
                    </div>
                    <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-eye fa-fw"></i> Online Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    {{-- @if($users)
                        @foreach($users as $user)
                            @if($user->isOnline())
                                <li class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> {{$user->firstname}} {{$user->lastname}}
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    @endif --}}
                </div>
                <!-- /.list-group -->
                {{-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> --}}
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel .status-panel -->
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
