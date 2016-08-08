$(document).ready(function(){
	   function getBaseUrl(){
		var protocol = window.location.protocol;
            host =  window.location.host;
		    pathname = window.location.pathname;

		 var BASE_URL = protocol + "//" +host + "/";
		return BASE_URL;
	}
	
   
  var BASE_URL = getBaseUrl();

      $('#cltrack').change(function(){
   		var trackNo = $('#cltrack').val();
		var token = $('#token').val();
		
		$.ajax({
			
			type:"POST",
			url:BASE_URL+"retriveliability",
			//data:({_token:$(this).data('token'),orderId:orderNo}),
			data:({_token:token,trackId:trackNo}),
			success:function(data){
				$('#clprincipal').val(data.amount);
				$('#clintrest').val(data.intrest);
				$('#clinstallment').val(data.perInstallment);
				$('#clbalance').val(data.balance);
				$('#cldesc').val(data.description);
				$('#clcreditor').val(data.creditor);
				$('#clemail').val(data.email);
				$('#clphone').val(data.phone);
             
			},
			error:function(error){
				//alert(error+"error");
			}
		});
   });
    
});