<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                <a  href="{{ route('admin.dashboard') }}">Dashboard <span class="fa fa-dashboard"></span></a>
                            </li>
                            <li class="{{ (Request::is('admin/user*')) ? 'active' : '' }}">
                                <a data-toggle="collapse" data-target="#user" href="#">User <i class="fa fa-user fa-caret-down"></i></a>
                                <ul id="user" class="collapse dropdown-header-top">
                                    <li><a href="{{ route('admin.user.index') }}">All user</a>
                                    </li>
                                    <li><a href="{{ route('admin.user.balance.manage.page') }}">Add / Subtract balance</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="{{ Request::is('admin/referral/users') ? 'active' : '' }}">
                                <a  href="{{ route('admin.referral.users') }}">Non-Referred Users <span class="fa fa-plane"></span></a>
                            </li>

                            <li class="{{ Request::is('admin/referred/users') ? 'active' : '' }}">
                                <a  href="{{ route('admin.referred.users') }}">Referred Users <span class="fa fa-users"></span></a>
                            </li>


                            <li class="{{ Request::is('admin/user/transaction/all') ? 'active' : '' }}">
                                <a  href="{{ route('admin.user.transaction.all') }}">Transactions <span class="fa fa-history"></span></a>
                            </li>

                            <li class="{{ Request::is
                            ('admin/referral/users/transactions') ? 'active'
                            : ''
                             }}">
                                <a  href="{{ route('admin.referral.users.transactions') }}">Non-referred User Transaction <span class="fa fa-history"></span></a>
                            </li>

                            <li class="{{ Request::is
                            ('admin/referred/users/transactions') ? 'active'
                            : ''
                             }}">
                                <a  href="{{ route('admin.referred.users.transactions') }}">Referred User Transaction <span class="fa fa-history"></span></a>
                            </li>

                            <li class="{{ Request::is('admin/contact/all') ?
                            'active' : '' }}">
                                <a  href="{{ route('admin.contact.index')
                                }}">Contacts <span class="fa
                                    fa-phone"></span></a>
                            </li>

                            <li class="{{ Request::is('admin/site/setting') ? 'active' : '' }}">
                                <a  href="{{ route('admin.site.setting') }}">Setting <span class="fa fa-cogs"></span></a>
                            </li>

                            <li class="{{ (Request::is('admin/interest*')) ? 'active' : '' }}">
                                <a data-toggle="collapse" data-target="#interest" href="#">Interest <i class="fa fa-dollar fa-caret-down"></i></a>
                                <ul id="interest" class="collapse dropdown-header-top">
                                    <li><a href="{{ route('admin.interest.all') }}">All interest</a>
                                    </li>
                                    <li><a href="{{ route('admin.interest.create') }}">Add interest</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
