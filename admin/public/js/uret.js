$(document).ready(function () {

    $("#select2").select2({});

    $('.add-doctor').on('click',function(){
        var target='#DoctorModal';
        $(target).find('.doctor-form').attr('action','doctors/store');
        $(target).find('.title').text('Add Doctor');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });
	$(".datatable").on("click",".view-edit-doctor",function(){
        var action = $(this).attr('data-action');
        var title =$(this).attr('data-title');
        var text = $(this).text();
        var target=$(this).attr('data-modal-target');
        $(target).find('.title').text(action+' '+title);
        var targetform=$(this).attr('data-target');
        console.log("targetform1: "+targetform);
        var url =$(this).attr('data-url');
        if(action=="Edit"){
        	var id =$(this).attr('data-id');
        	$(targetform).find("button[name='btn-save']").removeAttr('class','hidden');
        	$(targetform).find("button[name='btn-save']").attr('class','btn btn-success btn-sm');
        	$.ajax({
                url : url+id,
                type : 'get',
                dataType : 'json'
            }).done(function (data){
            	$(target).find(targetform).attr('action',url+'update').attr('method','POST');
            	console.log("action: "+url+id);
            	console.log(data);
            	$.each(data,function(i,row){
            		$(targetform).find("input[name='"+i+"']").val(row);
            		$(targetform).find("select[name='"+i+"']").removeAttr("selected")
            			.children("option[value='"+row+"']").attr("selected", "selected");
            	});

            });
        }
        else if(action=="View"){
        	var id =$(this).attr('data-id');

            //$(targetform).find(".btn-save").attr('class','hidden');
            $(targetform).find("button[name='btn-save']").attr('class','hidden');
        	$.ajax({
                url : url+id,
                type : 'get',
                dataType : 'json'
            }).done(function (data){
            	$.each(data,function(i,row){
            		$(targetform).find("input[name='"+i+"']").val(row).attr('disabled','disabled');
            		$(targetform).find("select[name='"+i+"']").removeAttr("selected").attr('disabled','disabled')
            			.children("option[value='"+row+"']").attr("selected", "selected");
            	});
            });
        }
        //$('.title').text(id);
        $(target).modal('show');
    	$(target).modal({"backdrop": "static"});
    });


$(".btn-accept-doctor").on("click",function(){
        var action = $(this).attr('data-action');
        var target=$(this).attr('data-modal-target');
        var id =$(this).attr('data-id');
        var targetform=$(this).attr('data-target');
        var value=$(this).attr('data-value');
        var msg=$(this).attr('data-action');
        $(targetform).find("input[name='doc_id']").val(id);
        $(targetform).find("input[name='is_active']").val(value);
        $(target).find('.title').text('Do you want to '+msg+' this doctor?');
        console.log(targetform);
        //$('.title').text(id);
        $(target).modal('show');
    	$(target).modal({"backdrop": "static"});
    });
$(".institution-name").on("click",function(){
        var $this=$(this);
        var title=$this.attr("data-title");
        var id=$this.attr('data-id');
        $('.add-doctormap').attr('data-id',id);
        $('.title-details').text('Doctor list for '+title);
        $('.section-details').removeClass("hidden").addClass("visible");
        $('html, body').animate({
              scrollTop: $(".section-details").offset().top
        }, 1000);
        $("#doctormapdetails-body").empty();
        $.ajax({
            url : 'institutions/showmap/'+id,
            type : 'get',
            dataType : 'text'
        }).done(function (data){
                console.log(data);
                $("#list-doctors tbody").append(data);
        });
    });
$(".tab-page").on("click",function(){
        $('.section-details').removeClass("visible").addClass("hidden");
    });


$(".btn-add-details-institution").on("click",function(){
        var target=$(this).attr('data-target');
        console.log(target);
        if(target=='institutiondoctorsmaps'){
            var id=$(this).attr('data-id');
            if(id>0){
                $('#AddDoctorMap').modal('show');
            }
        }
        
        console.log("itago");
    });
   /* $('.doc_name').autocomplete({
        minLength:1,  
        source: source,
                            
        select: function(event, ui) {
                event.preventDefault();
                $(".doc_name").val(ui.item.label);
                $('.tags_id').text(mapping[ui.item.value]);
        },
        focus: function(event, ui) {
            event.preventDefault();
            $(".doc_name").val(ui.item.label);
        }
            //autoFocus:true
    });*/


$(".add-product").on("click",function(){
        $('#ProductModal').find('.title').text('Add Product');
        $('#ProductModal').find('.product-form').attr('action','products/store');
        $('#ProductModal').modal('show');
        $('#ProductModal').modal({"backdrop": "static"});
    });
$(".datatable").on("click",".edit-product",function(){
        var $this=$(this);
        var productname=$this.attr('data-name');
        var id=$this.attr('data-id');
        $('#ProductModal').find('.title').text('Edit Product');
        $('#ProductModal').find('.product-form').attr('action','products/update');
        $('#ProductModal').find('.name').val(productname);
        $('#ProductModal').find('.id').val(id);
        $('#ProductModal').modal('show');
        $('#ProductModal').modal({"backdrop": "static"});
    });

$('.add-institution').on('click',function(){
        var target='#InstitutionModal';
        $(target).find('.institution-form').attr('action','institutions/store');
        $(target).find('.title').text('Add Institution');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });

$(".datatable").on("click",".btn-edit-institution",function(){
        var $this=$(this);
        var institution_name=$this.attr('data-name');
        var id=$this.attr('data-id');
        var address=$this.attr('data-address');
        var area=$this.attr('data-area');
        $('#InstitutionModal').find('.title').text('Edit Institution');
        $('#InstitutionModal').find('.institution-form').attr('action','institutions/update');
        $('#InstitutionModal').find('.name').val(institution_name);
        $('#InstitutionModal').find('.id').val(id);
        $('#InstitutionModal').find('.address').val(address);
        $('#InstitutionModal').find('.area').val(area);
        $('#InstitutionModal').modal('show');
        $('#InstitutionModal').modal({"backdrop": "static"});
    });

$('.add-area').on('click',function(){
        var target='#AreaModal';
        $(target).find('.area-form').attr('action','area/store');
        $(target).find('.title').text('Add Area');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });


$(".datatable").on("click",".btn-edit-area",function(){
        var $this=$(this);
        var area_name=$this.attr('data-name');
        var id=$this.attr('data-id');
        var description=$this.attr('data-description');
        var employee=$this.attr('data-employee');
        $('#AreaModal').find('.title').text('Edit Area');
        $('#AreaModal').find('.area-form').attr('action','area/update');
        $('#AreaModal').find('.name').val(institution_name);
        $('#AreaModal').find('.id').val(id);
        $('#AreaModal').find('.address').val(description);
        $('#AreaModal').find('.area').val(employee);
        $('#AreaModal').modal('show');
        $('#AreaModal').modal({"backdrop": "static"});
    });

$('.add-doctormap').on('click',function(){
        var target='#DoctorMapModal';
        var id=$(this).attr('data-id');
        $(target).find('.doctormap-form').attr('action','institutions/storemap');
        $('.doctormap-form').find('.institution_id_fk').val(id);
        $(target).find('.title').text('Add Doctor');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });

$('.add-employee').on('click',function(){
        var target='#UserModal';
        var id=$(this).attr('data-id');
        $(target).find('.user-form').attr('action','employees/store');
        $(target).find('.title').text('Add Employee');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });

$('.btn-add-replenishment').on('click',function(){
        var target='#ReplineshmentModal';
        $(target).find('.replenishment-form').attr('action','material_inventory/store');
        $(target).find('.title').text('Add Inventory');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });
$('.btn-edit-replenishment').on('click',function(){
        var target='#ReplineshmentModal';
        var id=$(this).attr('data-id');
        var pid=$(this).attr('data-pid');
        var mid=$(this).attr('data-mid');
        var count=$(this).attr('data-count');
        var targetform='.replenishment-form';
        $(target).find(targetform).attr('action','material_inventory/update');
        $(targetform).find("input[name='id']").val(id);
        $("#select2").select2().select2('val',pid);
        $(targetform).find("select[name='material_id_fk']").removeAttr("selected")
            .children("option[value='"+mid+"']").attr("selected", "selected");
        $(targetform).find("input[name='material_count']").val(count);
        $(target).find('.title').text('Add Inventory');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });

$(".view-plan-details").on("click",function(){
        var $this=$(this);
        var id=$this.attr('data-id');
        var year=$this.attr('data-year');
        var cycle=$this.attr('data-cycle');
        $('.title-details').text('Coverage Plan for year '+year+' cycle '+cycle);
        $('.section-plan-details').removeClass("hidden").addClass("visible");
        $("#plan-details-body").empty();
        $.ajax({
            url : 'plans/'+id,
            type : 'get',
            dataType : 'text'
        }).done(function (data){
                $("#list-plan-details tbody").append(data);
        });

        $('html, body').animate({
              scrollTop: $(".section-plan-details").offset().top
        }, 1000);
        /*$.ajax({
            url : 'institutions/showmap/'+id,
            type : 'get',
            dataType : 'text'
        }).done(function (data){
                console.log(data);
                $("#list-doctors tbody").append(data);
        });*/
    });
$(".tab-page-plan").on("click",function(){
        $('.section-plan-details').removeClass("visible").addClass("hidden");
    });
$(".btn-accept-decline-plan").on("click",function(){
        var action = $(this).attr('data-action');
        var target='#Plan-Modal-Accept';
        var id =$(this).attr('data-id');
        var targetform='.plan-form';
        var value=$(this).attr('data-value');
        $(targetform).find("input[name='id']").val(id);
        $(targetform).find("input[name='status']").val(value);
        $(target).find('.title').text('Do you want to '+action+' this plan?');
        //$('.title').text(id);
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });

$('#report-list-user').select2()
        .on("change", function(e) {
            $("#report-details-body").empty();
            $.ajax({
                url : 'reports/'+$('#report-list-user').val(),
                type : 'get',
                dataType : 'text'
            }).done(function (data){
                    $("#list-reports tbody").append(data);
            });
        });
$('#report-list-user').val($('#report-list-user option:first-child').val()).trigger('change');
});

