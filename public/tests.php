<?php


                	Route::get('staff','StaffController@index');
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

                 Route::get('gen/invoice','StaffController@genInvoiceExcel');
                 Route::get('print/invoice/{id}','StaffController@genInvoicePdf');

                 Route::get('gen/order','StaffController@genOrderExcel');
                 Route::get('print/order/{id}','StaffController@genOrderPdf');

                 Route::post('clientMesasages','StaffController@storeClientMessage');
                 Route::get('viewStaff','StaffController@showStaff');

                 Route::get('analysis','StaffController@analysis');

?>