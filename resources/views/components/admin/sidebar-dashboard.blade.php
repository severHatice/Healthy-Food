
    <aside class="main-sidebar">
        <section class="sidebar">

            <div class="user-panel">

                <div class="pull-left info">
                    @Auth
                    <p style="color:var(--icons-color); font-size:1.4em; margin-bottom:10px">{{Auth::user()->username}}</p>
                    @endAuth
                </div>
            </div>

            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..." />
                    <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">NAVIGATION</li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>User Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('users')}}"> View Users</a></li>
                        <li><a href="user_roles.html"> User Roles</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Recipe Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="recipes.html">View Recipes</a></li>
                        <li><a href="categories.html">Categories</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-comments"></i> <span>Content Moderation</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="comments.html">Comments</a></li>
                        <li><a href="reviews.html"> Reviews</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>

