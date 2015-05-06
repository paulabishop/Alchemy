<?php

/*Author: Paula Bishop
Revision date: 4/22/15
File name: Recipe.php
Description: Recipe model pertains to recipes table in database, and contains rules for validation, white & black listing, and defines relationships to users and categories.*/

class Recipe extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recipes';
    
    /*Whitelist what user can enter into form and submit--thumbnail will be generated from photo*/
	protected $fillable = [
'title', 'description', 'keywords', 'yields', 'photo', 'ingredients', 'directions', 'prep_time'
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Validation rules for recipe create form
    public static $rules = [
        'category_id' => 'required',
        'title' => 'required',
        'keywords' => 'required',
        'photo' => 'image',
        'ingredients' => 'required',
        'directions' => 'required'
    ];

    /** Function name: user
     * Args: Recipe($this ="this" Recipe)
     * Returns: relationship to user
     * Description: Sets up One To Many relationship for users to recipes so that users can be referenced through $recipes
     */
    public function user()
    {
        return $this -> belongsTo('User');
    }

    /** Function name: category
     * Args: Recipe ($this ="this" Recipe)
     * Returns: relationship to category
     * Description: Sets up One To Many relationship for categories to recipes so that categories can be referenced through $recipes
     */
    public function category()
    {
        return $this -> belongsTo('Category');
    }

}