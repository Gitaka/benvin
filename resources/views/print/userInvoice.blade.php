<!DOCTYPE HTML>
<html>
<head>

<style type="text/css">
  #header{

  	width:100%;
  	height:100px;

  }
  #head{
  	float: left;
  	color: 	#FF7F50;
  	font-size: 50px;
  }
  #logo{
  	float:right;
  }
  #l-h{
  	margin-right:20px;
  }
  #lo-h{
  	font-size: 25px;
  	margin-left:120px;
  	color: #228B22;
  	font-style:italic;
  }
  #l-detail{
 
  }
  #table{
  	margin-top:50px;
  }
  #t-header{
  	font-weight:bolder;
  }
</style>
</head>
<body>
	<div id="header">
		<div id="logo"></div>
      	<div id="head"><label id="l-h">Benvin Solutions Ltd </label><img src="images/benvin.jpg" width="150px" height="100px">
         <label id="lo-h">Your Image,My Business<label>
      	</div>

	</div>
	<div id="user-data">
      <h4 style="margin-left:170px;font-size:30">INVOICE</h4>
      <label style="font-weight:bolder">INVOICED TO:</label>
      @foreach($client as $client)
        <div id="l-detail">{{$client->username}}</div>
 
        <div><h4 style="font-weight:bolder">C/O:</h5></div>
         <div id="l-detail">{{$client->email}}</div>
        <div id="l-detail">0{{$client->phone}}</div>
      @endforeach
    </div>
   <div><h2>InvoiceNo  :{{$invoiceNo}}</h2></div>
   <div>Date:  {{$invoiceDate}}</div>
    <div>Order:  {{$invoiceOrder}}</div>
   <div>DeliveryNo: {{$deliveryNo}}</div>
   <div id="table">
   <div id="t-header">     

      
 
   </div> 
</body>