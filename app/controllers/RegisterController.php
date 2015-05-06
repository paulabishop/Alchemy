<?php

/*Author: Paula Bishop
Revision date: 5/4/15
File name: RegisterController.php
Description: RegisterController handles registration of new users.*/

class RegisterController extends BaseController {
    /** Function name: showRegister
     * Args: none
     * Returns: register.blade.php
     * Description: Shows registration page to user
     */
    public function showRegister()
    {
        return View::make('register');
    }

    /** Function name: doRegister
     * Args: POST array inputs from form
     * Returns: intended page user was trying to access before registration
     * Description: Creates new Subscriber and automatically logs in, redirecting back to intended view
     */
    public function doRegister()
    {
        //Validate inputs for new user registration
        $validation = Validator::make(Input::all(), User::$rules);

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        //If validation is successful, create new user
        $user = new User;
        $user->fullname = Input::get('fullname');
        $user->email = Input::get('email');
        $user->role = 'Subscriber'; //anyone registering through the registration form will automatically be a Subscriber until I can figure out how to properly filter permissions for a Contributor role
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

/*        This attempts to log the user in automatically*/
        /*If this doesn't work, try Auth::login($user); */
        $input = Input::all();
        $attempt = Auth::attempt([
            'username'=> $input['username'],
            'password'=> $input['password']
        ]);
        if($attempt) return Redirect::intended('/');
    }

}