<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{csrf_token()}}"/>
    <title>Benvin Admin Panel</title>
   <link href="{{asset('jquery-ui/jquery-ui.css')}}"rel="stylesheet">
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
        <div id="top-header" class="row">
          <div id="nav-header"class="col-sm-6">
              Benvin Solutions Ltd
          </div>
          <div class="col-sm-6">
             <div class="col-sm-7">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
             </div>
             <div id="top-header-welcome"class="col-sm-5" >Welcome Manager</div>
          </div>
        </div>
        <nav id="navbar"class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <!--<img class="img-rounded"src="{{asset('images/benvin-logo.jpg')}}" width="70" height="50">-->
              <div class="navbar-header">
      
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links ">
                   <li>
                            <a href="{{url('/manager')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>
                     <li>
                            <a href="{{url('/')}}"><i class="fa fa-file-text fa-fw"></i>Client Messages</a>
                        </li>

                       <li>
                            <a href="{{url('/chats')}}"><i class="fa fa-comment fa-fw"></i>Chats</a>
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
                    <div id="sidebar-utilities">
                      <div id="sidebar-utilities-btn">

<button type="button"id="sidebar-btn-len" class="btn" data-toggle="modal" data-target="#addTask"> Add Tasks</button>

                      </div>
                      <div id="sidebar-utilities-btn">
                   
<button type="button"id="sidebar-btn-len"  class="btn" data-toggle="modal" data-target="#addNote"> Add Notes</button>
                      </div>
                      <div id="sidebar-utilities-btn">

 
<button type="button"id="sidebar-btn-len"  class="btn" data-toggle="modal" data-target="#addReport"> Add Reports</button>
                      </div>
                      <div id="sidebar-utilities-btn">
        
<button type="button"id="sidebar-btn-len"  class="btn" data-toggle="modal" data-target="#addProduct"> Add Products</button>
                      </div>
                      <div id="sidebar-utilities-btn">
<button type="button"id="sidebar-btn-len"  class="btn" data-toggle="modal" data-target="#addResource"> Add Resource</button>
                      </div>
                   <div id="sidebar-utilities-btn">
