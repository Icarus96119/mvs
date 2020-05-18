<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/kunden/pdf/{id}', 'DynamicPDFController@pdf');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/kunden', 'KundenController');
Route::post('/search', 'KundenController@search')->name('search');
Route::post('//admin/kunden/statusChange', 'KundenController@statusChange')->name('calculation.statusChange');
Route::get('/admin/generate_offer/{id}', 'KundenController@printoffer');
Route::get('/admin/download_pdf/{id}', 'KundenController@download_pdf');
Route::post('/admin/kunden/{id}/save_repayment', 'KundenController@saveRepayment');
Route::get('/admin/kunden/{id}/delete_repayment', 'KundenController@deleteRepayment');
Route::get('/admin/kunden/{id}/delete_timeline', 'KundenController@deleteTimeline');
Route::post('/admin/kunden/{id}/save_timeline', 'KundenController@saveTimeline');
Route::post('/admin/kunden/{id}/save_calculation', 'KundenController@saveCalculation');
Route::post('/admin/kunden/{id}/updatefinanceheading', 'KundenController@update_finance_heading');
Route::get('/admin/kunden/{id}/delete_offer', 'KundenController@delete_offer');
Route::get('/admin/kunden/{id}/disable_borrower', 'KundenController@disable_borrower');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dynamic_pdf', 'DynamicPDFController@index');
Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
Route::get('/headmin', 'HomeController@headmin')->name('headmin')->middleware('status');
Route::resource('headmin/group', 'GroupController')->middleware('status');
Route::get('/showgroup/{id}', 'GroupController@show');
Route::resource('headmin/user', 'UserController')->middleware('status');
Route::get('headmin/myprofile', [
    'as' => 'headmin.myprofile',
    'middleware' => 'auth',
    function() {
        return view('headmin.viewprofile');
    }
]);
Route::post('/update_profile', 'ProfileController@update')->name('update_profile');
Route::get('/deletegroup/{id}', 'GroupController@destroy');
Route::post('/creategroup', 'GroupController@store')->name('creategroup');
Route::get('/deleteuser/{id}', 'UserController@destroy');
Route::get('/edituser/{id}', 'UserController@edit');
Route::get('/setgroupleader', 'GroupController@update');

Route::middleware(['auth', 'status'])->prefix('headmin')->group(function () {    
    Route::get('/checklist', 'ChecklistController@index')->name('checklist');
    Route::post('/checklist', 'ChecklistController@store')->name('checklist');
    Route::post('/checklistCategory', 'ChecklistController@checklistCategory')->name('checklistCategory');
    Route::post('/checklistUpdate', 'ChecklistController@update')->name('checklistUpdate');
    Route::post('/kundenChecklist', 'ChecklistController@kundenChecklist')->name('kundenChecklist');
    Route::post('/deleteChecklist', 'ChecklistController@delete')->name('deleteChecklist');
    Route::post('/deleteChecklistCategory', 'ChecklistController@deleteCategory')->name('deleteChecklistCategory');

});

        //
        //
        // //$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        // $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');
        //
        // // Registration Routes...
        // $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        // $this->post('register', 'Auth\RegisterController@register');
        //
        // // Password Reset Routes...
        // $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        // $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        // $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
