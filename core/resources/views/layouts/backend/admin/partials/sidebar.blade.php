<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header col-md-offset-2">
            <a href="{{ route('admin.dashboard') }}"><img class="main-logo img-responsive" style="width: 200px;" src="{{ asset('assets/frontend/images/logo.png') }}" alt="{{ Auth::user()->name }}" /></a>
            <strong><img src="{{ asset('assets/frontend/images/logo.png') }}" alt="{{ Auth::user()->name }}" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/uploads/profile/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" /></a>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="{{ Request::is('admin/dashboard') ? 'activeClass' : '' }}">
                        <a class="{{ Request::is('admin/dashboard') ? 'activeClass' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-dashboard"></i>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>



                    <li class="{{ (Request::is('admin/user/all') || Request::is('admin/user/manage/balance') || Request::is('admin/user/search')) ? 'activeClass' : '' }}">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ (Request::is('admin/user/all') || Request::is('admin/user/manage/balance')) ? 'true' : 'false' }}"><i class="fa fa-user icon-wrap"></i> <span class="mini-click-non">User</span></a>

                        <ul class="submenu-angle" aria-expanded="{{ (Request::is('admin/user/all') || Request::is('admin/user/manage/balance')) ? 'true' : 'false' }}">
                            <li class=" {{ (Request::is('admin/user/all')) ? 'activeClass' : '' }}"><a title="All User" href="{{ route('admin.user.index') }}"><span class="mini-sub-pro">All user</span></a></li>
                            <li class=" {{ (Request::is('admin/user/manage/balance')) ? 'activeClass' : '' }}"><a title="Add balance" href="{{ route('admin.user.balance.manage.page') }}"><span class="mini-sub-pro">Add / Subtract balance</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="{{ Request::is('admin/referral/users') ? 'activeClass' : '' }}" href="{{ route('admin.referral.users') }}">
                            <i class="fa fa-paper-plane"></i>
                            <span class="mini-click-non">Referral Users</span>
                        </a>
                    </li>


                    <li>
                    <a class="{{ Request::is('admin/referred/users') ? 'activeClass' : '' }}" href="{{ route('admin.referred.users') }}">
                    <i class="fa fa-users"></i>
                    <span class="mini-click-non">Referred Users</span>
                    </a>
                    </li>

                    <li>
                    <a class="{{ Request::is('admin/user/transaction/all') ? 'activeClass' : '' }}" href="{{ route('admin.user.transaction.all') }}">
                    <i class="fa fa-history"></i>
                    <span class="mini-click-non">Transactions</span>
                    </a>
                    </li>

                    <li>
                        <a class="{{ Request::is('admin/referral/users/transactions') ? 'activeClass' : '' }}" href="{{ route('admin.referral.users.transactions') }}">
                            <i class="fa fa-history"></i>
                            <span class="mini-click-non">Non-referred User Transaction</span>
                        </a>
                    </li>

                    <li>
                        <a class="{{ Request::is('admin/referred/users/transactions') ? 'activeClass' : '' }}" href="{{ route('admin.referred.users.transactions') }}">
                            <i class="fa fa-history"></i>
                            <span class="mini-click-non">Referred User Transaction</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/contact/all') ?
                    'activeClass' : '' }}">
                        <a class="{{ Request::is('admin/contact/all') ?
                        'activeClass' : '' }}" href="{{ route('admin.contact.index') }}">
                            <i class="fa fa-phone"></i>
                            <span class="mini-click-non">Contacts</span>
                        </a>
                    </li>

                    <li class="{{ (Request::is('admin/interest*')) ? 'activeClass' : '' }}">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="{{ (Request::is('admin/interest*')) ? true : false }}"><i class="fa fa-dollar icon-wrap"></i> <span class="mini-click-non">Interest</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li class="{{ (Request::is('admin/interest/all')) ? 'activeClass' : '' }}"><a title="All interest" href="{{ route('admin.interest.all') }}"><span class="mini-sub-pro">All interest</span></a></li>
                            <li class="{{ (Request::is('admin/interest/create')) ? 'activeClass' : '' }}"><a title="Add balance" href="{{ route('admin.interest.create') }}"><span class="mini-sub-pro">Add interest</span></a></li>

                            <li class="{{ (Request::is
                            ('admin/interest/transaction/all')) ?
                            'activeClass' : '' }}"><a title="All interest
                            transaction" href="{{ route('admin.interest.transactions')
                            }}"><span class="mini-sub-pro">All interest
                                        transaction
                                    </span></a></li>
                        </ul>
                    </li>
                    <li class="divider"><i class="fa fa-cogs"> Setting</i> </li>
                    <li class="{{ Request::is('admin/site/setting') ? 'activeClass' : '' }}">
                    <a class="{{ Request::is('admin/site/setting') ? 'activeClass' : '' }}" href="{{ route('admin.site.setting') }}">
                        <i class="fa fa-cogs"></i>
                        <span class="mini-click-non">Setting</span>
                    </a>
                    </li>

                    <li class="{{ Request::is('admin/ip/logs') ? 'activeClass' : '' }}">
                        <a class="{{ Request::is('admin/ip/logs') ? 'activeClass' : '' }}" href="{{ route('admin.user.track') }}">
                            <i class="fa fa-location-arrow"></i>
                            <span class="mini-click-non">Ip Logs</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/') }}" target="_blank">
                            <i class="fa fa-globe"></i>
                            <span class="mini-click-non">View Site</span>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </nav>
</div>
