<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
Route::get('ratio',function(){ 
   $sales = DB::table('sales')->where('balance','>',0)->get();
   return $sales;
});
Route::get('testExcel',function(){
    $data = array(
         array('data1','data2'),
         array('data3','data4')
      );
    $model = DB::table('sales')->get();
      Excel::create('sales', function($excel) use($data) {

    // Set the title
    $excel->setTitle('Our new awesome title');

    // Chain the setters
    $excel->setCreator('Maatwebsite')
          ->setCompany('Maatwebsite');

    // Call them separately
    $excel->setDescription('A demonstration to change the file properties');

    $excel->sheet('sales',function($sheet) use($data){
        //$sheet->fromArray($data);
          $sheet->fromModel($model);
    });

})->download('xlsx');

});
Route::get('/','HomeController@index');
Route::get('index',function(){
	return Redirect::to('/');
});
Route::get('auth/login','HomeController@login');
Route::post('auth/login','HomeController@authenticate');
Route::get('auth/logout','HomeController@logout');
Route::get('auth/register','HomeController@register');
Route::post('auth/register','HomeController@create');
Route::get('news','HomeController@news');
Route::get('viewnews/{id}','HomeController@viewnews');

Route::get('blog','HomeController@blog');
Route::get('products','HomeController@products');
Route::get('cat-products/{id}','HomeController@cproducts');
Route::post('livechat','HomeController@liveChat');
Route::get('about','HomeController@about');
Route::get('contact','HomeController@contact');

