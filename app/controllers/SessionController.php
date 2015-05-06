<?php
/*Author: Paula Bishop
Revision date: 4/21/15
File name: SessionController.php
Description: Normally this would control session data, but this just logs user in after checking inputs*/

class SessionController extends BaseController {
/*Function name: login
Args: login inputs
Return data: redirect home or login with errors
Description: logs user in if valid credentials input*/
    public function login() {
            $input = Input::only(['username','password']);

            $username = $input['username'];
            $password = $input['password'];

            if(Auth::attempt([
                'username' => $username,
                'password' => $password
            ]))
            {
                return Redirect::intended('/');
            } else

            return Redirect::back()->withInput()->withFlashMessage('Invalid credentials provided');

    }


}