<button type="button"id="sidebar-btn-len"  class="btn" data-toggle="modal" data-target="#addStaff"> Add Staff</button>
                      </div>      
                    </div>

                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">

                            <!-- /input-group -->
                        </li>
                       <li>
                            <a href="{{url('/manager')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('/viewStaff')}}"><i class="fa fa-user fa-fw"></i>Staff</a>
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
                            <a href="{{url('/analysis')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Analysis</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
          <div id="content" class="row">
               <div id="sidebar-left" class="col-sm-9">
              <div class="row" id="info-content">
                <h2>My Tasks</h2>
                <div id="tasks" class="col-sm-12">

                   <div id="task-head" class="col-sm-12">
                     <div id="task-head-title" class="col-sm-2">
                          Title
                       </div>
                       <div id="task-head-task"class="col-sm-5">
                          Task
                       </div>
                        <div id="task-head-start"class="col-sm-2">
                         Created at
                       </div>
                       <div id="task-head-end" class="col-sm-2">
                        Deadline
                       </div>
                       
                 
                 </div>
                @foreach($tasks as $task)
                 <div id="tasks-details" class="col-sm-12">
                     <div style="padding:0px;"id="task-title" class="col-sm-2">
                          {{$task->title}}
                       </div>
                       <div id="task-task"class="col-sm-5">
                         {{$task->task}}
                       </div>
                        <div id="task-start"class="col-sm-2">
                         <dutton class="btn btn-info btn-sm">{{$task->startDate}}</button>
                       </div>
                       <div id="task-end" class="col-sm-2">
                            <dutton class="btn btn-danger btn-sm">{{$task->endDate}}</button>
                       </div>

                       <div id="product-price" class="col-sm-1">
                            <dutton class="btn btn-danger btn-sm"><a href="{{url('/deletetask')}}/{{$task->id}}" style="color:#fff;">Delete</a></button>
                       </div>
                 
                 </div>
                @endforeach
                <?php echo $tasks->render(); ?>
            </div>
             </div>
            <div id="notes" class="row">
               <h2>My Notes</h2>
            <div id="reports" class="col-sm-12">
            <div id="reports-header" class="col-sm-12">
              <div id="reports-subject" class="col-sm-2">
                 Subject
               </div>
               <div id="reports-files" class="col-sm-6">
                  Note
               </div>
               <div id="reports-created-at" class="col-sm-3">
                CreatedAt
               </div>
             
            </div>
            @foreach($notes as $note)
            <div id="reports-details" class="col-sm-12">
               <div id="reports-subject" class="col-sm-2" style="color:#3c8dbc">
                {{$note->subject}}</br>
               </div>
               <div id="reports-files-notes" class="col-sm-6">
                  {{$note->note}}
               </div>
               <div id="reports-created" class="col-sm-3" style="padding-left:2%;">
                  {{$note->created_at}}
               </div>
               <div id="report-remove" class="col-sm-1">

                 <button class="btn btn-danger btn-sm">
                   <a href="{{url('deletenote')}}/{{$note->id}}">Delete</a>
                 </button>
               </div>
            </div>
            @endforeach
               
         </div>


            </div>
               </div>
            <div id="sidebar-right" class="col-sm-3">
                <div id="utilities">
                  <div id="utilities-btn">
     <button type="button"id="btn-len" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                Edit Profile</button>
                  </div>
                  <div id="utilities-btn"><!--<button id="btn-len"class="btn btn-warning">Debit Entry</button>-->
      <button type="button"id="btn-len" class="btn btn-warning" data-toggle="modal" data-target="#myDebit">
                Debit Entry</button>
                  </div>
                  <div id="utilities-btn">
      
    <button type="button"id="btn-len" class="btn btn-warning" data-toggle="modal" data-target="#myCredit">
               Credit Entry</button>
                  </div>
                  <div id="utilities-btn">

    <button type="button"id="btn-len" class="btn btn-warning" data-toggle="modal" data-target="#addOrder">
               Create Order</button>
                </div>
                  <div id="utilities-btn">
   
  <button type="button"id="btn-len" class="btn btn-warning" data-toggle="modal" data-target="#addInvoice">
               create Invoice</button>
                  </div>
                  <div id="utilities-btn">
   
  <button type="button"id="btn-len" class="btn btn-warning" data-toggle="modal" data-target="#contactClient">
               Contact Client</button>
                  </div>

                </div>

                <div id="livefeed">
                  <div id="livefeed-header">
                    Live Feed
                  </div>
                  <div id="livefeed-content">
                    @foreach($liveChats as $livechat)
                     <div id="live-feed-chats">
                          <div id="u-lf-c-name">{{$livechat->email}}</div>
                          <div id="u-lf-c">{{$livechat->description}}</div>

                     </div>
                    @endforeach
                  </div>
                </div>
              <div id="staff-broadcast-header">
                    Staff Public Chat
                  </div>
                <div id="staff-broadcast">
                  <label id="senderId" style="display:none">{{Auth::user()->id}}</label>
                  <div id="chat-area-broadcast"></div>
                  <div id="chat-message" class="row">
                    <div id="write-chat-message" class="col-sm-9">
                      <textarea id="txta-chat" class="form-control"></textarea>
                    </div>
                    <div id="send-chat-message" class="col-sm-2">
                      <button id="broadcast-btn-send"class="btn btn-warning btn-sm">Send</button>
                    </div>
                  </div>
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

<!--***************DATA TOGGLE - create Staff***********************-->
      <div id="addStaff" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Create Staff

              </h4>
            </div>
            <div class="modal-body">

              <div>
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/createstaff') }}">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <input type="text" placeholder="Names"class="form-control" name="name" value="{{ old('name')}}"></br>
                      <input type="email" placeholder="Email"class="form-control" name="email" value="{{ old('email') }}"></br>
                      <input type="text" placeholder="Phone Number"class="form-control" name="phoneNo" value="{{ old('phoneNo') }}"></br>
                      <input type="password" placeholder="Password"class="form-control" name="password"></br>
                      <input type="text" placeholder="Username"class="form-control" name="username" value="{{ old('username') }}"></br>
                      <select class="form-control" name="accesslevel" placeholder="Department">
                                         <option value="1">Junior Staff</option>
                                         <option value="2">Manager</option>
                                         <option value="3">Director</option>
                                         <option value="4">Accountant</option>
                      </select></br>

                  <div class="form-group">
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-warning">
                        Register Staff
                      </button>
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


<!--***************DATA TOGGLE - Contact client***********************-->
      <div id="contactClient" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Contact Client

              </h4>
            </div>
            <div class="modal-body">
                <div class="checkbox">
                  <label><input type="checkbox" value="">Send As Email</label>
                </div>
              <div>
                  <form class="form-horizontal" role="form" method="POST" action="{{url('/clientMesasages')}}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                          <input type="email" id="email" placeholder="Client Email"class="form-control" name="email" value="{{ old('email') }}"></br>
                          <textarea class="form-control" placeholder="Write Message"cols="10" rows="10" name="message"></textarea></br>

  
                          <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-warning">
                                    Send Message
                                </button>
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

