<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.courses') }}">
                        <i class="fa fa-book"></i>
                        <span data-key="t-course">Courses</span>
                    </a>
                </li>



                <li>
                    <a href="{{ route('user.products') }}">
                        <i class="fa fa-box"></i>
                        <span data-key="t-product">Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('references') }}">
                        <i class="fa fa-link"></i>
                        <span data-key="t-references">References</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('passbook') }}">
                        <i class="fa fa-book"></i>
                        <span data-key="t-references">Passbook</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('affiliate') }}">
                        <i class="fa fa-handshake"></i>
                        <span data-key="t-affiliate">Affiliate</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span data-key="t-user">User</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('showprofile') }}">
                                <i class="fa fa-user-circle"></i>
                                <span data-key="t-profile">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <i class="fa fa-user-edit"></i>
                                <span data-key="t-edit-profile">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('change_password') }}">
                                <i class="fa fa-lock"></i>
                                <span data-key="t-change-password">Change Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('withdrawal') }}">
                                <i class="fa fa-money-bill"></i>
                                <span data-key="t-withdrawal">Withdrawal</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
