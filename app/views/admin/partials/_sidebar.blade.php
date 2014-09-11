<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a href="{{ action('dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ action('application.index') }}">
                            <i class="fa fa-hdd-o" aria-hidden="true"></i>
                            <span>Applications</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ action('plugin.index') }}">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                            <span>Plugins</span>
                        </a>
                    </li>
                    <li class="pull-down">
                        <a href="{{ action('admin.logout') }}">
                            <i class="fa fa-logout" aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>