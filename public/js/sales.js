$(document).ready(function(){
	function getBaseUrl(){
       var protocol=window.location.protocol;
           host = window.location.host;
           path = window.location.pathname;

           BASE_URL = protocol+"//"+host+"/";
          return BASE_URL;
	}

	var BASE_URL = getBaseUrl();
    
   
   $('#invoice').change(function(){
        $('#order').find('option').remove();
        $('#form-cash-add-ons').css({"display":"none"});
        $('#form-add-ons').find('input').remove();
      	$('#form-add-ons').find('label').remove();
	    $('#form-add-ons').find('br').remove();
        
   		var invoiceNo = $('#invoice').val();
		var token = $('#token').val();
		
		$.ajax({
			type:"POST",
			url:BASE_URL+"retriveinvoice",
			data:({_token:token,invoiceId:invoiceNo}),
			success:function(data){		
				 $("<option></option>",{value:0,text:"All Orders"}).appendTo('#order');	    
				   $.each(data,function(index,value){
		         $("<option></option>",{value:index,text:value}).appendTo('#order');
                 
				});
                               $.ajax({
								type:"POST",
								url:BASE_URL+"show-invoice",
								data:({_token:token,invoiceId:invoiceNo}),
								success:function(data){	

                                  $.each(data,function(name,value){
                                  	//console.log(index+':'+value);
                                  	   $("<input type='text'/></br>").attr('id',name).attr('name',name).attr('class','form-control').val(value).prependTo('#form-add-ons');
                                       $("<label></label>").html(name).attr('id',name).prependTo('#form-add-ons');
                                  });
                                  		 //$("<label></label>").attr('id','amountPerOrder').css({"display":"none"});
                                  		// $('#orderAmounts').css({"display":"none"});
                                  		//$("<input type='text'/>").attr('id','orderAmounts').attr('type','hidden');	
								},
								error:function(error){
									//alert(error+"error");
								}
							});


			},
			error:function(error){
				//alert(error+"error");
			}
		});
   });

      $('#order').change(function(){
        $('#form-cash-add-ons').css({"display":"none"});
      	$('#form-add-ons').find('input').remove();
      	$('#form-add-ons').find('label').remove();
	    $('#form-add-ons').find('br').remove();
   		var orderNo = $('#order').val();
		var token = $('#token').val();
		
		$.ajax({
			
			type:"POST",
			url:BASE_URL+"retriveorder",
			data:({_token:token,orderId:orderNo}),
			success:function(data){
    
            	$.each(data,function(){
                   $.each(this,function(name,value){
                   	 
                   	 $("<input type='text'/></br>").attr('id',name).attr('name',name).attr('class','form-control').val(value).prependTo('#form-add-ons');
                     $("<label></label>").html(name).prependTo('#form-add-ons');
                   });
				});
			},
			error:function(error){
				//alert(error+"error");
			}
		});
   });
    
});