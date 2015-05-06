{{--Author: Paula Bishop
Revision date: 4/24/15
File name: partials/allCategories.blade.php
Description: This is the section displaying all categories with thumbnail & name as links for quick reference.--}}

<div id="categories">
    <?php $categories = Category::all(); ?>
    <h2 class="inset">Categories</h2>
    <!--populate div with categories-->
    @if ($categories->count())
            @foreach ($categories as $category)
                <li>
                    <figure>
                        <a href="{{ URL::to('/categories/' . $category->id) }}"><img src="{{ asset($category->thumbnail) }}"></a>
                        <figcaption>{{$category->name}}</figcaption>
                    </figure>
                </li>
            @endforeach
    @else
            <p>There are no categories to display</p>
        @endif

</div>{{--/#categories--}}