{{--Author: Paula Bishop
Revision date: 4/24/15
File name: logout.blade.php
Description: Confirms user has logged out and invites to log back in--}}

@extends('layouts.registration_main')

@section('title')
   Logged out
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('/about') }}" >About</a></li>
                <li><a href="{{ URL::to('/categories') }}" >Categories</a></li>
                <li><a href="{{ URL::to('/recipes') }}">All Recipes</a></li>

                {{--Authentication for mobile changes button to logout from login--}}
                @if (Auth::check())
                    <li> <a href="{{ URL::to('/logout') }}" class="mobile" >Logout {{ Auth::user()->username }}</a></li>
                @else
                    <li><a href="{{ URL::to('/login') }}" class="mobile">Login</a></li>
                @endif
            </ul>
        </div><!--/#navbar-->
<!--login div was here-->
    </div><!--/#masthead-->
@stop

@section('form_content')

    <div id="content">
            <div id="main">

                <h1>Log Out</h1>
                <p>You have successfully logged out. <a href="{{ URL::to('/login') }}">Log Back In?</a></p>

                </div>

            </div><!--/#main-->
        @stop
