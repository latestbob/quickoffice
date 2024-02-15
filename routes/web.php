<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/welcome', function () {
    return view('welcome');
});



////////////////////////////////////straight login////////////////////////////////////////////////////////

Route::get('/{name}/login','Auth\LoginController@showofficelogin')->name('straight.office.login');
Route::post('staff/login','Auth\LoginController@showofficeloginpost')->name('show.office.login.post');

//Route::get('/{office}','Auth\LoginController@showofficeloginanother')->name('straight.office.login');
//resubscription post request




//Auth::routes();

Auth::routes([
    'register' => false, // Registration Routes...
    'login' => false, // Login Routes...
    
  ]);

  //////////////////////////////////Task/Activities///////////////////////////////////

Route::post('/activity','pagesController@addweeklytask')->name('addweeklytask')->middleware('auth');

//update activity

Route::put('/activity','pagesController@updateactivity')->name('updateactivity')->middleware('auth');

  //////////////////////////////////End of Task/Activities////////////////////////////

/////////////////////////////////BASIC STAFFS /////////////////////////////////////////
Route::get('/staff', 'HomeController@index')->name('home')->middleware('staff'); //other staffs home

//Route::get('/staff','HomeController@staffindex')->name('staffindex')->middleware('staff');
Route::get('/schedule','HomeController@schedule')->name('staff.schedule')->middleware('staff'); //other staffs schedules

Route::get('/tasks','HomeController@tasks')->name('staff.tasks')->middleware('staff'); //other staffs tasks

Route::get('/message','HomeController@message')->name('staff.message')->middleware('staff'); //other staff message

Route::get('/report','HomeController@report')->name('staff.report')->middleware('staff'); //other staff report

Route::get('/report/{id}','HomeController@reportpdf')->name('staff.report.pdf')->middleware('staff');//staff report pdf

Route::get('/clients','HomeController@clients')->name('staff.clients')->middleware('staff'); //other staff clients page

Route::get('/events','HomeController@events')->name('staff.events')->middleware('staff'); //other staff events

Route::get('/event/{id}','HomeController@eventsview')->name('event.view')->middleware('staff'); //staff view specifice event


//staff profile page 

Route::get('/staff/profile','HomeController@profilepage')->name('staff.profile.page')->middleware('staff'); //staff profile page routes


//staff SETTING PAGE

Route::get('/staff/setting','HomeController@staffsetting')->name('staff.setting.page')->middleware('staff'); //staff setting page

//staff setting update put

Route::put('/staff/setting','HomeController@staffsettingupdate')->name('staff.setting.update')->middleware('staff'); //staff setting update





//staff view task 

Route::get('/tasks/{id}','HomeController@tasksview')->name('staff.view.task')->middleware('staff'); //staff view task

//staff edit task

Route::get('/tasks/edit/{id}','HomeController@tasksedit')->name('staff.edit.task')->middleware('staff'); //staff edit task


//staff edit task put 

Route::put('/tasks/edit','HomeController@taskeditput')->name('staff.edit.task.put')->middleware('staff'); //staff edit task put

//staff delete task comfirm get request

Route::get('/tasks/delete/{id}','HomeController@taskdelete')->name('staff.delete.task')->middleware('staff'); //staff delete task

//staff delete tasks delete request

Route::delete('/tasks/delete','HomeController@taskdeletedelete')->name('staff.delete.taskdelete')->middleware('staff'); //staff delete delete request



//staff view specifice type of task 

Route::get('/task/{task}','HomeController@viewspecifictaskstaff')->name('staff.view.specific.task.type')->middleware('staff'); //staff view speicific task type


Route::get('/staff/hint','HomeController@staffhinthide')->name('staff.hint.hide')->middleware('staff'); //staff hints





Route::get('/staff/expenses','HomeController@staffexpenses')->name('staff.expenses')->middleware('staff');

Route::get('/staff/expense/unique','HomeController@staffexpenseunique')->name('staff.expenses.unique')->middleware('auth');


Route::post('/expense/reminder','HomeController@expensereminder')->name('expensereminder')->middleware('auth');



