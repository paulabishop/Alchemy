{{--Author: Paula Bishop
Revision date: 5/4/15
File name: categories/edit.blade.php
Description: Returns form to edit individual category to update method on controller--}}

@extends('layouts.main')

@section('title')
    Recipe Categories for Paula's Mystical Kitchen Alchemy
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img class="desktop" src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ><img class="mobile" src="{{ asset('images/alchemy_mobilemast.jpg') }}"  alt="Paula's Kitchen Alchemy for Mobile: Because Magic Keeps Happening in the Kitchen!"></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}" >Home</a></li>
                <li><a href="{{ URL::to('/about') }}">About</a></li>
                <li><a href="{{ URL::to('/categories') }}" class="current" >Categories</a></li>
                <li><a href="{{ URL::to('/recipes') }}">All Recipes</a></li>

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
                    <h1>Edit Category</h1>
                    <!-- form goes here -->
                    {{ Form::model($category, ['method' => 'PATCH', 'route' => ['categories.update', $category->id]]) }}
                    {{ Form::hidden('user_id', Auth::user()->id) }}

                    <fieldset>
                        {{ Form::label('name', 'Category Name') }}
                        {{ Form::text('name', null, ['class' => 'label', 'required' => 'required']) }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', null, ['required' => 'required']) }}
                    </fieldset>

                    <fieldset>
                        {{ Form::label('thumbnail', 'Upload image for thumbnail') }}
                        {{ Form::file('thumbnail') }}
                    </fieldset>

                    <fieldset>
                        {{ Form::submit('Update Category', ['class' => 'button']) }}
                    </fieldset>

                    {{ Form::close() }}
                </div><!--/.form-->

               <div class="form"> <!-- delete category goes here -->
                   <p><em>Warning: The following action cannot be undone!</em> Note that you may not delete a category which has recipes in it due to foreign key constraints--all recipes in a category must be deleted first.</p>
               {{-- {{ Form::open(array('action' => array('CategoryController@destroy', $category->id))) }}--}}
                   {{ Form::open(array(
    'action' => array('CategoryController@destroy', $category->id),
    'method' => 'delete')) }}

                   <fieldset>
                       {{ Form::submit('Delete Category', ['class' => 'red_button']) }}
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