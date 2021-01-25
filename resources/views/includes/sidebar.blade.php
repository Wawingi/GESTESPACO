<!-- Left Sidenav -->
<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li>
            <a href="javascript: void(0);"><i style="color:#fff" class="ti-user"></i><span>Visitantes</span><span class="menu-arrow"><i  class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ url('marcacoesVisitantePage') }}"><i class="ti-control-record"></i>Listar Visitantes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listarMarcacaoAllVisita') }}"><i class="ti-control-record"></i>Histórico de Visita</a></li>
            </ul>
        </li>
        
        @if(Auth::user()->tipo==0)
        <li>
            <a href="javascript: void(0);"><i style="color:#fff" class="ti-id-badge"></i><span>Funcionários</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ url('listarFuncionarios') }}"><i class="ti-control-record"></i>Listar Funcionários</a></li>
            </ul>
        </li>
        @endif
       
        @if(Auth::user()->tipo==0)
        <li>
            <a href="javascript: void(0);"><i style="color:#fff" class="ti-folder"></i><span>Logística</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ url('listarProdutosGeral') }}"><i class="ti-control-record"></i>Listar Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('entregarProduto') }}"><i class="ti-control-record"></i>Registar Saída</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listarSaidas') }}"><i class="ti-control-record"></i>Listar Saídas</a></li>
            </ul>
        </li>
        @endif
       
        @if(Auth::user()->tipo==0)
        <li>
            <a href="javascript: void(0);"><i style="color:#fff" class="ti-settings"></i><span>Definições</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ url('listarDepartamentos') }}"><i class="ti-control-record"></i>Listar Departamentos</a></li>
            </ul>
        </li>
        @endif
    </ul>
</div>
<!-- end left-sidenav-->
