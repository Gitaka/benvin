<?php namespace App\Http\Controllers;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
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
use App\ClientMessage;
use App\SavedProduct;


class JuniorStaffController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
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
    $tasks = DB::table('tasks')->where('userId','=',Auth::user()->id)
             ->orWhere('staffId','=',Auth::user()->id)->orderBy('id','desc')->paginate(5);
    $notes =  DB::table('notes')->where('userId','=',Auth::user()->id)->orderBy('id','desc')->take(5)->get();
    
    $liveChats = DB::table('livechats')->orderBy('id','desc')->get();

   	return View::make('juniorstaff.index')
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
                    ->with('liabilities',$liabilities)
                    ->with('notes',$notes)
                    ->with('tasks',$tasks)
                    ->with('liveChats',$liveChats);
	}
public function clients(){
    $clients = DB::table('users')->where('AccessLevel','=',0)->orderBy('id','desc')->paginate(10);

    return View::make('juniorstaff.clients')->with('clients',$clients);
  }
 public function products(){
     $products = DB::table('products')->orderBy('id','desc')->paginate(10);
     $categories = DB::table('categories')->get();
   	 return View::make('juniorstaff.createproduct')
                       ->with('categories',$categories)
                       ->with('products',$products);
   }

 public function viewtasks(){
      $tasks=DB::table('tasks')->where('userId','=',Auth::user()->id)
                              ->orWhere('staffId','=',Auth::user()->id)->orderBy('id','desc')->paginate(5);
      $clients=DB::table('users')->where('accessLevel','=','0')->get();
      $staffs=DB::table('users')->where('accessLevel','>','0')->get();
      $orders = DB::table('orders')->get();

      return View::make('juniorstaff.tasks')
                               ->with('clients',$clients)
                                ->with('staffs',$staffs)
                                ->with('orders',$orders)
                               ->with('tasks',$tasks);
   }

   public function storetask(TasksRequest $request){
       $task=$request->all();
       if(!$task){
         return View::make('juniorstaff.tasks')->withErrors($task)->withInput();
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
           return Redirect::to('staff');
           

       }
   }




   public function task($id){
      $task = DB::table('tasks')->where('id','=',$id)->get();
      return View::make('staff.task')
                               ->with('task',$task);
   }
   public function deleteTask($id){
       $task=Task::find($id);
       $task->delete();
       return Redirect::to('staff/tasks');
   }
public function reports(){
  $reports = DB::table('reports')->where('permision','=',2)->orderBy('id','desc')->paginate(5);
  return View::make('juniorstaff.viewreports')->with('reports',$reports);
}
public function viewreport($id){
   $report = DB::table('reports')->where('id','=',$id)->get();
   return View::make('juniorstaff.showreport')->with('report',$report);
}
public function deletereport($id){
  $report=Report::find($id);
  $files=json_decode($report->files);
  $report->delete();

  
  return Redirect::to('staff/reports');
}

public function note(){
  $notes = DB::table('notes')->where('userId','=',Auth::user()->id)->orderBy('id','desc')->paginate(10);
  return View::make('juniorstaff.notes')->with('notes',$notes);
}
public function storenote(Request $request){
    $this->validate($request,[
        'subject'=>'required',
        'note'=>'required',
      ]);
    $note = $request->all();
    if(!$note){
      return View::make('juniorstaff.note')->withErrors($note)->withInput();
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
public function viewnote($id){
  $note = DB::table('notes')->where('id','=',$id)->get();
  return View::make('juniorstaff.viewnote')->with('note',$note);
}
public function deletenote($id){
  $note = Note::find($id);
  $note->delete();
  return Redirect::to('staff/note');

}

public function createpost(){
      return View::make('juniorstaff.createpost');
    }
public function storereports(Request $request){
       $this->validate($request,[
          'file'=>'required|array|max:1500',
          'summary'=>'required',
          'subject'=>'required',
        ]);

       $report = $request->all();
       if(!$report){
          return View::make('juniorstaff.index')->withErrors($report)->withInput();
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
public function storepost(Request $request){
    $this->validate($request,[
       'title'=>'required',
       'audience'=>'required',
       'post'=>'required',
       'imgs'=>'required|array',
      ]);
    $post = $request->all();
    if(!$post){
      return View::make('juniorstaff.createpost')->withErrors($post)->withInput();
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
  return View::make('juniorstaff.posts')->with('posts',$posts);
}
public function viewpost($id){
  $post = DB::table('posts')->where('id','=',$id)->get();
  return View::make('juniorstaff.viewpost')->with('post',$post);
}


public function chat(){
     $userId=Auth::user()->id;
     $senderId=Auth::user()->id;
     $staff=DB::table('users')->where('accessLevel','>',0)
                              ->where('id','!=',Auth::user()->id)
                              ->get();
    
    return View::make('juniorstaff.chat')
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




public function orders(){
   $orders = DB::table('orders')->orderBy('id','desc')->paginate(10);
   $clients = DB::table('users')->where('AccessLevel','=',0)->get();
   return View::make('juniorstaff.orders')
                 ->with('clients',$clients)
                 ->with('orders',$orders);

}

public function viewOrder($id){
  $order = DB::table('orders')->where('id',$id)->get();
  return $order;
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
      return View::make('juniorstaff.orders')->withErrors($orders)->withInput();
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
       return Redirect::to('view/staff/orders');

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
      return View::make('juniorstaff.orders')->withErrors($orders)->withInput();
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
       return Redirect::to('view/staff/orders');
}


public function createinvoice(){
  $orders = DB::table('orders')->where('balance','>',0)->where('status','!=','invoiced')->get();
  $invoices = DB::table('invoices')->orderBy('id','desc')->paginate(5);
  //$invoices = DB::table('invoices')->orderBy('id','desc')->get();
  
   return View::make('juniorstaff.createinvoice')
                 ->with('invoices',$invoices)
                 ->with('orders',$orders);

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
    return View::make('juniorstaff.createinvoice')->withErrors($invoice)->withErrors();
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
       return Redirect::to('staff');
       
  //return $orderItems;
    }
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
public function getorder(Request $request){
  $orderId = $request->get('orderId');
  //$orders = DB::table('orders')->where('id','=',$orderId)->get();
  $orders = DB::select(DB::raw('SELECT description,email,client,balance,amountPaid,amountCharged FROM orders WHERE id='.$orderId.''));
  return $orders;
   
  
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









}
