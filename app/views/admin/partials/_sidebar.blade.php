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
                        <a href="{{ action('applications.index') }}">
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
                </ul>
            </nav>
        </div>
    </div>
</aside>