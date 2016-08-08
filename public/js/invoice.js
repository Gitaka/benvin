$(document).ready(function(){
   function getBaseUrl(){
		var protocol = window.location.protocol;
            host =  window.location.host;
		    pathname = window.location.pathname;

		 var BASE_URL = protocol + "//" +host + "/";
		return BASE_URL;
	}
	
   
  var BASE_URL = getBaseUrl();
  
  /*$('#orderno').click(function(){

		var orderNo = $('#orderno').val();
		var token = $('#token').val();
        //alert(orderNo);
		$.ajax({
			
			type:"POST",
			url:BASE_URL+"retriveorder",
			//data:({_token:$(this).data('token'),orderId:orderNo}),
			data:({_token:token,orderId:orderNo}),
			success:function(data){
				$('#client').val(data.client);//orderNO;
			},
			error:function(error){
				//alert(error);
			}
		});

  });*/
	$('#orderno').change(function(){

		var orderNo = $('#orderno').val();
		var token = $('#token').val();
		
		//alert(orderNo);
		$.ajax({
			
			type:"POST",
			url:BASE_URL+"getuserorder",
			data:({_token:token,orderId:orderNo}),
			success:function(data){
				$('#client').html(data.client);
				console.log(data);
			},
			error:function(error){
				//alert(error);
			}
		});
	
	});
});