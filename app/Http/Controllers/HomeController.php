<?php namespace App\Http\Controllers;
use View;
use DB;
use App\User;
use App\Category;
use App\LiveChat;
use Redirect;
use App\Http\Requests;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/*?public function __construct()
	{
		$this->middleware('auth');
	}*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
public function index()
	{
    $fproducts = DB::table('categories')->where('isFeatured','=','1')->take(4)->get();
    
		return view('home')->with('products',$fproducts);
	}
public function about(){
    return View::make('about');
  }
public function contact(){
  return View::make('contact');
}



public function login(){
    	return View::make('auth.login');
      //return View::make('layouts.contact');
    }
public function register(){
    	return View::make('auth.register');
    }

 public function create(RegisterUserRequest $request){
         $user = $request->all();
         if(!$user){
         	return View::make('auth.register')->withErrors($user)->withInput();
         }else{
         	 User::create(
                [
                 'name'=>$request->get('name'),
                 'email'=>$request->get('email'),
                 'phone'=>$request->get('phoneNo'),
                 'password'=>bcrypt($request->get('password')),
                 'username'=>$request->get('username'),
                 'AccessLevel'=>$request->get('accesslevel'),
                ]
         	 	);
             Session::flash('successRegister','Registerd Successfully');
         	 return Redirect::to('auth/login');
   

         }
    }
    public function authenticate(Request $request){
       $attempt = Auth::attempt([
           'email'=> $request->get('email'),
           'password' => $request->get('password')
       	]);
       if(!$attempt){
       	Session::flash('singin-fail','Incorrect Password or Email');
       	return Redirect::to('auth.login');
       }else if(Auth::user()->AccessLevel == 0){
       	  return Redirect::to('user');
       }else if(Auth::user()->AccessLevel == 1){
       	  return Redirect::to('staff');
       }else if(Auth::user()->AccessLevel == 2){
          return Redirect::to('manager');
       }
    }
    public function logout(){
          Auth::logout();
          return Redirect::to('/');
   }

   public function blog(){
    $posts = DB::table('posts')->where('audience','=',0)->paginate(10);
    return View::make('staff.posts')->with('posts',$posts);
   }
   public function news(){
    $posts = DB::table('posts')->where('audience','=',0)->paginate(10);
    return View::make('news')->with('posts',$posts);
   }
public function viewnews($id){
  $post = DB::table('posts')->where('id','=',$id)->get();
  return View::make('viewnews')->with('post',$post);
}


   public function products(){
     $products = DB::table('categories')->orderBy('id','Asc')->paginate(12);
      return View::make('products')
                     ->with('products',$products);
      //return $products;
   }
   public function cproducts($id){
    $catname = DB::select(DB::raw('SELECT name FROM categories WHERE id ='.$id.''));
    $products = DB::table('products')->where('category','=',$id)->paginate(12);
    return View::make('catproducts')
                     ->with('name',$catname)
                     ->with('products',$products);

   }
   public function livechat(Request $request){
       LiveChat::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'description'=>$request->get('desc'),
          ]);
      return'message created';
   }
}
