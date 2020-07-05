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
                            <li class="{{ (Request::is('admin/user/*')) ? 'active' : '' }}">
                                <a data-toggle="collapse" data-target="#user" href="#">User <i class="fa fa-user fa-caret-down"></i></a>
                                <ul id="user" class="collapse dropdown-header-top">
                                    <li><a href="{{ route('admin.user.index') }}">All user</a>
                                    </li>
                                    <li><a href="{{ route('admin.user.add.balance') }}">Add balance</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="{{ Request::is('user/transaction/all') ? 'active' : '' }}">
                                <a  href="{{ route('admin.user.transaction.all') }}">Transactions <span class="fa fa-history"></span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
