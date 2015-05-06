<?php

/*Author: Laravel (install)
Revision date: 3/11/15
File name: HomeController.php
Description: This only controls what is returned for the site root.*/

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    /** Function name: showWelcome
     * Args: none
     * Returns: landing.blade.php
     * Description: Home page of site--'/'
     */
	public function showWelcome()
	{
        return View::make('landing');
	}

}
