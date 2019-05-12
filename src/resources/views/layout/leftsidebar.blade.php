<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('painel') }}" class="{{ \Infoalto\Admin\Helpers::isActive() }}"><i class="lnr lnr-home"></i> <span>Painel</span></a></li>
                @can('user_view')
                <li><a href="{{ route('user.index') }}" class="{{ \Infoalto\Admin\Helpers::isActive('user') }}"><i class="lnr lnr-user"></i> <span>Usuários</span></a></li>
                @endcan
                @can('role_view')
                <li><a href="{{ route('role.index') }}" class="{{ \Infoalto\Admin\Helpers::isActive('role') }}"><i class="lnr lnr-graduation-hat"></i> <span>Funções</span></a></li>
                @endcan
            </ul>
        </nav>
    </div>
</div>