{{--Author: Paula Bishop
Revision date: 5/1/15
File name: recipes/index.blade.php
Description: Returns all recipes by category--}}

@extends('layouts.main')

@section('title')
    All Recipes at Paula's Mystical Kitchen Alchemy
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

@section('left_content')

    <div id="content">
        <div id="left_content">

            <h1>All Recipes</h1>
            <!--populate div with recipe result divs--the problem is, I can't figure out how to return them grouped by category in a foreach loop!-->

            <div class="result">{{--This needs to be OUTSIDE the conditional statement to render in html--}}
                @if ($recipes->count())
                    @foreach($recipes as $recipe)
                        <h2>{{ $recipe->category->name }}</h2>
                        <div class="recipe">
                            <a href="{{ URL::to('/recipes/' .$recipe->id) }}"><img src="{{ asset($recipe->thumbnail) }}" class="frame"></a>
                            <div class="result_inner">
                                <a href="{{ URL::to('/recipes/' .$recipe->id) }}"> <p class="title">{{ $recipe->title }}</p></a>
                                @if(! $recipe->description)
                                    <p class="description">No description available for this recipe.</p>
                                @else
                                    <p class="description">{{  $recipe->description }}</p>
                                @endif
                            </div><!--/.result_inner-->
                            <br><br>
                        </div><!--/.recipe-->
                    @endforeach
                @else
                    <p>There are no recipes to display.</p>
                @endif

            </div><!--/.result-->
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