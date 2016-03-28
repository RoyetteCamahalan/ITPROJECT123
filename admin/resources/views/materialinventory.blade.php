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
            <li class="active"><a href="#tabinventory">Inventory</a></li>
            <li><a href="#taballocation">Allocations</a></li>
            <li><a href="#tabreplenishment">Replenishments</a></li>
        </ul>
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active" id="tabinventory">
                 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Samples</th>
                        <th>Literatures</th>
                        <th>Promo Materials</th>
                    </tr>
                    </thead>
                    <tbody>     
                    @foreach($inventories as $inventory)
                        <tr>
                            <td class="center">{{ $inventory->name}}</td>
                            <td class="center">{{ $inventory->Sample}}</td>
                            <td class="center">{{ $inventory->Literatures}}</td>
                            <td class="center">{{ $inventory->Promomaterials}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="taballocation">
                 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Doctor Name</th>
                        <th>Material Name</th>
                        <th>Material Count</th>
                        <th>Date</th>
                        <th>Med Rep</th>
                    </tr>
                    </thead>
                    <tbody>     
                    @foreach($allocations as $allocation)
                        <tr>
                            <td class="center">{{ $allocation->productname}}</td>
                            <td class="center">{{ $allocation->doctorname}} ({{ $allocation->institutionname}})</td>
                            <td class="center">{{ $allocation->materialname}}</td>
                            <td class="center">{{ $allocation->material_count}}</td>
                            <td class="center">{{ $allocation->created_at}}</td>
                            <td class="center">{{ $allocation->userfname}} {{ $allocation->userlname}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="tabreplenishment">
                 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <button class="btn-success btn pull-right btn-sm btn-add-replenishment" style="margin-bottom:5px">
                    <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Material Name</th>
                        <th>Material Count</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>     
                    @foreach($replenishments as $replenishment)
                        <tr>
                            <td class="center">{{ $replenishment->productname}}</td>
                            <td class="center">{{ $replenishment->materialname}}</td>
                            <td class="center">{{ $replenishment->material_count}}</td>
                            <td class="center">{{ $replenishment->created_at}}</td>
                            <td class="center" style="text-align: center;">
                                <a class="btn btn-success btn-xs btn-edit-replenishment" data-id="{{ $replenishment->id}}"
                                    data-pid="{{ $replenishment->product_id_fk}}"
                                    data-mid="{{ $replenishment->material_id_fk}}"
                                    data-count="{{ $replenishment->material_count}}">
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
<div class="modal fade" id="ReplineshmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title">Settings</h4> 
            </div>
            <form class="form-horizontal replenishment-form" role="form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                        <input type="hidden" class="form-control id" name="id">
                    <div class="form-group">
                        <label for="product_id_fk">Product Name</label><br>
                        <select class="product_id_fk" id="select2" style="display:block;width:100%;" name="product_id_fk">
                            @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="material_id_fk">Material Type</label><br>
                        <select class="form-control material_id_fk" name="material_id_fk" >
                            @foreach($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="material_count">Material Count</label><br>
                        <input type="number" name="material_count" class="form-control material_count"/b>
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