//////////////////////////////ADMIN ROUTES//////////////////////////////////////////////////////
//admin staff home
Route::get('admin/home', 'Office\AdminController@home')->name('admin.home')->middleware('admin');
Route::get('admin/staffs','Office\AdminController@staff')->name('admin.staff')->middleware('admin'); //admin staff page

//admin view staff

Route::get('/admin/staff/{id}','Office\AdminController@viewstaff')->name('admin.view.staff')->middleware('admin'); //admin view staff

//profile page  

Route::get('/admin/profile','Office\AdminController@profilepage')->name('admin.profile.page')->middleware('admin'); //admin profile page

//account setting routes to set email password and others

Route::get('/admin/setting','Office\AdminController@settingpage')->name('admin.setting.page')->middleware('admin'); //admin setting page

//account setting route post request

Route::put('/admin/post','Office\AdminController@settingpost')->name('admin.setting.post')->middleware('admin'); //admin setting page post

//admin view staff edit

Route::get('/admin/edit/staff/{id}','Office\AdminController@editstaff')->name('admin.edit.staff')->middleware('admin'); //admin edit staff

//admin staff edit put

Route::put('/admin/edit/staff/{id}','Office\AdminController@editstaffpost')->name('admin.edit.staff.post')->middleware('admin'); //edit staff post

//admin staff delete get confirm

Route::get('/admin/delete/staff/{id}','Office\AdminController@deletestaff')->name('admin.delete.staff')->middleware('admin'); //admin delete staff confirm get request


Route::delete('/admin/delete/staff','Office\AdminController@deletestaffpost')->name('admin.delete.staff.post')->middleware('admin'); //admin delete staff posts



Route::get('admin/schedule','Office\AdminController@schedule')->name('admin.schedule')->middleware('admin'); //admin schedule page

//admin post create meeting

Route::post('admin/schedule','Office\AdminController@createmeeting')->name('admin.create.meeting')->middleware('admin'); //admin schedule create meeting

Route::get('admin/tasks','Office\AdminController@tasks')->name('admin.tasks')->middleware('admin'); //admin tasks



//admin view task 

Route::get('/admin/tasks/{id}','Office\AdminController@tasksview')->name('admin.view.task')->middleware('admin'); //admin view task


//admin edit tasks get


Route::get('/admin/tasks/edit/{id}','Office\AdminController@tasksedit')->name('admin.edit.task')->middleware('admin'); //admin edit task


//admin edit task put 

Route::put('/admin/tasks/edit','Office\AdminController@taskeditput')->name('admin.edit.task.put')->middleware('admin'); //admin edit task put


//admin delete task comfirm get request

Route::get('/admin/tasks/delete/{id}','Office\AdminController@taskdelete')->name('admin.delete.task')->middleware('admin'); //admin delete task


//admin delete tasks delete request

Route::delete('/admin/tasks/delete','Office\AdminController@taskdeletedelete')->name('admin.delete.taskdelete')->middleware('admin'); //admin delete delete request



Route::get('admin/account','Office\AdminController@account')->name('admin.account')->middleware('admin'); //admin account page

Route::put('admin/account','Office\AdminController@expensestatus')->name('admin.account.expenses')->middleware('admin');

Route::get('admin/message','Office\AdminController@message')->name('admin.message')->middleware('admin'); //admin message

Route::get('admin/report','Office\AdminController@report')->name('admin.report')->middleware('admin'); //admin report page

Route::get('admin/client','Office\AdminController@client')->name('admin.client')->middleware('admin'); //admin client page


//add client post
Route::post('/admin/client','Office\AdminController@clientpost')->name('admin.client.post')->middleware('admin'); //admin cleint post

//admin edit client

Route::get('/admin/client/edit/{id}','Office\AdminController@editclient')->name('admin.client.edit')->middleware('admin');// admin


//admin edit client post

Route::put('/admin/client/edit/post','Office\AdminController@editclientpost')->name('admin.client.edit.post')->middleware('admin'); //admin edit post


//admin delete client confirm get request

Route::get('/admin/client/delete/{id}','Office\AdminController@deleteclientget')->name('admin.client.delete')->middleware('admin'); //admin delete client confirm get request

//admin delete client put

Route::delete('/admin/client/delete','Office\AdminController@deleteclientpost')->name('admin.client.delete.post')->middleware('admin'); //admin deleete