<!--***************DATA TOGGLE - SIGN UP***********************-->
    
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                
                       <button id="register"class="btn " style="background:#51A8B1">Edit Profile Infomation</button>
              </h4>
            </div>
            <div class="modal-body">

               <div id="modal-register">
                              <form method="post" action="{{ url('/auth/register') }}">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                    
                        <div id="modal-form">
                        <input type="text" placeholder="Name"class="form-control" name="firstname" value="{{ old('name') }}"></br>

                        <input type="text"placeholder="Phone Number" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}"></br>
                          <input type="text" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
                        </br>
                       
                          <input type="password" class="form-control" placeholder="PassWord" name="password">
                       </br>
                        <input type="text" placeholder="Location"class="form-control" name="location" value="{{ old('location') }}"></br>
                        <input type="text" placeholder="UserName/Organisation"class="form-control" name="username" value="{{ old('username') }}"></br>
                        <input type="hidden" value="0" name="accesslevel">
                         <button type="submit" id="cart-button"class="btn btn-warning">
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
      <div id="myDebit" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Debit Entries
              </h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-6">
  <button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#debitSale">
                Sales</button>
                </div>
                <div class="col-sm-6">
  <button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#debitAsset">
                Asset</button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
   
<button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#debitCapital">
                Capital</button>
                </div>
                <div class="col-sm-6">
                
