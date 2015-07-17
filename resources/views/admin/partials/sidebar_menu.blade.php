<div class="page-sidebar">
    <nav class="navbar" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="clearfix">
            <!-- Toggle Button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-siderbar-collapse">
                <span class="sr-only">Toggle navigation</span>
			                    <span class="toggle-icon">
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                    </span>
            </button>
            <!-- End Toggle Button -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="nav-collapse collapse navbar-collapse page-siderbar-collapse">
            <h3>Quick Actions</h3>

            <ul class="nav navbar-nav">
                <li>
                    <a href="#">
                        <i class="icon-envelope "></i>
                        Add Recruit
                    </a>
                </li>
                @if (Route::currentRouteName() == 'show_recruit')
                <li>
                    <a href="#add_task" data-toggle="modal">
                        <i class="icon-notebook "></i>
                        Add Task
                    </a>
                </li>
                <li>
                    <a href="#add_note" data-toggle="modal">
                        <i class="icon-paper-clip"></i>
                        Add Note
                    </a>
                </li>
                @endif
                <li>
                    <a href="#">
                        <i class="icon-star"></i>
                        Groups
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-pin"></i>
                        Campaigns
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</div>