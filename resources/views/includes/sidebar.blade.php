<div class="pcoded-inner-navbar main-menu">
    <div class="">

        <div class="main-menu-content">
            <ul>
                <li class="more-details">
                    <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                    <a href="#!"><i class="ti-settings"></i>Settings</a>
                    <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="pcoded-navigation-label"></div>
    <ul class="pcoded-item pcoded-left-item">

        <center>
            <li class="my-4">
                <img src="{{ asset('backend/batik.jpg') }}" alt="" style="width: 100px"
                    class="rounded-circle border">
            </li>
        </center>
        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
    </ul>
    <div class="pcoded-navigation-label">Management Users</div>
    <ul class="pcoded-item pcoded-left-item mr-4">
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                <span class="pcoded-mtext">All Fitur</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{ route('users.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Manage Users</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('role.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Manage Role</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('permission.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Manage Permission</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="pcoded-navigation-label">Management Master</div>
    <ul class="pcoded-item pcoded-left-item mr-4">
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-list"></i></span>
                <span class="pcoded-mtext">All Fitur</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{ route('katgori.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Kategori</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('produk.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Produk</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                <li class=" ">
                    <a href="{{ route('slider') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Sliders</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                <li class=" ">
                    <a href="{{ route('provinsi.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Provinsi</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                <li class=" ">
                    <a href="{{ route('kota.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Kota</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
