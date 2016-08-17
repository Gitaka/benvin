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
    <link href="{{asset('panel/dist/css/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('panel/dist/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('panel/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
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
         <!--<div class="row" style="margin-top:2%;">
              <button class="btn btn-info btn-block" id="add-product-hide" style="display:none">Hide Form</button>
          <div id="add-product" class="col-sm-12" >
             <div id="add-product-header" class="col-sm-6">
                Add Products
             </div>
             <div id="add-product-hide" class="col-sm-4" style="padding-top:1%;">
           
             </div>
             <div id="product-form">
              
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
          </div>
         </div>-->
         <div id="show-products" class="row">
            <h2>Products</h2>
           
             <div id="show-products-items" class="col-sm-">
                <div id="items-header" class="col-sm-12">
                       <div id="product-img" class="col-sm-2">
                        Product Image
                       </div>
                       <div id="name"class="col-sm-2">
                        Description
                       </div>
                      <div id="product-category"class="col-sm-2">
                         Category
                       </div>
                       <div id="product-price" class="col-sm-2">
                         Price
                       </div>
                </div>

                 @foreach($products as $product)
                  <div id="items-details" class="col-sm-12">
                      <div id="product-img" class="col-sm-2">
                          <img class="img-rounded"src="{{asset($product->productImg)}}" width="150" height="100">
                       </div>
                       <div id="product-name"class="col-sm-2">
                         {{$product->name}}
                       </div>
                        <div id="product-category"class="col-sm-2">
                         {{$product->category}}
                       </div>
                       <div id="product-price" class="col-sm-2">
                            <dutton class="btn btn-warning btn-sm">KSH {{$product->price}}</button>
                       </div>
                   <div id="product-price" class="col-sm-2">
                            <!--<dutton class="btn btn-primary btn-sm">Edit</button>-->
                       </div>
                    <div id="product-price" class="col-sm-2">
                            <dutton class="btn btn-danger btn-sm">Delete</button>
                       </div>
                  </div>
                 @endforeach
                 <?php echo $products->render(); ?>
             </div>
             
         </div>
         </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <script type="text/javascript">
     $(document).ready(function(){
       $('#add-product-hide').click(function(){
          $('#add-product').hide();
          $('#add-product-hide').hide();
           
       }); 
        $('#add-product-show').click(function(){
          $('#add-product').show();
          $('#add-product-hide').show();
       });        
     });
   </script>
    <script src="{{asset('panel/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>

