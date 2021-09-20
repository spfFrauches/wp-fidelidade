<?php

    /* Template Name: Painel Empresa  */ 
    if (isset($_SESSION['login_painel'])) :
    get_header('painel'); 
    require ( get_template_directory() . '/inc/model_empresa_config.php' );
    require ( get_template_directory() . '/inc/model_clientes.php' );
    require ( get_template_directory() . '/inc/model_marcacao.php' );
    
    $config = verConfigMarcacaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);
    
    if ($config[0]->tipo_marcacao == 'qtd') {
        $tipoMarcacao = "por Quantidade/Frequencia";
    }
    
    if ($config[0]->tipo_marcacao == 'cash') {
        $tipoMarcacao = "por Cashback";
    }
    
    $totalClientes  = listarClientesPorEmpresa($_SESSION['dados_empresa'][0]->cnpj);
    $totalMarcacoes  =listarTotalMarcacoes($_SESSION['dados_empresa'][0]->cnpj);
       
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    
    <div class="row">            
        <div class="col-lg-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Olá, <small> <?= $_SESSION['dados_empresa'][0]->razao_social ?> </small></h1>
                <br/>            
            </div>    
            <br/>
            <h5 class="h5">Bem vindo ao Fidelidade Web</h5>              
        </div>            
    </div>
    
    <?php if (!$config) : ?>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Atenção!</h4>
                    <p>
                        É necessário configurar as forma de marcação.
                        <br/>
                        Após configuração sua empresa esta pronta para usar o fidelidade Web.
                    
                    </p>
                    <hr>
                    <p class="mb-0">Acesse o menu Configurar e escolha a forma de marcação</p>
                </div>            
            </div>
        </div>
    <?php endif; ?>
        
    <br/>
        
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">                        
                    Tipo de marcação
                    <span class="badge badge-primary badge-pill"><?= $tipoMarcacao ?></span>                       
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">                        
                    <a href="<?= get_bloginfo('url')."/empresa-meus-clientes/" ?>">Meus clientes </a>
                    <span class="badge badge-primary badge-pill"><?= $totalClientes ?></span>                       
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">                        
                    Marcações 
                    <span class="badge badge-primary badge-pill"><?= $totalMarcacoes ?></span>                       
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0">Pendências Técnica de desenvolvimento</h6>
                
                 <div class="media text-muted pt-3">
                    <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"></rect><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">wp-admin</strong>
                        saulopf | 102030 (Retirar isso depois de pronto)
                    </p>
                </div>

            </div>  
        </div>
    </div>
   <br/>                
</main>

<?php 
    else : 
        $url = get_bloginfo('url')."/login";
        echo "<script>";
        echo "window.location.href = '$url'";
        echo "</script>"; 
     endif;
?>

<?php get_footer('painel') ?>




