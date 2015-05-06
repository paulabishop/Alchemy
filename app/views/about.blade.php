{{--Author: Paula Bishop
Revision date: 5/4/15
File name: about.blade.php
Description: Static page about me and this project with contact--}}

@extends('layouts.main')

@section('title')
   About Paula and her Mystical Kitchen Alchemy
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img class="desktop" src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ><img class="mobile" src="{{ asset('images/alchemy_mobilemast.jpg') }}"  alt="Paula's Kitchen Alchemy for Mobile: Because Magic Keeps Happening in the Kitchen!"></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}" >Home</a></li>
                <li><a href="{{ URL::to('/about') }}" class="current">About</a></li>
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
                <h1>About me and this project</h1>
                <img class="portrait" src="images/portrait.jpg" alt="Paula portrait">
                <p>I realized that I was keeping records of my recipes on little slips of paper, and it was really hard recipes out a one inch stack of paper in the bookcase in the kitchen! For my Capstone, so I can graduate and complete my Web Technologies AAS degree for web development (on top of my BA in Illustration/Graphic Design and over 20 years of design experience), I decided to code a recipe entry website--essentially a cookbook--using Laravel's PHP framework and a MySQL database.</p>
                <p>Ideally, eventually, I would like to produce a printed version of my cookbook. Originally, I had planned to allow contributors to also join this site and put in their recipes, but the issues with filters and permissions (and the limited timeframe of just under 16 weeks) has made me seriously scale down what I originally intended, so perhaps I will add that functionality some time in the future, but for now, the site will only allow people to register as Subscribers to view and search recipes. Only Admins may add & edit recipes and categories at this point of launch.</p>
                <p>At some point, also, I would like to incorporate a contact form, but in the meantime, please feel free to <a href="mailto:paulaebishop@students.abtech.edu">contact me through email.</a> I'd also like to interject a quick note about the times shown on this site--I am not really entering recipes at 2am, I promise! I just didn't realize until the last minute that the time set in the php.ini file was for Europe/Germany, so all the times seem to be at least 4 hours off...</p>
            </div><!--/#text-->
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