<!DOCTYPE HTML>
<html>
<head>

<style type="text/css">
  #header{

  	width:100%;
  	height:150px;

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
  #order-details{
      width:100%;
      height:250px;
    
  }
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 15px;
   }
   #order-footer{
    width:100%;
    height:100px;
    border-top:2px solid #000;
   }
   #auth{
    width:100%;
    margin-left:400px;
    height:100px
   }
   #order-header{
    margin-left:300px;
    height:100px;
   }
   #order-client{
    width:100%;
    height:240px;
    text-transform: uppercase;
   }
   #order-info{
     margin-left:500px;
     height:70px;
   }
</style>
</head>
<body>
	<div id="header">
	
      	<div id="head"><label id="l-h">Benvin Solutions Ltd </label><img src="images/benvin.jpg" width="150px" height="100px">
         <label id="lo-h">Your Image,My Business<label>
      	</div>

	</div>
  <div id="order-header">
      <h2>ORDER</h2>
  </div>
  <div id="order-info">
     <p>LPO   :{{$details->lpoNo}}</p>
     <p>DATE  :{{$details->orderTime}}</p>
  </div>
  <div id="order-client">
      <h2>QUOTED TO:</h2>
        {{$client->username}}<br>
        {{$client->email}}<br>
        {{$client->phone}}<br>

      <p>C/O:</p>
      <p>{{$client->name}}</p>
  </div>
  <div id="order-details">
     @foreach($order as $order)
     <table style="width:100%">
        <tr>
          <th>OrderNo</th>
          <th>Order Description</th>   
          <th>Sub-Total(KSH)</th>
          <th>VAT 16%</th>
          <th>Total (KSH)</th>
        </tr>
        <tr>
          <td>{{$order->orderNo}}</td>
          <td>{{$order->description}}</td> 
          <td>{{number_format(($order->amountCharged * 100)/116,2)}}</td>
          <td>{{number_format(($order->amountCharged * 16)/116,2)}}</td>   
          <td>{{number_format($order->amountCharged,2)}}</td>
       </tr>
    </table>
     @endforeach
  </div>
  <div id="auth">
    Sanctioned ...................................
    
  </div>
  <div id="order-footer">
    <p>Caxton House, 2nd Floor, P.O. Box 50342 00200, Nairobi, Kenya. Tel: 254 20 2100045</p>
    <p>Cell: 254 722 420483 / 254 713 133969, E: admin@benvinsolutions.com; W: www.benvinsolutions.com</p>
  </div>
</body>