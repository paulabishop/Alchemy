<?php

/*Author: Paula Bishop
Revision date: 5/5/15
File name: RecipeController.php
Description: Defines RecipeController Object which handles all CRUD operations for recipes as well as logic for displaying pages for all recipes and recipe by id--essentially the controller in the MVC*/

class RecipeController extends \BaseController {
    /*  Function name: __construct (technically constructor function)
        Args: filters auth and admin from filters.php
        Returns: redirect for unauthorized guests or users
        Description: Constructor function acts as Filter to restrict individual full recipe views from guests, as well as only allowing admins to create, edit, and delete recipes.*/
    public function __construct()
    {
        $this->beforeFilter('auth', ['only' => ['show', 'create', 'edit', 'update', 'store', 'destroy']]);//only those logged in may view recipes, as well as other CRUD operations
        $this->beforeFilter('admin', ['only' => ['create', 'edit', 'update', 'store', 'destroy']]);
    }

    /** Function name: index
     * Args: GET /recipes
     * Returns: a listing of all recipes, ordered by category
     * Description: The "Home page" of all recipes
     */
    public function index()
    {
        $recipes = Recipe::orderBy('category_id')->get();
        return View::make('recipes.index', compact('recipes'));

        //The following was a failed attempt to try to return recipes grouped in categories--it worked, except I could not figure out how to iterate them with the category name only once inside of a foreach loop. I was able to modify the model call above to order them by category, but am saving this in case I get inpiration later for a nested foreach inside of another foreach loop to iterate first through categories, and then through recipes in each category
/*               $allRecipes = DB::table('recipes')
                    ->orderBy('category_id', 'title', 'asc')
                    ->get();
                return View::make('recipes.index', compact('allRecipes'));*/
    }

    /*  Name: get_categories
        Args: none--wondering if this should be a callback function?
        Returns: array of categories
        Description: generate list of categories to choose from on the recipe form*/
    public function get_category ()
    {
        return array('' => 'Choose a Category') + Category::lists('name', 'id');
    }

    /** Function name: create
     * Args: GET /recipes/create
     * Returns: Form for creating a new recipe
     * Description: This is the "Add Recipe" page
     */
    public function create()
    {
        //attempt to get categories variable into form
        //$categories = Category::lists('name', 'id');
        $categories = Category::all();
        return View::make('recipes.create')->with('categories', $categories);
    }

    /** Function name: store
     * Args: POST array inputs /recipes
     * Returns: Store a newly created recipe in database
     * Description: Result of submitting form to create new Recipe
     */
    public function store()
    {
        //Validate inputs from recipe form
        $validation = Validator::make(Input::all(), Recipe::$rules);

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }

        //Create new record
        $recipe = new Recipe;
        //get inputs from the form
        $recipe->category_id = Input::get('category_id');
        $recipe->title = Input::get('title');
        $recipe->description = Input::get('description');
        $recipe->user_id= Input::get('user_id');
        $recipe->keywords = Input::get('keywords');
        $recipe->yields = Input::get('yields');

        //If image is uploaded, resize to 600px wide and save to public images folder
        if (Input::hasFile('photo'))
        {
            $file = Input::file('photo');
            $fileName = $file->getClientOriginalName();
            $photoPath = public_path('images/recipes/photos/' . time() . '-' . $fileName);
            $thumbPath = public_path('images/recipes/thumbs/' . time() . '-tn-' . $fileName);
            $image = Image::make($file->getRealPath());
            $image->resize(600, null, function($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->save($photoPath);
            $recipe->photo = 'images/recipes/photos/' . time() . '-' . $fileName;
            //if photo, thumbnail will be generated from it and then saved as well
            $image->resize(100, null, function($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->crop(80, 80)
                ->save($thumbPath);
            $recipe->thumbnail = 'images/recipes/thumbs/' . time() . '-tn-' . $fileName;
        } else
        {  //no image uploaded
            //for recipe main photo, I will use an @if statement if there is a photo or not
            $recipe->thumbnail = 'images/no_img.jpg';
        }

        $recipe->ingredients = Input::get('ingredients');
        $recipe->directions = Input::get('directions');
        $recipe->prep_time = Input::get('prep_time');
        $recipe->save();

        return Redirect::to('/recipes/'. $recipe->id); //this should bring up the page for the recipe just created
    }


    /** Function name: show
     * Args: recipe $id
     * Returns: GET /recipes/{id}
     * Description: Individual recipe page by id
     */
    public function show($id)

    {
        $recipe = Recipe::find($id);
        return View::make('recipes.show', compact('recipe'));
    }


    /** Function name: edit
     * Args:  int  $id
     * Returns: GET /recipes/{id}/edit
     * Description: Shows the form for editing the specific recipe.
     */
    public function edit($id)
    {
        //this will need some type of filter to keep non-authors from editing
        $recipe = Recipe::find($id);
        return View::make('recipes.edit', compact('recipe'));
    }

    /** Function name: update
     * 	Args:  int  $id
     * Returns: PUT /recipes/{id}
     * Description: Update the specified recipe in the database on form submit.
     */
    public function update($id)
    {
        //update recipe by first getting inputs
        $recipe = Recipe::find($id);
        $recipe->fill(Input::all());
        //If new image is uploaded, create a new photo and thumbnail
        //NOTE: The photo update does NOT seem to work, and when I tried it on the remote host, it stored the path without a timestamp--just the original name, and did NOT upload the photo...
        if (Input::hasFile('photo'))
        {
            $file = Input::file('photo');
            $fileName = $file->getClientOriginalName();
            $photoPath = public_path('images/recipes/photos/' . time() . '-' . $fileName);
            $thumbPath = public_path('images/recipes/thumbs/' . time() . '-tn-' . $fileName);
            $image = Image::make($file->getRealPath());
            $image->resize(600, null, function($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->save($photoPath);
            $recipe->photo = 'images/recipes/photos/' . time() . '-' . $fileName;
            /*  $recipe->photo = 'images/recipes/photos'.$fileName;*/
            //if photo, thumbnail will be generated from it and then saved as well
            $image->resize(100, null, function($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->crop(80, 80)
                ->save($thumbPath);
            $recipe->thumbnail = 'images/recipes/thumbs/' . time() . '-tn-' . $fileName;
        }

        $recipe->save();

        return Redirect::to('/recipes/'. $recipe->id);
    }


    /** Function name: destroy
     * Args:  int  $id
     * Returns: DELETE /recipes/{id}
     * Description: Removes the specified recipe from database on form submit
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete($id);

        return Redirect::to('/recipes');
    }

}