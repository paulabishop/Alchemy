<?php
/*Author: Paula Bishop
Revision date: 5/4/15
File name: User.php
Description: User model pertains to users table in database, and contains rules for validation, white & black listing, and defines relationship to recipes, as well as defining some user roles for permissions calls in other places (ie. isAdmin).*/

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    /**
     * Fillable fields--this is my whitelist for form fields--I want "role" to be protected, and it is encoded in the form--if roles are not being inserted in the database, this is the place to start troubleshooting! I could set them to $guarded instead.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'fullname'
    ];

    protected $hidden = array('password', 'remember_token');

    /*    Author: Paula Bishop
        Last Edited: 4/20/15
        Purpose: provide rules for validation*/
    public static $rules = [
        'username' => 'required|min:2|max:20',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|max:25',
        'fullname' => 'required|min:2|max:20',
        'user-captcha' => 'required|captcha'
    ];

    /** Function name: recipes
     * Args: User ($this ="this" User)
     * Returns: relationship to recipes
     * Description: Set up One To Many relationship for users to recipes so that recipes can be referenced through $user
     */
    public function recipes()
    {
        return $this -> hasMany('Recipe');
    }

    /** Function name: getRole
     * Args: string/ $role
     * Returns: this user's role: subscriber or administrator
     * Description: Determines user level/role
     */
    public function getRole($role)
    {
        return $this->role === $role;
    }

    /** Function name: isAdmin
     * Args: none
     * Returns: bool administrator yes or no
     * Description: Determines if the user is an administrator
     * Dependency: getRole($role)
     */
    public function isAdmin()
    {
        return $this->getRole('Administrator');
    }

    /**Putting this on the User model too because it does not seem to be generating remember tokens now that it is on the remote shared host!**/
    /** Function name: getRememberToken()
     * Args: none
     * Returns: string (generated token)
     * Description: Get the token value for the "remember me" session.
     * Dependency: I'm not really sure--these three functions are actually written by Laravel's author and are also in several other places, most notably the vendor > laravel > framework > scr folder on several php files there
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /** Function name: setRememberToken
     * Args: string  $value
     * Returns: void
     * Description: Set the token value for the "remember me" session.
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /** Function name: getRememberTokenName
     * Args: none
     * Returns: string
     * Description: Get the column name for the "remember me" token.
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }


}