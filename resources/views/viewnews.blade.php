<html>
	<head>
		<title>Benvin Printers</title>	
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		
		<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="pality/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/style.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/livechat.js')}}"></script>
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
		    <div id="chat-box"><label id="label-chat-box" style="color:white">Online:Click here to get Help.^</label></div>
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
                <input type="hidden" id="token"name="_token" value="{{ csrf_token() }}">
				<input type="text" class="form-control" placeholder="Names" name="name" id="name" value="{{ old('name') }}"></br>
				<input type="text" class="form-control" placeholder="Email Address" name="email" id="email"value="{{ old('email') }}"></br>
					             
			  <textarea cols="27" rows="2" placeholder="Message" name="description" id="desc"class="form-control"></textarea></br>
			  <button type="submit" id="chat-button"class="btn btn-primary">Initiate Chat</button>
                                  
	          </div>
             </div>
             <div id="chat-footer">
                <i  class="fa fa-save fa-2x circle"></i>
             </div>
		    </div>
		      <!--*************END CHAT AREA ********************************************-->		
<!-- Fixed navbar -->
<div id="nav-header"class="navbar navbar-inverse navbar-fixed-top headroom" >
  <div class="container">
    <div class="navbar-header"> 
      <!-- Button for smallest screens -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a id="nav-brand" href="{{url('/')}}">Benvin Solutions Ltd</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav pull-right">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="{{url('/products')}}">Products</a></li>
        <li><a href="{{url('news')}}">News</a></li>
        <li><a href="{{url('contact')}}">Contact</a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Portal <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('/auth/login')}}"><i class="fa fa-wrench"></i>  Sign In</a></li>
            <li class="divider"></li>
            <li><a href="{{url('auth/register')}}"><i class="fa fa-user"></i>  Register</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
<!-- /.navbar --> 

<div id="news" class="row">
           @foreach($post as $post)
            <div id="view-post-title">
               <h2>{{$post->title}}</h2>
            </div>
            <div id="view-posts-img">
                            <?php
                $path=$post->imgPath;
                $images=json_decode($post->imgFiles);
                $numOfImages=count($images);

              ?> 
                <ul id="photos">
                        @for($i=0;$i < $numOfImages;$i++)
                         <li id="image_{{$i}}">
                            <img  src="{{asset($post->imgPath).'/'.$images[$i]}}" class="img-rounded" with="200" height="150">
                         </li>
                       @endfor
                     </ul>
    
            </div>
            <div id="view-post-post">
             {{nl2br($post->post)}}
            </div>
            @endforeach
</div>
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
