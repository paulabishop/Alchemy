{{--Author: Paula Bishop
Revision date: 5/2/15
File name: register.blade.php
Description: Returns form to create new user, posts to RegisterController to store user--}}

@extends('layouts.registration_main')

@section('title')
   Register for Paula's Mystical Kitchen Alchemy
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ></a>

        <!--this is where I started trying to figure out dropdown--this needs correcting!!!-->
        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('/about') }}" >About</a></li>
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
                <p>Already Registered? </p><a href="{{ URL::to('/login') }}">Login here</a>
            @endif
        </div><!--/#login-->

    </div><!--/#masthead-->
@stop

@section('form_content')


    <div id="content">
            <div id="main">
              <div class="form">
                <h1>New User Registration</h1>
                    <!-- form goes here -->
                    {{ Form::open(array('url' => 'register')) }}

                  <fieldset>
                    {{ Form::label('fullname', 'Full Name') }}
                    {{ Form::text('fullname', null, ['class' => 'label', 'required' => 'required']) }}
                      {{ '<span class="error">' .$errors->first('fullname').'</span>' }}
                  </fieldset>

                  <fieldset>
                    {{ Form::label('email', 'Email Address') }}
                    {{ Form::email('email', null, ['class' => 'label', 'required' => 'required']) }}
                      {{ '<span class="error">' .$errors->first('email').'</span>' }}
                  </fieldset>

                  <fieldset>
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username', null, ['class' => 'label', 'required' => 'required']) }}
                      {{ '<span class="error">' .$errors->first('username').'</span>' }}
                  </fieldset>

                  <fieldset>
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', ['class' => 'label', 'required' => 'required']) }}
                      {{ '<span class="error">' .$errors->first('password').'</span>' }}
                  </fieldset>

                  <fieldset>
                      {{ Form::label('terms', 'I accept the Terms of Use') }}
                      {{ Form::checkbox('terms', 1, false, ['required' => 'required']) }}
                  </fieldset>

                  <fieldset>
                      <img src="{{Captcha::getImage()}}">
                      <input type="text" name="user-captcha">
                  </fieldset>

                  <fieldset class="form_submit">
                    {{ Form::submit('Register Now', ['class' => 'button']) }}
                  </fieldset>

                    {{ Form::close() }}
              </div><!--/.form-->
                <div class="terms">
                 <p><strong>Terms of Use:</strong> I promise not to take any recipes from this site and publish them for fame or profit, or take them to create a product to sell, or in any way claim them as my own for profit.</p>
                </div>
            </div><!--/#main-->

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