$(document).ready(function(){
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
});