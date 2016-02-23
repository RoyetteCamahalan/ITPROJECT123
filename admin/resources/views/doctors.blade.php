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










    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#alldoctors">All Doctors</a></li>
        <li><a href="#forapproval">For Approval
            @if (count($forapproval) > 0)
                <span class="notification green">{{count($forapproval)}}</span>
            @endif
        </a></li>
        <li><a href="#specialization">Specializations</a></li>
    </ul>
    <br>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="alldoctors">
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <button class="btn-success btn pull-right add-doctor btn-sm" style="margin-bottom:5px" >
                <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                <thead>
                <tr>
                    <th>Doctor's Name</th>
                    <th>Date Registered</th>
                    <th>Specialty</th>
                    <th>PRC License</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>     
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->doc_name}}</td>
                        <td class="center">{{ $doctor->created_at}}</td>
                        <td class="center">{{ $doctor->name}}</td>
                        <td class="center">{{ $doctor->prc_license}}</td>
                        <td class="center" style="text-align: center;">
                            @if($doctor->is_active==2)
                                <span class="label label-danger">Inactive</span>
                            @else
                                <span class="label label-success">Active</span>
                            @endif
                        </td>
                        <td class="center" style="text-align: center;">
                            <a class="btn btn-success btn-xs view-edit-doctor" href="#" data-modal-target="#DoctorModal" data-action="View" data-title="Doctor" data-url="doctors/" data-id="{{ $doctor->doc_id}}"  data-target=".doctor-form">
                                <i class="glyphicon glyphicon-eye-open icon-white"></i>
                            </a>
                            <a class="btn btn-info btn-xs view-edit-doctor" href="#" data-modal-target="#DoctorModal" data-action="Edit" data-title="Doctor" data-url="doctors/" data-id="{{ $doctor->doc_id}}"  data-target=".doctor-form">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                            </a>
                            @if($doctor->is_active==2)
                                <a class="btn btn-success btn-xs btn-accept-doctor" href="#" data-modal-target="#DoctorModal-Accept" 
                                 data-id="{{ $doctor->doc_id}}"  data-target=".doctor-form" data-value="1" data-action="activate">
                                    <i class="glyphicon glyphicon-thumbs-up icon-white"></i>
                                </a>
                            @else
                                <a class="btn btn-danger btn-xs btn-accept-doctor" href="#" data-modal-target="#DoctorModal-Accept" 
                                    data-id="{{ $doctor->doc_id}}"  data-target=".doctor-form" data-value="2" data-action="deactivate">
                                    <i class="glyphicon glyphicon-thumbs-down"></i>
                                </a>
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
        <div class="tab-pane" id="forapproval">
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <thead>
                <tr>
                    <th>Doctor's Name</th>
                    <th>Date Registered</th>
                    <th>Specialty</th>
                    <th>PRC License</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>     
                @foreach($forapproval as $doctor)
                    <tr>
                        <td>{{ $doctor->doc_name}}</td>
                        <td class="center">{{ $doctor->created_at}}</td>
                        <td class="center">{{ $doctor->name}}</td>
                        <td class="center">{{ $doctor->prc_license}}</td>
                        <td class="center" style="text-align: center;">
                           <a class="btn btn-success btn-xs btn-edit-add" href="#" data-modal-target="#DoctorModal" data-action="View" data-title="Doctor" data-url="doctors/" data-id="{{ $doctor->doc_id}}"  data-target=".doctor-form">
                                <i class="glyphicon glyphicon-eye-open icon-white"></i>
                            </a>
                            <a class="btn btn-success btn-xs btn-accept-doctor" href="#" data-modal-target="#DoctorModal-Accept" 
                                 data-id="{{ $doctor->doc_id}}"  data-target=".doctor-form" data-value="1" data-action="approve">
                                <i class="glyphicon glyphicon-plus icon-white" href="#"></i>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>

        <div class="tab-pane" id="specialization">
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <button class="btn-success btn pull-right btn-sm" style="margin-bottom:5px" 
                    data-modal-target="#DoctorModal" data-action="Add" data-title="Doctor" 
                    data-target=".doctor-form" data-url="doctors/">
                <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>     
                @foreach($specializations as $specialization)
                    <tr>
                        <td>{{ $specialization->name}}</td>
                        <td class="center">{{ $specialization->created_at}}</td>
                        <td class="center" style="text-align: center;">
                            <a class="btn btn-success btn-xs">
                                <i class="glyphicon glyphicon-edit icon-white" href="#"></i>
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


       <!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->   

    <div class="modal fade" id="DoctorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Settings</h4> 
                </div>
                <form class="form-horizontal doctor-form" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                            <input type="hidden" class="form-control doc_id" name="doc_id">
                        <div class="form-group">
                            <label for="doc_name">Doctor Name</label>
                            <input type="text" class="form-control doc_name" required name="doc_name">
                        </div>
                        <div class="form-group">
                            <label for="prc_license">PRC License</label>
                            <input type="text" class="form-control prc_license" required name="prc_license">
                        </div>
                        <div class="form-group">
                            <label for="specialization_id_fk">Specialization</label>
                            <select class="form-control specialization_id_fk" name="specialization_id_fk">
                                @foreach($specializations as $specialization)
                                    <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                            </select> 
                            <span class="text-danger">{{ $errors->first('specialization_id_fk') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthdate</label>
                            <input type="text" class="form-control birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" class="form-control contact_number" name="contact_number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default btn-sm" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-success btn-sm" name="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="DoctorModal-Accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4></h4>
                </div>
                <form class="form-horizontal doctor-form" role="form" method="POST" action="doctors/update">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <input type="hidden" class="form-control doc_id" name="doc_id">
                        <input type="hidden" class="form-control is_active" name="is_active">
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
