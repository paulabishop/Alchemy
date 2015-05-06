<?php

/*Author: Paula Bishop
Revision date: 5/5/15
File name: CategoryController.php
Description: Defines CategoryController Object which handles all CRUD operations for categories as well as logic for displaying pages for all categories and category by id--essentially the controller in the MVC*/

class CategoryController extends BaseController {
  /*  Function name: __construct (technically constructor function)
    Args: filters auth and admin from filters.php
    Returns: redirect for unauthorized guests or users
    Description: Constructor function acts as Filter to keep guests from all but admins from editing categories*/
    public function __construct()
    {
        $this->beforeFilter('auth', ['only' => ['create', 'edit', 'update', 'store', 'destroy']]);
        $this->beforeFilter('admin', ['only' => ['create', 'edit', 'update', 'store', 'destroy']]);
    }

	/** Function name: index
	 * Args: GET /categories
	 * Returns: a listing of all categories
	 * Description: The "Home page" of all categories
	 */
	public function index()
	{
		$categories = Category::all();
        return View::make('categories.index', ['categories'=>$categories]);
	}

	/** Function name: create
     * Args: GET /categories/create
	 * Returns: Form for creating a new category
	 * Description: This is the "Add Category" page
	 */
	public function create()
	{
        $categories = Category::all();
		//Show form to create new category--this keeps throwing an error saying "undefined categories"!
        return View::make('categories.create', ['categories'=>$categories]);
       /* return 'Show form to create Category';*/
	}

	/** Function name: store
	 * Args: POST array inputs /categories
	 * Returns: Store a newly created category in database
	 * Description: Result of submitting form to create new Category
	 */
    public function store()
    {
        //Validate inputs for new category
        $validation = Validator::make(Input::all(), Category::$rules);

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        //If validation is successful, create new category
        $category = new Category;
        $category->name = Input::get('name');
        $category->description = Input::get('description');
        //If image is uploaded, resize to 80px square and save to public images folder
        if (Input::hasFile('thumbnail'))
        {
            $file = Input::file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $imagePath = public_path('images/categories/' . $fileName);
            $image = Image::make($file->getRealPath());
            $image->resize(90, null, function($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->crop(80, 80)
                ->save($imagePath);
            $category->thumbnail = 'images/categories/'.$fileName;
        } else
        {
            $category->thumbnail = 'images/no_img.jpg';
        }
        //save all inputs to database and return view of new Category
        $category->save();
        return View::make('categories.index');
    }

	/** Function name: show
	 * Args: category $id
	 * Returns: GET /categories/{id}
    * Description: Individual category page by id
     */
    public function show($id)

    {
        $category = Category::find($id);
       return View::make('categories.show', ['category'=> $category]);

    }

	/** Function name: edit
     * Args:  int  $id
     * Returns: GET /categories/{id}/edit
	 * Description: Shows the form for editing the specific category.
     */
	public function edit($id)
	{
		//Edit form for categories by id
        $category = Category::find($id);
        return View::make('categories.edit', compact('category'));
	}

	/** Function name: update
     * 	Args:  int  $id
	 * Returns: PUT /categories/{id}
	 * Description: Update the specified category in the database on form submit.
	 */
	public function update($id)
	{
		//update categories
        $category = Category::find($id);
        $category->fill(Input::all());
        //If new image is uploaded, resize to 80px square and save to public images folder
        if (Input::hasFile('thumbnail'))
        {
            $file = Input::file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $imagePath = public_path('images/categories/' . $fileName);
            $image = Image::make($file->getRealPath());
            $image->resize(80, null, function($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->crop(80, 80)
                ->save($imagePath);
            $category->thumbnail = 'images/categories/'.$fileName;
        }

        $category->save();

        return Redirect::to('/categories');
	}

	/** Function name: destroy
	 * Args:  int  $id
     * Returns: DELETE /categories/{id}
     * Description: Removes the specified category from database on form submit
	 */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->destroy($id);

        return Redirect::to('/categories');
    }

}