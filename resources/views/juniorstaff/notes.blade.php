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
                            <a href="{{url('/staff')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                  </li>
                <li>
                        <a href="{{url('staff/createinvoice')}}"><i class="fa fa-briefcase fa-fw"></i>Invoice</a>
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
         <div class="row">
          <h2>Notes</h2>
         <div id="reports" class="col-sm-8">
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
               <?php echo $notes->render(); ?>
         </div>
         <div id="create-report" class="col-sm-3">
          <div id="upload-report">
              <h5>Create Note</h5>
    
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

          <form class="form-horizontal" role="form" method="POST" action="{{ url('staff/createnote') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input placeholder="Subject"type="text" class="form-control" name="subject" value="{{ old('subject') }}"></br>
                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                <textarea placeholder="Write Note"class="form-control"cols="30" rows="10" name="note"></textarea></br>
      
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Create Note
                </button>
              </div>
            </div>
          </form>
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

    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>
