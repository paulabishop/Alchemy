<?php
/*Author: Taylor Otwell & Paula Bishop (though technically this comes with one root route defined with every install of Laravel--I wrote the admin filter on this page)
Revision date: 5/1/15
File name: filters.php
Description: Definition of filters for various protections and restricting access. Most of them come from Laravel, but I defined one on here (admin filter) so I will comment this page at the top.*/


/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*This is a filter for determining administrators*/
Route::filter('admin', function()
{
    if( ! Auth::User()->isAdmin()){ //isAdmin is a custom function on User model
        return Redirect::to('/')->with('message', 'Not authorized'); //this message does not come through, however
        /* return App::abort(401, 'You are not authorized.');*/ //this actually calls the Whoops! class and tells the person they are not authorized--for the purposes of demonstration, however, I want to avoid the appearance of application errors...and am using this to test to know which filter is firing!
    }

});



/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
