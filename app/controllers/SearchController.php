<?php

/*Author: Paula Bishop
Revision date: 5/4/15
File name: SearchController.php
Description: Very simple search function on recipe table in database--I would like to look into this "elastic search" I've read about, too.*/

class SearchController extends \BaseController {

    /** Function name: search
     * Args: user input from search form
     * Returns: results from query on search.blade.php
     * Description: Runs search on input terms on keywords and ingredients fields and returns results
     */
 /*   Code idea from user afarazit 10/26/13 on Stackoverflow post http://stackoverflow.com/questions/19612180/creating-search-functionality-with-laravel-4  */
    public function search() {

        $q = Input::get('search_form'); //search form needs to reference this input name

        $searchTerms = explode(' ', $q);

        $query = DB::table('recipes');

        foreach($searchTerms as $term)
        {
            $query->where('keywords', 'LIKE', '%'. $term .'%')
                ->orWhere('ingredients', 'LIKE', '%'. $term .'%');
        }

        $results = $query->get();

        return View::make('search', compact('results'))->with($q); //or $results=>'results' or something like that...

    }



}