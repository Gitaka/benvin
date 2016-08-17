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
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 15px;
   }
   #invoice-data{
    width:100%;
    margin-bottom:50px;
   }
   #invoice-header{
       margin-left:300px;
       height:50px;
   }
   #invoiced-to{
    height:250px;
    text-transform: uppercase;
   }
   #co{
    text-transform:lowercase;
    font-size:110%;
   }
      #order-footer{
    width:100%;
    height:100px;
    border-top:2px solid #000;
   }
   #auth{
    width:100%;
    margin-left:400px;
    height:50px
   }
   #to{
    
   }
   #invoice-detail{
    margin-left: 500px;
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
  <div id="invoice-header">
      <h2>INVOICE</h2>
  </div>

  <div id="invoice-detail">
    <small><label style="font-size:20px">InvoiceNo:</label>  {{$invoiceNo}}</small><br>
    <small>Date:   {{$date}}</small><br>
    <small>Orders:   {{$orders}}</small><br>
    <small>DeliveryNo:   {{$deliveryNo}}</small>
  </div>
  <div id="invoiced-to">
    <h2>INVOICED TO:</h2>
    @foreach($client as $client)

       {{$client->username}}<br>
       {{$client->email}}<br>
       {{$client->phone}}<br><br><br>
       <div id="co">
            <label style="font-size:30px">C/O:</label><br>
            {{$client->name}}
       </div>

    @endforeach
  </div>




	<div id="invoice-data">
    <table style="width:100%">
        <tr>
          <th>OrderNo</th>
          <th>Item Description</th>   
          <th>Sub-Total(KSH)</th>
          <th>VAT 16%</th>
          <th>Total (KSH)</th>
        </tr>
    @foreach($items as $oItems)
      @foreach($oItems as $item)

        <tr>
          <td>{{$item->orderNo}}</td>
          <td>{{$item->description}}</td>
          <td>{{number_format(($item->amountCharged * 100)/116,2)}}</td>
          <td>{{number_format(($item->amountCharged * 16)/116,2)}}</td>
          <td>{{number_format($item->amountCharged,2)}}</td>
       </tr>
    
      @endforeach
    @endforeach
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
          <td></td>
          <td></td>
          <td></td>
          <th>Total</th>
          <td>{{number_format($totalCharged,2)}}</td>
       </tr>
   </table>
  </div>
    <div id="auth">
    Sanctioned ...................................
    
  </div>
  <div id="order-footer">
    <p>Caxton House, 2nd Floor, P.O. Box 50342 00200, Nairobi, Kenya. Tel: 254 20 2100045</p>
    <p>Cell: 254 722 420483 / 254 713 133969, E: admin@benvinsolutions.com; W: www.benvinsolutions.com</p>
  </div>
</body>