//admin client email confirm get

Route::get('/admin/client/email/{id}','Office\AdminController@emailclient')->name('admin.email.client')->middleware('admin'); //admin email client modal get

Route::get('admin/calender','Office\AdminController@calender')->name('admin.calender')->middleware('admin'); //admin calendar page

Route::post('admin/event/post','Office\AdminController@addevent')->name('admin.add.event')->middleware('admin'); //admin add new event


Route::get('admin/branchdepartments','Office\AdminController@branchdepartment')->name('admin.branchdepartment')->middleware('admin'); //admin branch departments page

//adding branch [NOTE BY DEFAULT HEAD QUARTERS MUST BE ADDED AS BRANCH WHEN OFFICE IS REGISTERED]

Route::post('/add/branch','Office\AdminController@addbranch')->name('admin.addbranch')->middleware('admin'); //add branch

//admin view branch

Route::get('/branch/{id}','Office\AdminController@viewbranch')->name('admin.viewbranch')->middleware('admin'); //admin view branch 

//admin edit branch

Route::get('/branch/edit/{id}','Office\AdminController@editbranch')->name('admin.editbranch')->middleware('admin'); //admin edit branch

//admin edit branch post

Route::put('/branch/edit/{id}','Office\AdminController@editbranchpost')->name('admin.editbranchpost')->middleware('admin'); //admin edit branch post


//admin delete branch confirm get request

Route::get('/branch/delete/{id}','Office\AdminController@deletebranch')->name('admin.deletebranch')->middleware('admin'); //admin delete branch

// admin delete branch confirm delete request

Route::delete('/branch/delete','Office\AdminController@deletebranchpost')->name('admin.deletebranchpost')->middleware('admin'); //admin delete branch confirm post



Route::post('/createstaff','Office\AdminController@createstaff')->name('admin.createstaff')->middleware('admin'); //admin create new staff

// Route::get('/admin/report/{id}','Office\AdminController@reportview')->name('admin.report.view')->middleware('admin'); //admin report view


//admin tasks routes ///

Route::get('/admin/task/{task}','Office\AdminController@viewtasktype')->name('admin.view.task.type')->middleware('admin');  //admin view task types 


//generate report admin

// Route::get('/admin/{id}','Office\AdminController@reportpdf')->name('admin.report.pdf')->middleware('admin');//admin


Route::delete('/admin/event/{id}','Office\AdminController@deleteevents')->name('admin.delete.event')->middleware('admin'); //admin delete events


//publish task  report

Route::post('/admin/publish/task','Office\AdminController@publictasks')->name('admin.publishtask')->middleware('admin');



//Weekly reports





//route create subsidary expenses

Route::post('/admin/subisidary/expense','Office\AdminController@subsidaryexpense')->name('admin.subsidary.expense')->middleware('admin');
//////////////////////////////ADMIN ROUTES//////////////////////////////////////////////////////


Route::get('/admin/toggle','Office\AdminController@toggle')->name('admintoggle')->middleware('admin');

Route::get('/admin/tasksummary','Office\AdminController@tasksummary')->name('admintasksummary')->middleware('admin');

Route::get('/admin/summary/{name}','Office\AdminController@summaryname')->name('adminsummaryname')->middleware('admin');



////////////////////////////////////////ACCOUNTANT ROUTES////////////////////////////////////////////////
//account staffs home
Route::get('account/home', 'Office\AccountController@home')->name('account.home')->middleware('account'); //account home
Route::get('account/schedule','Office\AccountController@schedule')->name('account.schedule')->middleware('account'); //account schedule page

Route::get('account/tasks','Office\AccountController@tasks')->name('account.tasks')->middleware('account'); //account task page


//Account profile page

Route::get('account/profile','Office\AccountController@profilepage')->name('account.profile.page')->middleware('account'); //account profile page

//Account setting page

Route::get('account/setting','Office\AccountController@settingpage')->name('account.setting.page')->middleware('account'); //account setting page


//account setting update put

Route::put('account/setting','Office\AccountController@settingupdate')->name('account.setting.update')->middleware('account'); //account setting update


