<html>
	<head>
		<title>Benvin Printers</title>	
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
		 <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
		<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/style.js')}}"></script>
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


		<div id="cart" class="row">
			@if(empty($products))
				<div class="alert alert-danger">
				  <h2>Your Cart Is Empty.</h2>.
				</div>
				<p>Click here to View Products.<a href="{{url('/user')}}">Products</a></p>
				@endif
	    <div id="item" class="col-sm-12">
			    	<div id="item-img"class="col-sm-2">
                       
			    	</div>
			    	<div id="item-desc"class="col-sm-5">
			    		<h4>ITEM</h4>
                       
			    	</div>
			    	<div id="item-quantity"class="col-sm-2">
			    		<h4>QUANTITY</h4>
        
			    	</div>
			    
			    	<div id="item-unit-price" class="col-sm-1">
			    		<h4>UNIT PRICE</h4>
             
			       </div>
			       <div id="item-sub-total"class="col-sm-1">
			       	   <h4>SUB TOTAL</h4>
               
			       </div>
	             </div>
		@foreach($products as $product)
			    <div id="cart-items" class="col-sm-12">
			    	<div id="cart-items-img"class="col-sm-2">
                       <img class="img-rounded"src="{{asset($product->productImg)}}" width="150" height="100">
			    	</div>
			    	<div id="cart-item-desc"class="col-sm-5">
			  
                         {{$product->name}}
                         <label><a href="{{url('user/removecartitem')}}/{{$product->id}}">[Delete]</a></label></br>
                         <p>{{$product->description}}</p>
			    	</div>
			    	<div id="cart-item-quantity"class="col-sm-2">
			    	
                        {{$product->quantity}}</br>
                      <label><a href="{{url('user/incrementcartitem')}}/{{$product->id}}">[+]</a></label>
                      
                   
                      @if($product->quantity > $product->mquantity)
                         <label><a href="{{url('user/decrementcartitem')}}/{{$product->id}}">[-]</a></label>
                   
                      @endif
			    	</div>
			    
			    	<div id="cart-item-unit-price" class="col-sm-1">
			    		
                      {{$product->price}}
			       </div>
			       <div id="cart-item-sub-total"class="col-sm-1">
			       	  
                      {{$product->quantity * $product->price}}
			       </div>
	             </div>
	            <label style="display:none">{{$total += $product->quantity * $product->price}}</label>
        @endforeach
        
	     <div id="price-totals" class="col-sm-12">
         <div class="col-sm-9">
            <h4>COUPON</h4>
            <p>If you have a voucher or gift Code,apply it here.</p>
                <form method="post" action="#">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

					            <div class="form-group">
					          
					              <div class="col-md-8">
					                <input type="text" class="form-control" placeholder="Type your Voucher Here" name="voucher" value="{{ old('voucher') }}">
                                    
					              </div>
					            <div class="col-md-4">
					             <button type="submit" id="cart-button"class="btn btn-default">USE</button>

					              </div>
					            </div>

                </form>
         </div>
         <div id="subtotal"class="col-sm-3">
            <label  id="label-total">SUB TOTAL: </label><label id="style-total">KSH {{$total}}</label></br>
            <label id="label-total">VAT:</label><label id="style-total">16%</label></br>
            <label id="label-total">TOTAL: </label><label id="style-total">KSH {{$total + (($total*16)/100) }}</label>
         </div>
        </div>
        <div id="checkout" class="col-sm-12">
          <div id="checkout-total" class="col-sm-9">
              <label id="label1-checkout">TOTAL:</label> KSH <label id="label2-checkout">{{$total + (($total*16)/100) }}</label>
          </div>
          <div id="checkout-proceed" class="col-sm-3">
              <button type="submit" id="order-button"class="btn btn-primary">
                <a href="{{url('user/makeorder')}}">MAKE ORDER</a>
              </button>
          </div>
        </div>
		</div>  
 
<!--***************DATA TOGGLE - SIGN UP***********************-->
    

<!--***************END DATA TOGGLE - SIGN UP***********************-->
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
	</body>
</html>
