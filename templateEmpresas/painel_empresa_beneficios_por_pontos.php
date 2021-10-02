<?php 
/* Template Name: Painel Empresa - Beneficios por pontos */ 
$_SESSION['url_referencia'] = 'empresa-beneficios-por-pontos';
get_header('painel');
include( get_template_directory() . '/inc/functions_login.php' ); 
include( get_template_directory() . '/models/model_empresa.php' );
include( get_template_directory() . '/inc/functions_empresa.php' );

if(!isset($_SESSION['login_painel'])):
    $url = get_bloginfo('url')."/login";
    header("Location:$url");
    exit("Sessão expirada ou invalida");
endif; 
          
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">
      
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Beneficios <small>por pontos</small></h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Marcações</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Clientes</button>
            </div>
            <a href="<?= get_bloginfo('url') ?>/painel-empresa/cadastro-beneficios/" class="btn btn-sm btn-outline-secondary btn-nav-forload">              
                Novo benefício
            </a>
        </div>
    </div>
           
    <br/>
    
</main>

    
<?php get_footer('painel'); ?>
