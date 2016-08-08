$(document).ready(function(){

function getBaseUrl(){
             var protocol = window.location.protocol;
                 host =  window.location.host;
                 pathname = window.location.pathname;

             var BASE_URL = protocol + "//" +host + "/";
          return BASE_URL;
         }
      var BASE_URL = getBaseUrl();




    $('#button-cart').mouseover(function(){
         $('#pop-up-cart-items').show();
         $('#pop-up-cart-items').load(BASE_URL + "user/minimize/cart  #cart");
         //alert($('#make-order-amount').load(BASE_URL + "user/cart  #label2-checkout"));
    });
    $('#button-cart').mouseleave(function(){
        $('#pop-up-cart-items').hide();
    });
    //$('#order-summary').hide();

    $('#summ-total').load(BASE_URL + "user/cart  #label2-checkout");
    //$('#ttamount').load(BASE_URL + "user/cart  #label2-checkout");
    //$('#make-order-amount').val(amount);

   

});