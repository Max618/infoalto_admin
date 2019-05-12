<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('painel') }}" class="active"><i class="lnr lnr-home"></i> <span>Painel</span></a></li>
                @can('user_view')
                <li><a href="{{ route('user.index') }}" ><i class="lnr lnr-user"></i> <span>Usuários</span></a></li>
                @endcan
                @can('role_view')
                <li><a href="{{ route('role.index') }}" ><i class="lnr lnr-graduation-hat"></i> <span>Funções</span></a></li>
                @endcan
            </ul>
        </nav>
    </div>
</div>