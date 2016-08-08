<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Cart;
use App\CartItem;
use App\Order;
use App\Invoice;
use PDF;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Redirect;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
   public function index(){
     $products = DB::table('products')->orderBy('id','desc')->paginate(12);
    /*$cart = Cart::where('user_id','=',Auth::user()->id)->get();
     if(count($cart)==0){
      $cart = new Cart();
      $cart->user_id = Auth::user()->id;
      $cart->save();

    }
    $products = DB::table('products')->orderBy('id','desc')->paginate(12);
    
  
  foreach($cart as $cart){
      $id = $cart->id;
    }
    $cartitems = DB::table('cartitems')->where('cart_id','=',$id)->get();*/
    return View::make('user.index')
                //->with('cartitems',count($cartitems))
                ->with('products',$products);

          

   }


 public function addItem($id){
    $arrayId = explode('-',$id);
 	  $cart = Cart::where('user_id','=',Auth::user()->id)->get();
     if(count($cart)==0){
    	$cart = new Cart();
    	$cart->user_id = Auth::user()->id;
    	$cart->save();

    }

    //add new cart_item
    foreach ($cart as $cart) {
      $cartId = $cart->id;
    }
    $cartItem = new CartItem();
    $cartItem->cart_id=$cartId;
    $cartItem->product_id=$arrayId[0];
    $cartItem->quantity=$arrayId[1];
    $cartItem->save();

    return Redirect::to('user');

   
 }
 public function showCart(){
 	$cart = Cart::where('user_id','=',Auth::user()->id)->get();
 	if(count($cart)==0){
 		$cart = new Cart();
    	$cart->user_id = Auth::user()->id;
    	$cart->save();
 	}
  foreach($cart as $cart){
    $cartId= $cart->id;
  }

    
    $cartitems = DB::table('cartitems')->where('cart_id','=',$cartId)->get();
    $products = DB::select(DB::raw('SELECT cartitems.id,cartitems.quantity,cartitems.cart_id,cartitems.product_id,products.name,products.description,products.price,products.productImg
                FROM cartitems INNER JOIN products on cartitems.product_id = products.id WHERE cartitems.cart_id = '.$cartId.' '));
  
    return View::make('user.cart')
                     ->with('total',0)
                     ->with('cartitems',count($products))
                     ->with('products',$products);
  

 }
 public function showMiniCart(){
   $cart = Cart::where('user_id','=',Auth::user()->id)->get();
  if(count($cart)==0){
    $cart = new Cart();
      $cart->user_id = Auth::user()->id;
      $cart->save();
  }
  foreach($cart as $cart){
    $cartId= $cart->id;
  }

    $products = DB::select(DB::raw('SELECT cartitems.id,cartitems.quantity,cartitems.cart_id,cartitems.product_id,products.name,products.description,products.price,products.productImg
                FROM cartitems INNER JOIN products on cartitems.product_id = products.id WHERE cartitems.cart_id = '.$cartId.' '));
    
    return View::make('user.minicart')
                     ->with('total',0)
                     ->with('cartitems',count($products))
                     ->with('products',$products);
 }
 public function removeItem($id){
 	   CartItem::destroy($id);
     return Redirect::to('user/cart');

 }

 public function incrementItem($id){
    $cartitem=CartItem::find($id);
    $quantity = $cartitem->quantity;
    $cartitem->quantity=$quantity+1;
    $cartitem->save();
    return Redirect::to('user/cart');
 }
 public function decrementItem($id){
    $cartitem=CartItem::find($id);
    $quantity = $cartitem->quantity;
    $cartitem->quantity=$quantity-1;
    $cartitem->save();
    
    $cartQauntity = CartItem::find($id);
    $quan=$cartQauntity->quantity;
    if($quan == 0){
      CartItem::destroy($id);
      //return'i am zero';
    }
    return Redirect::to('user/cart');
 }

 public function makeorder(){
    $cart = Cart::where('user_id','=',Auth::user()->id)->get();
     foreach($cart as $cart){
        $cartId= $cart->id;
       }
      $products = DB::select(DB::raw('SELECT cartitems.id,cartitems.quantity,cartitems.cart_id,cartitems.product_id,products.name,products.description,products.price,products.productImg
                FROM cartitems INNER JOIN products on cartitems.product_id = products.id WHERE cartitems.cart_id = '.$cartId.''));
      $item  = array();
      $total = null;
      foreach($products   as $product){
         $item[] = $product->name .'  x  '.$product->quantity;
         $total += $product->quantity * $product->price;
         $ttotal = $total + (($total*16)/100);
         
      }
      
    $user = DB::table('users')->where('id','=',Auth::user()->id)->get();
    return View::make('user.makeorder')
                    ->with('total',$ttotal)
                    ->with('cartitems',count($products));
                    //->with('products',$products);
 }

 public function storeorder(Request $request){
      $cart = Cart::where('user_id','=',Auth::user()->id)->get();
     if(count($cart)==0){
      $cart = new Cart();
      $cart->user_id = Auth::user()->id;
      $cart->save();
    }
   foreach($cart as $cart){
    $cartId= $cart->id;
    }

    $this->validate($request,[
          'deadline'=>'required',
          'desc'=>'required',
          'amount'=>'required',
          
      ]);
    $order = $request->all();
    if(!$order){
      return View::make('user.makeorder')->withErrors($order)->withInput();
    }else{
      //$lpo=$request->get('lpo');
      $desc=$request->get('desc');
      $amount=$request->get('amount');

      $deadline = $request->get('deadline');
      $end_date= date('Y-m-d H:i:s',strtotime($deadline));
      $today= date("Y-m-d H:i:s",time());

      $userId=Auth::user()->id;
      $client = Auth::user()->username;
      $email = Auth::user()->email;
      //$orderNo ='BS1000';

      $lastOrder = DB::table('orders')->orderBy('id','desc')->take(1)->get();
      $lastOrderNo = null;
       foreach ($lastOrder as $lastOrder) {
         $lastOrderNo = $lastOrder->orderNo;
       }

      
      Order::create(array(
        'userId'=>$userId,
        'orderNo'=> ++$lastOrderNo,
        'client'=>$client,
        'email'=>$email,
        'description'=>$desc,
        'orderTime'=>$today,
        'deliveryDeadline'=>$end_date,
        'amountCharged'=>$amount,
        'status'=>'pending'
        ));
      
      $deleteCartItems = CartItem::where('cart_id','=',$cartId)->delete();
     Session::flash('ordermade','Order SuccessFully Made,You will be contacted shortly on how to make Payments');
     return Redirect::to('user');


    }
 }



 public function orderDesc(Request $request){
   $data = $request->all();
       $cart = Cart::where('user_id','=',Auth::user()->id)->get();
     foreach($cart as $cart){
        $cartId= $cart->id;
       }
      $products = DB::select(DB::raw('SELECT cartitems.id,cartitems.quantity,cartitems.cart_id,cartitems.product_id,products.name,products.description,products.price,products.productImg
                FROM cartitems INNER JOIN products on cartitems.product_id = products.id WHERE cartitems.cart_id = '.$cartId.''));
 
            $item  = array();
      foreach($products   as $product){
         $item[] = $product->name .' @ '.$product->quantity;
         
      }
      return $item;
 }

 public function vieworders(){
   $orders = DB::table('orders')->where('userId','=',Auth::user()->id)->orderBy('id','desc')->paginate(5);
   return View::make('user.orders')->with('orders',$orders);
  
  }
public function invoices(){
          $email = Auth::user()->email;
          $invoices =  DB::table('invoices')->where('email','=',$email)->orderBy('id','desc')->paginate(10);
        return View::make('user.invoices')->with('invoices',$invoices);
  }

public function printinvoice($id){

    $invoices = Invoice::find($id);
    $orders = json_decode($invoices->orderNo);


      $orderItems = array();
      $items = array();
        foreach($orders as $order){
             $items[] = DB::table('orders')->where('orderNo','=',$order)->get();
           }
              $totalCharged = null;
              $totalPaid = null;
              $totalBalance = null;
              $desc = '';

              foreach($orderItems as $items){
                foreach($items as $item){
                  $totalCharged += $item->amountCharged;
                  $totalPaid += $item->amountPaid;
                  $totalBalance = $totalCharged - $totalPaid;
                  $desc .= $item->description.',';
          

                }
             }

            //$invoiceData = array();
            $orderItems['indescription'] = $desc;
            $orderItems['inbalance'] = $totalBalance;
             $orderItems['inamountPaid'] = $totalPaid;
             $orderItems['inamountCharged'] = $totalCharged;

       $orderItems['client'] = DB::table('users')->where('email','=',$invoices->email)->get();

             $orderItems['invoiceNo'] = $invoices->invoiceNo;
             $orderItems['invoiceDate'] = $invoices->created_at;
             $orderItems['invoiceOrder']= $invoices->orderNo;
             $orderItems['deliveryNo'] = $invoices->deliveryNo;
             $orderItems['items']= $items;
    $pdf = PDF::loadView('print.userInvoice', $orderItems);
    return $pdf->stream();
   //return $orderItems;
  }
}