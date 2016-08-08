<html>
	<head>
		<title>Benvin Printers</title>	
    <link href="{{asset('jquery-ui/jquery-ui.css')}}"rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
		 <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
		<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/style.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/order-desc.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/shoppingCart.js')}}"></script>
         <script type="text/javascript">
           $(function(){
               $(".nav-btn").click(function(){
                  $("ul.nav-menu").slideToggle();

                 });
              $(window).resize(function(){
           if($(window).width()>600){
            //$("ul.nav").removeAttr('style');
                }
              });
           });
     </script>
	</head>
	<body>
		<div class="container-fluid">
          <!--*************CHAT AREA ********************************************-->
		    <div id="chat-box"><label id="label-chat-box">Online:Click here to get Help.^</label></div>
		    <div id="chat-area" class="container">
             <div id="chat-header">
                <div id="chat-header-logo"> <img src="{{asset('images/benvin1.jpg')}}" class="img-rounded" width="50" height="50">
                  Can We Help?
                </div>
                <div id="chat-header-txt"><button type="button" class="close">&times;</button></div>
             </div>
             <div id="chat-body">
             	<div>
                  <h4>We are Online.Chat with Us</h4>
                  <p>Please enter your name and email address to start chatting with us.</p>
             	</div>
                <div id="chat-form">
                         <form method="post" action="#">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

				<input type="text" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
					              </br>
					             
			   <input type="password" class="form-control" placeholder="PassWord" name="password"> </br>
			  <textarea cols="27" rows="2" placeholder="Message" name="description" class="form-control"></textarea></br>
			  <button type="submit" id="chat-button"class="btn btn-primary">Initiate Chat</button>
                                  
					 
                         </form>
                </div>
             </div>
             <div id="chat-footer">
                <i  class="fa fa-save fa-2x circle"></i>
             </div>
		    </div>
		      <!--*************END CHAT AREA ********************************************-->		
<div id="nav-header"class="navbar navbar-inverse navbar-fixed-top headroom" >
  <div class="container">
    <div class="navbar-header"> 
      <!-- Button for smallest screens -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a id="nav-brand" href="{{url('/')}}">Benvin Solutions Ltd</a> </div>
    <div class="navbar-collapse collapse">
      <ul  class="nav navbar-nav pull-right" >
        <li><a href="{{url('user')}}"style="color:#fff">Home</a></li>
        <li><a href="{{url('/user')}}"style="color:#fff">Products</a></li>
        <li><a href="{{url('user/cart')}}"style="color:#fff">Cart</a></li>
        <li><a href="{{url('user/vieworders')}}"style="color:#fff">Orders</a></li>
        <li><a href="{{url('/invoices')}}"style="color:#fff">Invoices</a></li>
        <li><a href="{{url('contact')}}"style="color:#fff">Contact</a></li>
        <li><a href="{{url('/auth/logout')}}"style="color:#fff">Log Out</a></li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
 
<!--***************ORDER***********************-->
  <div id="order" class="row">
  	<!--<div id="well" class="well">UserName: {{Auth::user()->username}}</div>
    <div id="well" class="well">Your Email: {{Auth::user()->email}}</div>
    <div id="well" class="well">Location: {{Auth::user()->location}}</div>
    <div id="well" class="well">Order Summary: Total- KSH <label id="summ-total" style="font-weight:normal;font-size:90%"></label></div>-->

  </div>  
      <!--StartForm -->
      <div id="order-summary"></div>
 <div id="order-form"class="row">     
 	<h3>Make Order</h3>
     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    <form id="order-form-style" method="POST" action="{{ url('/user/makeorder') }}">
			<input type="hidden" id="token"name="_token" value="{{ csrf_token() }}">
		    <!--<input type="text" class="form-control" name="lpo" value="{{ old('lpo') }}" placeholder="LPO No">
		    </br>
			<input type="text" class="form-control" name="client" value="{{Auth::user()->username}}"></br>
			<input type="text" class="form-control" name="email" value="{{Auth::user()->email}}"></br>-->

    <input placeholder="Order Deadline" type="text" id="endDatePicker" class="form-control" name="deadline" value="{{ old('endDate') }}"></br>
    <label class="control-label">Order Description</label>
		<textarea class="form-control" cols="50" id="desc"rows="10" name="desc"placeholder="Order Description"></textarea></br>
     <label class="control-label">Total Amount</label>
		 <input type="text" class="form-control" name="amount" id="ttmount" placeholder="Total Amount" value="{{$total}}" ></br>
		 <button type="submit" class="btn btn-primary">Make Order</button>
						
			</form>
 </div>
    <!--END FORM-->
<!--***************END ORDER***********************-->
        <div id="footer-nav" class="row">
           <div id="footer-nav-menu" class="col-sm-9">
              <div id="customer-service" class="col-sm-3">
	               <h3>Customer Service</h3>
					<ul class="list1">
						  <li><a href="#">Help & Contact</a></li>
						  <li><a href="#">Shipping & taxes</a></li>
						  <li><a href="#">Return policy</a></li>
						  <li><a href="#">Careers</a></li>
						  <li><a href="#">Affiliates</a></li>
						  <li><a href="#">Legal Notice</a></li>
					</ul>
              </div>
              <div id="information" class="col-sm-3">
                   <h3>Information</h3>
					<ul class="list1">
						  <li><a href="#">New products</a></li>
						  <li><a href="#">Top sellers</a></li>
						  <li><a href="#">Specials products</a></li>
						  <li><a href="#">Manufacurers</a></li>
						  <li><a href="#">Suppliers</a></li>
						  <li><a href="#">Our Stores</a></li>
					</ul>
              </div>
             <div id="account"class="col-sm-3">
                  	<h3>My Account</h3>
					<ul class="list1">
						  <li><a href="{{url('/auth/login')}}">My account</a></li>
						  <li><a href="{{url('/auth/login')}}">Sign In</a></li>
						  <li><a href="{{url('/auth/register')}}">Sign UP</a></li>
					
						  
					</ul>
             </div>
            <div id="follow" class="col-sm-3">
               	<h3>Follow Us</h3>
					<ul class="social">
							<li><a href="http://www.twitter.com"> <i class="tw"> </i> </a></li>
							<li><a href="http://www.facebook.com"><i class="fb"> </i> </a></li>
					
				    </ul>
            </div>
           </div>
           <div id="footer-nav-newsletter" class="col-sm-3">
              <h6>SUBSCRIBE TO OUR NEWS LETTER</h6>
                    <form method="post" action="#">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

					            <div class="form-group">
					          
					              <div>
					                <input type="text" class="email-input" placeholder="Your Email Address" name="email" value="{{ old('search') }}">
                                     <button type="submit" class="btn btn-primary">GO</button>
					              </div>
					           
					            </div>

                       </form>
                    <h4 style="color:#fff">CALL </br>BENVIN SOLUTIONS.
                           <label style="font-size:170%;">+254713133969</label>
                    </h4>
                 

           </div>
        </div>
        <div id="footer-bottom" class="row">
            <p class="link">&copy; All rights reserved | Design by&nbsp; <a href="http://bitcratesolutions.com/">BitCrate Solutions</a></p>
        </div>
		 </div>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.js')}}"></script>
<script type="text/javascript">
$(function(){
     $( "#endDatePicker" ).datepicker({
          inline: true
     });
    
});

</script>
	</body>
</html>
