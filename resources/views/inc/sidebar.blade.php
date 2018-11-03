<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{url('dashboard')}}"><i class="fa fa-th-large fa-fw"></i> Dashboard</a>
                </li>
                @can('isUser')
                <li>
                    
                </li>
                <li>
                    <a href="{{url('visitor-register')}}"><i class="fa fa-pencil-square-o fa-fw"></i> Visitor Registration</a>
                    <!-- /.nav-second-level -->
                </li>
                @endcan
                <li>
                    <a href="{{url('visitor-monitor')}}"><i class="fa fa-bullseye fa-fw"></i> Visitor Monitor</a>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> Records<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @can('isAdmin')
                        <li>
                            <a href="{{url('userlog')}}"><i class="fa fa-fw fa-th-list"></i> User Logs</a>
                        </li>
                        <li>
                            <a href="{{url('visitorlog')}}"><i class="fa fa-fw fa-th-list"></i> Visitor Logs</a>
                        </li>
                        @endcan
                        
                        <li>
                            <a href="{{url('visitor-record')}}"><i class="fa fa-fw fa-list-alt"></i> Visitor Records</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @can('isAdmin')
                {{-- <li>
                    <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Statistics<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('pagestatistics.visitortype-report')}}"><i class="fa fa-users fa-fw"></i> Visitor Type </a>
                        </li>
                        <li>
                            <a href="{{url('pagestatistics.frequentdestination-report')}}"><i class="fa fa-building-o fa-fw"></i> Frequent Destination </a>
                        </li>
                        <li>
                            <a href="{{url('pagestatistics.frequentvisitor-report')}}"><i class="fa fa-users fa-fw"></i> Frequent Visitor Type </a>
                        </li>
                        <li>
                            <a href="{{url('pagestatistics.frequentvisitor-monthlyreport')}}"><i class="fa fa-users fa-fw"></i> Frequent Visitor Monthly </a>
                        </li>
                        <li>
                            <a href="{{url('pagestatistics.statistic-monthly')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Statistics Montly</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li> --}}
                <li>
                    <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Statistics<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('pagestatistic.statistic')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Statistics</a>
                        </li>
                         <li>
                            <a href="{{url('pagestatistic.frequentvisitor')}}"><i class="fa fa-users fa-fw"></i> Frequent Visitor </a>
                        </li> 
                        <li>
                            <a href="{{url('pagestatistic.frequentdestination')}}"><i class="fa fa-building-o fa-fw"></i> Frequent Destination </a>
                        </li>
                        {{--  <li>
                            <a href="{{url('pagestatistics.frequentvisitor-report')}}"><i class="fa fa-users fa-fw"></i> Frequent Visitor Type </a>
                        </li>
                        <li>
                            <a href="{{url('pagestatistics.frequentvisitor-monthlyreport')}}"><i class="fa fa-users fa-fw"></i> Frequent Visitor Monthly </a>
                        </li>  --}}
                    </ul>
                    <!-- /.nav-second-level -->
                </li> 
                <li>
                    <a href="{{url('user-management')}}"><i class="fa fa-user fa-fw"></i> User Management</a>                    
                </li>
                @endcan
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>