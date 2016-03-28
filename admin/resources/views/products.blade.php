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
            <li class="active"><a href="#productlist">Products</a></li>
            <li><a href="#materiallist">Materials</a></li>
        </ul>
        <br>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active" id="productlist">
                 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-products">
                    <button class="btn-success btn pull-right add-product btn-sm" style="margin-bottom:5px" >
                    <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>     
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name}}</td>
                            <td class="center">{{ $product->created_at}}</td>
                            <td class="center" style="text-align: center;">
                            <a class="btn btn-info btn-xs edit-product" href="#" data-id="{{ $product->id}}" data-name="{{ $product->name}}">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                            </a>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="materiallist">
                 <table class="table table-striped table-bordered bootstrap-datatable responsive table-products">
                    <button class="btn-success btn pull-right add-product btn-sm" style="margin-bottom:5px" >
                    <i class="glyphicon glyphicon-plus icon-white"></i> Add New</button>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>     
                    @foreach($materials as $material)
                        <tr>
                            <td>{{ $material->name}}</td>
                            <td class="center">{{ $material->created_at}}</td>
                            <td class="center" style="text-align: center;">
                            <a class="btn btn-info btn-xs add-edit-product" href="#"  data-action="Edit" data-id="{{ $material->id}}">
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
       <!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->   
<div class="modal fade" id="ProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title">Settings</h4> 
            </div>
            <form class="form-horizontal product-form" role="form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                        <input type="hidden" class="form-control id" name="id">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control name" required name="name">
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
