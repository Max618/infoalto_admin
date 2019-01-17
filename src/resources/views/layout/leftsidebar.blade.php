<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('painel') }}" class="active"><i class="lnr lnr-home"></i> <span>Painel</span></a></li>
                @can('create_user')
                <li><a href="{{ route('user.index') }}" ><i class="lnr lnr-user"></i> <span>Usuários</span></a></li>
                @endcan
                @can('create_role')
                <li><a href="{{ route('role.index') }}" ><i class="lnr lnr-graduation-hat"></i> <span>Funções</span></a></li>
                @endcan
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="page-profile.html" class="">Profile</a></li>
                            <li><a href="page-login.html" class="">Login</a></li>
                            <li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>