<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li class="active">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.students') }}">
                        <i class="fa fa-user-graduate"></i>
                        <span data-key="t-students">Students</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#usersDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="fa fa-users"></i>
                        <span data-key="t-user">Users</span>
                    </a>
                    <ul id="usersDropdown" class="collapse list-unstyled">
                        <li><a href="{{ route('admin.userlist') }}"><i class="fa fa-user"></i> User List</a></li>
                        <li><a href="{{ route('admin.roles') }}"><i class="fa fa-user-tag"></i> Roles</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.courses') }}">
                        <i class="fa fa-book"></i>
                        <span data-key="t-courses">Courses</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.liveclasses') }}">
                        <i class="fa fa-pen"></i>
                        <span data-key="t-course">Class</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.products') }}">
                        <i class="fa fa-box"></i>
                        <span data-key="t-products">Products</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.orders') }}">
                        <i class="fa fa-box"></i>
                        <span data-key="t-products">Orders</span>
                    </a>
                </li>

                
                <li>
                    <a href="{{ route('admin.withdrawal.request') }}">
                        <i class="fa fa-wallet"></i>
                        <span data-key="t-products">Withdrawal Request</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#settingsDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="fa fa-cogs"></i>
                        <span data-key="t-settings">Settings</span>
                    </a>
                    <ul id="settingsDropdown" class="collapse list-unstyled">
                        <li><a href="#"><i class="fa fa-cog"></i> General Settings</a></li>
                        <li><a href="#"><i class="fa fa-shield-alt"></i> Privacy Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell"></i> Notification Settings</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
