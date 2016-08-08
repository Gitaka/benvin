<?php

namespace App\Http\Controllers;
use Excel;
use Session;
use PDF;
use App\User;
use App\Product;
use App\Category;
use App\Task;
use App\Order;
use App\Chat;
use App\Broadcast;
use App\Report;
use App\Note;
use App\Post;
use App\Invoice;
use App\Sale;
use App\Asset;
use App\Liability;
use App\Capital;
use App\CreditLiability;
use App\CreditAsset;
use App\Expense;
use App\Purchase;
use App\LiveChat;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\productsRequests;
use App\Http\Requests\TasksRequest;
use App\Helpers\ImageResize;
use App\Helpers\Ratio;

class StaffController extends Controller
{
   public function index(){

    $products = DB::table('products')->orderBy('id','desc')->take(5)->get();
    $user = DB::table('users')->where('id',Auth::user()->id)->get();

    $clients = DB::table('users')->where('AccessLevel','=',0)->get();
    $orders = DB::table('orders')->where('balance','>',0)->where('status','!=','invoiced')->get();


    $staffs=DB::table('users')->where('accessLevel','>','0')->get();
    $taskOrders = DB::table('orders')->get();
    $categories = DB::table('categories')->get();

  $invoices = DB::table('invoices')->where('balance','>',0)->get();
  $salesOrders = DB::table('orders')->where('balance','>',0)->get();

    $assets = DB::table('assets')->orderBy('id')->get();
    $liabilities = DB::table('liabilities')->get();
    $cpOrders = DB::table('orders')->get();
   	return View::make('layouts.index')
                    ->with('staffs',$staffs)
                    ->with('taskOrders',$taskOrders)
                    ->with('products',$products)
                    ->with('orders',$orders)
                    ->with('clients',$clients)
                    ->with('categories',$categories)
                    ->with('cats',$categories)
                    ->with('invoices',$invoices)
                    ->with('assets',$assets)
                    ->with('salesOrders',$salesOrders)
                    ->with('purchaseOrders',$cpOrders)
                    ->with('liabilities',$liabilities);
                    
   }


  public function createstaff(){
    return View::make('staff.register');
  }
  public function storestaff(RegisterUserRequest $request){
         $user = $request->all();
         if(!$user){
          return View::make('staff.register')->withErrors($user)->withInput();
         }else{
           User::create(
                [
                 'firstname'=>$request->get('firstname'),
                 'lastname'=>$request->get('lastname'),
                 'email'=>$request->get('email'),
                 'password'=>bcrypt($request->get('password')),
                 'location'=>$request->get('location'),
                 'username'=>$request->get('username'),
                 'AccessLevel'=>$request->get('accesslevel'),
                ]
            );
             Session::flash('successRegister','Registerd Successfully');
           return Redirect::to('auth/login');

   

         }
    }
   public function createproductCategory(){
      $cats = Category::all();
      
      return View::make('staff.createcategory')
                           ->with('cats',$cats);
   }
   public function featuredProducts(Request $request){
      $catId = $request->get('catId');
      $features = Category::find($catId);
      $features->isFeatured = 1;
      $features->save();
       return Redirect::to('staff');
   }
   public function storeproductCategory(Request $request){
            $this->validate($request,[
              'name'=>'required',
              'description'=>'required',
              'categoryPhoto'=>'required',
            ]);
          $category = $request->all();
          if(!$category){
            return View::make('staff.createcategory')->withErrors($category)->withInput();
          }else{
             $file = $request->file('categoryPhoto');
             $catName = $request->get('name');
             $categoryname = preg_replace('/\s+/','',$catName);
             $randomString = str_random(15);
             $destinationPath = 'uploads/categories/'.$randomString.'_'.$categoryname;
             $fileName = $file->getClientOriginalName();
          
             $ext = $file->getClientOriginalExtension();
             $upload_success = $file->move($destinationPath, $fileName);

             $target = $destinationPath.'/'.$fileName;
             $resized = $destinationPath.'/'.'resized_'.$fileName;
             $width=350;
             $height=450;
             

             ImageResize::imgResize($target,$resized,$width,$height,$ext);

              unlink($target);
                if($upload_success){
                        Category::create([
                           'name'=>$request->get('name'),
                           'userId'=>Auth::user()->id,
                           'description'=>$request->get('description'),
                           'categoryImg'=>$resized,
                          
                        ]);
                      Session::flash('addcategory','Product Category Added Successfully');

                     return Redirect::to('staff');
                     //return $resized;
                }
          }
   }

   public function createproduct(){
     $products = DB::table('products')->orderBy('id','desc')->paginate(10);
     $categories = DB::table('categories')->get();
   	 return View::make('staff.createproduct')
                       ->with('categories',$categories)
                       ->with('products',$products);
   }
   public function storeproducts(productsRequests $request){
   	     $products = $request->all();
   	     if(!$products){
   	     	  return Redirect::to('staff.createproduct')->withErrors->withInput();
   	     }else{
   	         $file = $request->file('productPhoto');
             $proname = $request->get('productname');
   	         $productname = preg_replace('/\s+/','',$proname);
   	         $randomString = str_random(15);
             $destinationPath = 'uploads/products/'.$randomString.'_'.$productname;
   	         $fileName = $file->getClientOriginalName();
   	      
   	         $ext = $file->getClientOriginalExtension();
             $upload_success = $file->move($destinationPath, $fileName);

             $target = $destinationPath.'/'.$fileName;
             $resized = $destinationPath.'/'.'resized_'.$fileName;
             $width=350;
             $height=450;
   	         

   	         ImageResize::imgResize($target,$resized,$width,$height,$ext);

   	          unlink($target);
                if($upload_success){
                         Product::create([
                           'name'=>$request->get('productname'),
                           'category'=>$request->get('category'),
                           'description'=>$request->get('description'),
                           'quantity'=>$request->get('quantity'),
                           'price'=>$request->get('price'),
                           'productImg'=>$resized,
                          
                        ]);
                      Session::flash('addproduct','Product Added Successfully');

                     return Redirect::to('staff');
                     
                }
   	     }
   }

   public function createtask(){
      $clients=DB::table('users')->where('accessLevel','=','0')->get();
      $staffs=DB::table('users')->where('accessLevel','>','0')->get();
      $orders = DB::table('orders')->get();
       
       return View::make('staff.createTask')
                     ->with('clients',$clients)
                     ->with('staffs',$staffs)
                     ->with('orders',$orders);
   }

   public function storetask(TasksRequest $request){
       $task=$request->all();
       if(!$task){
         return View::make('staff.createTask')->withErrors($task)->withInput();
       }else{
              $startDate=$request->get('startDate');
              $endDate=$request->get('endDate');

            $sFormat = explode('/', $startDate);
            $eFormat = explode('/', $endDate);
            $fStartDate = $sFormat[2]."-".$sFormat[0]."-".$sFormat[1];
            $fEndDate = $eFormat[2]."-".$eFormat[0]."-".$eFormat[1];

           Task::create([
                'userId'=>Auth::user()->id,
                'title'=>$request->get('title'),
                'task'=>$request->get('task'),
                'startDate'=>$fStartDate,
                'endDate'=>$fEndDate,
                'staffId'=>$request->get('staff'),
                'orderId'=>$request->get('order'),
                'clientId'=>$request->get('client'),
              ]);

           Session::flash('task','Task Created');
           return Redirect::to('manager');
           

       }
   }

