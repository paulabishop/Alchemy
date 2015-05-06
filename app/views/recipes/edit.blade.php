{{--Author: Paula Bishop
Revision date: 5/1/15
File name: recipes/edit.blade.php
Description: Returns form to edit individual recipe to update method on controller--}}

@extends('layouts.main')

@section('title')
    Edit Recipe for Paula's Mystical Kitchen Alchemy
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img class="desktop" src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ><img class="mobile" src="{{ asset('images/alchemy_mobilemast.jpg') }}"  alt="Paula's Kitchen Alchemy for Mobile: Because Magic Keeps Happening in the Kitchen!"></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}" >Home</a></li>
                <li><a href="{{ URL::to('/about') }}">About</a></li>
                <li><a href="{{ URL::to('/categories') }}" >Categories</a></li>
                {{-- Nested unordered list of dropdown of categories with foreach loop could go here using jquery--}}
                <li><a href="{{ URL::to('/recipes') }}" class="current">All Recipes</a></li>

                {{--Authentication for mobile changes button to logout from login--}}
                @if (Auth::check())
                    <li> <a href="{{ URL::to('/logout') }}" class="mobile" >Logout {{ Auth::user()->username }}</a></li>
                @else
                    <li><a href="{{ URL::to('/login') }}" class="mobile">Login</a></li>
                @endif
            </ul>
        </div><!--/#navbar-->

        {{--Authentication checks if user is logged in and displays personalized logout--}}
        <div id="login">
            @if (Auth::check())
                <p>You are logged in as {{ Auth::user()->fullname }} <a href="{{ URL::to('/logout') }}" >(Logout)</a></p>
            @else
                <a href="{{ URL::to('/register') }}" >Register</a> | <a href="{{ URL::to('/login') }}" >Login</a>
            @endif
        </div><!--/#login-->

    </div><!--/#masthead-->
@stop

{{--Section for Form--}}
@section('left_content')

    <div id="content">
        <div id="left_content">
            <div id="main">
                <div class="form">
                    <h1>Edit Recipe</h1>
                    <!-- form goes here -->
                    {{ Form::model($recipe, ['method' => 'PATCH', 'route' => ['recipes.update', $recipe->id]]) }}
                    {{ Form::hidden('user_id', Auth::user()->id) }}

                    <fieldset>{{--this needs to be an option dropdown sending $category->id probably with foreach loop--}}
                        {{-- {{ Form::label('category', 'Choose a Category') }}--}}
                        <select name="category_id">
                            <option selected>{{ $recipe->category->name }}</option>
                            <?php $categories = Category::all(); ?>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {{ '<span class="error">' .$errors->first('category_id').'</span>' }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('title', 'Recipe Title') }}
                        {{ Form::text('title', null, ['required' => 'required']) }}
                        {{ '<span class="error">' .$errors->first('title').'</span>' }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('description', 'Description (optional)') }}
                        {{ Form::textarea('description') }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('keywords', 'Please add at least one keyword, separate multiple keywords with commas') }}
                        {{ Form::textarea('keywords', null, ['required' => 'required']) }}
                        {{ '<span class="error">' .$errors->first('keywords').'</span>' }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('yields', 'Yields/Serves (optional)') }}
                        {{ Form::text('yields', null, ['class' => 'label']) }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('prep_time', 'Prep Time (optional)') }}
                        {{ Form::text('prep_time', null, ['class' => 'label']) }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('ingredients', 'Ingredients (with amounts)') }}
                        {{ Form::textarea('ingredients', null, ['required' => 'required']) }}
                        {{ '<span class="error">' .$errors->first('ingredients').'</span>' }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('directions', 'Directions') }}
                        {{ Form::textarea('directions', null, ['required' => 'required']) }}
                        {{ '<span class="error">' .$errors->first('directions').'</span>' }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('photo', 'Upload image (optional)') }}
                        {{ Form::file('photo') }}
                        {{ '<span class="error">' .$errors->first('photo').'</span>' }}
                    </fieldset>

                    <fieldset>
                        {{ Form::submit('Update Recipe', ['class' => 'button']) }}
                    </fieldset>

                    {{ Form::close() }}
                </div><!--/.form-->

                {{--This should only be viewable to admins and author of the recipe--}}
                <div class="form"> <!-- delete recipe goes here -->
                    <p><em>Warning: The following action cannot be undone!</em></p>
                    {{ Form::open(array(
     'action' => array('RecipeController@destroy', $recipe->id),
     'method' => 'delete')) }}

                    <fieldset>
                        {{ Form::submit('Delete Recipe', ['class' => 'red_button']) }}
                    </fieldset>

                    {{ Form::close() }}
                </div><!--/.form-->

            </div><!--/#main-->

        </div><!--/#left_content-->
        @stop

        @section('right_content')
            <div id="right_content">

                {{-- Search block partial--}}
                @include('partials/search')

                {{--Check for whether user is logged in and display appropriate sidebar--}}
                @if (Auth::guest())
                    @include('partials/sidebar_guest')
                @elseif (Auth::user()->role == 'Subscriber')
                    @include('partials/sidebar_subscriber')
                @elseif (Auth::user()->role == 'Administrator')
                    @include('partials/sidebar_admin')
                @endif

            </div><!--/#right_content-->
    </div><!--/#content-->
@stop