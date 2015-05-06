{{--Author: Paula Bishop
Revision date: 5/2/15
File name: login.blade.php
Description: Shows form to user to login--}}

@extends('layouts.registration_main')

@section('title')
   Log in to Paula's Mystical Kitchen Alchemy
@stop

@section('header')
    <div id="masthead">
        <a href="{{ URL::to('/') }}"><img src="{{ asset('images/alchemy_mast.jpg') }}" alt="Paula's Kitchen Alchemy: Because Magic Keeps Happening in the Kitchen!" ></a>

        <div id="navbar">
            <ul>
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('/about') }}" >About</a></li>
                <li><a href="{{ URL::to('/categories') }}" >Categories</a></li>
                {{-- Nested unordered list of dropdown of categories with foreach loop could go here using jquery--}}
                <li><a href="{{ URL::to('/recipes') }}">All Recipes</a></li>
            </ul>
        </div><!--/#navbar-->

        {{--Authentication checks if user is logged in and displays personalized logout--}}
        <div id="login">
            @if (Auth::check())
                <p>You are logged in as {{ Auth::user()->fullname }} <a href="{{ URL::to('/logout') }}" >(Logout)</a></p>
            @else
                <p>Not Registered? </p><a href="{{ URL::to('/register') }}">Register</a>
            @endif
        </div><!--/#login-->

    </div><!--/#masthead-->
@stop

@section('form_content')

    <div id="content">
            <div id="main">
              <div class="form">
                <h1>User Login</h1>
                    <!-- form goes here -->
                    {{ Form::open(array('url' => 'login')) }}

                  <fieldset>
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username', null, ['class' => 'label', 'required' => 'required']) }}
                  </fieldset>

                  <fieldset>
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', ['class' => 'label', 'required' => 'required']) }}
                  </fieldset>

                  <div class="form_submit">
                    {{ Form::submit('Log in', ['class' => 'button']) }}
                  </div>

                  @if (Session::has('flash_message'))
                      <div class="error">
                          <p>{{ Session::get('flash_message') }}</p>
                      </div>
                  @endif
                  {{ Form::close() }}
              </div><!--/.form-->
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