   public function viewtasks(){
      $tasks=DB::table('tasks')->where('userId','=',Auth::user()->id)
                              ->orWhere('staffId','=',Auth::user()->id)->orderBy('id','desc')->paginate(1);
      $clients=DB::table('users')->where('accessLevel','=','0')->get();
      $staffs=DB::table('users')->where('accessLevel','>','0')->get();
      $orders = DB::table('orders')->get();

      return View::make('staff.tasks')
                               ->with('clients',$clients)
                                ->with('staffs',$staffs)
                                ->with('orders',$orders)
                               ->with('tasks',$tasks);
   }
   public function task($id){
      $task = DB::table('tasks')->where('id','=',$id)->get();
      return View::make('staff.task')
                               ->with('task',$task);
   }
   public function deleteTask($id){
       $task=Task::find($id);
       $task->delete();
       return Redirect::to('tasks');
   }

   public function chat(){
     $userId=Auth::user()->id;
     $senderId=Auth::user()->id;
     $staff=DB::table('users')->where('accessLevel','>',0)
                              ->where('id','!=',Auth::user()->id)
                              ->get();
    
    return View::make('staff.chat')
                   ->with('userId',$userId)
                   ->with('senderId',$senderId)
                   ->with('staff',$staff);
                  // return $staff;
   }

   public function addchat(Request $request){
     $chatMessage =$request->get('chatText');
     $receiverId = $request->get('receiverId');
     $senderId = $request->get('senderId');

     Session::put('receiverId',$receiverId);
     

     Chat::create(array(
                'sender'=>$senderId,
                'receiver'=>$receiverId,
                'message'=>$chatMessage 
        ));
    //return $chatMessage.$receiverId.$senderId;
        
   }
  public function getchat(Request $request){
      Session::put('receiverId',$request->get('receiverId'));
      Session::put('senderId',$request->get('senderId'));
    $one=Session::get('senderId');
    $two=Session::get('receiverId');
     
     $chatData = DB::select(DB::raw('SELECT * FROM chats WHERE sender = '.$one.' AND receiver = '.$two.' OR sender='.$two.' AND receiver ='.$one.''));

   if(count($chatData) == 0){
    echo 'Start Chat';
   }else{
    foreach($chatData as $chat){
      $userChatName= DB::select(DB::raw('SELECT * FROM users WHERE id = '.$chat->sender.''));
       foreach($userChatName as $userName){
            ?>
                <span class="userName"><?php echo $userName->name?></span>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;
                <span class="chat-created-at"><?php echo $chat->created_at?></span></br>
                <div class="message"><?php echo $chat->message?></div></br>
            <?php
       }
      }
    }

  }



public function storeBroadcast(Request $request){
  $broadcast = $request->get('publicMessage');
  $senderId = $request->get('senderId');
  
  Broadcast::create([
     'senderId'=>$senderId,
     'message'=>$broadcast
    ]);
}

public function getbroadcast(){
  $chatData = DB::select(DB::raw('SELECT * FROM broadcasts'));

   if(count($chatData) == 0){
    echo 'Start Chat';
   }else{
    foreach($chatData as $chat){
      $userChatName= DB::select(DB::raw('SELECT * FROM users WHERE id = '.$chat->senderId.''));
       foreach($userChatName as $userName){
            ?>
                <span class="userName"><?php echo $userName->name?></span>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;
                <span class="chat-created-at"><?php echo $chat->created_at?></span></br>
                <!--<div class="message"><?php //echo $chat->message?></div></br>-->
                <?php 
                  if($userName->id == $chat->senderId){
                     ?>
                      <div class="message"><?php echo $chat->message?></div></br>
                     <?php
                  }else{
                    ?>
                      <div class="message"><?php echo $chat->message?></div></br>
                     <?php
                  }
                ?>
            <?php
       }
      }
    }
}



public function createreports(){
  return View::make('staff.report');
}

public function storereports(Request $request){
       $this->validate($request,[
          'file'=>'required|array|max:1500',
          'summary'=>'required',
          'subject'=>'required',
        ]);

       $report = $request->all();
       if(!$report){
          return View::make('staff.report')->withErrors($report)->withInput();
       }else{

          $files = $request->file('file');
          $subject=$request->get('subject');
          $randomString = str_random(15);
          $fileCount = count($files);
          $uploadCount = 0;
          $report = $subject.'_'.str_random(10);
          $reportLength=strlen($report);
          
          foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            $fileExt = $file->getClientOriginalExtension();
            $destinationPath='uploads/reports/'.$report;
            $uploadSuccess = $file->move($destinationPath,$fileName);
            $uploadCount++;

            $savedReport = $destinationPath.'/'.$fileName;
            $done[] = substr($savedReport,$reportLength+16);
          }
          
          if($uploadCount == $fileCount and $uploadSuccess){
              Report::create([
                  'userId'=>Auth::user()->id,
                  'permision'=>$request->get('permision'),
                  'subject'=>$subject,
                  'summary'=>$request->get('summary'),
                  'report'=>$destinationPath,
                  'files'=>json_encode($done),
                ]);
              Session::flash('report','Report Created');
              return Redirect::to('staff');
            
         
          }
             

       }
    } 

public function reports(){
  $reports = DB::table('reports')->where('permision','=',2)->orderBy('id','desc')->paginate(1);
  return View::make('staff.viewreports')->with('reports',$reports);
}
public function viewreport($id){
   $report = DB::table('reports')->where('id','=',$id)->get();
   return View::make('staff.showreport')->with('report',$report);
}
public function deletereport($id){
  $report=Report::find($id);
  $files=json_decode($report->files);
  $report->delete();
   /*foreach($files as $file){
      unlink($report->report.'/'.$file);
   }*/
  
  return Redirect::to('reports');
}

public function createnote(){
  return View::make('staff.createnote');
}
public function storenote(Request $request){
    $this->validate($request,[
        'subject'=>'required',
        'note'=>'required',
      ]);
    $note = $request->all();
    if(!$note){
      return View::make('staff.createnote')->withErrors($note)->withInput();
    }else{
        Note::create([
            'userId'=>Auth::user()->id,
            'subject'=>$request->subject,
            'note'=>$request->note,
          ]);
        Session::flash('note','Note Created');
        return Redirect::to('staff');
    }
}

public function note(){
  $notes = DB::table('notes')->where('userId','=',Auth::user()->id)->orderBy('id','desc')->paginate(10);
  return View::make('staff.notes')->with('notes',$notes);
}
public function viewnote($id){
  $note = DB::table('notes')->where('id','=',$id)->get();
  return View::make('staff.viewnote')->with('note',$note);
}
public function deletenote($id){
  $note = Note::find($id);
  $note->delete();
  return Redirect::to('note');

}

public function createpost(){
      return View::make('staff.createpost');
    }
