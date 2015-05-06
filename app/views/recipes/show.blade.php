{{--Author: Paula Bishop
Revision date: 5/1/15
File name: recipes/show.blade.php
Description: Returns individual recipe by id--}}

@extends('layouts.main')

@section('title')
    {{$recipe->title}}, Paula's Mystical Kitchen Alchemy
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img class="desktop" src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ><img class="mobile" src="{{ asset('images/alchemy_mobilemast.jpg') }}"  alt="Paula's Kitchen Alchemy for Mobile: Because Magic Keeps Happening in the Kitchen!"></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}" >Home</a></li>
                <li><a href="{{ URL::to('/about') }}">About</a></li>
                <li><a href="{{ URL::to('/categories') }}"  >Categories</a></li>
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

            <div class="recipe">
                <h1>{{$recipe->title}} </h1>

                @unless(!$recipe->photo)
                    <img src="{{ asset($recipe->photo) }}" class="main_photo">
                @endunless

                <p class="description">{{ $recipe->description }}</p>

                <p><strong><em>Keywords:</em></strong> {{ $recipe->keywords }}</p>

                @unless(!$recipe->yields)
                    <p><strong><em>Yields/Serves:</em></strong> {{ $recipe->yields }}</p>
                @endunless
                
                @unless(!$recipe->prep_time)
                    <p><strong><em>Preparation Time:</em></strong> {{ $recipe->prep_time }}</p>
                @endunless

                <h2>Ingredients</h2>
                    <p>{{ $recipe->ingredients }}</p>

                <h2>Directions</h2>
                <p>{{ $recipe->directions }}</p>

                <p>Recipe by {{ $recipe->user->fullname }}, last modified {{ date("F j, Y, g:i a",strtotime($recipe->updated_at)) }}.</p>

                <div class="spacer">{{--This shows the recipe edit button to admins & recipe author (I hope) only--}}
                    @if(Auth::user($recipe->user_id) && Auth::user()->role == 'Administrator')
                        {{ link_to("/recipes/{$recipe->id}/edit", "Edit Recipe", ['class'=>'button']) }}
                    @endif</div>{{--/.spacer--}}
            </div>{{--/.recipe--}}
        </div>{{--/#left_content--}}
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