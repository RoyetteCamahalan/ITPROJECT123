$(document).ready(function () {

    $("#select2").select2();

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
        var id =$(this).attr('data-id');
        /*$.ajax({
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

        });*/
        console.log("ipakita");
    });
$(".tab-page").on("click",function(){
        $('.section-details').removeClass("visible").addClass("hidden");
        console.log("itago");
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


$('.add-institution').on('click',function(){
        var target='#InstitutionModal';
        $(target).find('.institution-form').attr('action','institutions/store');
        $(target).find('.title').text('Add Institution');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
    });

$('.add-area').on('click',function(){
        var target='#AreaModal';
        $(target).find('.area-form').attr('action','area/store');
        $(target).find('.title').text('Add Area');
        $(target).modal('show');
        $(target).modal({"backdrop": "static"});
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
});