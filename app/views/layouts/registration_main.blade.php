<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" >
    <title>@yield('title')</title>
    @section('head')
        <meta name="description" content="Paula's Recipes for Gluten-Free, Grain-Free, Sugar-Free, Low-Glycemic, Dairy-Free, and also many decadent chocolate recipes. Register as a Contributor and put your own recipes up here as well.">
        <meta name="author" content="Paula Bishop" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--links to local css and js-->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" media="screen, projection">
        <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    @show

  </head>
  <body>
  <div id="wrapper">

@yield('header')
@yield('form_content')
@yield('right_content')

  </div><!--/#content-->

      <div id="stickybottom">
          <footer>
              <h4>&copy; Copyright <script>document.write(new Date().getFullYear())</script> Paula Bishop, All Rights Reserved</h4>
          </footer>
      </div><!--/#stickybottom-->
  </div><!--/#wrapper-->
</body>
</html>