public function storepost(Request $request){
    $this->validate($request,[
       'title'=>'required',
       'audience'=>'required',
       'post'=>'required',
       'imgs'=>'required|array',
      ]);
    $post = $request->all();
    if(!$post){
      return View::make('staff.createpost')->withErrors($post)->withInput();
    }else{
          $files = $request->file('imgs');
          $title=$request->get('title');
          $randomString = str_random(15);
          $fileCount = count($files);
          $uploadCount = 0;
          $img = $title.'_'.str_random(10);
          $imgLength=strlen($img);


          foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            $sudo = str_random(15).'_'.$fileName;
            $fileExt = $file->getClientOriginalExtension();
            $destinationPath='uploads/posts/'.$img;
            $uploadSuccess = $file->move($destinationPath,$fileName);
            $uploadCount++;

            $target = $destinationPath.'/'.$fileName;
            $resized = $destinationPath.'/'.$sudo;
            $width=370;
            $height=300;

            ImageResize::imgResize($target,$resized,$width,$height,$fileExt);
            $done[] = substr($resized,$imgLength+15);
            unlink($target);
          }
          if($uploadCount == $fileCount and $uploadSuccess){
              Post::create([
                  'userId'=>Auth::user()->id,
                  'audience'=>$request->get('audience'),
                  'title'=>$title,
                  'post'=>$request->get('post'),
                  'imgPath'=>$destinationPath,
                  'imgFiles'=>json_encode($done),
                ]);
              Session::flash('post','Post Created');
              return Redirect::to('staff');
            
         
          }
    }
}


public function posts(){
  $posts = DB::table('posts')->paginate(9);
  return View::make('staff.posts')->with('posts',$posts);
}
public function viewpost($id){
  $post = DB::table('posts')->where('id','=',$id)->get();
  return View::make('staff.viewpost')->with('post',$post);
}

public function getUserOrder(Request $request){
   $orderId = $request->get('orderId');
   $orders = DB::table('orders')->where('orderNo','=',$orderId)->get();
   return $orders;
}
public function createinvoice(){
  $orders = DB::table('orders')->where('balance','>',0)->where('status','!=','invoiced')->get();
  $invoices = DB::table('invoices')->orderBy('id','desc')->paginate(5);
  //$invoices = DB::table('invoices')->orderBy('id','desc')->get();
  
   return View::make('staff.createinvoice')
                 ->with('invoices',$invoices)
                 ->with('orders',$orders);

}
public function showInvoice($id){

  $invoice = Invoice::where('id','=',$id)->firstOrFail();
  $orders = json_decode($invoice->orderNo);
  $orderItems = array();
  foreach($orders as $order){
    $orderItems[] = DB::table('orders')->where('orderNo','=',$order)->get();
  }

  $totalCharged = null;
  $totalPaid = null;
  $totalBalance = null;
  $desc = '';
    $client = '';
 foreach($orderItems as $items){
    foreach($items as $item){

      $totalCharged += $item->amountCharged;
      $totalPaid += $item->amountPaid;
      $totalBalance = $totalCharged - $totalPaid;
      $desc .= $item->description.',';
      $client .= $item->client;
      $email = $item->email;
    }
  }
  //echo'</br>';echo'</br>';echo'</br>';return $totalCharged.'==='.$totalPaid.'+++'.$totalBalance;
  $invoiceData = array();

  $invoiceData['client'] = $client;
  $invoiceData['email'] = $email;
  $invoiceData['total'] = $totalCharged;
  $invoiceData['balance'] = $totalBalance;
  $invoiceData['desc'] = $desc;
  return $invoiceData;


}

public function showInvoiceItems(Request $request){
  $id = $request->get('invoiceId');
  $invoice = Invoice::where('id','=',$id)->firstOrFail();
  $orders = json_decode($invoice->orderNo);
  $orderItems = array();
  foreach($orders as $order){
    $orderItems[] = DB::table('orders')->where('orderNo','=',$order)->get();
  }

    $totalCharged = null;
    $totalPaid = null;
    $totalBalance = null;
    $desc = '';
    $client = '';
    $email = '';
    $orderAmount = array();
    $orderIds = array();
    foreach($orderItems as $items){
      foreach($items as $item){
        //echo $item->amountCharged;echo'--';
        $orderAmount[] = $item->amountCharged;
        $orderIds[] = $item->id;
        $totalCharged += $item->amountCharged;
        $totalPaid += $item->amountPaid;
        $totalBalance = $totalCharged - $totalPaid;
        $desc .= $item->description.',';
        $client = $item->client;
        $email = $item->email;

      }
   }

  $invoiceData = array();
  $invoiceData['amountPerOrder'] = $orderAmount;
  $invoiceData['ids'] = $orderIds;
  $invoiceData['description'] = $desc;
  $invoiceData['email'] = $email;
  $invoiceData['client'] = $client;
  $invoiceData['balance'] = $totalBalance;
  $invoiceData['amountPaid'] = $totalPaid;
  $invoiceData['amountCharged'] = $totalCharged;


  return $invoiceData;
}


