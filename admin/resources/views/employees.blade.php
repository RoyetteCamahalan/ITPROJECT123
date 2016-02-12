@extends('maintemplate')

@section('content')
   <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="img/ece_logo.jpg" class="hidden-xs"/>
                <span>ECE Calls</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{ Auth::user()->fname }}</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->
        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="/"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li><a class="ajax-link" href="doctors"><i class="glyphicon glyphicon-eye-open"></i><span> Doctors</span></a>
                        </li>
                        <li><a class="ajax-link" href="chart.html"><i class="glyphicon glyphicon-calendar"></i><span> Coverage Plans</span></a>
                        </li>
                        <li><a class="ajax-link" href="typography.html"><i class="glyphicon glyphicon-font"></i><span> Products</span></a>
                        <li><a class="ajax-link" href="employees"><i class="glyphicon glyphicon-font"></i><span> Employees</span></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Employees</a>
        </li>
    </ul>
</div>
<!--Start of Table-->
<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <!--div class="box-header well" data-original-title="">

        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div-->
    @if(Session::has("flash_message"))
    <div class="alert alert-{{ Session::get('flash_message')['type'] }}">
        @if(Session::get('flash_message')["type"] == "important")
            <!--button class="close" data-dismiss="alert" aria-hidden="true" type="button">&times;</button-->
        @endif
        {{ Session::get("flash_message")["msg"] }}
    </div>
    @endif
    <div class="box-content">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#alldoctors">All Employees</a></li>
    </ul>
    <br>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="alldoctors">
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <button class="btn-success btn pull-right btn-edit-add btn-sm" style="margin-bottom:5px" 
                    data-modal-target="#DoctorModal" data-action="Add" data-title="Doctor" 
                    data-target=".doctor-form" data-url="doctors/">
                <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                <thead>
                <tr>
                    <th>Employee's Name</th>
                    <th>Position</th>
                    <th>Hired Date</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>     
                @foreach($User as $users)
                    <tr>
                        <td>{{ $users->fname}}</td>
                        <td class="center">{{ $users->position}}</td>
                        <td class="center">{{ $users->hired_date}}</td>
                        <td class="center">{{ $users->email}}</td>
                        <td class="center" style="text-align: center;">
                            @if($users->is_active==0)
                                <span class="label label-danger">Inactive</span>
                            @else
                                <span class="label label-success">Active</span>
                            @endif
                        </td>
                        <td class="center" style="text-align: center;">
                            <a class="btn btn-success btn-xs btn-edit-add" href="#" data-modal-target="#DoctorModal" data-action="View" data-title="Doctor" data-url="doctors/" data-id="{{ $users->id}}"  data-target=".doctor-form">
                                <i class="glyphicon glyphicon-eye-open icon-white"></i>
                            </a>
                            <a class="btn btn-info btn-xs btn-edit-add" href="#" data-modal-target="#DoctorModal" data-action="Edit" data-title="Doctor" data-url="doctors/" data-id="{{ $users->id}}"  data-target=".doctor-form">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                            </a>
                            @if($users->is_active==0)
                                <a class="btn btn-success btn-xs btn-accept-doctor" href="#" data-modal-target="#DoctorModal-Accept" 
                                 data-id="{{ $users->id}}"  data-target=".doctor-form" data-value="1" data-action="activate">
                                    <i class="glyphicon glyphicon-thumbs-up icon-white"></i>
                                </a>
                            @else
                                <a class="btn btn-danger btn-xs btn-accept-doctor" href="#" data-modal-target="#DoctorModal-Accept" 
                                    data-id="{{ $users->id}}"  data-target=".doctor-form" data-value="2" data-action="deactivate">
                                    <i class="glyphicon glyphicon-thumbs-down"></i>
                                </a>
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
    </div>
    </div>
    </div>
</div>
    <!--/span-->

 </div><!--/row-->

</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    
    <!-- Ad ends -->

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="#" target="_blank">ECE Marketing</a> 2016</p>
        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>
        @if(Session::has("flash_message"))
                <script type="text/javascript">
                    $("div.alert").not(".alert-important").delay(5000).slideUp(function(){
                        $(this).remove();
                    });
                </script>
        @endif
</div>@stop
