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
                <button class="btn-success btn pull-right btn-edit-add btn-sm" style="margin-bottom:5px" 
                    data-modal-target="#DoctorModal" data-action="Add" data-title="Doctor" 
                    data-target=".doctor-form" data-url="doctors/">
                <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                <thead>
                <tr>
                    <th>Institution Name</th>
                    <th>Address</th>
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
                <button class="btn-success btn pull-right btn-edit-add btn-sm" style="margin-bottom:5px" 
                    data-modal-target="#DoctorModal" data-action="Add" data-title="Doctor" 
                    data-target=".doctor-form" data-url="doctors/">
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
                <table class="table table-striped bootstrap-datatable responsive">
                <button class="btn-success btn pull-right btn-add-details-institution btn-sm" style="margin-bottom:5px" 
                    data-action="Add" data-target='institutiondoctorsmaps' data-id='0'>
                <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
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
@stop
