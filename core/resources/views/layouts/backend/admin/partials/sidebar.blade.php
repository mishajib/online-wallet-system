<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('assets/backend/admin/img/logo/logo.png') }}" alt="" /></a>
            <strong><img src="{{ asset('assets/backend/admin/img/logo/logosn.png') }}" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="#"><img src="{{ Auth::user()->image }}" alt="" /></a>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <div class="profile-social-dtl">
                <ul class="dtl-social">
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="{{ Request::is('/admin/dashboard') ? 'active' : '' }}">
                        <a class="{{ Request::is('/admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-dashboard"></i>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ (Request::is('admin/user/*')) ? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ (Request::is('admin/user*')) ? true : false }}"><i class="fa fa-envelope-o icon-wrap"></i> <span class="mini-click-non">User</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All User" href="{{ route('admin.user.index') }}"><span class="mini-sub-pro">All user</span></a></li>
                            <li><a title="Add balance" href="{{ route('admin.user.add.balance') }}"><span class="mini-sub-pro">Add balance</span></a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('user/transaction/all') ? 'active' : '' }}">
                        <a class="{{ Request::is('user/transaction/all') ? 'active' : '' }}" href="{{ route('admin.user.transaction.all') }}">
                            <i class="fa fa-history"></i>
                            <span class="mini-click-non">Transactions</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('site/setting') ? 'active' : '' }}">
                    <a class="{{ Request::is('site/setting') ? 'active' : '' }}" href="{{ route('admin.site.setting') }}">
                        <i class="fa fa-cogs"></i>
                        <span class="mini-click-non">Setting</span>
                    </a>
                    </li>

                </ul>
            </nav>
        </div>
    </nav>
</div>
