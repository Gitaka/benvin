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
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
   <!--<script type="text/javascript" src="{{asset('js/invoice.js')}}"></script>-->
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
         @if(Session::has('invoice'))
           <div class="alert alert-success">
             {{Session::get('invoice')}}
           </div>
        @endif
          @if(Session::has('editInvoice'))
                <p class="alert alert-success">{{Session::get('editInvoice')}}</p>
            @endif
        <div id="page-wrapper">
             <!--<div id="task-header">
                      <button id="add-invoice-btn"style="background-color:#00a65a;"class="btn btn-block btn-warning btn-lg">
                        Make Invoice</button>
                       <button id="hide-invoice-form"class="btn btn-lg btn-success btn-block"style="display:none">Hide Form</button>
            </div>-->
        <!-- <div class="row">
         <div class="col-sm-12"id="invoice-form">
            <h3>Create Invoice</h3>
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
               
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('createinvoice') }}">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">

                  
            
                            <label class=" control-label">order No</label>
    
                             <select id="orderno"name='orderno[]'class="form-control" placeholder="OrderNo" multiple>
                                    <option value="0">Choose Order or(manually input details)</option>
                                     @foreach($orders as $order)
                                 
                                     <option value='{{$order->orderNo}}'>{{$order->orderNo}}:  {{$order->client}}-{{$order->email}}</option></br>
                                      
                                     @endforeach                  
                                   </select></br>
                          <input type="text"  placeholder="Client"class="form-control" name="name" value="{{ old('name') }}"></br>
                          <input type="email" id="email" placeholder="Email"class="form-control" name="email" value="{{ old('email') }}"></br>
                          <input type="text"  placeholder="Delivery No"class="form-control" name="deliveryNo" value="{{ old('deliveryNo') }}"></br>

  
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">
                                    Create Invoice
                                </button>
                            </div>
                        </div>
                    </form>
          </div>

         </div>-->
           <h2>Invoices
                 <button class="btn btn-sm btn-default">
                   <a href="{{url('gen/invoice')}}">Gen Excel</a>
                 </button>
           </h2>
         <div id="view-invoices"class="row">

          <div id="invoice" class="col-sm-12">
            <div id="invoice-header" class="col-sm-12">
                     <div style="padding:0px;"id="invoice-no" class="col-sm-1">
                          InvoiceNo
                       </div>
                       <div id="invoice-orderNo" class="col-sm-2">
                        OrderNo
                       </div>
                       <div id="invoice-item"class="col-sm-3">
                        Items
                       </div>
 
                       <div id="invoice-subtotal" class="col-sm-2">
                        Total
                       </div>
                        <div id="invoice-edit" class="col-sm-2">
                          Balance
                       </div>
                 
                 </div>
           @foreach($invoices as $invoice)
                 <div id="invoice-details" class="col-sm-12">
                     <div style="padding:0px;"id="invoice-no" class="col-sm-1">
                       
                           <a href="{{url('staff/show-invoice')}}/{{$invoice->id}}">{{$invoice->invoiceNo}}</a>
                       </div>
                       <div id="invoice-orderNo" class="col-sm-2" style="color:">
                        
                        <button class="btn btn-sm btn-primary"> {{$invoice->orderNo}}
                        
                        </button>
                       </div>
                       <div id="invoice-items"class="col-sm-3">
                         {{$invoice->description}}
                       </div>
       
                       <div id="invoice-subtotal" class="col-sm-2">
                       
                          <button class="btn btn-sm btn-info">KSH{{$invoice->amountCharged}}</button>
                       </div>
                        <div id="invoice-edit" class="col-sm-2">
                                <button class="btn btn-sm btn-info">KSH{{$invoice->balance}}</button>
                       </div>
                       <div id="invoice-print" class="col-sm-2">
                          <button class="btn btn-success btn-sm"><a href="{{url('print/invoice')}}/{{$invoice->id}}" style="color:#fff">Print Invoice</a></button>
                       </div>
                
                 </div>
            @endforeach
            <?php echo $invoices->render(); ?>
          </div>
         </div>
         </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<!--***************DATA TOGGLE - Edit Invoice***********************-->
    
          <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                       <button id="singin"class="btn btn-success">Edit Invoice</button>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
                    </h4>
                  </div>
                  <div class="modal-body">
                     <div id="modal-edit-invoice">
             <form class="form-horizontal" role="form" method="POST" action="#">
                        <input id="token"type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="modal-invoice-id"type="hidden" name="invoice_id">
                        <input type="text" placeholder="ProductCode"id="code"class="form-control" name="productcode">
            
                            <label class=" control-label">order No</label>
    
                             <select id="orderno"name='orderno'class="form-control" placeholder="OrderNo">
                                    <option value="0">Choose Order or(manually input details)</option>
                                     @foreach($orders as $order)
                                 
                                     <option value='{{$order->id}}'>{{$order->orderNo}}:-{{$order->client}}</option>
                                      
                                     @endforeach                  
                                   </select></br>
                                <!--<input type="email" class="form-control" name="description" value="{{ old('description') }}">-->
                <textarea class="form-control"id="items"cols="50" rows="10" name="items" placeholder="Items"></textarea></br>
                <input type="text" placeholder="SubTotal"id="subtotal" class="form-control" name="subtotal">
               </br>
                <input type="text" placeholder="VAT" id="vat"class="form-control" name="vat" value="{{ old('vat') }}"></br>
  
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">
                                    Edit

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
<!--***************END DATA TOGGLE ***********************-->
    <!-- jQuery -->
    <script src="{{asset('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
 <script type="text/javascript">
$(function(){
    $('#invoice-form').hide();
    $('#add-invoice-btn').click(function(){
       $('#invoice-form').show();
       $('#view-invoices').hide();
       $('#hide-invoice-form').show();
       $('#add-invoice-btn').hide();

    });
    $('#hide-invoice-form').click(function(){
       $('#invoice-form').hide();
       $('#view-invoices').show();
       $('#add-invoice-btn').show();
       $('#hide-invoice-form').hide();
 
    });


    
});

</script>
    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>

