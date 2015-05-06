<?php

/*Author: Paula Bishop (though technically this comes with one root route defined with every install of Laravel--I wrote the rest of them!)
Revision date: 4/29/15
File name: routes.php
Description: Routing "engine" for the site--this does some of the work of the "controller" in the MVC. Filters can also be set up and defined here, as part of the routing (and re-routing) process.*/

/*Static pages*/
Route::get('/','HomeController@showWelcome');
Route::get('home', 'HomeController@showWelcome');

Route::get('/about', function()
{
    return View::make('about');
});

/*Apply cross site request forgery protection on form actions*/
/*code courtesy of Ryan Mortier at laravel-tricks.com Feb 2015*/
Route::when('*', 'csrf', array('post', 'put', 'patch', 'delete'));

/*Category and Recipe management (resourceful routing--follow convention when naming pages))*/
Route::resource('categories', 'CategoryController');

Route::resource('recipes', 'RecipeController');

/*Registration, Login, Logout, and Authentication*/
Route::get('/register', 'RegisterController@showRegister');
Route::post('/register', 'RegisterController@doRegister');

Route::get('/login', function()
{
    return View::make('/login');
});

Route::post('/login', 'SessionController@login');

Route::get('/logout', function(){
    Auth::logout();
    return View::make('logout');
});

/*Search*/
Route::post('search', 'SearchController@search');

/*Custom 404 page--this is NOT finding the view I made, however*/
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});