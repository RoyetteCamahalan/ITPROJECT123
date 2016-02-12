$(document).ready(function () {

	$(".datatable").on("click",".btn-edit-add",function(){
        var action = $(this).attr('data-action');
        var title =$(this).attr('data-title');
        var target=$(this).attr('data-modal-target');
        $(target).find('.title').text(action+' '+title);
        var targetform=$(this).attr('data-target');
        console.log("targetform1: "+targetform);
        var url =$(this).attr('data-url');
        if(action=="Add"){
        	console.log(url+'store targetform='+targetform);
        	$(target).find(targetform).attr('action',url+'store');
        }
        else if(action=="Edit"){
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
        $(target).find('.title').text('Do you to '+msg+' this doctor?');
        console.log(targetform);
        //$('.title').text(id);
        $(target).modal('show');
    	$(target).modal({"backdrop": "static"});
    });

});