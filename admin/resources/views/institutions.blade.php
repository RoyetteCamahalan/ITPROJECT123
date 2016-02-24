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
        <li class="active"><a href="#institutions" class="tab-page">Institutions</a></li>
        <li><a href="#areas" class="tab-page">Areas</a></li>
    </ul>
    <br>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="institutions">
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <button class="btn-success btn pull-right add-institution btn-sm" style="margin-bottom:5px">
                <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                <thead>
                <tr>
                    <th>Institution Name</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>     
                @foreach($institutions as $institution)
                    <tr>
                        <td class="center"><a  class="institution-name" data-title="{{ $institution->name}}" data-id="{{ $institution->id}}">
                        <span>{{ $institution->name}}</span></a></td>
                        <td class="center">{{ $institution->address}}</td>
                        <td class="center">{{ $institution->area_name}}</td>
                        <td class="center">{{ $institution->created_at}}</td>

                        <td class="center" style="text-align: center;">
                            <a class="btn btn-info btn-xs btn-edit-add" href="#" data-modal-target="#DoctorModal" data-action="Edit" data-title="Doctor" data-url="doctors/" data-id="{{ $institution->id}}"  data-target=".doctor-form">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>

        <div class="tab-pane" id="areas">
            <table class="table table-striped table-bordered bootstrap-datatable responsive">
                <button class="btn-success btn pull-right add-area btn-sm" style="margin-bottom:5px">
                <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                <thead>
                <tr>
                    <th>Area</th>
                    <th>Description</th>
                    <th>Assigned Employee</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>     
                @foreach($areas as $area)
                    <tr>
                        <td class="center"><a><span>{{ $area->name}}</span></a></td>
                        <td class="center">{{ $area->description}}</td>
                        <td class="center">{{ $area->fname.' '.$area->lname}}</td>

                        <td class="center" style="text-align: center;">
                            <a class="btn btn-info btn-xs btn-edit-add" href="#">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
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
    <div class="box col-md-12 section-details hidden">
        <div class="box-inner">
            <div class="modal-header">
                <h4 class="title-details">Doctor Name - Institutions</h4>
            </div>
            <div class="details">
                <table class="table table-striped bootstrap-datatable responsive" id="list-doctors">
                    <button class="btn-success btn pull-right add-doctormap btn-sm" style="margin-bottom:5px"  data-id='0'>
                    <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>

                    <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Description</th>
                    <th>Assigned Employee</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>     
                
                </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

       <!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->   

    <div class="modal fade" id="AddDoctorMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                            <!--input type="text" class="form-control doc_name" required name="doc_name"-->
                                <div class="" style="left:0px; width: 570px; top: 20px; display: block;">
                                   <!--div class="">       
                                        <!--label for="s2id_autogen1_search" class="select2-offscreen">hghjghjghj</label>  select2-drop select2-display-none select2-with-searchbox select2-drop-active form-controlselect2-search
                                        <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="false" aria-autocomplete="list" aria-owns="select2-results-1" id="s2id_autogen1_search" placeholder="" aria-activedescendant="select2-result-label-10"!--> 
                                         <select multiple id="select2" class="form-control">
                                            <option value="AL">Alabama</option>
                                            <option value="Am">Amalapuram</option>
                                            <option value="An">Anakapalli</option>
                                            <option value="Ak">Akkayapalem</option>
                                            <option value="WY">Wyoming</option>
                                        </select>  
                                    <!--/div!-->
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="prc_license">PRC License</label>
                            <input type="text" class="form-control prc_license" required name="prc_license">
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


    <div class="modal fade" id="InstitutionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Settings</h4> 
                </div>
                <form class="form-horizontal institution-form" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                            <input type="hidden" class="form-control id" name="id">
                        <div class="form-group">
                            <label for="name">Institution Name</label>
                            <input type="text" class="form-control name" required name="name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control address" required name="address">
                        </div>
                         <div class="form-group">
                            <label for="area_id">Address</label>
                            <br>
                            <select class="form-control area_id" id="select2" required name="area_id">
                                @foreach($areas as $area)
                                    <option value="{{ $area->id}}">{{ $area->name}}</option>
                                @endforeach

                            </select>
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




    <div class="modal fade" id="AreaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Settings</h4> 
                </div>
                <form class="form-horizontal area-form" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                            <input type="hidden" class="form-control id" name="id">
                        <div class="form-group">
                            <label for="name">Area Name</label>
                            <input type="text" class="form-control name" required name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control description" required name="description">
                        </div>
                         <div class="form-group">
                            <label for="assigned_employee">Address</label>
                            <br>
                            <select class="form-control assigned_employee" id="select2" required name="assigned_employee">
                                @foreach($areas as $area)
                                    <option value="{{ $area->id}}">{{ $area->name}}</option>
                                @endforeach

                            </select>
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


    <div class="modal fade" id="DoctorMapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Settings</h4> 
                </div>
                <form class="form-horizontal doctormap-form" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                            <input type="hidden" class="form-control institution_id_fk" name="institution_id_fk">
                        <div class="form-group">
                            <label for="doctor_id_fk">Doctor Name</label>
                            <select class="form-control doctor_id_fk" id="select2" required name="doctor_id_fk">
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->doc_id}}">{{ $doctor->doc_name}}</option>
                                @endforeach
                            </select>
                        </div>
                       
                         <div class="form-group">
                            <label for="class_id_fk">Doctor Class</label>
                            <br>
                            <select class="form-control class_id_fk" id="select2" required name="class_id_fk">
                                @foreach($doctorclasses as $doctorclass)
                                    <option value="{{ $doctorclass->id}}">{{ $doctorclass->name}}</option>
                                @endforeach

                            </select>
                        </div>
                         <div class="form-group">
                            <label for="best_time_to_call">Best Time to Call</label>
                            <input type="text" class="form-control best_time_to_call" name="best_time_to_call">
                        </div>
                        <div class="form-group">
                            <label for="room_number">Room No.</label>
                            <input type="text" class="form-control room_number" name="room_number">
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
@stop