Route::group(['middleware'=>'auth'],function(){
	   /*+++++CLIENT ROUTES+++++++*/
		Route::group(['middleware'=>'client'],function(){
			Route::get('user','UserController@index');
			Route::get('user/cart/additem/{id}','UserController@addItem');
			Route::get('user/cart','UserController@showCart');
      Route::post('show-order-product-desc','UserController@orderDesc');
			Route::get('user/removecartitem/{id}','UserController@removeItem');
			Route::get('user/incrementcartitem/{id}','UserController@incrementItem');
			Route::get('user/decrementcartitem/{id}','UserController@decrementItem');
			Route::get('user/makeorder','UserController@makeorder');
			Route::post('user/makeorder','UserController@storeorder');
      Route::get('user/minimize/cart','UserController@showMiniCart');
      Route::get('user/vieworders','UserController@vieworders');
      Route::get('invoices','UserController@invoices');
      Route::get('printinvoices/{id}','UserController@printinvoice');
      Route::get('savedproducts','UserController@myproducts');
      Route::post('savedproducts','UserController@saveProduct');
      Route::get('clientmessages','UserController@clientMessages');

		});
            
             Route::get('gen/invoice','StaffController@genInvoiceExcel');
             Route::get('print/invoice/{id}','StaffController@genInvoicePdf');
             Route::get('gen/order','StaffController@genOrderExcel');
             Route::get('print/order/{id}','StaffController@genOrderPdf');

		/*+++++Manager Routes++++*/
		Route::group(['middleware'=>'staff'],function(){
                  Route::get('staff','JuniorStaffController@index');
                  Route::get('staff/clients','JuniorStaffController@clients');
                  Route::get('viewproducts','JuniorStaffController@products');

                  Route::get('staff/tasks','JuniorStaffController@viewtasks');
                  Route::post('staff/createtask','JuniorStaffController@storetask');
                  Route::get('staff/task/{id}','JuniorStaffController@task');
                  Route::get('staff/deletetask/{id}','JuniorStaffController@deletetask');
                 
                  Route::get('staff/reports','JuniorStaffController@reports');
                  Route::post('staff/uploadreports','JuniorStaffController@storereports');
                  Route::get('staff/viewreport/{id}','JuniorStaffController@viewreport');
                  Route::get('staff/deletereport/{id}','JuniorStaffController@deletereport');

                  //Route::get('staff/createnote','StaffController@createnote');
                  Route::post('staff/createnote','JuniorStaffController@storenote');
                  Route::get('staff/note','JuniorStaffController@note');
                  Route::get('staff/deletenote/{id}','JuniorStaffController@deletenote');
                  Route::get('staff/viewnote/{id}','JuniorStaffController@viewnote');

                  Route::get('staff/createpost','JuniorStaffController@createpost');
                  Route::post('staff/createpost','JuniorStaffController@storepost');
                  Route::get('staff/posts','JuniorStaffController@posts');
                  Route::get('staff/viewpost/{id}','JuniorStaffController@viewpost');
                  
                  Route::get('staff/chats','JuniorStaffController@chat');
                  Route::post('staff/addchat','JuniorStaffController@addchat');

                  Route::get('staff/getchat',array('as'=>'staff/getchat','uses'=>'JuniorStaffController@getchat'));

                  Route::post('staff/storeBroadcast','JuniorStaffController@storeBroadcast');
                  Route::get('staff/getbroadcast',array('as'=>'staff/getbroadcast','uses'=>'JuniorStaffController@getbroadcast'));

            	    Route::get('view/staff/orders','JuniorStaffController@orders');
                  Route::post('view/staff/userorders','JuniorStaffController@storeUserOrders');
                  Route::post('view/staff/orders','JuniorStaffController@storeorders');
                  Route::get('view/staff/order/{id}','JuniorStaffController@viewOrder');
                 // Route::post('getuserorder','StaffController@getUserOrder');	


                  Route::get('staff/createinvoice','JuniorStaffController@createinvoice');
                  Route::post('staff/createinvoice','JuniorStaffController@storeinvoice');
                  Route::post('staff/retriveorder','JuniorStaffController@getorder');
                  Route::get('staff/show-invoice/{id}','JuniorStaffController@showInvoice');
                  Route::post('staff/show-invoice','JuniorStaffController@showInvoiceItems');
               

                   Route::post('staff/clientMesasages','StaffController@storeClientMessage');



		      Route::group(['middleware'=>'manager'],function(){
                        //Route::get('manager','managerController@index');
                  Route::get('manager','StaffController@index');
                  Route::get('createstaff','StaffController@createstaff');
                  Route::post('createstaff','StaffController@storestaff');

                  Route::get('createcategory','StaffController@createproductCategory');
                  Route::post('createcategory','StaffController@storeproductCategory');
                  Route::get('createproduct','StaffController@createproduct');
                  Route::post('createproduct','StaffController@storeproducts');
                  Route::post('fproducts','StaffController@featuredProducts');
                        
                  Route::get('createtask','StaffController@createtask');
                  Route::post('createtask','StaffController@storetask');
                  Route::get('tasks','StaffController@viewtasks');
                  Route::get('task/{id}','StaffController@task');
                  Route::get('deletetask/{id}','StaffController@deletetask');

                  Route::get('chats','StaffController@chat');
                  Route::post('addchat','StaffController@addchat');

                  Route::get('getchat',array('as'=>'getchat','uses'=>'StaffController@getchat'));

                  Route::post('storeBroadcast','StaffController@storeBroadcast');
                  Route::get('getbroadcast',array('as'=>'getbroadcast','uses'=>'StaffController@getbroadcast'));

                  Route::get('uploadreports','StaffController@createreports');
                  Route::post('uploadreports','StaffController@storereports');
                  Route::get('reports','StaffController@reports');
                  Route::get('viewreport/{id}','StaffController@viewreport');
                  Route::get('deletereport/{id}','StaffController@deletereport');

                  Route::get('createnote','StaffController@createnote');
                  Route::post('createnote','StaffController@storenote');
                  Route::get('note','StaffController@note');
                  Route::get('deletenote/{id}','StaffController@deletenote');
                  Route::get('viewnote/{id}','StaffController@viewnote');

                  Route::get('createpost','StaffController@createpost');
                  Route::post('createpost','StaffController@storepost');
                  Route::get('posts','StaffController@posts');
                  Route::get('viewpost/{id}','StaffController@viewpost');

                  Route::get('createinvoice','StaffController@createinvoice');
                  Route::post('createinvoice','StaffController@storeinvoice');
                  Route::post('retriveorder','StaffController@getorder');
                  Route::get('show-invoice/{id}','StaffController@showInvoice');
                  Route::post('show-invoice','StaffController@showInvoiceItems');

                  Route::get('createsalesentry','StaffController@createsales');
                  Route::post('createsalesentry','StaffController@storesales');
                  Route::post('retriveinvoice','StaffController@retriveinvoice');
                  Route::get('edit-invoice/{id}','StaffController@editInvoice');
                  Route::post('edit-invoice/editInvoice','StaffController@storeEditInvoice'); 

                  Route::get('createdebitassetentry','StaffController@createasset');
                  Route::post('createdebitassetentry','StaffController@storeasset');

                  Route::get('createdebitliabilityentry','StaffController@createliability');
                  Route::post('createdebitliabilityentry','StaffController@storeliability');

                  Route::get('createcapitalentry','StaffController@createcapital');
                  Route::post('createcapitalentry','StaffController@storecapital');

                  Route::get('creditliability','StaffController@creditliability');
                  Route::post('creditliability','StaffController@storecreditliability');
                  Route::post('retriveliability','StaffController@retriveliability');

                  Route::get('creditassetentry','StaffController@creditasset');
                  Route::post('creditassetentry','StaffController@storecreditasset');
                  Route::post('retrivecreditasset','StaffController@retrivecreditasset');

                  Route::get('creditexpenseentry','StaffController@createexpense');
                  Route::post('creditexpenseentry','StaffController@storeexpense');

                  Route::get('createpurchaseentry','StaffController@createpurchase');
                  Route::post('createpurchaseentry','StaffController@storepurchase'); 

                  Route::get('payable',function(){
                        return Redirect::to('payable-purchases');
                  });
                  Route::get('payable-purchases','StaffController@accountsPayable_purchases');
                  Route::get('payable-expenses','StaffController@accountsPayable_expenses');
                  Route::get('payable-liability','StaffController@accountsPayable_liability');
                  Route::get('payable-debit-liability','StaffController@accountsPayable_debit_liability');
                  Route::get('payable-assets','StaffController@accountsPayable_assets');

                  Route::get('receivable',function(){
                        return Redirect::to('receivable-sales');
                  });
                  Route::get('receivable-sales','StaffController@accountsReceivable_sales');
                  Route::get('receivable-capital','StaffController@accountsReceivable_capital');
                  Route::get('receivable-liability','StaffController@accountsReceivable_liability');
                  Route::get('receivable-assets','StaffController@accountsReceivable_assets');

                  Route::get('staff/orders','StaffController@orders');
                  Route::post('staff/userorders','StaffController@storeUserOrders');
                  Route::post('staff/orders','StaffController@storeorders');
                  Route::get('view/order/{id}','StaffController@viewOrder');
                  Route::post('getuserorder','StaffController@getUserOrder');


                  Route::get('clients','StaffController@clients');

                  Route::get('gen/salesExcel','StaffController@genSalesExcel');
                  Route::get('gen/D_assestsExcel','StaffController@genDAssetsExcel');
                  Route::get('gen/D_liabilityExcel','StaffController@genDliabilityExcel');
                  Route::get('gen/capitalExcel','StaffController@genCapitalExcel');

                  Route::get('gen/purchaseExcel','StaffController@genPurchaseExcel');
                  Route::get('gen/C_assestsExcel','StaffController@genCAssetsExcel');
                  Route::get('gen/C_liabilityExcel','StaffController@genCliabilityExcel');
                  Route::get('gen/expenseExcel','StaffController@genExpenseExcel');
                  
                  Route::get('gen/purchasePayable','StaffController@genPurchasePayableExcel');
                  Route::get('gen/expensesPayable','StaffController@genExpensePayableExcel');
                  Route::get('gen/liabilityPayable','StaffController@genLiabilityPayableExcel');
                  Route::get('gen/DliabilityPayable','StaffController@genDLiabilityPayableExcel');
                  Route::get('gen/assetsPayable','StaffController@genAssetPayableExcel');

                  Route::get('gen/salesReceivable','StaffController@genSaleReceivableExcel');
                  Route::get('gen/capitalReceivable','StaffController@genCapitalReceivableExcel');
                  Route::get('gen/liabilityReceivable','StaffController@genLiabilityReceivableExcel');
                  Route::get('gen/assetsReceivable','StaffController@genAssetReceivableExcel');

                /* Route::get('gen/invoice','StaffController@genInvoiceExcel');
                 Route::get('print/invoice/{id}','StaffController@genInvoicePdf');

                 Route::get('gen/order','StaffController@genOrderExcel');
                 Route::get('print/order/{id}','StaffController@genOrderPdf');*/

                 Route::post('clientMesasages','StaffController@storeClientMessage');
                 Route::get('viewStaff','StaffController@showStaff');

                 Route::get('analysis','StaffController@analysis');

		        });

		});

	
});

/*Route::get('cart',function(){
 
   return ShoppingCart::getUser();
   
});*/