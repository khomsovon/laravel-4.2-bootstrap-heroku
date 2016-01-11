<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.home.home-default');
});


//Supporting AJAX Call for contact box on the right column
Route::post('/send-contact-us-email', array('uses' => 'TransactionEmailController@sendContactUsEmail',
                                        'as' => 'contactUsEmail'));

//Supporting AJAX Call for bottom contact box
Route::post('/send-footer-contact-us-email', array('uses' => 'TransactionEmailController@sendFooterContactUsEmail',
                                        'as' => 'footerContactUsEmail'));


//Supporting AJAX Call for bottom contact box
Route::post('/email-signup', array('uses' => 'EmailSignupController@addNewUser',
                                        'as' => 'newUserSignup'));


Route::get('/get-user', array('uses' => 'EmailSignupController@getAllUsers',
                                        'as' => 'getAllUsers'));



Route::get('/about-us', function()
{
	return View::make('pages.contactus.about-us');
});


/*
 *
 */
Route::group(array('prefix' => '/students'), function()
{
    Route::get('/', function()
    {
        return View::make('pages.students.home');
    });
	
});


/*
 *
 */
Route::group(array('prefix' => '/instructors'), function()
{
    Route::get('/', function()
    {
        return View::make('pages.instructors.home');
    });
	
});


/*
 *
 */
Route::group(array('prefix' => '/schools'), function()
{
    Route::get('/', function()
    {
        return View::make('pages.schools.home');
    });
	
});





