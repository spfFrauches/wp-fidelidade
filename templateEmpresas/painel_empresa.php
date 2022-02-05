<?php

/* Template Name: Painel Empresa  */ 
$_SESSION['url_referencia'] = '';    
if ($_SESSION['login_painel'] != 'empresa'):
    $url = get_bloginfo('url')."/login";
    header("Location:$url");
    exit("A sessão foi expirada ou é invalida");
endif; 
        
get_header('painel'); 
    
require ( get_template_directory() . '/models/model_empresa_config.php' );
require ( get_template_directory() . '/models/model_clientes.php' );
require ( get_template_directory() . '/models/model_marcacao.php' );
require ( get_template_directory() . '/models/model_empresa.php' );
    
$config = verConfigMarcacaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);

$totalClientes  = listarClientesPorEmpresa($_SESSION['dados_empresa'][0]->cnpj);
$totalMarcacoes = listarTotalMarcacoes($_SESSION['dados_empresa'][0]->cnpj);

$dadosEmpresa =  buscarEmpresa($_SESSION['dados_empresa'][0]->cnpj);
         
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">
    
    <div class="row">            
        <div class="col-lg-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Olá, <small> <?= $_SESSION['dados_empresa'][0]->razao_social ?> </small></h1>
                <br/>            
            </div>    
            <br/>
            <h5 class="h5">Bem vindo ao <?= NOME_APLICACAO ?></h5>              
        </div>            
    </div>
       
    <div class="row">
        <?php if (!$config) : ?>
        <div class="col-lg-6">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Atenção!</h4>
                <p>
                    Em Configurações defina a porcentagens de pontos de seus Clientes.
                </p>
                <hr>
                <p class="mb-0">Acesse [Configurações] e defina a forma de marcação</p>
            </div>            
        </div>
        <?php endif; ?>
        <?php if (!$dadosEmpresa[0]->logoempsrc) : ?>
        <div class="col-lg-6">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Dica!</h4>
                <p>
                    Que tal inserir a logo de sua empresa?
                    <br/>
                    O cliente ao acessar o cartão precisa
                    ver e identificar com facilidade sua empresa.                  
                </p>
                <hr>
                <p class="mb-0">Acesse [Minha Empresa] e coloque sua logo</p>
            </div>            
        </div>
        <?php endif; ?>
    </div>
        
    <br/>
        
    <div class="row">  
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">                        
                    <a href="<?= get_bloginfo('url')."/empresa-meus-clientes/" ?>">Meus clientes </a>
                    <span class="badge rounded-pill bg-primary"><?= $totalClientes ?></span>                  
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">                        
                    Total Marcações 
                    <span class="badge rounded-pill bg-success"><?= $totalMarcacoes ?></span>                     
                </div>
            </div>
        </div>
    </div>
    <br/>
              
</main>

<?php get_footer('painel') ?>




