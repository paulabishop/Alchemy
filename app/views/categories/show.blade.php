{{--Author: Paula Bishop
Revision date: 4/26/15
File name: categories/show.blade.php
Description: Returns individual category with its recipes--}}

@extends('layouts.main')

@section('title')
    {{$category->name}} Category, Paula's Mystical Kitchen Alchemy
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img class="desktop" src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ><img class="mobile" src="{{ asset('images/alchemy_mobilemast.jpg') }}"  alt="Paula's Kitchen Alchemy for Mobile: Because Magic Keeps Happening in the Kitchen!"></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}" >Home</a></li>
                <li><a href="{{ URL::to('/about') }}">About</a></li>
                <li><a href="{{ URL::to('/categories') }}" class="current" >Categories</a></li>
                   {{-- Nested unordered list of dropdown of categories with foreach loop could go here using jquery--}}
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

@section('left_content')
    <div id="content">
        <div id="left_content">

                <div class="result">
                <h1>Category: {{$category->name}} </h1>
                <img src="{{ asset($category->thumbnail) }}" class="frame">
                <p class="description">{{ $category->description }}</p>

                <div class="spacer">{{--   This shows the category edit button to admins only--}}
                 @if(Auth::user() && Auth::user()->role == 'Administrator')
                    {{ link_to("/categories/{$category->id}/edit", "Edit Category", ['class'=>'button']) }}
                 @endif</div>
                </div>{{--/.result--}}

           {{-- Show recipes for this category--}}
            <h2>Recipes in {{$category->name}}</h2>
            <?php $recipes = Recipe::all(); ?>

            <div class="result">
            @if ($category->recipes->count())
                @foreach ($category->recipes as $recipe)

                        <a href="{{ URL::to('/recipes/' .$recipe->id) }}"><img src="{{ asset($recipe->thumbnail) }}" class="frame"></a>
                    <div class="result_inner">
                        <a href="{{ URL::to('/recipes/' .$recipe->id) }}"> <p class="title">{{ $recipe->title }}</p></a>

                        {{--Check to see if there is a description--}}
                    @if(! $recipe->description )
                        <p class="description">No description available for this recipe.</p>
                        @else
                        <p class="description">{{ $recipe->description }}</p>
                    @endif
                    </div>{{--/.result_inner--}}
                        <br><br>
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