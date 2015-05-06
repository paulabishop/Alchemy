{{--Author: Paula Bishop
Revision date: 5/1/15
File name: partials/sidebar_guest.blade.php
Description: Default sidebar partial for guests who are not logged in or do not have an account--}}


<div id="sidebar">
    <div id="sidebar_content">
        <h2>Welcome, Guest</h2>
        <p>You may view categories and see that there are recipes, but unfortunately, at this point at least, you will not be able to view recipes individually unless you register. </p>
        <p>Registration is free, and I promise I will never spam you, as I don't intend to produce a newsletter. This is mainly a school project.</p>
        <br>
        <a href="{{ URL::to('/register') }}" class="button">Register Now</a>
    </div>
</div><!--/#sidebar-->