//account view task
Route::get('/account/tasks/{id}','Office\AccountController@tasksview')->name('account.view.task')->middleware('account'); //account view task


//account edit task

Route::get('/account/tasks/edit/{id}','Office\AccountController@tasksedit')->name('account.edit.task')->middleware('account'); //account edit task


//account edit task put 

Route::put('/account/tasks/edit','Office\AccountController@taskeditput')->name('account.edit.task.put')->middleware('account'); //account edit task put

//account delete task comfirm get request

Route::get('/account/tasks/delete/{id}','Office\AccountController@taskdelete')->name('account.delete.task')->middleware('account'); //account delete task

//account delete task delete request
Route::delete('/account/tasks/delete','Office\AccountController@taskdeletedelete')->name('account.delete.taskdelete')->middleware('account'); //account delete delete request


Route::get('account/acounts','Office\AccountController@accounts')->name('account.accounts')->middleware('account'); //account account page

//accountant add expenses post

Route::post('account/expenses','Office\AccountController@addexpenses')->name('account.addexpense')->middleware('auth'); //account add expenses

Route::get('account/message','Office\AccountController@message')->name('account.message')->middleware('account'); //account message page

//edit expense modal get

//Expenses statement

Route::get('account/expenses/statement','Office\AccountController@expensestatement')->name('account.expenses.statement')->middleware('account');  //account expenses statement


//Route::post('account/job/post','Office\AccountController@createjob')->name('account.create.job')->middleware('account'); //account create job

//

Route::post('/account/job/create','Office\AccountController@createnewjob')->name('account.job.create')->middleware('account'); //account 

//geting all jobs for a client

Route::get('account/job/{client}','Office\AccountController@jobsforclient')->name('account.job.for.client')->middleware('account'); ///all job for specific clients

Route::get('/account/edit/{id}','Office\AccountController@editexpense')->name('account.edit.expense')->middleware('account'); //account expenses

//edit expense modal post

Route::put('/account/edit/post','Office\AccountController@editexpensepost')->name('account.edit.post')->middleware('account'); //account edit expense put request


//delete expense model get 

Route::get('/account/delete/{id}','Office\AccountController@deletegetrequest')->name('account.delete.expenses')->middleware('account'); //account delete expense confirm get request

// account delete expense model delete request

Route::delete('/account/delete','Office\AccountController@deletedelete')->name('account.delete.expenses')->middleware('account'); //account delete expense delete request


///accout money received section ///////////////////////////////////

//account post received payments
Route::post('/account/received/pay','Office\AccountController@receivecpaypost')->name('account.received.pay.post')->middleware('account'); //account received pay post

//account received payment edit get request

Route::get('/account/received/edit/{id}','Office\AccountController@receivepayedit')->name('account.receive.pay.edit')->middleware('account'); //account received pay edit request

//account received payment edit put request

Route::put('/account/received/edit','Office\AccountController@receivedpayeditput')->name('account.received.edit.pay.put')->middleware('account'); //account received edit pay put request


// income statement for accounting 
Route::get('/account/income/statement','Office\AccountController@incomestatement')->name('account.incomestatement')->middleware('account'); //account income statment 

//account received payment delete get confirm request


Route::get('/account/delete/received/{id}','Office\AccountController@deletereceivedget')->name('account.received.delete.get.request')->middleware('account'); //account received delete get

//account received payment delete delete request

Route::delete('/account/delete/delete/received','Office\AccountController@deletereceivedpaymentdelete')->name('account.received.delete.deleterequest')->middleware('account'); //account received received payment 

//create invoice page

Route::get('/account/invoice','Office\AccountController@invoice')->name('account.invoice')->middleware('account');  //account invoice

// invoice post

Route::post('/account/invoice/post','Office\AccountController@invoicepost')->name('acccout.invoice.post')->middleware('account'); //account invoice post

Route::get('/account/invoice/{id}','Office\AccountController@invoicegenerate')->name('account.invoice.generate')->middleware('account'); //account invoice generate



// account expense approval page

Route::get("/account/expenses",'Office\AccountController@accountexpenses')->name("account.expenses")->middleware('account');



Route::get('account/report','Office\AccountController@reports')->name('account.reports')->middleware('account'); //accout report page

//account add report

