<style>
        .main-sidebar, .sidebar-style-2 li a{
            background-color:#032e57;
            color:#fff!important;
        }

        .nav-link{
            background-color:#032e57!important;
            color:#fff!important;
        }

        .main-sidebar li a:hover{
            color:#fff!important;
            background-color:#032e57!important;
        }

    </style>
    <div class="main-sidebar sidebar-style-2" >
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route ('admin.dashboard') }}" style="color:#fff; font-weight:900; font-size:24px;">Admin HvDev</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route ('admin.dashboard') }}">HVDev</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Painel</li>
            <li class="dropdown ">
              <a href="admin.dashboard" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Painel</span></a>
              <ul class="dropdown-menu">
                <li ><a class="nav-link painelms" href="{{ route ('admin.dashboard') }}">Página Inicial</a></li>
                <li ><a class="nav-link painelms" href="{{ route ('dados.index') }}">Configurações</a></li>
                <li ><a class="nav-link painelms" href="{{ route ('pdv.index') }}">PDV - Ponto de Venda
                </a>
            </li>

              </ul>
            </li>


            <li class="menu-header">Estoque</li>
            <li class="dropdown ">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fa-regular fa-newspaper"></i> </i><span>Gerencie Produtos</span></a>
              <ul class="dropdown-menu">
                <li class=""><a class="nav-link painelms" href="{{ route('produtos.index') }}">Listar Produtos</a></li>
                <li class=""><a class="nav-link painelms" href="{{ route('produtos.create') }}">Criar Produtos</a></li>
              </ul>
            </li>

            <li class="menu-header">Categorias Estoque</li>
            <li class="dropdown ">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa-solid fa-layer-group"></i> <span>Categorias Produtos</span></a>
              <ul class="dropdown-menu">
                <li class=""><a class="nav-link painelms" href="{{ route('categorias-estoque.index') }}">Listar Produtos</a></li>
                <li class=""><a class="nav-link painelms" href="{{ route('categorias-estoque.create') }}">Criar Produtos</a></li>
              </ul>
            </li>

            <li class="menu-header">Usuários</li>
            <li class="dropdown ">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <span>Gerencie usuários</span></a>
              <ul class="dropdown-menu">
                <li class=""><a class="nav-link painelms" href="{{ route('usuarios.index') }}">Listar</a></li>
                <li class=""><a class="nav-link painelms" href="{{ route('usuarios.create') }}">Criar</a></li>
              </ul>
            </li>
            <br>
            <br>
            <br>
            <br>
        </ul>

        </aside>
      </div>