<button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#debitLiability">
                Liability</button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - Debit***********************-->
      <div id="myCredit" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Credit Entries
              </h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-6">
  <button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#creditPurchase">
                Purchase</button>
                </div>
                <div class="col-sm-6">
 <button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#creditAsset">
                Assets</button>

                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                 
 <button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#creditExpense">
                Expense</button>
                </div>
                <div class="col-sm-6">
 <button type="button"id="deb-btn" class="btn btn-warning" data-toggle="modal" data-target="#creditLiability">
                Liability</button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - Credit***********************-->
      <div id="addInvoice" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Credit Invoice
              </h4>
            </div>
            <div class="modal-body">
              <div>
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('createinvoice') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class=" control-label">order No</label>
    
                          <select id="orderno"name='orderno[]'class="form-control" placeholder="OrderNo" multiple>
                                   
                                     @foreach($orders as $order)
                                 
                                     <option value='{{$order->orderNo}}'>{{$order->orderNo}}:  {{$order->client}}-{{$order->email}}</option></br>
                                      
                                     @endforeach                  
                                   </select></br>
                          <input type="text"  placeholder="Client"class="form-control" name="name" value="{{ old('name') }}"></br>
                          <input type="email" id="email" placeholder="Email"class="form-control" name="email" value="{{ old('email') }}"></br>
                          <input type="text"  placeholder="Delivery No"class="form-control" name="deliveryNo" value="{{ old('deliveryNo') }}"></br>

  
                          <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-warning">
                                    Create Invoice
                                </button>
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
<!--***************END DATA TOGGLE - invoice***********************-->

    
      <div id="addOrder" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                       <button id="existing"class="btn btn-warning">Existing User</button>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <button id="new"class="btn btn-warning">New User</button>
              </h4>
            </div>
            <div class="modal-body">
               <div id="modal-existing">
                <h2>Create Order For Existing User</h2>
                <div>
                  <form id="order-form-style" method="POST" action="{{ url('staff/userorders') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="hidden" name="accessLevel" value="0">
                   <label class="control-label">Client</label>
                   <select id="clients"name='client'class="form-control" placeholder="Client">
                                     
                        @foreach($clients as $client)
                           <option value='{{$client->id}}'>{{$client->username}}</option></br>
                                          
                         @endforeach                  
                   </select></br>
                      <input type="text" class="form-control" name="lpo" value="{{ old('lpo') }}" placeholder="LPO No">
                      </br>
                    <textarea class="form-control" cols="50" id="desc"rows="10" name="desc"placeholder="Order Description"></textarea></br>
                    <input type="text" class="form-control" name="amountCharged" placeholder="Amount Charged"></br>
                    <!--<input type="text" class="form-control" name="amountPaid" placeholder="Amount Paid"></br>-->
                    <input placeholder="Order Deadline" type="text" id="endDatePicker" class="form-control" name="deadline" value="{{ old('endDate') }}"></br>

                  <button type="submit" class="btn btn-info">Make Order</button>
                          
                </form>
                </div>
               </div>
               <div id="modal-new">
                 <h2>Create Order For New User</h2>
                 <div>
                     <form id="order-form-style" method="POST" action="{{ url('staff/orders') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input type="hidden" name="accessLevel" value="0">
                          <input type="text" class="form-control" name="lpo" value="{{ old('lpo') }}" placeholder="LPO No">
                          </br>

                        <input type="text" placeholder="Organisation"class="form-control" name="client" value="{{old('client')}}"></br>
                        <input type="text" placeholder="Name"class="form-control" name="name" value="{{old('name')}}"></br>
                        <input type="text" placeholder="Email"class="form-control" name="email" value="{{old('email')}}"></br>
                        <input type="text" placeholder="Phone Number"class="form-control" name="phone" value="{{old('phone')}}"></br>
                        <textarea class="form-control" cols="50" id="desc"rows="10" name="desc"placeholder="Order Description"></textarea></br>
                        <input type="text" class="form-control" name="amountCharged" placeholder="Amount Charged"></br>
                        <!--<input type="text" class="form-control" name="amountPaid" placeholder="Amount Paid"></br>-->
                        <input placeholder="Order Deadline" type="text" id="newEndDatePicker" class="form-control" name="deadline" value="{{ old('endDate') }}"></br>

                      <button type="submit" class="btn btn-info">Make Order</button>
                      
                  </form>
                 </div>
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - order***********************-->
      <div id="addTask" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Create Task
              </h4>

            </div>
            <div class="modal-body">
             <div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('createtask') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="text" placeholder="Title"class="form-control" name="title" value="{{ old('title') }}"></br>
                                <textarea  class="form-control"placeholder="Task"cols="55" rows="10" name="task"></textarea></br>
                                <input placeholder="Start Date"type="text"id="taskStartDatePicker" class="form-control" name="startDate" value="{{ old('startDate') }}"></br>
                                <input placeholder="End Date" type="text" id="taskEndDatePicker" class="form-control" name="endDate" value="{{ old('endDate') }}"></br>
                                <label class="control-label">Collaborating Staff(optional)</label>
                                    <select  placeholder="Staff" name='staff' class="form-control">
                                      <option value='0'></option> 
                                     @foreach($staffs as $staff)
                                     <option value='{{$staff->id}}'>{{$staff->name}}</option>
                                     @endforeach                  
                                   </select></br>
                                   <label class="control-label">Choose Order(optional)</label>
                                 <select  placeholder="Order"name='order' class="form-control">
                                <option value='0'></option> 
                                     @foreach($taskOrders as $order)
                                     <option value='{{$order->id}}'>{{$order->orderNo}}:{{$order->client}}:{{$order->status}}</option>
                                     @endforeach                  
                                   </select></br>
                                <label class="control-label">RO Client(optional)</label>
                                 <select  placeholder="Client" name='client' class="form-control">
                                <option value='0'></option>     
                                     @foreach($clients as $client)
                                     <option value='{{$client->id}}'>{{$client->username}}</option>
                                     @endforeach                  
                                   </select></br>
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Task
                                </button>
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
<!--***************END DATA TOGGLE - Task***********************-->
      <div id="addNote" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Create Notes
              </h4>

            </div>
              <div class="modal-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('createnote') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input placeholder="Subject"type="text" class="form-control" name="subject" value="{{ old('subject') }}"></br>
                          <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                          <textarea placeholder="Write Note"class="form-control"cols="30" rows="10" name="note"></textarea></br>
                
                      <div class="form-group">
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary">
                            Create Note
                          </button>
                        </div>
                      </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - Notes***********************-->

   <div id="addReport" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Create Report
              </h4>

            </div>
              <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('uploadreports') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="text" placeholder="Subject"class="form-control" name="subject" value="{{ old('subject') }}"></br>
                             <label class="control-label">Permision</label>
                                <select class="form-control" name="permision">
                                   <option value="0">Strategic</option>
                                   <option value="1">Tactical</option>
                                   <option value="2">Operational</option>
                                  
                                </select></br>
      
                                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                                <textarea placeholder="Report Summary"class="form-control"cols="50" rows="10" name="summary"></textarea></br>
                                <label class="control-label">Upload File(MAX:1.5MB @ FILE)</label>
                                <input type="file" class="form-control" name="file[]" value="{{ old('file') }}" multiple>
                                @if($errors->has('file'))<p style="color:red">{{$errors->first('file')}}</p>@endif
                              </br>
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                  UpLoad Report
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - report***********************-->
<div id="addProduct" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                        <button id="product-btn"class="btn btn-warning">Add Product</button>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <button id="catProd-btn"class="btn btn-warning">Add Product Category</button>
                           &nbsp;&nbsp;&nbsp;
                       <button id="catf-btn"class="btn btn-warning">Add Featured Category</button>
              </h4>

            </div>
              <div class="modal-body">
               <div id="modal-product">
                <h2>Add Product</h2>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('createproduct') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="text" placeholder="Product Name"class="form-control" name="productname" value="{{ old('productname') }}"></br>
                  
                             <label class="control-label">Product Category</label>
                             <select id="category"name='category'class="form-control" placeholder="Product Category">
                                 
                                     @foreach($categories as $category)
                                 
                                     <option value='{{$category->id}}'>{{$category->name}}</option></br>
                                      
                                     @endforeach                  
                                   </select></br>

                                <textarea class="form-control" placeholder="Product-description"cols="50" rows="10" name="description"></textarea></br>
        
                                <input type="text"placeholder="Price" class="form-control" name="price" value="{{ old('price') }}"></br>
                    
                                <input type="text"placeholder="Minimum Quantity" class="form-control" name="quantity" value="{{ old('quantity') }}"></br>
                                <input type="file"placeholder="Product Image"class="form-control" name="productPhoto" value="{{ old('productPhoto') }}"></br>
                                @if($errors->has('productPhoto'))<p style="color:red">{{$errors->first('productPhoto')}}</p>@endif
                    
                                <button type="submit" class="btn btn-primary">
                                    Add Product
                                </button>
                         
                    </form>
               </div>
               <div id="modal-category">
                <h2>Add Product Category</h2>
                  
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('createcategory') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="text" placeholder="Category Name"class="form-control" name="name" value="{{ old('name') }}"></br>
                    
                                <textarea class="form-control" placeholder="Category-description"cols="50" rows="10" name="description"></textarea></br>
        
                                <input type="file"placeholder="Product Image"class="form-control" name="categoryPhoto" value="{{ old('categoryPhoto') }}"></br>
                                @if($errors->has('categoryPhoto'))<p style="color:red">{{$errors->first('categoryPhoto')}}</p>@endif
                    
                                <button type="submit" class="btn btn-primary">
                                    Add Category
                                </button>
                         
                    </form>
               </div>
               <div id="modal-featured">
                    <h2>Add Featured Product Category</h2>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('fproducts') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                             <select id="catId"name='catId'class="form-control" placeholder="Features Products" multiple>
                                 
                                     @foreach($cats as $cat)
                                 
                                     <option value='{{$cat->id}}'>{{$cat->name}}</option></br>
                                      
                                     @endforeach                  
                                   </select></br>
                    
                                <button type="submit" class="btn btn-primary">
                                    Features Product
                                </button>
                         
                    </form>
               </div>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - product***********************-->

      <div id="addResource" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Create Blog Post
              </h4>

            </div>
              <div class="modal-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('createpost') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input placeholder="Title"type="text" class="form-control" name="title" value="{{ old('title') }}"></br>
                                 <label class="control-label">Choose Audience</label>
                                <select class="form-control" name="audience">
                                   <option value="0">Public</option>
                                   <option value="1">Internal</option>
                                   
                                </select></br>
                                <textarea placeholder="Write blog Post"class="form-control"cols="50" rows="10" name="post"></textarea></br>
    
                            <label class="control-label">Upload Images</label>
                                <input type="file" class="form-control" name="imgs[]" value="{{ old('imgs') }}" multiple>
                                @if($errors->has('imgs'))<p style="color:red">{{$errors->first('imgs')}}</p>@endif</br>
                    
                        <div class="form-group">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                  Create Post
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - resource***********************-->
<div id="debitAsset" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Debit Assets
              </h4>

            </div>
              <div class="modal-body">
                                     <form class="form-horizontal" role="form" method="POST" action="{{ url('createassetentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class=" control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>
                            <label class="control-label">Item</label>
                                <select id="item"name="item" class="form-control">
                                   
                                    <option name="cash">Fixed Asset</option>
                                    <option name="check">Debt</option>
                      
                                </select></br>

                                <input type="text" placeholder="Amount"id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>
                                <input type="text"placeholder="Balance" id="balance" class="form-control" name="balance" value="{{ old('balance') }}"></br>

                            <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>
                
                                <input type="text" placeholder="Confirmation"id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>

                                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                                <textarea  placeholder="Description" class="form-control"cols="50" rows="10" id="desc" name="description"></textarea></br>

                                <input type="text"  placeholder="Client"id="clientt"class="form-control" name="client" value="{{ old('client') }}"></br>

                                <input type="text"  placeholder="Email"id="email"class="form-control" name="email" value="{{ old('email') }}"></br>


                                <input type="text"  placeholder="PhobeNo"id="phone"class="form-control" name="phone" value="{{ old('phone') }}"></br>

            
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Asset
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE debit-Assets ***********************-->
<div id="debitLiability" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Add Liability
              </h4>

            </div>
              <div class="modal-body">
                                     <form class="form-horizontal" role="form" method="POST" action="{{ url('createliabilityentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>

                                <input type="text"placeholder="Amount" id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>
        
                                <input type="text"placeholder="Intrest"class="form-control" name="intrest" value="{{ old('intrest') }}"></br>
                                <input type="text" placeholder="PerInstallment"class="form-control" name="perInstallment" value="{{ old('perInstallment') }}"></br>

                                <input type="text"placeholder="Balance" id="balance"class="form-control" name="balance" value="{{ old('balance') }}"></br>

                            <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>
                                <input type="text" id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>
                                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                                <textarea cols="50" rows="10"placeholder="Description" class="form-control" id="desc" name="description"></textarea></br>

                                <input type="text" id="startDatePicker" placeholder="StartDate"class="form-control" name="startDate" value="{{ old('startDate') }}"></br>

                                <input type="text" id="endDatePicker"placeholder="End Date" class="form-control" name="endDate" value="{{ old('endDate') }}"></br>

                                <input type="text" class="form-control"placeholder="Creditor" name="creditor" value="{{ old('creditor') }}"></br>
                                <input type="text" placeholder="Email"id="email"class="form-control" name="email" value="{{ old('email') }}"></br>
                                <input type="text" placeholder="PhoneNo"class="form-control" name="phone" value="{{ old('phone') }}"></br>

                            <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Liability
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE -debit-Liability***********************-->
      <div id="debitCapital" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                  Add Capital
              </h4>

            </div>
              <div class="modal-body">
                                     <form class="form-horizontal" role="form" method="POST" action="{{ url('createcapitalentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">
                     <label class="control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>

                                <input type="text" placeholder="Total Capital"class="form-control" name="totalCapital" value="{{ old('totalCapital') }}"></br>

                                <input type="text"  placeholder="Amount"id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>

                                <input type="text"  placeholder="Balance"id="balance"class="form-control" name="balance" value="{{ old('balance') }}"></br>

                            <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>

                                <input type="text" id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>

                                <input type="text" placeholder="Shareholder" class="form-control" name="shareHolder" value="{{ old('shareHolder') }}"></br>

                                <input type="text" placeholder="Email" id="email"class="form-control" name="email" value="{{ old('email') }}"></br>

                                <input type="text" placeholder="PhoneNo" class="form-control" name="phone" value="{{ old('phone') }}"></br>
            
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Capital
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - debit-Capital***********************-->
      <div id="debitSale" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Add Sales
              </h4>

            </div>
              <div class="modal-body">
                                     <form class="form-horizontal" role="form" method="POST" action="{{ url('createsalesentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                            <label class="control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>
                     <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>
                                <input placeholder="Confirmation Code"type="text" id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>
                            <label class="control-label">Invoice</label>
                                <select id="invoice"name='invoice' class="form-control">
                                     <option value="0">No Invoice</option>
                                     @foreach($invoices as $invoice)
                                     <option value='{{$invoice->id}}'>{{$invoice->invoiceNo}}</option>

                                     @endforeach                  
                                   </select></br>
                            <label class="control-label">Order</label>
                                 <select id="order"name='order' class="form-control">
                                  <option value="0">No Order</option>
                                   @foreach($salesOrders as $order)
                                     <option value='{{$order->id}}'>{{$order->orderNo}}-{{$order->client}}</option>
                                    @endforeach  
                                   </select></br>

                    <div id="form-add-ons"></div>
                    <label class="control-label">Amount Received</label>
                    <input type="text" placeholder="AmountPaid"id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>
                    <div id="form-cash-add-ons">
                      <input type="text" placeholder="AmountCharged"id="amount"class="form-control" name="ac" value="{{ old('amountCharged') }}"></br>
                                <textarea cols="50" class="form-control"placeholder="Description"rows="10" id="desc" name="desc"></textarea></br>

                                <input type="text" placeholder="Client"id="client"class="form-control" name="clientelle" value="{{ old('client') }}"></br>

                                <input type="text" placeholder="Email"id="email"class="form-control" name="emailAdd" value="{{ old('email') }}"></br>

                    </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Sales
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE - debit-sales***********************-->
      <div id="creditPurchase" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Add Purchase
              </h4>

            </div>
              <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('createpurchaseentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class="control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>

                            <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>
                                <input type="text" id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>
  
                            <label class="control-label">Order</label>
                                 <select id="order"name='order[]' class="form-control" multiple>
                                  <option value="0">No Order</option>
                                   @foreach($purchaseOrders as $order)
                                     <option value='{{$order->id}}'>{{$order->orderNo}}-{{$order->client}}</option>
                                    @endforeach  
                                   </select></br>
     
                          <label class="control-label">Type Of  Purchase</label>
                                <select id="type"name="type" class="form-control">
                                   
                                    <option name="costOfSales">Cost Of Sales</option>
                                    <option name="inventory">Inventory</option>
                                    <option name="maintenance">Maintenance</option>
                      
                                </select></br>

                                <input type="text"placeholder="Amount Charged" id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>
                             <input type="text"placeholder="Amount Spent" id="amount"class="form-control" name="amountspent" value="{{ old('amountspent') }}"></br>


                                <textarea cols="50"placeholder="Purchase Description"class="form-control" rows="10" id="desc" name="description"></textarea></br>
                                <input type="text"placeholder="Supplier" id="supplier"class="form-control" name="supplier" value="{{ old('supplier') }}"></br>
                                <input type="text" placeholder="Email" id="email"class="form-control" name="email" value="{{ old('email') }}"></br>
                                <input type="text" placeholder="PhoneNo"id="phone"class="form-control" name="phone" value="{{ old('phone') }}"></br> 
            
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Purchase
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE credit-purchase ***********************-->
      <div id="creditExpense" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Add Expense
              </h4>

            </div>
              <div class="modal-body">
<form class="form-horizontal" role="form" method="POST" action="{{ url('creditexpenseentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class="control-label">Payment Mode</label>

                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>

                                <input type="text"placeholder="Department" id="department"class="form-control" name="department" value="{{ old('department') }}"></br>

                                <input type="text"placeholder="Amount" id="amount"class="form-control" name="amount" value="{{ old('amount') }}"></br>

                                <input type="text"placeholder="Balance" id="balance"class="form-control" name="balance" value="{{ old('balance') }}"></br>

                            <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>
                                <input type="text" id="code"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>

                                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                                <textarea cols="50"placeholder="Description" id="desc"rows="10" id="desc"class="form-control" name="description"></textarea></br>

                                <input type="text"placeholder="Paid To" id="paidto"class="form-control" name="paidto" value="{{ old('paidto') }}"></br>

                                <input type="text"placeholder="Email" id="email"class="form-control" name="email" value="{{ old('email') }}"></br>

                                <input type="text"placeholder="PhoneNo"id="phone" class="form-control" name="phone" value="{{ old('phone') }}"></br>

                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add CreditExpense
                                </button>
                            </div>
                        </div>
                    </form>

             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE credit-expense***********************-->
      <div id="creditLiability" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Add Liability
              </h4>

            </div>
              <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('creditliability') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class="control-label">Payment Mode</label>
                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>

                            <label class="control-label">Type</label>

                                <select name="type" class="form-control">
                                   
                                    <option name="ACPayable">A/C Payable</option>
                                    <option name="institutionalLoans">Institutional Loans</option>
                      
                                </select></br>
          <label class="control-label">Confirmation Code(M-pesa,Bank Payments)</label>

                                <input type="text"id="clcode"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>
                            <label class="control-label">TrackingNo</label>
                                <select id="cltrack" name="track" class="form-control">
                                   <option value="0">None</option>
                                   @foreach($liabilities as $liability)
                                    
                                     <option value='{{$liability->id}}'>{{$liability->trackingNo}}-{{$liability->creditor}}</option>

                                   @endforeach 
                      
                                </select></br>

                                <input type="text"placeholder="Principal"  id="clprincipal"class="form-control" name="principal" value="{{ old('principal') }}"></br>

                                <input type="text"placeholder="Intrest"  id="clintrest"class="form-control" name="intrest" value="{{ old('intrest') }}"></br>

                                <input type="text"placeholder="Installment"  id="clinstallment"class="form-control" name="installment" value="{{ old('perInstallment') }}"></br>

                                <input type="text"placeholder="Balance"  id="clbalance"class="form-control" name="balance" value="{{ old('balance') }}"></br>

                  

                                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                                <textarea cols="50"placeholder="Description"  id="cldesc"rows="10" id="desc"class="form-control" name="description"></textarea></br>
                                <input type="text"placeholder="Creditor"  id="clcreditor"class="form-control" name="creditor" value="{{ old('creditor') }}"></br>

                                <input type="text"placeholder="Email"  id="clemail"class="form-control" name="email" value="{{ old('email') }}"></br>

                                <input type="text"id="clphone"placeholder="PhoneNo" class="form-control" name="phone" value="{{ old('phone') }}"></br>
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add CreditLiability
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE credit-liability ***********************-->
  <div id="creditAsset" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                 Add Asset
              </h4>

            </div>
              <div class="modal-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('creditassetentry') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="control-label">Payment Mode</label>

                                <select id="mode"name="mode" class="form-control">
                                   
                                    <option name="cash">Cash Payment</option>
                                    <option name="check">Check Payment</option>
                                    <option name="bank">Bank Payment</option>
                                    <option name="mpesa">Mpesa Payment</option>
                                </select></br>

                            <label class=" control-label">Type</label>
                                <select id="type"name="type" class="form-control">
                                   
                                    <option name="cash">Fixed Asset</option>
                                    <option name="check">Debt</option>
                      
                                </select></br>

                            <label class="control-label">TrackingNo</label>

                                <select id="catrack" name="track" class="form-control">
                                   <option value="0">None</option>
                                   @foreach($assets as $asset)
                                    
                                    <option value='{{$asset->id}}'>{{$asset->trackingNo}}-{{$asset->client}}</option>

                                   @endforeach 
                      
                                </select></br>

                                <input type="text"placeholder="Amount" id="caamount"class="form-control" name="amount" value="{{ old('amount') }}"></br>
        
                                <input type="text"placeholder="Balance" id="cabalance" class="form-control" name="balance" value="{{ old('balance') }}"></br>
            
                                <input type="text" placeholder="confirmationCode"id="cacode"class="form-control" name="confirm" value="{{ old('confirm') }}"></br>
                                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                                <textarea cols="50"placeholder="Description" rows="10" id="cadesc"class="form-control" name="description"></textarea></br>

                                <input type="text"placeholder="Receiver" id="careceiver"class="form-control" name="receiver" value="{{ old('receiver') }}"></br>

                                <input type="text"placeholder="Email" id="caemail"class="form-control" name="email" value="{{ old('email') }}"></br>
                                <input type="text"placeholder="phone" id="caphone"class="form-control" name="phone" value="{{ old('phone') }}"></br>

            
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Asset
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>
<!--***************END DATA TOGGLE credit-asset***********************-->








<script src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/creditliabilities.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sales.js')}}"></script>
<script type="text/javascript" src="{{asset('js/creditasset.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.js')}}"></script>
<script type="text/javascript">

$(function(){
  $('#modal-new').hide();
    $('#new').attr('class','btn btn-default');
  $('#existing').click(function(){
    $('#modal-new').hide();
    $('#modal-existing').show();
    $('#new').attr('class','btn btn-default');
    $('#existing').attr('class','btn btn-warning');
  });
  $('#new').click(function(){
    $('#modal-existing').hide();
    $('#modal-new').show();
    $('#existing').attr('class','btn btn-default');
    $('#new').attr('class','btn btn-warning');
  });


   $( "#endDatePicker" ).datepicker({
          inline: true
     });
   $( "#newEndDatePicker" ).datepicker({
          inline: true
     });
  $( "#taskEndDatePicker" ).datepicker({
          inline: true
     });
   $( "#taskStartDatePicker" ).datepicker({
          inline: true
     });


    $('#modal-category').hide();
    $('#catProd-btn').attr('class','btn btn-default');
    $('#modal-featured').hide();
    $('#catf-btn').attr('class','btn btn-default');

  $('#product-btn').click(function(){
    $('#modal-category').hide();
    $('#modal-featured').hide();
    $('#modal-product').show();
    $('#catProd-btn').attr('class','btn btn-default');
    $('#catf-btn').attr('class','btn btn-default');
    $('#product-btn').attr('class','btn btn-warning');
  });
  $('#catProd-btn').click(function(){
    $('#modal-product').hide();
     $('#modal-featured').hide();
    $('#modal-category').show();
    $('#product-btn').attr('class','btn btn-default');
     $('#catf-btn').attr('class','btn btn-default');
    $('#catProd-btn').attr('class','btn btn-warning');
  });
  $('#catf-btn').click(function(){
    $('#modal-product').hide();
     $('#modal-featured').show();
    $('#modal-category').hide();
    $('#product-btn').attr('class','btn btn-default');
    $('#catProd-btn').attr('class','btn btn-default');
    $('#catf-btn').attr('class','btn btn-warning');
  });


    function getBaseUrl(){
            var protocol = window.location.protocol;
                  host =  window.location.host;
                pathname = window.location.pathname;

             var BASE_URL = protocol + "//" +host + "/";
            return BASE_URL;
         }
   var BASE_URL = getBaseUrl();



    setInterval(function(){
      //refresh every 10 seconds
      $("#chat-area-broadcast").load(BASE_URL + "getbroadcast");
          },1000);
      $("#chat-area-broadcast").load(BASE_URL + "getbroadcast")
      


  $('#broadcast-btn-send').click(function(){
      $.ajaxSetup({
                    headers:{
                        'X-CSRF-Token':$('meta[name="_token"]').attr('content')
                    }
         });
       var senderId = $('#senderId').text();
       var publicMessage = $('#txta-chat').val();

       //alert(senderId+'.............'+publicMessage);
               $.ajax({
                type:"POST",
                url:BASE_URL + "storeBroadcast",
                data:({publicMessage:publicMessage,senderId:senderId,}),
                success:function(data){
                  //alert(data);
                   $("#txta-chat").val("");
                }
             });
     
   
     });



});

</script>
</body>

</html>

