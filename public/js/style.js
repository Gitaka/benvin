$(document).ready(function(){
        function getBaseUrl(){
            var protocol = window.location.protocol;
                  host =  window.location.host;
                pathname = window.location.pathname;

             var BASE_URL = protocol + "//" +host + "/";
            return BASE_URL;
         }
   var BASE_URL = getBaseUrl();


	$('#contact-style').mouseenter(function(){
	    $('#contact-style').css({"background-color":"#187BBD"});
	});
	$('#contact-style').mouseleave(function(){
	    $('#contact-style').css({"background-color":"#00405d"});
	});
	$('#cart-button').mouseenter(function(){
	    //$('#cart-button').css({"background-color":"#187BBD"});
	   
	});
	$('#contact-style').mouseleave(function(){
	    //$('#contact-style').css({"background-color":"#00405d"});
	});
    

    $('#modal-register').hide();
    $('#register').attr('class','btn btn-default');
	$('#singin').click(function(){
		$('#modal-register').hide();
		$('#modal-singin').show();
		$('#register').attr('class','btn btn-default');
		$('#singin').attr('class','btn btn-info');
	});
	$('#register').click(function(){
		$('#modal-singin').hide();
		$('#modal-register').show();
		$('#singin').attr('class','btn btn-default');
		$('#register').attr('class','btn btn-info');
	});

	$('#chat-box').click(function(){
		$('#chat-area').show();
		$('#chat-box').hide();
	});
	$('.close').click(function(){
		$('#chat-area').hide();
		$('#chat-box').show();
	});



   

    /*$('.quan-btn').on('click',function(event){
    	alert('id');
    });*/
    $('.inc').click(function(){
    	    var text = $(this).text();
            var arrayId = text.split(" ");
            var quan = arrayId[2]
            var prodId = arrayId[3];

            var quantity = $('#quantity_'+prodId).html();
             var mq = $('#mq_'+prodId).html();
            $('#quantity_'+prodId).text(++quantity);
        
           
           
    });
    $('.dec').click(function(){
    	    var text = $(this).text();
            var arrayId = text.split(" ");
            var quan = arrayId[2]
            var prodId = arrayId[3];
         
            var quantity = $('#quantity_'+prodId).html();
            var mq = $('#mq_'+prodId).html();
             

           if( quantity <= mq){
            	
            }else{
            	
            	$('#quantity_'+prodId).text(--quantity);
            }
             
    });

     $('.save').click(function(){
     	var text = $(this).text();
     	var arrayId  = text.split("_");
     	var prodId = arrayId[1];
     	var userId = arrayId[2];

     $.ajaxSetup({
      headers:{
        'X-CSRF-Token':$('meta[name="_token"]').attr('content')
      }
     });

          $.ajax({
                type:"POST",
                url:BASE_URL+"savedproducts",
                data:({prodId:prodId,userId:userId}),
                success:function(data){
                  alert(data);
                }
             });


     });    
});