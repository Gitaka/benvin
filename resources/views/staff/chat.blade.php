<?php
  session_start();

  if(isset($_GET['receiverId'])){
    $_SESSION['receiverId'] = $_GET['receiverId'];
 
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{csrf_token()}}"/>
    <title>Benvin Admin Panel</title>
    <link href="{{asset('panel/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('panel/dist/css/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('panel/dist/css/sb-admin-2.css')}}" rel="stylesheet">
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
                        </li><li class="divider"></li>
                         <li>
                          <a href="{{url('/createdebitassetentry')}}"><i class="fa fa-briefcase fa-fw"></i>Asset</a>
                        </li><li class="divider"></li>
                         <li>
                          <a href="{{url('/createdebitliabilityentry')}}"><i class="fa fa-briefcase fa-fw"></i>Liability</a>
                        </li><li class="divider"></li>
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
                        </li><li class="divider"></li>
                      <li>
                          <a href="{{url('/creditassetentry')}}"><i class="fa fa-briefcase fa-fw"></i>Asset</a>
                        </li><li class="divider"></li>
                        <li>
                          <a href="{{url('/creditliability')}}"><i class="fa fa-briefcase fa-fw"></i>Liability</a>
                        </li><li class="divider"></li>
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
          <div id="chat" class="row">
            <div id="private-chat" class="col-sm-6">

           <div id="chat-box" class="col-sm-12">
          
            <h3>Private Chat</h3>
             <div id="chat-list" class="col-sm-8">
             <label id="senderId" style="display:none;">{{$senderId}}</label>
            
              <ul id="user-list">
                 <div  class="col-sm-12">
                 @foreach($staff as $staff)
                  <div id="user-private"  class="col-sm-12">
                    <div id="user-chat-img"class="col-sm-3">
                <img class="img-circle"src="{{asset('images/chat.png')}}" width="50" height="40">
                    </div>
                    <div id="user-chat-name"class="col-sm-9">
                      <li id="{{$staff->id}}">{{$staff->name}}</br>
                       <small>USERNAME:</small><small>{{$staff->username}}</small>
                      </li>
                    </div>
                  </div>
                 @endforeach
                 </div>
              </ul>
           
             </div>
           </div><!--End chat-list-->
                   <div id="chat-box-messages" class="col-sm-12">
                <h3>Direct Chat</h3>
                 <div id="users-chat-messages"class="col-sm-8">
                    <div id="chatMessages"class="col-sm-12" >

                   </div>
                  <div id="chat-text-area"class="col-sm-12">
                    <div id="write-text"class="col-sm-9">
                      <textarea placeholder="Type Message"class="form-control" cols="5" rows="2"id="chatText" class="form-control"></textarea>
                    </div>
                    <div id="send-chat"class="col-sm-3">
                     <input type='button' id="sendText"value="Send" class="btn btn-primary btn-flat">
                    </div>
                  </div>
                  
                  
                </div>
             </div>



            </div>
            <div id="public-chat" class="col-sm-6">
              <h3>Public Chat(BroadCast)</h3>
             <div class="col-sm-12">
              <div id="public-chat-box" class="col-sm-8">

              </div>
              <div id="public-write-text" class="col-sm-8">
              <div id="write-text"class="col-sm-9">
             <textarea placeholder="Type Message" cols="5" rows="2"id="public-chatText" class="form-control"></textarea>
                      
                    </div>
                    <div id="send-chat"class="col-sm-3">
                     <input type='button' id="public-sendMessage"value="Send" class="btn btn-primary btn-flat">
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
<script type="text/javascript">
    function getBaseUrl(){
            var protocol = window.location.protocol;
                  host =  window.location.host;
                pathname = window.location.pathname;

             var BASE_URL = protocol + "//" +host + "/";
            return BASE_URL;
         }
   var BASE_URL = getBaseUrl();

   /*$.ajax({
             type:"GET",
             url:"getbroadcast",
             success:function(data){
                
                }
             });*/

    setInterval(function(){
      //refresh every 10 seconds
      $("#public-chat-box").load(BASE_URL + "getbroadcast");
          },1000);
      $("#public-chat-box").load(BASE_URL + "getbroadcast")
      


  $('#public-sendMessage').click(function(){
      $.ajaxSetup({
                    headers:{
                        'X-CSRF-Token':$('meta[name="_token"]').attr('content')
                    }
         });
       var senderId = $('#senderId').text();
       var publicMessage = $('#public-chatText').val();

       //alert(senderId+'.............'+publicMessage);
               $.ajax({
                type:"POST",
                url:BASE_URL + "storeBroadcast",
                data:({publicMessage:publicMessage,senderId:senderId,}),
                success:function(data){
                  //alert(data);
                   $("#public-chatText").val("");
                }
             });
   
     });


     document.getElementById('chat-list').addEventListener("click",function(e){

      if(e.target && e.target.nodeName =="LI"){
                $.ajaxSetup({
      headers:{
        'X-CSRF-Token':$('meta[name="_token"]').attr('content')
      }
     });
         var receiverId = e.target.id;
         var senderId = $('#senderId').text();
              $.ajax({
                type:"GET",
                url:"getchat",
                data:({receiverId:receiverId,senderId:senderId}),
                success:function(data){
                
                }
             });
        
             
          $('#chat-box').hide();
          $('#chat-box-messages').show();
          $('#chatText').show();
          $('#sendText').show();
         
      } 
  

       $('#sendText').click(function(){
         var chatText = $('#chatText').val();
         var senderId = $('#senderId').text();
              $.ajax({
                type:"POST",
                url:BASE_URL + "addchat",
                data:({chatText:chatText,senderId:senderId,receiverId:receiverId}),
                success:function(data){
                 $("#chatText").val("");
                  
                }
             });
      
       
      });

   


    setInterval(function(){
      //refresh every 10 seconds
      $("#chatMessages").load(BASE_URL + "getchat" + "?" + "receiverId"+"="+receiverId+"&"+"senderId"+"="+senderId);
          },1000);

      $("#chatMessages").load(BASE_URL + "getchat" + "?" + "receiverId"+"="+receiverId+"&"+"senderId"+"="+senderId);
   
    });
   </script>

</body>

</html>