Route::get('/account/report/{id}','Office\AccountController@reportpdf')->name('account.report.pdf')->middleware('account');//admin

Route::get('account/clients','Office\AccountController@clients')->name('account.clients')->middleware('account'); //account clients page

Route::get('account/events','Office\AccountController@events')->name('account.events')->middleware('account'); //account events page



Route::get('account/jobs','Office\AccountController@jobs')->name('account.jobs')->middleware('account');
//account view events

Route::get('/account/event/{id}','Office\AccountController@eventsview')->name('account.event.view')->middleware('account'); //account view specifice event


//account view specific task type

Route::get('/account/task/{task}','Office\AccountController@viewspeciftasktype')->name('account.viewspecific.task.type')->middleware('account'); //account view specific task type

//post to add expenses category
Route::post('/account/expense/category','Office\AccountController@addexpensecategory')->name('account.add.expense.category')->middleware('account'); //account add expense category


//income statement 
Route::get('/account/income/statementss','Office\AccountController@incomestatmentss')->name('account.export.income.statement')->middleware('account'); //account income statement export


//get all available office category

//add client post
Route::post('/account/client','Office\AccountController@accountclientpost')->name('account.create.client.post')->middleware('account'); //account addd cleint post


//Route::get('/account/jobss','Office\AccountController@accountalljobs')->name('account.all.jobss')->middleware('account');
Route::get('/account/office/expense/category','Office\AccountController@getallexpensecategory')->name('account.get.all.expense.category')->middleware('account'); //account get office category


//account hint hide 

Route::get('/account/hint','Office\AccountController@accounthinthide')->name('account.hint.hide')->middleware('account'); //account hide hints
////////////////////////////////////////ACCOUNTANT ROUTES////////////////////////////////////////////////

Route::get('/','pagesController@index')->name('index'); //the index page

//Route::get('/LaurenParker/login','Auth\LoginController@showofficelogin')->name('index');


//this is a test page
Route::get('/test','pagesController@test')->name('testpage'); //this is the test page



/////////Office Auth  Routessss////////////////////


Route::get('/office/login','Office\LoginController@showLoginForm')->name('office.login'); //show login shop form



Route::post('/office/login','Office\LoginController@postlogin')->name('office.loginpost'); //post login office
///office logout routes

Route::post('/office/logout','Office\LoginController@logout')->name('office.logout'); //logout of office

//Office Home after authentication

Route::get('/office','Office\HomeController@officehome')->name('office.home');

///////////endof OFFICE AUTH ROUTES///////////////////////////////////




Route::post('/report','pagesController@reports')->name('reports.submit')->middleware('auth'); //submit report for all authenticated users except client

Route::post('/tasks','pagesController@posttasks')->name('tasks.submit')->middleware('auth'); //create task post for all authenticated users except client


/// meeting routes for all authenticated memember of an office

Route::post('/meeting/create','pagesController@createmeetingschedule')->name('create.meeting.schedule')->middleware('auth'); //create meeting schedule

//geting meeting

Route::get('/meeting/{id}','pagesController@getmeeting')->name('get.scheduled.meeting')->middleware('auth'); //get meetings


//decline a meeting 

Route::put('/meeting/{id}/decline','pagesController@declinemeeting')->name('decline.meeting')->middleware('auth'); //decline a meeting

//delete a meeting 

Route::delete('/meeting/{id}/delete','pagesController@deletemeeting')->name('delete.meeting')->middleware('auth'); //delete meeting

Route::delete("/meeting/{ref}",'pagesController@deletemeetings')->name('delete.meetings')->middleware('auth');


//adding it

//fullcalender
Route::get('fullcalendar','FullCalendarController@index');
Route::post('fullcalendar/create','FullCalendarController@create');
Route::post('fullcalendar/update','FullCalendarController@update');
Route::post('fullcalendar/delete','FullCalendarController@destroy');



/////////////////////////////////////CLIENT ROUTE///////////////////////////////////////

Route::get('/client','Office\ClientController@home')->name('client.home')->middleware('client'); //client dashboard home

Route::get('/client/schedule','Office\ClientController@schedule')->name('client.schedule')->middleware('client'); ///client schedule page



// test invoice view

