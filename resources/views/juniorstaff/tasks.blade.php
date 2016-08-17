<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

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
        <nav id="navbar"class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <!--<img class="img-rounded"src="{{asset('images/benvin-logo.jpg')}}" width="70" height="50">-->
            <div id="nav-header"class="navbar-header">
      
                <p class="navbar-brand">Benvin Solutions</p>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                      <li>
                            <a href="{{url('/staff')}}"><i class="fa fa-home fa-fw"></i>Home</a>
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
                            <a href="{{url('staff/clients')}}"><i class="fa fa-user fa-fw"></i>User Clients</a>
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
                            <a href="{{url('staff/reports')}}"><i class="fa fa-newspaper-o fa-fw"></i>Reports</a>
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
          <!--           <div id="task-header">
                      <button id="add-task-btn"style="background-color:#dd4b39;"class="btn btn-block btn-warning btn-lg">
                        Add Task</button>
                    <button id="hide-task-form"class="btn btn-lg btn-info btn-block"style="background-color:#dd4b39;">Hide Form</button>
                </div>
        <div class="row">
            <div id="add-task-form" class="col-sm-12">
                <h4>Add Task</h4>
              <div id="task-form">
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('createtask') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="text" placeholder="Title"class="form-control" name="title" value="{{ old('title') }}"></br>
                                <textarea  class="form-control"placeholder="Task"cols="55" rows="10" name="task"></textarea></br>
                                <input placeholder="Start Date"type="text"id="startDatePicker" class="form-control" name="startDate" value="{{ old('startDate') }}"></br>
                                <input placeholder="End Date" type="text" id="endDatePicker" class="form-control" name="endDate" value="{{ old('endDate') }}"></br>
                                <label class="control-label">Collaborating Staff(optional)</label>
                                    <select  placeholder="Staff" name='staff' class="form-control">

                                     @foreach($staffs as $staff)
                                     <option value='{{$staff->id}}'>{{$staff->name}}</option>
                                     @endforeach                  
                                   </select></br>
                                   <label class="control-label">Choose Order(optional)</label>
                                 <select  placeholder="Order"name='order' class="form-control">
                                
                                     @foreach($orders as $order)
                                     <option value='{{$order->id}}'>{{$order->orderNo}}:{{$order->client}}:{{$order->status}}</option>
                                     @endforeach                  
                                   </select></br>
                                <label class="control-label">RO Client(optional)</label>
                                 <select  placeholder="Client" name='client' class="form-control">     
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
        </div>-->
         <div class="row">
          <h2>Tasks</h2>
            <div id="tasks" class="col-sm-12">

                   <div id="task-head" class="col-sm-12">
                     <div id="task-head-title" class="col-sm-1">
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
                     <div style="padding:0px;"id="task-title" class="col-sm-1">
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
                            <dutton class="btn btn-primary btn-sm">Edit</button>
                       </div>
                       <div id="product-price" class="col-sm-1">
                            <dutton class="btn btn-danger btn-sm"><a href="{{url('staff/deletetask')}}/{{$task->id}}" style="color:#fff;">Delete</a></button>
                       </div>
                 
                 </div>
                @endforeach
                <?php echo $tasks->render(); ?>
            </div>
      
         </div>
         </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.js')}}"></script>
<script type="text/javascript">
$(function(){
    $('#hide-task-form').hide();
    $('#add-task-btn').click(function(){
        $('#add-task-form').show();
         $('#hide-task-form').show();
          $('#add-task-btn').hide();

    });
    $('#hide-task-form').click(function(){
        $('#add-task-form').hide();
         $('#hide-task-form').hide();
          $('#add-task-btn').show();

    });
    $( "#startDatePicker" ).datepicker({
        inline: true
     });
     $( "#endDatePicker" ).datepicker({
          inline: true
     });
    
});

</script>
    <script src="{{asset('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>

