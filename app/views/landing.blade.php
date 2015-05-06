{{--Author: Paula Bishop
Revision date: 5/1/15
File name: landing.blade.php
Description: Home page for site--}}

@extends('layouts.main')

@section('title')
    Paula's Mystical Kitchen Alchemy (WEB289 Capstone Project)
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img class="desktop" src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ><img class="mobile" src="{{ asset('images/alchemy_mobilemast.jpg') }}"  alt="Paula's Kitchen Alchemy for Mobile: Because Magic Keeps Happening in the Kitchen!"></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}" class="current">Home</a></li>
                <li><a href="{{ URL::to('/about') }}">About</a></li>
                <li><a href="{{ URL::to('/categories') }}" >Categories</a></li>
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
            <div id="main">

                <div id="text">
                    <h1>Welcome to Paula’s Kitchen Alchemy!</h1>
                    <p>While there are also "normal" recipes on this site, many of the recipes on this site are geared towards various dietary restrictions, such as gluten-free, grain-free, dairy-free, low-glycemic, sugar-free, vegan, etc. “Paleo” encompasses many of these, and there will certainly be some overlap.</p>
                    <p>A casual visitor to this site will not be able to see individual recipes, so if you would like to explore more fully, I would suggest that you either register for the site (it's free). All I ask is that you don't take these recipes and try to profit off of them--creating recipes is my passion and I am sharing them as such.</p>
                </div>

                <div id="categories">
                    @include('partials/allCategories')
                </div><!--/#categories-->

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