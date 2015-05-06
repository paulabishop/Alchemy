{{--Author: Paula Bishop
Revision date: 4/26/15
File name: partials/search.blade.php
Description: Search block for upper right in desktop view. Insert into view with @include. This form's logic should be handled by SearchController with search().--}}

<div id="search">
    <h2 class="search_box">Search For Recipes</h2>
    <img class="right-top" src="{{ asset('images/search.svg') }}">
{{--    <p class="search_box">Search By:<p>--}}
    <div class="search_form">
        <!-- form goes here -->
        {{ Form::open(array('url' => 'search')) }}

        <fieldset>
            {{ Form::label('search_form', 'Search for Keywords or Ingredients:') }}
            {{ Form::text('search_form', null, ['required' => 'required']) }}
        </fieldset>

        <div class="form_submit">
            {{ Form::submit('Search', ['class' => 'button']) }}
        </div>

        {{ Form::close() }}
    </div>{{--/.form--}}

</div><!--/#search-->