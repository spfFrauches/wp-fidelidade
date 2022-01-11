<style>
    
    @media only screen and (max-width: 800px) {
        .descricaoBeneficio {
            margin-left: 200px !important;   
        }
    }
    
</style>

<?php 

/* Template Name: Painel Empresa - Beneficios por pontos */ 
$_SESSION['url_referencia'] = 'empresa-beneficios-por-pontos';
get_header('painel');
include( get_template_directory() . '/models/model_beneficio.php' );
include( get_template_directory() . '/functions/functions_beneficios.php' );

if (!isset($_SESSION['login_painel'])) :
    $url = get_bloginfo('url')."/login";
    header("Location:$url");
    exit("Sessão expirada ou invalida");
endif ; 

checkIsUpdatedBeneficios();

$listagemBeneficios = listarBeneficiosPorEmpresa($_SESSION['dados_empresa'][0]->cnpj);
     
?>

<style>
    .wrapperimg {
        width: auto;
        height: 100%;
        max-width: none;
        position:absolute;
        top: 0;   
    }   
</style>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">
      
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Beneficios <small>por pontos</small></h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <!--
                <button type="button" class="btn btn-sm btn-outline-secondary">Marcações</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Clientes</button>
                -->
            </div>
            <a href="<?= get_bloginfo('url') ?>/painel-empresa/cadastro-beneficios/" class="btn btn-sm btn-outline-secondary btn-nav-forload">              
                Novo benefício
            </a>
        </div>
    </div>
           
    <br/>
    
    <div class="row">
        <div class="col-lg-12">           
            <?php if ($_SESSION['nvBeneficioCadastrado']): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Novo beneficio cadastrado.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>           
        </div>
    </div>
    
    <div class="row mt-5">
        <?php foreach ($listagemBeneficios as $key => $value): ?>
        <div class="col-lg-6 mb-1">  
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="<?= $value->imgsrcbeneficio ?>" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body descricaoBeneficio">
                            <h5 class="card-title"><?= $value->qtdpontos ?> Pontos</h5>
                            <p class="card-text" >
                                <?= $value->descricao ?>
                                &nbsp;
                                <a href="#" class="modaldetalhesBeneficio" data-bs-toggle="modal"  data-id="<?= $value->id ?>" data-bs-target="#staticBackdrop" >
                                    <span class="badge bg-success">Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> 
                                </a>
                            </p>
                            <p class="card-text" style="min-height: 40px">
                                <small class="text-muted"><?= $value->obsadicional ?></small>
                            </p>
                            <p class="card-text">
                                
                                <span class="badge bg-primary">Detalhes</span>
                                <span class="badge bg-secondary">Valido até.: 01/01/2999</span>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
         <?php endforeach; ?>
    </div>
    
  
</main>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">               
                <h5 class="modal-title" id="staticBackdropLabel">Detalhes do Benefício</h5>               
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body detalhesbeneficio">

            </div>
        </div>
    </div>
</div>

<script src="<?php bloginfo('template_url') ?>/ajax/painelempresa-pontosEbeneficios.js"></script>  
<?php get_footer('painel'); ?>
