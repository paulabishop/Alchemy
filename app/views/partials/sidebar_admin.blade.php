{{--Author: Paula Bishop
Revision date: 4/26/15
File name: partials/sidebar_admin.blade.php
Description: This is the partial for the sidebar for users with Administrator role.--}}

<div id="sidebar">
    <div id="sidebar_content">
        <h2>Welcome, {{ Auth::user()->fullname }}, Administrator</h2>
        <h3>Latest Recipes:</h3>
        <?php
        $latest = DB::table('recipes')
                ->orderBy('updated_at', 'desc')
                ->take(5)->get();
        ?>
        <ul class="latest">
            @foreach($latest as $last)
                <li><a href="{{ URL::to('/recipes/' .$last->id) }}">{{ $last->title }}</a></li>
            @endforeach
        </ul>
       <a href="{{ URL::to('/categories/create') }}" class="button">Add Category</a>
       <div class="spacer"> <a href="{{ URL::to('/recipes/create') }}" class="button">Add Recipe</a></div>
    </div><!--/#sidebar_content-->
</div><!--/#sidebar-->