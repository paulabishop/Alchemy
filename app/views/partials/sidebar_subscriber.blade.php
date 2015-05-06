{{--Author: Paula Bishop
Revision date: 4/26/15
File name: partials/sidebar_subscriber.blade.php
Description: This is the partial for the sidebar for users with Subscriber role.--}}

            <div id="sidebar">
                <div id="sidebar_content">
                    <h2>Welcome, {{ Auth::user()->fullname }}, Subscriber</h2>
                      <h3>Latest Recipes:</h3>
                    <?php
                        $latest = DB::table('recipes')
                        ->orderBy('updated_at', 'desc')
                        ->take(5)->get();
                    ?>
                    <ul class="latest">
                    @foreach($latest as $last)
                        <li><a href="{{ URL::to('/recipes/' .$last->id) }}">{{ $last->title }}</a></li>
                    @endforeach
                    </ul>
                </div><!--/#sidebar_content-->
            </div><!--/#sidebar-->
