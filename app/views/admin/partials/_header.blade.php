<header class="header">
    <div class="logo-container">
        <a href="/" class="logo">
            <img src="assets/images/logo.png" height="35" alt="Porto Admin" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="header-right">
        <ul class="notifications">
            <li>
                <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="badge">3</span>
                </a>
                <div class="dropdown-menu notification-menu">
                    <div class="notification-title">
                        <span class="pull-right label label-default">3</span>
                        Alerts
                    </div>
                    <div class="content">
                        <ul>
                            <li>
                                <a href="#" class="clearfix">
                                    <div class="image">
                                        <i class="fa fa-thumbs-down bg-danger"></i>
                                    </div>
                                    <span class="title">Server is Down!</span>
                                    <span class="message">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="clearfix">
                                    <div class="image">
                                        <i class="fa fa-lock bg-warning"></i>
                                    </div>
                                    <span class="title">User Locked</span>
                                    <span class="message">15 minutes ago</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="clearfix">
                                    <div class="image">
                                        <i class="fa fa-signal bg-success"></i>
                                    </div>
                                    <span class="title">Connection Restaured</span>
                                    <span class="message">10/10/2014</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        <span class="separator"></span>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}" alt="{{ Auth::user()->username }}" class="img-circle" data-lock-picture="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}" />
                </figure>
                <div class="profile-info" data-lock-name="{{ Auth::user()->username }}" data-lock-email="{{ Auth::user()->email }}">
                    <span class="name">{{ Auth::user()->username }}</span>
                    <span class="role">{{ Auth::user()->email }}</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>
            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        {{ HTML::decode(HTML::link('/setting','<i class="fa fa-gear"></i> Settings', array('role' => 'menuitem','tabindex' => '-1')))}}
                    </li>
                    <li>
                        {{ HTML::decode(HTML::link('/logout','<i class="fa fa-power-off"></i> Logout', array('role' => 'menuitem','tabindex' => '-1')))}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>