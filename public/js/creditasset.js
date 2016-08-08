$(document).ready(function(){
	   function getBaseUrl(){
		var protocol = window.location.protocol;
            host =  window.location.host;
		    pathname = window.location.pathname;

		 var BASE_URL = protocol + "//" +host + "/";
		return BASE_URL;
	}
	
   
  var BASE_URL = getBaseUrl();

      $('#catrack').change(function(){
   		var trackNo = $('#catrack').val();
		var token = $('#token').val();
		
		$.ajax({
			
			type:"POST",
			url:BASE_URL+"retrivecreditasset",
			//data:({_token:$(this).data('token'),orderId:orderNo}),
			data:({_token:token,trackId:trackNo}),
			success:function(data){
				$('#camode').val(data.mode);
				$('#catype').val(data.item);
				$('#caamount').val(data.amount);
				$('#cabalance').val(data.balance);
				$('#cacode').val(data.confirmationCode);
				$('#cadesc').val(data.description);
				$('#careceiver').val(data.client);
				$('#caemail').val(data.email);
				$('#caphone').val(data.phone);
		
			},
			error:function(error){
				//alert(error+"error");
			}
		});
   });
    
});