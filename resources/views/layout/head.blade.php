<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">FNC</div>
        <div class="masthead-heading text-uppercase" style="background-color: rgba(0, 0, 0, 0.5)">Federação Norte-Rio-Grandense de Ciclismo</div>
        <!-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">TITULO2</a> -->
    </div>
    <div class="background" style="position: absolute; margin:auto; top: 0; bottom:0; left: 0; right: 0;z-index: -1;"></div>
</header>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <!-- <a class="navbar-brand" href="#page-top"><img src="" alt="..." /></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item <?= ($_SERVER['REQUEST_URI']=="/") ? 'active' : '' ?>"><a class="nav-link" href="{{ route('home') }}">Início</a></li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI']=="/estrada") ? 'active' : '' ?>"><a class="nav-link" href="{{ route('estrada') }}">Estrada</a></li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI']=="/mtb") ? 'active' : '' ?>"><a class="nav-link" href="{{ route('mtb') }}">MTB</a></li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI']=="/bmx") ? 'active' : '' ?>"><a class="nav-link" href="">BMX</a></li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI']=="/ranking") ? 'active' : '' ?>"><a class="nav-link" href="#ranking">Ranking</a></li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI']=="/filiacao") ? 'active' : '' ?>"><a class="nav-link" href="#team">Filiação</a></li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI']=="/contateus") ? 'active' : '' ?>"><a class="nav-link" href="#contact">Fale Conosco</a></li>
            </ul>
        </div>
    </div>
</nav>
