<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('assets/backend/admin/img/logo/logo.png') }}" alt="" /></a>
            <strong><img src="{{ asset('assets/backend/admin/img/logo/logosn.png') }}" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="#"><img src="{{ asset('assets/uploads/profile/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" /></a>
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
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-dashboard"></i>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ (Request::is('admin/user*')) ? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ (Request::is('admin/user*')) ? true : false }}"><i class="fa fa-user icon-wrap"></i> <span class="mini-click-non">User</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All User" href="{{ route('admin.user.index') }}"><span class="mini-sub-pro">All user</span></a></li>
                            <li><a title="Add balance" href="{{ route('admin.user.balance.manage.page') }}"><span class="mini-sub-pro">Add / Subtract balance</span></a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('admin/referral/users') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/referral/users') ? 'active' : '' }}" href="{{ route('admin.referral.users') }}">
                            <i class="fa fa-paper-plane"></i>
                            <span class="mini-click-non">Referral Users</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/referred/users') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/referred/users') ? 'active' : '' }}" href="{{ route('admin.referred.users') }}">
                            <i class="fa fa-users"></i>
                            <span class="mini-click-non">Referred Users</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/user/transaction/all') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/user/transaction/all') ? 'active' : '' }}" href="{{ route('admin.user.transaction.all') }}">
                            <i class="fa fa-history"></i>
                            <span class="mini-click-non">Transactions</span>
                        </a>
                    </li>

                    <li class="{{ (Request::is('admin/interest*')) ? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ (Request::is('admin/interest*')) ? true : false }}"><i class="fa fa-dollar icon-wrap"></i> <span class="mini-click-non">Interest</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All interest" href="{{ route('admin.interest.all') }}"><span class="mini-sub-pro">All interest</span></a></li>
                            <li><a title="Add balance" href="{{ route('admin.interest.create') }}"><span class="mini-sub-pro">Add interest</span></a></li>
                        </ul>
                    </li>
                    <li class="divider"><i class="fa fa-cogs"> Setting</i> </li>
                    <li class="{{ Request::is('admin/site/setting') ? 'active' : '' }}">
                    <a class="{{ Request::is('admin/site/setting') ? 'active' : '' }}" href="{{ route('admin.site.setting') }}">
                        <i class="fa fa-cogs"></i>
                        <span class="mini-click-non">Setting</span>
                    </a>
                    </li>


                </ul>
            </nav>
        </div>
    </nav>
</div>
