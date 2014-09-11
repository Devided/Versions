<header class="header">
    <div class="logo-container">
        <a href="{{ action('dashboard') }}" class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" height="35">
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="header-right">
        <span class="separator"></span>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}" alt="{{ Auth::user()->username }}" class="img-circle" data-lock-picture="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}" />
                </figure>
                <div class="profile-info" data-lock-name="{{ Auth::user()->username }}" data-lock-email="{{ Auth::user()->email }}">
                    <span class="name">{{ ucfirst(Auth::user()->username) }}</span>
                    <span class="role">{{ Auth::user()->email }}</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>
            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        {{ HTML::decode(HTML::link(action('admin.logout'),'<i class="fa fa-power-off"></i> Logout', array('role' => 'menuitem','tabindex' => '-1')))}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>