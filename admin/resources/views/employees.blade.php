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
    <!--/span-->

 </div><!--/row-->

</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
@stop
