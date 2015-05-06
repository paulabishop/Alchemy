<?php

/*Author: Paula Bishop
Revision date: 5/4/15
File name: Category.php
Description: Category model pertains to categories table in database, and contains rules for validation, white & black listing, and defines relationship to recipes.*/

class Category extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /*Whitelist what user can enter into form and submit*/
	protected $fillable = [
'name', 'description', 'thumbnail'
    ];

    //Validation rules for recipe create form
    public static $rules = [
        'name' => 'required|min:3|max:20|unique:categories',
        'description' => 'required',
        'thumbnail' => 'image'
    ];

    /** Function name: recipes
     * Args: Category ($this ="this" Category)
     * Returns: relationship to recipes
     * Description: Set up One To Many relationship for categories to recipes so that recipes can be referenced through $category
     */
    public function recipes()
    {
        return $this -> hasMany('Recipe');
    }
}