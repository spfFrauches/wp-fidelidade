<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Gestão Fidelidade</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
   
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?= get_bloginfo('url') ?>/sair">Sair</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <?php
                    global $wp;
                    $url = home_url( $wp->request );                    
                ?>
                
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Painel Fidelidade</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <?php $url_swp1 = get_bloginfo('url')."/painel-empresa" ?>                        
                        <a class="nav-link <?php if ($url == $url_swp1 ) { echo "active";}?>" href="<?= $url_swp1 ?>"
                            <span data-feather="home"></span>
                            Home 
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php $url_swp4 = get_bloginfo('url')."/empresas-configuracao" ?> 
                        <a class="nav-link <?php if ($url == $url_swp4 ) { echo "active";}?>"href="<?= $url_swp4 ?>">
                            <span data-feather="shopping-cart"></span>
                            Configurações
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php $url_swp2 = get_bloginfo('url')."/minha-empresa" ?> 
                        <a class="nav-link <?php if ($url == $url_swp2 ) { echo "active";}?>" href="<?= $url_swp2 ?>">
                            <span data-feather="file"></span>
                            Minha empresa
                         </a>
                    </li>

                    <li class="nav-item">
                        <?php $url_swp3 = get_bloginfo('url')."/empresa-meus-clientes" ?> 
                        <a class="nav-link <?php if ($url == $url_swp3 ) { echo "active";}?>"href="<?= $url_swp3 ?>">
                            <span data-feather="shopping-cart"></span>
                            Meus Cliente
                        </a>
                    </li>
                                       
                    <li class="nav-item">
                        <a  target="_blank" class="nav-link" href="<?= get_bloginfo('url')  ?>/site-marcacao/">
                            <span data-feather="shopping-cart"></span>
                            Site marcação 
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= get_bloginfo('url')  ?>/minha-empresa-alterar-senha/">
                            <span data-feather="shopping-cart"></span>
                            Alterar Senha
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Tutoriais
                        </a>
                    </li>

                </ul>            

            </div>
        </nav>

