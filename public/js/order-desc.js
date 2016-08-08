$(document).ready(function(){

function getBaseUrl(){
             var protocol = window.location.protocol;
                 host =  window.location.host;
                 pathname = window.location.pathname;

             var BASE_URL = protocol + "//" +host + "/";
          return BASE_URL;
         }
      var BASE_URL = getBaseUrl();

 $('#summ-total').load(BASE_URL + "user/cart  #label2-checkout");
 var token = $('#token').val();
       $.ajax({
            
            type:"POST",
            url:BASE_URL+"show-order-product-desc",
            data:({_token:token,}),
            success:function(data){
                /*$('#code').val(data.id);//orderNO;
                $('#items').val(data.description);
                $('#subtotal').val(data.amountCharged);*/
                $('#desc').val(data);
                //alert(data);

           },
            error:function(error){
                alert(error);
            }
        });




});