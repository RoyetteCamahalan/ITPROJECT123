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
        <div class="form-group">
            <label for="user_id">Employee Name :</label>
            <select class="user_id" id="report-list-user" style="width:50%;" name="user_id">
            @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->fname }} {{ $user->lname }}</option>
            @endforeach
        </select>
        </div>
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="list-reports">
                <thead>
                <tr>
                    <th>Institution Name</th>
                    <th>Doctor Name</th>
                    <th>Specialty</th>
                    <th>Class</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Time Spent</th>
                </tr>
                </thead>
                <tbody id="report-details-body">     
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
