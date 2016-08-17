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
             <div id="top-header-welcome"class="col-sm-5" >Welcome Staff</div>
          </div>
        </div>
        <nav id="navbar"class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <!--<img class="img-rounded"src="{{asset('images/benvin-logo.jpg')}}" width="70" height="50">-->
              <div class="navbar-header">
      
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links ">
                   <li>
                            <a href="{{url('/staff')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>


                       <li>
                            <a href="{{url('staff/chats')}}"><i class="fa fa-comment fa-fw"></i>Chats</a>
                        </li>
                <li>
                        <a href="{{url('staff/createinvoice')}}"><i class="fa fa-briefcase fa-fw"></i>Invoice</a>
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
<button type="button"id="sidebar-btn-len"  class="btn" data-toggle="modal" data-target="#addResource"> Add Resource</button>
                      </div>
     
                    </div>

                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">

                            <!-- /input-group -->
                        </li>
                       <li>
                            <a href="{{url('/staff')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                        </li>

                          <li>
                            <a href="{{url('/staff/clients')}}"><i class="fa fa-user fa-fw"></i>User Clients</a>
                        </li>

                       <li>
                            <a href="{{url('view/staff/orders')}}"><i class="fa fa-file-excel-o fa-fw"></i>Orders</a>
                        </li>
                        <li>
                            <a href="{{url('/viewproducts')}}"><i class="fa fa-barcode fa-fw"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{url('staff/tasks')}}"><i class="fa fa-tasks fa-fw"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="{{url('staff/chats')}}"><i class="fa fa-comment fa-fw"></i>Chats</a>
                        </li>
                        <li>
                            <a href="{{url('/staff/reports')}}"><i class="fa fa-newspaper-o fa-fw"></i>Reports</a>
                        </li>
                        <li>
                            <a href="{{url('staff/note')}}"><i class="fa fa-pencil fa-fw"></i>Notes</a>
                        </li>
                       <li>
                            <a href="{{url('staff/createpost')}}"><i class="fa fa-upload fa-fw"></i>Create Post</a>
                        </li>
                         <li>
                            <a href="{{url('staff/posts')}}"><i class="fa fa-envelope fa-fw"></i>Blog</a>
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
                            <dutton class="btn btn-danger btn-sm"><a href="{{url('/staff/deletetask')}}/{{$task->id}}" style="color:#fff;">Delete</a></button>
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
                  <form class="form-horizontal" role="form" method="POST" action="{{url('staff/clientMesasages')}}">
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
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('staff/createinvoice') }}">
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
                  <form id="order-form-style" method="POST" action="{{ url('view/staff/userorders') }}">
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
                     <form id="order-form-style" method="POST" action="{{ url('view/staff/orders') }}">
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

                <form class="form-horizontal" role="form" method="POST" action="{{ url('staff/createtask') }}">
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
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('staff/createnote') }}">
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('staff/uploadreports') }}" enctype="multipart/form-data">
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
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('staff/createpost') }}" enctype="multipart/form-data">
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
      $("#chat-area-broadcast").load(BASE_URL + "staff/getbroadcast");
          },1000);
      $("#chat-area-broadcast").load(BASE_URL + "staff/getbroadcast")
      


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
                url:BASE_URL + "staff/storeBroadcast",
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

