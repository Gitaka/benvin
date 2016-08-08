<html>
	<head>
		<title>Benvin Printers</title>	
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{asset('css/minicart.css')}}">
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
			<div id="header" class="row">
				<div id="title" class="col-sm-9">
                      <h5>GET AN EXTRA 33% OFF ON ORDERS ABOVE KSH 10,000</h5>
				</div>
				<div id="login" class="col-sm-3">
                     <h5><a href="#">CONTACT</a> | <a href="{{url('/auth/logout')}}">LOGOUT</a></h5>
				</div>
			</div>
			<div id="nav-logo" class="row">
               <div id="logo" class="col-sm-5">
                   <a href="{{url('/')}}"><img src="{{asset('images/benvin1.jpg')}}"></a>
               </div>
               <div id="search" class="col-sm-7">
                  <div class="col-sm-6">
                             <form method="post" action="#">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

					            <div class="form-group">
					          
					              <div class="col-md-8">
					                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ old('search') }}">
                                    
					              </div>
					              <div class="col-md-4">
					                <button type="submit" id="cart-button"class="btn btn-default">
					                	<img src="{{asset('images/search.png')}}"></button>

					              </div>
					            </div>

                         </form>
                  </div>
                  <div id="contact"class="col-sm-6">
                       <div class="col-sm-3">
			               	<button type="submit" id="button-cart"class="btn btn-default" >
							 <a href="{{url('user/cart')}}"><img src="{{asset('images/cart.jpg')}}">
							 <span id="cart_numItems"class="badge">{{$cartitems}}</span></a>
							 	
							</button>
                       </div>
                       <div id="create-acc"class="col-sm-6">
                       	 <label id="contact-style"><a href="{{url('auth/register')}}">EDIT ACCOUNT</a></label>
                       </div>
                  </div>
               </div>
			</div>
			<div id="pop-up-cart-items"></div>
			<div id="nav-menu" class="row">
			<small style="padding-left:4%">Logged In As: </small><label style="font-size:120%;color:#187BBD">{{Auth::user()->username}}</label>
                 <div id="menu" class="col-sm-12">
                 	 <span class="nav-btn"></span>
                     <ul class='nav-menu'>
                         <li><a href="{{url('/')}}">Home</a></li>
                          <li><a href="#">About</a></li>
                         <li><a href="{{url('/user')}}">Products</a></li>
                         <li><a href="{{url('user/cart')}}">View Cart</a></li>
                         <li><a href="#">News</a></li>
                         <li><a href="#">Contact</a></li>
                     </ul>

                 </div>
			</div>
@if(empty($products))
<div class="alert alert-danger">
  <h2>Your Cart Is Empty.</h2>.
</div>
<p>Click here to View Products.<a href="{{url('/user')}}">Products</a></p>
@endif
		<div id="cart" class="row">
	    <!--<div id="item" class="col-sm-12">
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
	             </div>-->
		@foreach($products as $product)
			    <div id="cart-items" class="col-sm-12">
			 
			    	<h5></h5>
			    	<div id="cart-items-img"class="col-sm-2">
                      <img class="img-rounded"src="{{asset($product->productImg)}}" width="80" height="50">
			    	</div>
			    	<div id="cart-item-desc"class="col-sm-5">
			  
                         {{$product->name}}
                         <label><a href="{{url('user/removecartitem')}}/{{$product->id}}">[Delete]</a></label></br>
                         <p>{{$product->description}}</p>
			    	</div>
			    	<div id="cart-item-quantity"class="col-sm-2">
			    	
                        {{$product->quantity}}</br>
                      <label><a href="{{url('user/incrementcartitem')}}/{{$product->id}}">[+]</a></label>
                      <label><a href="{{url('user/decrementcartitem')}}/{{$product->id}}">[-]</a></label>
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
	     	   	@if(empty($products))
					<div >
					  <h2>Your Cart Is Empty.</h2>.
					</div>
					 
					@endif
         <div class="col-sm-9">
            <!--<h4>COUPON</h4>
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

                </form>-->
               <label  id="label-totoal">SUB TOTAL: </label><label id="style-totoal">KSH {{$total}}</label>
            
         </div>
         <div id="subtotal-mini"class="col-sm-3">
               <button type="submit" class="btn btn-info">
                  <a href="{{url('user/makeorder')}}" style="color:#fff">MAKE ORDER</a>
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
