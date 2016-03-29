@extends('maintemplate')

@section('content')

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

<br>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active tab-page-plan"><a href="#MCPS">Master Coverage Plan</a></li>
            <li><a href="#forapproval" class="tab-page-plan">For Approval Plan
                @if (count($forapprovals) > 0)
                    <span class="badge">{{count($forapprovals)}}</span>
                @endif
            </a></li>
        </ul>
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active" id="MCPS">
                 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-products">
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Year</th>
                        <th>Cycle</th>
                        <th>Date Approved</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                    @foreach($mcps as $mcp)
                        <tr>
                            <td>{{ $mcp->fname}} {{ $mcp->lname}}</td>
                            <td class="center">{{ $mcp->year}}</td>
                            <td class="center">{{ $mcp->cycle_number}}
                            @if($mcp->cycle_number==1)
                                    (January)
                                @elseif($mcp->cycle_number==2)
                                    (February)
                                @elseif($mcp->cycle_number==3)
                                    (March)
                                @elseif($mcp->cycle_number==4)
                                    (April)
                                @elseif($mcp->cycle_number==5)
                                    (May)
                                @elseif($mcp->cycle_number==6)
                                    (June)
                                @elseif($mcp->cycle_number==7)
                                    (July)
                                @elseif($mcp->cycle_number==8)
                                    (August)
                                @elseif($mcp->cycle_number==9)
                                    (September)
                                @elseif($mcp->cycle_number==10)
                                    (October)
                                @elseif($mcp->cycle_number=11)
                                    (November)
                                @elseif($mcp->cycle_number==12)
                                    (December)
                                @endif
                                </td>
                            <td class="center">{{ $mcp->status_date}}</td>
                            <td class="center" style="text-align: center;">
                                <a class="btn btn-info btn-xs view-plan-details" href="#" data-id="{{ $mcp->id}}" 
                                    data-year="{{ $mcp->year}}" data-cycle="{{ $mcp->cycle_number}}">
                                    <i class="glyphicon glyphicon-eye-open icon-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div> 

            <div class="tab-pane" id="forapproval">
                 <table class="table table-striped table-bordered bootstrap-datatable responsive table-products">
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Year</th>
                        <th>Cycle</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>   
                    @foreach($forapprovals as $forapproval)
                        <tr>
                            <td class="center">{{ $forapproval->fname}} {{ $forapproval->lname}}</td>
                            <td class="center">{{ $forapproval->year}}</td>
                            <td class="center">{{ $forapproval->cycle_number}}
                            @if($forapproval->cycle_number==1)
                                (January)
                            @elseif($forapproval->cycle_number==2)
                                (February)
                            @elseif($forapproval->cycle_number==3)
                                (March)
                            @elseif($forapproval->cycle_number==4)
                                (April)
                            @elseif($forapproval->cycle_number==5)
                                (May)
                            @elseif($forapproval->cycle_number==6)
                                (June)
                            @elseif($forapproval->cycle_number==7)
                                (July)
                            @elseif($forapproval->cycle_number==8)
                                (August)
                            @elseif($forapproval->cycle_number==9)
                                (September)
                            @elseif($forapproval->cycle_number==10)
                                (October)
                            @elseif($forapproval->cycle_number=11)
                                (November)
                            @elseif($forapproval->cycle_number==12)
                                (December)
                            @endif
                            </td>
                            <td class="center" style="text-align: center;">
                                <a class="btn btn-info btn-xs view-plan-details" href="#" data-id="{{ $forapproval->id}}"
                                    data-year="{{ $forapproval->year}}" data-cycle="{{ $forapproval->cycle_number}}">
                                    <i class="glyphicon glyphicon-eye-open icon-white"></i>
                                </a>
                               <a class="btn btn-success btn-xs btn-accept-decline-plan" href="#" data-id="{{ $forapproval->id}}" data-value="1" data-action="approve">
                                    <i class="glyphicon glyphicon-thumbs-up icon-white"></i>
                                </a>
                                <a class="btn btn-danger btn-xs btn-accept-decline-plan" href="#" data-id="{{ $forapproval->id}}" data-value="2" data-action="decline">
                                    <i class="glyphicon glyphicon-thumbs-down" href="#"></i>
                                </a>
         
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


 <div class="row">
    <div class="box col-md-12 section-plan-details hidden">
        <div class="box-inner">
            <div class="modal-header">
                <h4 class="title-details">Coverage Plan for year 2016 Cycle 3</h4>
            </div>
            <div class="details">
                <table class="table table-striped bootstrap-datatable responsive" id="list-plan-details">
                <thead>
                <tr>
                    <th>Cycle Day</th>
                    <th>Scheduled Doctors</th>
                </tr>
                </thead>
                <tbody id="plan-details-body">     
                
                </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
       <!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->   

<div class="modal fade" id="Plan-Modal-Accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal plan-form" role="form" method="POST" action="plans/update">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <input type="hidden" class="form-control id" name="id">
                        <input type="hidden" class="form-control status_id" name="status_id">
                        <h4 class="title">Do you want to approve this doctor?</h4> 
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default btn-sm" data-dismiss="modal">Not Now</a>
                        <button type="submit" class="btn btn-success btn-sm">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