$("#btn_submit_form_save_user").click(function (){
    var form = $("#form_add_user");
    var data = {
        fname: formfinder(form, 'fname', 'input'),
        mname: formfinder(form, 'mname', 'input'),
        lname: formfinder(form, 'lname', 'input'),
        position: formfinder(form, 'position', 'select'),
        email: formfinder(form, 'email', 'input'),
        username: formfinder(form, 'username', 'input'),
        password: formfinder(form, 'password', 'input'),
        password_confirmation: formfinder(form, 'password_confirmation', 'input'),
        _token: formfinder(form, '_token', 'input')
    };
    var $this = $(this);
    $this.attr("disabled", "disabled").addClass("disabled").html("Please wait...");

    $.ajax({
        url: 'employees/store',
        type: 'post',
        dataType: 'json',    
        data: {
            fname: formfinder(form, 'fname', 'input'),
            mname: formfinder(form, 'mname', 'input'),
            lname: formfinder(form, 'lname', 'input'),
            position: formfinder(form, 'position', 'select'),
            email: formfinder(form, 'email', 'input'),
            username: formfinder(form, 'username', 'input'),
            password: formfinder(form, 'password', 'input'),
            password_confirmation: formfinder(form, 'password_confirmation', 'input'),
            _token: formfinder(form, '_token', 'input')
        }
    }).done(function(data){
        console.log(data);
        $this.removeClass("disabled").removeAttr("disabled").html("Save");

        _clear_form_errors(form);

        $.each(data.errors, function (i, row){
            _error($('input[name="'+i+'"]'), row[0]);
        });

            // if successful, hide the modal
            if( data.status_code == "200" ){
                $("#UserModal").modal('hide');
                showAlert("Employee", "Employee added successfully.", 'success', 'notify');
                location.reload();
            }

        }).fail(function (){
            $this.removeClass("disabled").removeAttr("disabled").html("Save");
        });
    });