$(document).ready(function(){
   function getBaseUrl(){
		var protocol = window.location.protocol;
            host =  window.location.host;
		    pathname = window.location.pathname;

		 var BASE_URL = protocol + "//" +host + "/";
		return BASE_URL;
	}
	
  
  var BASE_URL = getBaseUrl();
   
   var name = $('#name').val();
       email = $('#email').val();
       desc = $('#desc').val();
   var token = $('#token').val();
	$('#chat-button').click(function(){
	
		        $.ajax({
					type:"POST",
					url:BASE_URL+"livechat",
					data:({_token:$('#token').val(),name:$('#name').val(),email:$('#email').val(),desc:$('#desc').val()}),
			     	success:function(data){	
	                   $('#name').val(" ");
	                   $('#email').val(" ");
	                   $('#desc').val(" ");
	                   	$('#chat-area').hide();
	                	$('#chat-box').show();
					},
				    error:function(error){
					  console.log(error+"error");
					}
				});
	});
});