Route::get('/invoice/view/text/{id}','pagesController@showinvoice')->name('show.invoicespec');

//chatify routes /////////////////////////////////////////////////////////////////////////////////

//get an office route

Route::get('/get/office','pagesController@getoffice')->name('get.office'); //get an office


//get office post request..note this should be converted to a post later

Route::get('/office/register/{plan}','pagesController@getofficeregister')->name('getoffice.register');


//post register the office

Route::post('/office/register','pagesController@registerofficepost')->name('register.office.post'); //route to submit the form



//paystack route

Route::get('paystack','pagesController@paystackroute');

//paystack post

Route::post('paystack','pagesController@paystackpost');





//////////////////////test paystack routes////////////////////////////////////


Route::get('/testpaystack','pagesController@testpaystack');
Route::post('/testpaystack','pagesController@testpaystackpost');


//tesssstme for

Route::post('/testmeform','pagesController@testmeform');



///office renewal resubscription post

Route::post('/office/resubscription/section','pagesController@officeresubscriptionsection')->name('officeresubscriptionsection'); //use to resubsciption purpose



//subscription when free plans has expired

Route::post('/office/chooseplan','pagesController@officechooseplanafterfreeexpired')->name('office.choose.plan.after.free.expired'); //office subscribe to a plan after expired free trial


//mark notifications as read

Route::get('/marknotificationasread','pagesController@marknotificationasread')->name('markasread');//mark notifications as read




//privacy policy

Route::get('privacy','pagesController@privacy')->name('privacy');

//disclaimer 
Route::get('disclaimer','pagesController@disclaimer')->name('disclaimer');



//send contact us index page 

Route::post('/sendcontact','EmailController@sendcontactmessage')->name('sendcontact'); //send contact message





/////////////////////////////////////////WORKSTATION ADMIN ROUTE////////////////////////////////////

Route::get('/workstation/admin','Admin\LoginController@showLoginForm')->name('admin.login');


Route::post('/workstation/admin','Admin\LoginController@submitloginform')->name('admin.submit.login.form'); //admin loginform submit
///logout route


Route::post('/logout/admin','Admin\LoginController@logoutadmin')->name('logoutadmin');



////main admin home

Route::get('/workstation/admin/home','Admin\HomeController@index')->name('mainadmin.home'); //main admin section


//workstation active  office

Route::get('/workstation/active','Admin\HomeController@active')->name('mainadmin.active'); //main workstation admin all active office



//workstation inactive office
Route::get('/workstation/inactive','Admin\HomeController@inactive')->name('mainadmin.inactive'); //main workstation admin all inactive office

//workstation free office

Route::get('/workstation/freeplans','Admin\HomeController@freeplans')->name('mainadmin.freeplans'); //main workstation admin free plans section



//all office modal

Route::get('/specific/{id}','Admin\HomeController@specificeoffice')->name('getspecificeoffice');


//edit office modal get

Route::get('/specific/edit/{id}','Admin\HomeController@specificofficeedit')->name('getspecificeofficeedit');  //get specific office edit


//edit office modal post

Route::put('/specific/edit','Admin\HomeController@posteditspecificoffice')->name('editpostspecificoffice'); //edit office post



//delete office 
Route::delete('/specific/{id}','Admin\HomeController@specificofficedelete')->name('specificofficedelete'); 
////////////////////////////////////////////////////////////////////

Route::post('/testtablesort','pagesController@testtablesort')->name('testtablesort')->middleware('account');

//sort income table 

Route::post('/tablesortincome','pagesController@tablesortincome')->name('tablesortincome')->middleware('account');



//download task attachment.. but for auth usersers

Route::get('/download/attachment/{id}','pagesController@downloadattachment')->name('download.task.attachment')->middleware('auth');  //to download task attachments 




///////////////////////THIS WILL BE BECOME THE MAIN INDEX PAGE////// 

Route::get('/mainindex','pagesController@mainindexpage')->name('replacetoindex'); //this will be the main index page







///form



Route::post('/stepups','pagesController@stepups')->name('stepups');



// leave management 

Route::get("/leave","pagesController@leave")->name("leavepage");
//post leave managemane

Route::post("/leave","pagesController@applyleave")->name("applyleave");