public function getorder(Request $request){
  $orderId = $request->get('orderId');
  //$orders = DB::table('orders')->where('id','=',$orderId)->get();
  $orders = DB::select(DB::raw('SELECT description,email,client,balance,amountPaid,amountCharged FROM orders WHERE id='.$orderId.''));
  return $orders;
   
  
}
public function storeinvoice(Request $request){
  $this->validate($request,[
    //'productcode'=>'required',
    'orderno'=>'required',
    'email'=>'required',
    'client'=>'required',
    'deliveryNo'=>'required',
 
    ]);
  $invoice= $request->all();
  if(!$invoice){
    return View::make('staff.createinvoice')->withErrors($invoice)->withErrors();
  }else{
        $counter = sprintf('%04d',1);
        $invoiceNo = 'BS'.$counter;

        $orders = $request->get('orderno');
         $orderItems = array();
        foreach($orders as $order){
             DB::table('orders')->where('orderNo','=',$order)->update(array('status'=>'invoiced'));
             $orderItems[] = DB::table('orders')->where('orderNo','=',$order)->get();

             //$orderStatusUpdate = O
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

            $invoiceData = array();
            $invoiceData['description'] = $desc;
            $invoiceData['balance'] = $totalBalance;
            $invoiceData['amountPaid'] = $totalPaid;
            $invoiceData['amountCharged'] = $totalCharged;


      $lastInvoice = DB::table('invoices')->orderBy('id','desc')->take(1)->get();
            $lastInvoiceNo = null;
             foreach ($lastInvoice as $lastInvoice) {
                $lastInvoiceNo = $lastInvoice->invoiceNo;
              }
         //$vat = ($invoiceData['amountCharged'] * 16) / 100;
         //$subtotal = $invoiceData['amountCharged'] + $vat;

       Invoice::create([
          'invoiceNo'=>++$lastInvoiceNo,
          'userId'=>Auth::user()->id,
          'orderNo'=>json_encode($orders),
          'client'=>$request->get('client'),
          'email'=>$request->get('email'),
          'deliveryNo'=>$request->get('deliveryNo'),
          'description'=>$invoiceData['description'],
          'amountCharged'=>$invoiceData['amountCharged'],
          'amountPaid'=>$invoiceData['amountPaid'],
          'balance'=>$invoiceData['balance'],
   

        ]);
     Session::flash('invoice','Invoice Created');
       return Redirect::to('createinvoice');
       
  //return $orderItems;
    }
}

public function editInvoice($id){
 $invoice = Invoice::find($id);
  $orders = DB::table('orders')->get();
 return View::make('staff.editinvoice')
                ->with('invoiceId',$id)
                ->with('orders',$orders);
}

public function storeEditInvoice(Request $request){
    $id = $request->get('invoice_id');
    $vat = $request->get('vat')/100;
    $subtotal = $request->get('subtotal');
    $total=0;
    $total=$subtotal+$subtotal*$vat;

   $invoice = Invoice::find($id);
   //$invoice->invoiceNo=$request->get('invoice_id');
   $invoice->orderNo = $request->get('orderno');
   $invoice->productcode = $request->get('productcode');
   $invoice->item = $request->get('items');
   $invoice->subTotal = $request->get('subtotal');
   $invoice->vat = $request->get('vat');
   $invoice->total = $total;

   $invoice->save();

   //return $request->all();
       Session::flash('editInvoice','Edit Successfuly');
              return Redirect::to('createinvoice');
}

public function createsales(){
  $invoices = DB::table('invoices')->where('balance','>',0)->get();
  $orders = DB::table('orders')->where('balance','>',0)->get();
  $sales = DB::table('sales')->orderBy('id','desc')->paginate(5);
  return View::make('staff.createsales')
                  ->with('invoices',$invoices)
                  ->with('orders',$orders)
                  ->with('sales',$sales);

}


public function retriveinvoice(Request $request){
  $invoiceId = $request->get('invoiceId');
  if($invoiceId > 0){
    $invoice= Invoice::where('id','=',$invoiceId)->firstOrFail();    
    $orders = json_decode($invoice->orderNo);
    $order = array();
    $items = array();
    foreach($orders as $order){
      $orderItem = DB::table('orders')->where('orderNo','=',$order)->get();
      foreach($orderItem as $item){
        $items[$item->id]= $item->orderNo.'-'.$item->client;
       
      }

    }
 return $items;

   }
}
public function storesales(Request $request){
   $this->validate($request,[
    'amount'=>'required',
    /*'mode'=>'required',
    'invoice'=>'required',
    'order'=>'required',
    'description'=>'required',
 
    'client'=>'required',
    'email'=>'required',
    'amountCharged'=>'required',
    'amountPaid'=>'required',
    'balance'=>'required',*/
    ]);
  $sales= $request->all();
  if(!$sales){
     return View::make('staff.createsales')->withErrors($sales)->withInput();
   }else{
       $invoice = $request->get('invoice');
       $orders = $request->get('order');
       $amountCharged = $request->get('amountCharged');
       $amountPaid = $request->get('amountPaid');
       $amountReveived = $request->get('amount');
       $amountPerOrder = $request->get('amountPerOrder');
       $ids = explode(',',$request->get('ids'));
       $balance = $request->get('balance');
 
      $year = date('Y');
      $month = date('m');
      $counter = sprintf('%04d',1);
      $stringformart = 'BS'.$year.$month.$counter;

      if(! empty($invoice)){
        
              $perOrder = explode(',',$amountPerOrder);
              $gcd = null;//Ratio::getGcd($perOrder);
              $ratio = array();
              $totalRatio = null;
              $orm = array();

              if(count($perOrder) > 1){ 
                 $gcd = Ratio::getGcd($perOrder);
                  foreach ($perOrder as $val) {
                 $ratio[] = $val / $gcd;
                 $totalRatio +=  $val / $gcd;
                 
              }
              foreach($ratio as $rat){
                    $orm[] = round(($amountReveived * $rat) / $totalRatio,2);
                 }


              for ($i=0; $i < count($orm); $i++) { 
                  for ($i=0; $i < count($ids); $i++) { 
                            $order = Order::find($ids[$i]); 
                            $order->amountPaid = $order->amountPaid + $orm[$i];
                            $order->balance = $order->amountCharged - $order->amountPaid;
                            $order->save();
                 }
              }
      
             $invoiceUpdate = Invoice::find($invoice);
  
            $invoiceUpdate->amountPaid = $amountPaid + $amountReveived;
            $invoiceUpdate->balance = $request->get('balance') - $amountReveived;
            $invoiceUpdate->save();


         
          $invoice = Invoice::where('id','=',$invoice)->firstOrFail();
          if($invoice->balance == 0){
               for ($i=0; $i < count($ids); $i++) { 
                            $order = Order::find($ids[$i]); 
                            $order->amountPaid = $order->amountCharged;
                            $order->balance = 0;
                            $order->status = 'cleared';
                            $order->save();
                 }
          }
          $orders = json_decode($invoice->orderNo);
          $orderItems = array();
          foreach($orders as $order){
            $orderItems[] = DB::table('orders')->where('orderNo','=',$order)->get();
          }
            $orderIds = array();
            foreach($orderItems as $items){
              foreach($items as $item){

                $orderIds[] = $item->orderNo;
              }
           }
           
           $or = DB::table('sales')->where('orderNo','=',json_encode($orders))->get();
           if(count($or) > 0){
                $salesId = null;
                 foreach($or as $or){
                  $salesId = $or->id;
                 }
                   $sales = Sale::find($salesId);
                   $sales->amountPaid =$request->get('amountPaid')+$request->get('amount');
                   $sales->balance = $request->get('balance') - $request->get('amount');
                   $sales->save();

                  Session::flash('sale','Sale Debit Created');
                  return Redirect::to('staff');
           }else{

                      $lastSale = DB::table('sales')->orderBy('id','desc')->take(1)->get();
                      $lastSaleNo = null;
                       foreach ($lastSale as $lastSale) {
                          $lastSaleNo = $lastSale->receiptNo;
                        }
                      Sale::create([
                        'userId'=>Auth::user()->id,
                        'mode'=>$request->get('mode'),
                        'receiptNo'=>++$lastSaleNo,
                        'invoiceNo'=>$request->get('invoice'),
                        'orderNo'=>json_encode($orderIds),
                        'client'=>$request->get('client'),
                        'email'=>$request->get('email'),
                        'description'=>$request->get('description'),
                        'confirmationCode'=>$request->get('confirm'),
                        'amountCharged'=> $request->get('amountCharged'),
                        'amountPaid'=> $request->get('amount'),
                        'balance'=> $request->get('balance') - $request->get('amount'),
                        ]);
                     Session::flash('sale','Sale Debit Created');
                      return Redirect::to('staff');
           }
            

            }else{

                $o= DB::table('orders')->where('id','=',$request->get('ids'))->get(); 
                $oId = null;
                $orNo = null;
                foreach($o as $o){
                  $oId = $o->id;
                  $orNo = $o->orderNo;
                }
                   $order = Order::find($oId);
                   $order->amountPaid = $amountPaid + $amountReveived;
                   $order->balance = $balance - $amountReveived;
                   $order->save();

                    $invoiceUpdate = Invoice::find($invoice);
                    $invoiceUpdate->amountPaid = $amountPaid + $amountReveived;
                    $invoiceUpdate->balance = $request->get('balance') - $amountReveived;
                    $invoiceUpdate->save();

                     $ors = DB::table('sales')->where('orderNo','=',$orNo)->get();
                     if(count($ors) > 0){
                                              
                         $salesId = null;
                         foreach($ors as $or){
                          $salesId = $or->id;
                         }
                           $sales = Sale::find($salesId);
                           $sales->amountPaid =$request->get('amountPaid')+$request->get('amount');
                           $sales->balance = $request->get('balance') - $request->get('amount');
                           $sales->save();

                          Session::flash('sale','Sale Debit Created');
                          return Redirect::to('staff');


                     }else{

                      $lastSale = DB::table('sales')->orderBy('id','desc')->take(1)->get();
                      $lastSaleNo = null;
                       foreach ($lastSale as $lastSale) {
                          $lastSaleNo = $lastSale->receiptNo;
                        }

                        Sale::create([
                          'userId'=>Auth::user()->id,
                          'mode'=>$request->get('mode'),
                          'receiptNo'=>++$lastSaleNo,
                          'invoiceNo'=>$request->get('invoice'),
                          'orderNo'=> $orNo,
                          'client'=>$request->get('client'),
                          'email'=>$request->get('email'),
                          'description'=>$request->get('description'),
                          'confirmationCode'=>$request->get('confirm'),
                          'amountCharged'=> $request->get('amountCharged'),
                          'amountPaid'=>$request->get('amountPaid')+$request->get('amount'),
                          'balance'=> $request->get('balance') - $request->get('amount'),
                          ]);

                          Session::flash('sale','Sale Debit Created');
                          return Redirect::to('staff');
                     }
              }



      }else if(!empty($orders) && empty($invoice)){
         $orderId = $request->get('order');
         
         
         $mode = $request->get('mode');
         $amountCharged = $request->get('amountCharged');
         $amountPaid = $request->get('amountPaid');
         $amountReveived = $request->get('amount');
         $description = $request->get('description');
         $balance = $request->get('balance');
         $client = $request->get('client');
         $email = $request->get('email');
         

         $order = Order::find($orderId);
         $order->amountPaid = $amountPaid + $amountReveived;
         $order->balance = $balance - $amountReveived;
         $order->save();


         $orders = DB::table('sales')->where('orderNo','=',$order->orderNo)->get();
         if(count($orders) > 0){
                $salesId = null;
                foreach($orders as $or){
                  $salesId = $or->id;
                    }
              $sales = Sale::find($salesId);
              $sales->amountPaid =$request->get('amountPaid')+$request->get('amount');
              $sales->balance = $request->get('balance') - $request->get('amount');
              $sales->save();

            Session::flash('sale','Sale Debit Created');
             return Redirect::to('staff');
         }else{
               $lastSale = DB::table('sales')->orderBy('id','desc')->take(1)->get();
               $lastSaleNo = null;
                   foreach ($lastSale as $lastSale) {
                      $lastSaleNo = $lastSale->receiptNo;
                    }


               Sale::create([
                  'userId'=>Auth::user()->id,
                  'mode'=>$mode,
                  'receiptNo'=>++$lastSaleNo,
                  'invoiceNo'=>$request->get('invoice'),
                  'orderNo'=>$order->orderNo,
                  'client'=>$client,
                  'email'=>$email,
                  'description'=>$description,
                  'confirmationCode'=>$request->get('confirm'),
                  'amountCharged'=> $amountCharged,
                  'amountPaid'=> $amountPaid + $amountReveived,
                  'balance'=> $request->get('balance') - $amountReveived,
                 ]);


         Session::flash('sale','Sale Debit Created');
         return Redirect::to('staff');

         }
         
      }else{
          $mode = $request->get('mode');
         $amountCharged = $request->get('ac');
         //$amountPaid = $request->get('amountPaid');
         $amountReveived = $request->get('amount');
         $description = $request->get('desc');
         $balance = $amountCharged - $amountReveived;
         $client = $request->get('clientelle');
         $email = $request->get('emailAdd');
         
         $lastSale = DB::table('sales')->orderBy('id','desc')->take(1)->get();
         $lastSaleNo = null;
             foreach ($lastSale as $lastSale) {
                $lastSaleNo = $lastSale->receiptNo;
              }  

          Sale::create([
                  'userId'=>Auth::user()->id,
                  'mode'=>$mode,
                  'receiptNo'=>++$lastSaleNo,
                  'invoiceNo'=>$request->get('invoice'),
                  'orderNo'=> $request->get('order'),
                  'client'=>$client,
                  'email'=>$email,
                  'description'=>$description,
                  'confirmationCode'=>$request->get('confirm'),
                  'amountCharged'=> $amountCharged,
                  'amountPaid'=> $amountReveived,
                  'balance'=> $balance,
                 ]);
         Session::flash('sale','Sale Debit Created');
         return Redirect::to('staff');
      }


  }
 
}


public function createasset(){
   $assets = DB::table('assets')->orderBy('id','desc')->paginate(10);
     return View::make('staff.createasset')
                     ->with('assets',$assets);
   }

public function storeasset(Request $request){
     $this->validate($request,[
        'mode'=>'required',
        'item'=>'required',
        'description'=>'required',
        'amount'=>'required',
        'phone'=>'required',
        'client'=>'required',
        'email'=>'required',
        'balance'=>'required',
    ]);
     $assets = $request->all();
     if(!$assets){
      return View::make('staff.createasset')->withErrors($assets)->withInput();
     }else{
         //$trackingNo = 'BS-asset'.Auth::user()->id.mt_rand(0,10000);

            $counter = sprintf('%04d',1);
            $tracking = 'BST'.$counter;
            $lastTrackingNo = DB::table('assets')->orderBy('id','desc')->take(1)->get();
            $trackingNo = null;
             foreach ($lastTrackingNo as $lastTrackingNo) {
                $trackingNo = $lastTrackingNo->trackingNo;
              }

         Asset::create([
            'trackingNo'=>++$trackingNo,
            'userId'=>Auth::user()->id,
            'mode'=>$request->get('mode'),
            'item'=>$request->get('item'),
            'amount'=>$request->get('amount'),
            'balance'=>$request->get('balance'),
            'confirmationCode'=>$request->get('confirm'),
            'description'=>$request->get('description'),
            'client'=>$request->get('client'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),

          ]);
       Session::flash('asset','Asset Debit Created');
       return Redirect::to('staff');

     }
}

public function createliability(){
    $liabilities = DB::table('liabilities')->orderBy('id','desc')->paginate(1);
    return View::make('staff.createliability')
                          ->with('liabilities',$liabilities);
   }

public function storeliability(Request $request){
     $this->validate($request,[
       'amount'=>'required',
       'intrest'=>'required',
       'perInstallment'=>'required',
       'balance'=>'required',
       'description'=>'required',
       'creditor'=>'required',
       'email'=>'required',
       'phone'=>'required',
       'endDate'=>'required',
       'startDate'=>'required',
       'confirm'=>'required',
       'mode'=>'required',
    ]);
     $assets = $request->all();
     if(!$assets){
      return View::make('staff.createliability')->withErrors($assets)->withInput();
     }else{
             $startDate=$request->get('startDate');
              $endDate=$request->get('endDate');

            $sFormat = explode('/', $startDate);
            $eFormat = explode('/', $endDate);
            $fStartDate = $sFormat[2]."-".$sFormat[0]."-".$sFormat[1];
            $fEndDate = $eFormat[2]."-".$eFormat[0]."-".$eFormat[1];

        //$trackingNo = 'BS-liability'.Auth::user()->id.mt_rand(0,10000);
            $counter = sprintf('%04d',1);
            $tracking = 'BST'.$counter;
            $lastTrackingNo = DB::table('liabilities')->orderBy('id','desc')->take(1)->get();
            $trackingNo = null;
             foreach ($lastTrackingNo as $lastTrackingNo) {
                $trackingNo = $lastTrackingNo->trackingNo;
             }

        Liability::create([
            'trackingNo'=>++$trackingNo,
            'userId'=>Auth::user()->id,
            'amount'=>$request->get('amount'),
            'intrest'=>$request->get('intrest'),
            'perInstallment'=>$request->get('perInstallment'),
            'balance'=>$request->get('balance'),
            'mode'=>$request->get('mode'),
            'confirmationCode'=>$request->get('confirm'),
            'description'=>$request->get('description'),
            'creditor'=>$request->get('creditor'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'completion'=>$fStartDate,
            'deadline'=>$fEndDate,

          ]);
       Session::flash('liability','Liability Debit Created');
       return Redirect::to('staff');
       //return $request->get('intrest');
     }
}
public function createcapital(){
  $capitals = DB::table('capitals')->orderBy('id','desc')->paginate(1);
  return View::make('staff.createcapital')
                               ->with('capitals',$capitals);
}
public function storecapital(Request $request){
     $this->validate($request,[
       'amount'=>'required',
       'shareHolder'=>'required',
       'email'=>'required',
       'phone'=>'required',
       'mode'=>'required',
       'totalCapital'=>'required',
       'balance'=>'required',
    ]);
     $capital = $request->all();
     if(!$capital){
      return View::make('staff.createcapital')->withErrors($capital)->withInput();
     }else{
          
        //$trackingNo = 'BS-capital'.Auth::user()->id.mt_rand(0,10000);
            $counter = sprintf('%04d',1);
            $tracking = 'BST'.$counter;
            $lastTrackingNo = DB::table('capitals')->orderBy('id','desc')->take(1)->get();
            $trackingNo = null;
             foreach ($lastTrackingNo as $lastTrackingNo) {
                $trackingNo = $lastTrackingNo->trackingNo;
              }


        Capital::create([
            'trackingNo'=>++$trackingNo,
            'userId'=>Auth::user()->id,
            'totalCapital'=>$request->get('totalCapital'),
            'amountReceived'=>$request->get('amount'),
            'balance'=>$request->get('balance'),
            'mode'=>$request->get('mode'),
            'confirmationCode'=>$request->get('confirm'),
            'shareHolder'=>$request->get('shareHolder'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            

          ]);
       Session::flash('capital','Capital Debit Created');
       return Redirect::to('staff');
     }
   }

public function creditliability(){
    $liabilities = DB::table('liabilities')->get();
    $creditliabilities = DB::table('credit_liabilities')->orderBy('id','desc')->paginate(1);
    return View::make('staff.creditliability')
                   ->with('creditliabilities',$creditliabilities)
                   ->with('liabilities',$liabilities);
   }
public function retriveliability(Request $request){
  $trackId = $request->get('trackId');
  $liability = Liability::where('id','=',$trackId)->firstOrFail();
  return $liability;
}
public function storecreditliability(Request $request){
      $this->validate($request,[
        'mode'=>'required',
        'type'=>'required',
        'track'=>'required',
        'principal'=>'required',
        'intrest'=>'required',
        'installment'=>'required',
        'balance'=>'required',
        'description'=>'required',
        'creditor'=>'required',
        'email'=>'required',
         'phone'=>'required'
        ]);
      $creditliability = $request->all();
      if(!$creditliability){
        return View::make('staff.createliability')->withErrors($creditliability)->withInput();

      }else{


          CreditLiability::create([
            'trackingNo'=>$request->get('track'),
            'userId'=>Auth::user()->id,
            'mode'=>$request->get('mode'),
            'type'=>$request->get('type'),
            'principal'=>$request->get('principal'),
            'intrest'=>$request->get('intrest'),
            'installment'=>$request->get('installment'),
            'balance'=>$request->get('balance'),
            'confirmationCode'=>$request->get('confirm'),
            'description'=>$request->get('description'),
            'creditor'=>$request->get('creditor'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            ]);
                Session::flash('creditliability','Liability Credit Created');
                return Redirect::to('staff');
      }
 }

 public function creditasset(){
    $creditassets = DB::table('credit_assets')->orderBy('id')->paginate(5);
    $assets = DB::table('assets')->orderBy('id')->get();
   return View::make('staff.creditasset')
                    ->with('creditassets',$creditassets)
                    ->with('assets',$assets);
 }

 public function retrivecreditasset(Request $request){
  $trackId = $request->get('trackId');
  $asset = Asset::where('id','=',$trackId)->firstOrFail();
  return $asset;
 }
 public function storecreditasset(Request $request){
      $this->validate($request,[
        'mode'=>'required',
        'type'=>'required',
        'track'=>'required',
        'amount'=>'required',
        'balance'=>'required',
        'description'=>'required',
        'receiver'=>'required',
        'email'=>'required',
         'phone'=>'required'
        ]);
      $creditasset = $request->all();
      if(!$creditasset){
        return View::make('staff.createasset')->withErrors($creditasset)->withInput();

      }else{

          CreditAsset::create([
            'trackingNo'=>$request->get('track'),
            'userId'=>Auth::user()->id,
            'mode'=>$request->get('mode'),
            'type'=>$request->get('type'),
             'amount'=>$request->get('amount'),
             'balance'=>$request->get('balance'),
            'confirmationCode'=>$request->get('confirm'),
            'description'=>$request->get('description'),
            'receiver'=>$request->get('receiver'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            ]);
                Session::flash('creditasset','Asset Credit Created');
                return Redirect::to('staff');
              
      }
 }
public function createexpense(){
  $expenses = DB::table('expenses')->orderBy('id','desc')->paginate(5);
  return View::make('staff.createexpense')->with('expenses',$expenses);
}

public function storeexpense(Request $request){
      $this->validate($request,[
        'mode'=>'required',
        'balance'=>'required',
        'amount'=>'required',
        'department'=>'required',
        'description'=>'required',
        'paidto'=>'required',
        'email'=>'required',
         'phone'=>'required'
        ]);
      $expense = $request->all();
      if(!$expense){
        return View::make('staff.createexpense')->withErrors($expense)->withInput();

      }else{
           //   $trackingNo = 'BS-expense'.Auth::user()->id.mt_rand(0,10000);
            $counter = sprintf('%04d',1);
            $tracking = 'BST'.$counter;
            $lastTrackingNo = DB::table('expenses')->orderBy('id','desc')->take(1)->get();
            $trackingNo = null;
             foreach ($lastTrackingNo as $lastTrackingNo) {
                $trackingNo = $lastTrackingNo->trackingNo;
              }


          Expense::create([
            'trackingNo'=>++$trackingNo,
            'userId'=>Auth::user()->id,
            'mode'=>$request->get('mode'),
             'department'=>$request->get('department'),
             'amount'=>$request->get('amount'),
            'balance'=>$request->get('balance'),
            'confirmationCode'=>$request->get('confirm'),
            'description'=>$request->get('description'),
            'paidto'=>$request->get('paidto'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            ]);
                Session::flash('expense','Expense Credit Created');
                return Redirect::to('staff');
              
      }
 }

public function createpurchase(){
  $purchases = DB::table('purchases')->orderBy('id','desc')->paginate(5);
  //$orders = DB::table('orders')->where('balance','>',0)->where('status','=','received')->get();
   $orders = DB::table('orders')->get();
  return View::make('staff.createpurchase')->with('purchases',$purchases)
                                           ->with('orders',$orders);
}
public function storepurchase(Request $request){
      $this->validate($request,[
        'mode'=>'required',
        'order'=>'required',
        'type'=>'required',
        'amount'=>'required',
        'amountspent'=>'required',
        'description'=>'required',
        'supplier'=>'required',
        'email'=>'required',
        'phone'=>'required'
        ]);
      $purchase = $request->all();
      if(!$purchase){
        return View::make('staff.createpurchase')->withErrors($purchase)->withInput();

      }else{
         $orders = $request->get('order');
         $amountCharged = $request->get('amount');
         $amountspent = $request->get('amountspent');
         $supplier = $request->get('supplier');
         $email = $request->get('email');
         $phone = $request->get('phone');
         $type = $request->get('type');
         $mode = $request->get('mode');
         $description = $request->get('description');
         $balance = $amountCharged - $amountspent;

          foreach($orders as $order){
             $order = Order::find($order);
             $order->amountSpent = $amountCharged;
             $order->profit = (($order->amountPaid - $order->amountspent)/ $order->amountCharged) * 100;
             $order->save();

           }

            $counter = sprintf('%04d',1);
            $tracking = 'BST'.$counter;

            $lastTrackingNo = DB::table('purchases')->orderBy('id','desc')->take(1)->get();
            $trackingNo = null;
             foreach ($lastTrackingNo as $lastTrackingNo) {
                $trackingNo = $lastTrackingNo->trackingNo;
              }

              Purchase::create([
                'trackingNo'=>++$trackingNo,
                'userId'=>Auth::user()->id,
                'orderId'=>json_encode($orders),
                'mode'=>$mode,
                'type'=>$type,
                'amountDue'=>$amountCharged,
                'amountSpent'=>$amountspent,
                'balance'=>$balance,
                'description'=>$description,
                'supplier'=>$supplier,
                'email'=>$email,
                'phone'=>$phone,
              ]);
              Session::flash('purchase','Purchase Credit Created');
                return Redirect::to('staff');
                
           
      }
}


public function accountsPayable(){
     $expensesPayables= DB::table('expenses')->where('balance','>',0)->orderBy('id','desc')->paginate(1);
      
     $purchasesPayables = DB::table('purchases')->where('balance','>',0)->orderBy('id','desc')->paginate(1);
     $liabilitiesPayables = DB::table('credit_liabilities')->where('balance','>',0)->orderBy('id','desc')->paginate(1);
     $assetsPayables = DB::table('credit_assets')->where('balance','>',0)->orderBy('id','desc')->paginate(1);
     $debitPayables = DB::table('liabilities')->where('balance','>',0)->orderBy('id','desc')->paginate(1);
     //$payables = array_merge($expensesPayables,$purchasesPayables,$liabilitiesPayables,$assetsPayables,$debitPayables);
     
    return View::make('staff.payables')
                        ->with('expensesPayables',$expensesPayables)
                        ->with('purchasesPayables',$purchasesPayables)
                        ->with('liabilitiesPayables',$liabilitiesPayables)
                        ->with('assetsPayables',$assetsPayables)
                        ->with('debitPayables',$debitPayables);
                       // return $expensesPayables->total;
  } 

public function accountsPayable_expenses(){
       $expensesPayables= DB::table('expenses')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
        return View::make('accounts.payables_expenses')
                   ->with('expensesPayables',$expensesPayables);
} 


public function genExpensePayableExcel(){
   $model= Expense::where('balance','>',0)->orderBy('id','desc')->get();
       Excel::create('ExpenseAccountsPayable', function($excel) use($model) {
          $excel->setTitle('Expenses');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Payable Expenses');

         $excel->sheet('expenses',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
}



public function accountsPayable_purchases(){
  $purchasesPayables = DB::table('purchases')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
  return View::make('accounts.payables_purchases')
                 ->with('purchasesPayables',$purchasesPayables);
}

public function genPurchasePayableExcel(){
    $model= Purchase::where('balance','>',0)->orderBy('id','desc')->get();
    Excel::create('PurchasesAccountsPayable', function($excel) use($model) {
          $excel->setTitle('Purchases');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Payable Purchases');

         $excel->sheet('purchases',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');

}




public function accountsPayable_liability(){
  $liabilitiesPayables = DB::table('credit_liabilities')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
  return View::make('accounts.payables_liability')
  ->with('liabilitiesPayables',$liabilitiesPayables);
                 
}

public function genLiabilityPayableExcel(){
   $model = CreditLiability::where('balance','>',0)->orderBy('id','desc')->get();
   Excel::create('LiabilityAccountsPayable', function($excel) use($model) {
          $excel->setTitle('Liabilities');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Payable Liabilities');

         $excel->sheet('liabilities',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
}

public function accountsPayable_debit_liability(){
   $debitPayables = DB::table('liabilities')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
      return View::make('accounts.payables_debit_liability')
                        ->with('debitPayables',$debitPayables);
}
public function genDLiabilityPayableExcel(){
  $model = Liability::where('balance','>',0)->orderBy('id','desc')->get();
  Excel::create('DebitLiabilityAccountsPayable', function($excel) use($model) {
          $excel->setTitle('DebitLiabilities');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Payable Debit Liabilities');

         $excel->sheet('Debitliabilities',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');

}




public function accountsPayable_assets(){
   $assetsPayables = DB::table('credit_assets')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
     return View::make('accounts.payables_assets')
                        ->with('assetsPayables',$assetsPayables);
                        
}

public function genAssetPayableExcel(){
   $model =  CreditAsset::where('balance','>',0)->orderBy('id','desc')->get();
   Excel::create('AssetsAccountsPayable', function($excel) use($model) {
          $excel->setTitle('Assets');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Payable Assets');

         $excel->sheet('Assets',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');


}





public function accountsReceivable_capital(){

  $capitals = DB::table('capitals')->where('amountReceived','>',0)->orderBy('id','desc')->paginate(5);
  return View::make('accounts.receivable_capital')
                   ->with('capitals',$capitals);
}

public function genCapitalReceivableExcel(){
    $model = Capital::where('amountReceived','>',0)->orderBy('id','desc')->get();
        Excel::create('CapitalAccountsReceivable', function($excel) use($model) {
          $excel->setTitle('Capital');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Receivable Capital');

         $excel->sheet('Capital',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');

}


public function accountsReceivable_sales(){
  $sales = DB::table('sales')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
  return View::make('accounts.receivable_sales')
                   ->with('sales',$sales);           
}

public function genSaleReceivableExcel(){
  $model= Sale::where('balance','>',0)->orderBy('id','desc')->get();
    Excel::create('SalesAccountsReceivable', function($excel) use($model) {
          $excel->setTitle('Sales ');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Receivable Sales');

         $excel->sheet('Sales',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
}





public function accountsReceivable_liability(){
  $liabilities = DB::table('liabilities')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
  return View::make('accounts.receivable_liability')
                   ->with('liabilities',$liabilities);           
}

public function genLiabilityReceivableExcel(){
    $model= Liability::where('balance','>',0)->orderBy('id','desc')->get();
        Excel::create('LiabilityAccountsReceivable', function($excel) use($model) {
          $excel->setTitle('Liabilities');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Receivable Liabilities');

         $excel->sheet('Liabilities',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');

}



public function accountsReceivable_assets(){
  $assets= DB::table('assets')->where('balance','>',0)->orderBy('id','desc')->paginate(5);
  return View::make('accounts.receivable_assets')
                   ->with('assets',$assets);           
}

public function genAssetReceivableExcel(){
  $model= Asset::where('balance','>',0)->orderBy('id','desc')->get();
     Excel::create('AssetAccountsReceivable', function($excel) use($model) {
          $excel->setTitle('Assets');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Accounts Receivable Assets');

         $excel->sheet('Assets',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
}

public function orders(){
   $orders = DB::table('orders')->orderBy('id','desc')->paginate(10);
   $clients = DB::table('users')->where('AccessLevel','=',0)->get();
   return View::make('staff.orders')
                 ->with('clients',$clients)
                 ->with('orders',$orders);

}
public function storeUserOrders(Request $request){
    $this->validate($request,[
         'lpo'=>'required',
          'client'=>'required',
          'deadline'=>'required',
          'desc'=>'required',
          'amountCharged'=>'required',
          
      ]);
    $order = $request->all();
    if(!$order){
      return View::make('staff.orders')->withErrors($orders)->withInput();
    }else{
      $clientId = $request->get('client');
      $client = User::find(1);

      $lastOrder = DB::table('orders')->orderBy('id','desc')->take(1)->get();
      $lastOrderNo = null;
       foreach ($lastOrder as $lastOrder) {
         $lastOrderNo = $lastOrder->orderNo;
       }
            $deadline = $request->get('deadline');
            $desc = $request->get('desc');
            $amountCharged = $request->get('amountCharged');
            $lpo = $request->get('lpo');

            $end_date= date('Y-m-d H:i:s',strtotime($deadline));
            $today= date("Y-m-d H:i:s",time());
            $balance = $amountCharged;

              Order::create([
                  'lpoNo'=> $lpo,
                  'userId'=>$client->id,
                  'orderNo'=> ++$lastOrderNo,
                  'client'=>$client->name,
                  'email'=>$client->email,
                  'description'=>$desc,
                  'orderTime'=>$today,
                  'deliveryDeadline'=>$end_date,
                  'amountCharged'=>$amountCharged,
                  'balance'=> $balance,
                  'status'=>'received'
              ]);

      Session::flash('staff-orders','Order SuccessFully Created');
       return Redirect::to('staff/orders');

    }

}

public function storeorders(Request $request){
    $this->validate($request,[
         'lpo'=>'required',
         'phone'=>'required',
         'email'=>'required',
          'client'=>'required',
          'name'=>'required',
          'deadline'=>'required',
          'desc'=>'required',
          'amountCharged'=>'required',
          //'amountPaid'=>'required',
      ]);
    $order = $request->all();
    if(!$order){
      return View::make('staff.orders')->withErrors($orders)->withInput();
    }else{
     
      $lastOrder = DB::table('orders')->orderBy('id','desc')->take(1)->get();
      $lastOrderNo = null;
       foreach ($lastOrder as $lastOrder) {
         $lastOrderNo = $lastOrder->orderNo;
       }
     
      DB::transaction(function($request) use ($request){

            $name = $request->get('name');
            $client = $request->get('client');
            $phone = $request->get('phone');
            $email = $request->get('email');
            $password = $name;
            $accessLevel= $request->get('accessLevel');

            $deadline = $request->get('deadline');
            $desc = $request->get('desc');
            $amountCharged = $request->get('amountCharged');
            //$amountPaid = $request->get('amountPaid');
            $lpo = $request->get('lpo');
            $end_date= date('Y-m-d H:i:s',strtotime($deadline));
            $today= date("Y-m-d H:i:s",time());
            $balance = $amountCharged;

            /*$userId=Auth::user()->id;
            $userName = Auth::user()->username;
            $userEmail = Auth::user()->email;*/

            $lastOrder = DB::table('orders')->orderBy('id','desc')->take(1)->get();
            $lastOrderNo = null;
             foreach ($lastOrder as $lastOrder) {
                $lastOrderNo = $lastOrder->orderNo;
              }
 
            $newUser = User::create(array(
               'name'=> $name,
               'email'=>$email,
               'phone'=>$phone,
               'password'=>bcrypt($password),
               'username'=>$client,
               'AccessLevel'=> $accessLevel,
              ));

            $newOrder = Order::create([
                  'lpoNo'=> $lpo,
                  'userId'=>$newUser->id,
                  'orderNo'=> ++$lastOrderNo,
                  'client'=>$newUser->name,
                  'email'=>$newUser->email,
                  'description'=>$desc,
                  'orderTime'=>$today,
                  'deliveryDeadline'=>$end_date,
                  'amountCharged'=>$amountCharged,
                 // 'amountPaid'=>$amountPaid,
                  'balance'=> $balance,
                  'status'=>'received'
              ]);

             if(!$newUser){
                      throw new Exception("User Not Created");      
                    }

      });
    
    }
   Session::flash('staff-orders','Order SuccessFully Created');
       return Redirect::to('staff/orders');
}


public function viewOrder($id){
  $order = DB::table('orders')->where('id',$id)->get();
  return $order;
 }

public function clients(){
    $clients = DB::table('users')->where('AccessLevel','=',0)->orderBy('id','desc')->paginate(10);

    return View::make('staff.clients')->with('clients',$clients);
  }

public function genSalesExcel(){
        //$model = Sale::where('id','=',$id)->get();
       $model = Sale::all();
       Excel::create('Debitsales', function($excel) use($model) {

    // Set the title
          $excel->setTitle('Sales');

    // Chain the setters
         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

    // Call them separately
          $excel->setDescription('Sales');

         $excel->sheet('sales',function($sheet) use($model){
        //$sheet->fromArray($data);
          $sheet->fromModel($model);
       });

      })->download('xlsx');
  }
public function genDAssetsExcel(){

       $model = Asset::all();
       Excel::create('Debitassets', function($excel) use($model) {

          $excel->setTitle('Debit Assets');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Debit Assets');

         $excel->sheet('assets',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
  }


  public function genDliabilityExcel(){
       $model = Liability::all();
       Excel::create('DebitLiability', function($excel) use($model) {
          $excel->setTitle('Debit liabilities');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Debit Assets');

         $excel->sheet('liabilities',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
  }


  public function genCapitalExcel(){
      $model = Capital::all();
       Excel::create('DebitCapital', function($excel) use($model) {
          $excel->setTitle('Debit Capital');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Debit Capitals');

         $excel->sheet('capitals',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
  }

public function genPurchaseExcel(){
      $model = Purchase::all();
       Excel::create('CreditPurchase', function($excel) use($model) {
          $excel->setTitle('Credit Purchase');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Credit Purchase');

         $excel->sheet('purchases',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
}

public function genCAssetsExcel(){
      $model = CreditAsset::all();
       Excel::create('CreditAssets', function($excel) use($model) {
          $excel->setTitle('Credit Assets');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Credit Assets');

         $excel->sheet('creditassets',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
  }

public function genCliabilityExcel(){
        $model = CreditLiability::all();
       Excel::create('CreditLiability', function($excel) use($model) {
          $excel->setTitle('Credit liabilities');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Credit liabilities');

         $excel->sheet('creaditliabilities',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
}

public function genExpenseExcel(){
      $model = Expense::all();
       Excel::create('CreditExpense', function($excel) use($model) {
          $excel->setTitle('Credit Expense');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Credit Expense');

         $excel->sheet('creaditexpense',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');

}

public function genInvoiceExcel(){
  $model = Invoice::all();
  Excel::create('Invoices', function($excel) use($model) {
          $excel->setTitle('Invoice');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Invoice');

         $excel->sheet('Invoice',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
}

public function genInvoicePdf($id){
   $invoice = Invoice::find($id);

   $pdf = PDF::loadView('print.invoice', $invoice);
   return $pdf->stream();
 }

 public function genOrderExcel(){
   $model = Order::all();
    Excel::create('Orders', function($excel) use($model) {
          $excel->setTitle('Orders');

         $excel->setCreator('Benvin Solutions')
               ->setCompany('Benvin Solutions');

          $excel->setDescription('Orders');

         $excel->sheet('Orders',function($sheet) use($model){

          $sheet->fromModel($model);
       });

      })->download('xlsx');
  }


  public function genOrderPdf($id){
       $orderDetails= Order::find($id);
       $user = User::find($orderDetails->userId);
       $order = DB::table('orders')->where('id','=',$id)->get();
       $orderItems = array();
       $orderItems['order'] = $order;
       $orderItems['details'] = $orderDetails;
       $orderItems['client'] = $user;
       $pdf = PDF::loadView('print.order',$orderItems);
       return $pdf->stream();

  }
}