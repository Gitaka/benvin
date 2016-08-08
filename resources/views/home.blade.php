<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"    content="width=device-width, initial-scale=1.0">
<meta name="description" content="Retro - Free Consulting Responsive Website Template">
<meta name="author" content="webThemez.com">
<title>Benvin Solutions Ltd</title>
<link rel="favicon" href="assets/images/favicon.png">
<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="pality/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="pality/assets/css/font-awesome.css">
<!-- Custom styles for our template -->
<link rel="stylesheet" href="pality/assets/css/bootstrap-theme.css" media="screen" >
<link rel="stylesheet" type="text/css" href="pality/assets/css/da-slider.css" />
<link rel="stylesheet" href="pality/assets/css/style.css">

</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
  <div class="container">
    <div class="navbar-header"> 
      <!-- Button for smallest screens -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="{{url('/')}}">Benvin Solutions Ltd</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav pull-right">
        <li class="active"><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('about')}}">About</a></li>
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

<!-- Header -->
<header id="head">
  <div class="container">
    <div class="banner-content">
      <div id="da-slider" class="da-slider">
        <div class="da-slide">
          <h2>Benvin Solutions Limited</h2>
          <p>Your Image, My Business</p>
          <div class="da-img"></div>
        </div>
        <div class="da-slide">
          <h2>Benvin Solutions Limited</h2>
          <p>Your Image, My Business</p>
          <div class="da-img"></div>
        </div>
        <div class="da-slide">
          <h2>Benvin Solutions Limited</h2>
          <p>Your Image, My Business</p>
          <div class="da-img"></div>
        </div>
        <div class="da-slide">
          <h2>Benvin Solutions Limited</h2>
          <p>Your Image, My Business</p>
          <div class="da-img"></div>
        </div>
        <nav class="da-arrows"> <span class="da-arrows-prev"></span> <span class="da-arrows-next"></span> </nav>
      </div>
    </div>
  </div>
</header>
<!-- /Header --> 
<!-- Highlights - jumbotron -->
<div class="jumbotron sectionBox">
  <div class="container">
    <div class="row">

          <div id="featured-products" class="row">
             <div id="business-cards" class="col-sm-3">
                    <div class="h-caption">
                <h4 style="padding-left:20%;"><i class="fa fa-credit-card fa-2x circle"></i></h4>
                <h3  style="text-align:center;color:#fff">BUSINESS CARDS</h3>
              </div>
              <div class="h-body text-center">
                <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer ultricies sed elit imperdiet congue. Integer ultricies sed ligula eget tempus.</p>
                  <button type="button" class="btn btn-default">More</button>
              </div>
             </div>

             <div id="bronchures" class="col-sm-3">
                  <div class="h-caption">
                <h4 style="padding-left:20%;"><i class="fa fa-file-text fa-2x circle"></i></h4>
                <h3 style="text-align:center;color:#fff">BROCHURE</h3>
              </div>
              <div class="h-body text-center">
                <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer ultricies sed elit imperdiet congue. Integer ultricies sed ligula eget tempus.</p>
                  <button type="button" class="btn btn-default">More</button>
              </div>
             </div>
             <div id="brand-merchandise" class="col-sm-3">
                      <div class="h-caption">
                <h4 style="padding-left:20%;"><i class="fa fa-gears fa-2x circle"></i></h4>
                <h3 style="text-align:center;color:#fff">Wedding Cards</h3>
              </div>
              <div class="h-body text-center">
                <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer ultricies sed elit imperdiet congue. Integer ultricies sed ligula eget tempus.</p>
                  <button type="button" class="btn btn-default">More</button>
              </div>
             </div>
             <div id="graphic-design" class="col-sm-3">

                      <div class="h-caption">
                <h4 style="padding-left:20%;"><i class="fa fa-tablet fa-2x circle"></i></h4>
                <h3 style="text-align:center;color:#fff">GRAPHIC DESIGN</h3>
              </div>
              <div class="h-body text-center">
                <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer ultricies sed elit imperdiet congue. Integer ultricies sed ligula eget tempus.</p>
                  <button type="button" class="btn btn-default">More</button>
              </div>
             </div>
           </div>
<!--END FEATURED PRODUCTS*****************************************-->
    </div>
    <!-- /row  --> 
    
  </div>
</div>
<!-- /Highlights -->
     <div  id="fproducts" class="row"> 
      <h3 style="text-align:center;">Featured Products</h3>
       @foreach($products as $product)
       <div class="col-md-3" id="prod">
        <div >
          <img src="{{asset($product->categoryImg)}}" class="img-rounded" width="360" height="230">
            <h4>{{$product->name}}</h4>
        </div>
        <div id="prod-desc">
        
          <p>{{$product->description}}</p>
       
        </div>
      </div>
       @endforeach
     </div>
<!-- container -->

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

<!-- JavaScript libs are placed at the end of the document so the pages load faster --> 
<script src="pality/assets/js/modernizr-latest.js"></script> 
<script src="pality/assets/js/jquery-1.8.2.min.js"></script> 
<script src="pality/assets/js/bootstrap.min.js"></script> 
<script src="pality/assets/js/jquery.cslider.js"></script> 
<script src="pality/assets/js/headroom.min.js"></script> 
<script src="pality/assets/js/jQuery.headroom.min.js"></script> 
<script src="pality/assets/js/custom.js"></script>
</body>
</html>