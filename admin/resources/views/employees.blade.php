@extends('maintemplate')

@section('content')
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
    <br>
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <button class="btn-success btn pull-right add-employee btn-sm" style="margin-bottom:5px">
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
                        <td>{{ $users->fname.' '.$users->lname}}</td>
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
    <!--/span-->

 </div><!--/row-->

</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->



<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Settings</h4> 
                </div>
                <form class="form-horizontal user-form" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <input type="hidden" class="form-control id" name="id">
                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Middle Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Position</label>
                            <div class="col-md-6">
                                <select class="form-control position" name="position" required>
                                    <option value="Medical Representative">Medical Representative</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
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
