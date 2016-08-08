<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Benvin Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('panel/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="{{asset('panel/dist/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('panel/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('panel/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav id="navbar"class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <!--<img class="img-rounded"src="{{asset('images/benvin-logo.jpg')}}" width="70" height="50">-->
            <div id="nav-header"class="navbar-header">
      
                <p class="navbar-brand">Benvin Solutions</p>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                   <li>
                            <a href="{{url('/')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>
                <li>
                        <a href="{{url('/createinvoice')}}"><i class="fa fa-briefcase fa-fw"></i>Invoice</a>
                  </li>
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Debit Entries<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                          <a href="{{url('/createsalesentry')}}"><i class="fa fa-briefcase fa-fw"></i>Sale</a>
                        </li> <li class="divider"></li>
                         <li>
                          <a href="{{url('/createdebitassetentry')}}"><i class="fa fa-briefcase fa-fw"></i>Asset</a>
                        </li> <li class="divider"></li>
                         <li>
                          <a href="{{url('/createdebitliabilityentry')}}"><i class="fa fa-briefcase fa-fw"></i>Liability</a>
                        </li> <li class="divider"></li>
                         <li>
                          <a href="{{url('/createcapitalentry')}}"><i class="fa fa-briefcase fa-fw"></i>Capital</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Credit Entries<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                       <li>
                          <a href="{{url('/createpurchaseentry')}}"><i class="fa fa-briefcase fa-fw"></i>Purchase</a>
                        </li> <li class="divider"></li>
                      <li>
                          <a href="{{url('/creditassetentry')}}"><i class="fa fa-briefcase fa-fw"></i>Asset</a>
                        </li> <li class="divider"></li>
                        <li>
                          <a href="{{url('/creditliability')}}"><i class="fa fa-briefcase fa-fw"></i>Liability</a>
                        </li> <li class="divider"></li>
                        <li>
                          <a href="{{url('/creditexpenseentry')}}"><i class="fa fa-briefcase fa-fw"></i>Expense</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Account<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="{{url('/payable')}}">Payable</a>
                        </li>
                        <li class="divider"></li>
                       <li>
                            <a href="{{url('/receivable')}}">Receivable</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Statements<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                            <a href="{{url('/#')}}">BalanceSheet</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{url('/#')}}">Income Statement</a>
                                        </li>
                                        <li class="divider"></li>
                                    
                                        <li>
                                            <a href="{{url('/#')}}">Cash Flow Statement</a>
                                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-fw"></i>Settings<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="{{url('auth/logout')}}">
                                SignOut
                            </a>
                        </li>
                        <li class="divider"></li>
              
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div id="sidebar" class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                       <li>
                            <a href="{{url('/staff')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                        </li>
                          <li>
                            <a href="{{url('/clients')}}"><i class="fa fa-user fa-fw"></i>User Clients</a>
                        </li>
                       <li>
                            <a href="{{url('/staff/orders')}}"><i class="fa fa-file-excel-o fa-fw"></i>Orders</a>
                        </li>
                        <li>
                            <a href="{{url('/createproduct')}}"><i class="fa fa-barcode fa-fw"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{url('/tasks')}}"><i class="fa fa-tasks fa-fw"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="{{url('/chats')}}"><i class="fa fa-comment fa-fw"></i>Chats</a>
                        </li>
                        <li>
                            <a href="{{url('/reports')}}"><i class="fa fa-newspaper-o fa-fw"></i>Reports</a>
                        </li>
                        <li>
                            <a href="{{url('/note')}}"><i class="fa fa-pencil fa-fw"></i>Notes</a>
                        </li>
                       <li>
                            <a href="{{url('/createpost')}}"><i class="fa fa-upload fa-fw"></i>Create Post</a>
                        </li>
                         <li>
                            <a href="{{url('/posts')}}"><i class="fa fa-envelope fa-fw"></i>Blog</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Analysis</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div id="orders" class="col-sm-7">
                  <h2>Latest Orders</h2>
                      <div id="order-header" class="col-sm-12">
                        <div id="order-id" class="col-sm-2">
                          OrderId
                        </div>
                        <div id="order-item" class="col-sm-5">
                          Item
                        </div>
                        <div id="order-status" class="col-sm-2">
                           Status
                        </div>
                          <div id="order-status" class="col-sm-3">
                          Deadline
                        </div>
                      </div>
                      @foreach($orders as $order)
                      <div id="order-details"class="col-sm-12">
                        <div id="order-id" class="col-sm-2">
                           
                           <a href="{{url('view/order')}}/{{$order->id}}">{{$order->orderNo}}</a>
                        </div>
                        <div id="order-item" class="col-sm-5">
                           {{$order->description}}

                        </div>
                        <div id="order-status" class="col-sm-2">
                           
                          <dutton class="btn btn-info btn-sm">{{$order->status}}</button>
                        </div>
                          <div id="order-status" class="col-sm-3">
                           
                           <dutton class="btn btn-danger btn-sm">{{$order->deliveryDeadline}}</button>
                        </div>
                      </div>
                      @endforeach
                 <?php echo $orders->render(); ?>
                </div>
                <div id="products" class="col-sm-4">
                  <h2>Recently Added Products</h2>
                   @foreach($products as $product)
                   <div id="product-details" class="col-sm-12">
                       <div id="product-img" class="col-sm-3">
                          <img class="img-rounded"src="{{asset($product->productImg)}}" width="70" height="50">
                       </div>
                       <div id="product-name"class="col-sm-6">
                         {{$product->name}}
                         <p>{{$product->description}}</p>
                       </div>
                       <div id="product-price" class="col-sm-3">
                            <dutton class="btn btn-warning btn-sm">KSH{{$product->price}}</button>
                       </div>
                   </div>
                    
                    @endforeach
                </div>
            </div>
            <div id="profile-info" class="row">
              <div id="profile" class="col-sm-6">
                 <div id="profile-header">
                   Profile Information
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                   <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Edit Profile</button>

                 </div>
                 @foreach($user as $user)
                 <label id="label-details">Name: </label>{{$user->name}}</br>
                 <label id="label-details">Email: </label>{{$user->email}}</br>
                <label id="label-details">Username: </label>{{$user->username}}</br>
                 
                 @endforeach
              </div>
              <div id="createUser" class="col-sm-5">
                <div id="user-header">
                 Create User / Staff
                </div>
                <div id="staff-form">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/createstaff') }}">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">

    
                      <input type="text" placeholder="Firstname"class="form-control" name="firstname" value="{{ old('firstname')}}"></br>
                      <input type="text" placeholder="Lastname"class="form-control" name="lastname" value="{{ old('lastname') }}"></br>
                      <input type="email" placeholder="Email"class="form-control" name="email" value="{{ old('email') }}"></br>
                      <input type="text" placeholder="Phone Number"class="form-control" name="phoneNo" value="{{ old('phoneNo') }}"></br>
                      <input type="password" placeholder="Password"class="form-control" name="password"></br>
                      <input type="text" placeholder="Location"class="form-control" name="location" value="{{ old('location') }}"></br>
                      <input type="text" placeholder="Username"class="form-control" name="username" value="{{ old('username') }}"></br>
                      <select class="form-control" name="accesslevel" placeholder="Department">
                                         <option value="1">Junior Staff</option>
                                         <option value="2">Manager</option>
                                         <option value="3">Director</option>
                                         <option value="4">Accountant</option>
                      </select></br>

                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-success">
                        Register Staff/User
                      </button>
                    </div>
                  </div>
          </form>
                 </div>
              </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

<!--***************DATA TOGGLE - SIGN UP***********************-->
    
          <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                
                       <button id="register"class="btn btn-info">Edit Profile Infomation</button>
              </h4>
            </div>
            <div class="modal-body">

               <div id="modal-register">
                              <form method="post" action="{{ url('/auth/register') }}">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                    
                        <div id="modal-form">
                        <input type="text" placeholder="First Name"class="form-control" name="firstname" value="{{ old('firstname') }}"></br>
                        <input type="text" placeholder="Last Name"class="form-control" name="lastname" value="{{ old('lastname') }}"></br>
                        <input type="text"placeholder="Phone Number" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}"></br>
                          <input type="text" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
                        </br>
                       
                          <input type="password" class="form-control" placeholder="PassWord" name="password">
                       </br>
                        <input type="text" placeholder="Location"class="form-control" name="location" value="{{ old('location') }}"></br>
                        <input type="text" placeholder="UserName/Organisation"class="form-control" name="username" value="{{ old('username') }}"></br>
                        <input type="hidden" value="0" name="accesslevel">
                         <button type="submit" id="cart-button"class="btn btn-primary">
                            Edit Profile</button>
                        </div>
                         

                        
                      </div>

                         </form>
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - SIGN UP***********************-->
</body>

</html>

