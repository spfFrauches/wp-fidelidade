<?php 
/* Template Name: Painel Cliente Extrato*/ 
$_SESSION['url_referencia'] = '';
get_header('painel');

if (!isset($_SESSION['login_painel']) && $_SESSION['login_painel'] != 'cliente') :
    $url = get_bloginfo('url')."/login";
    header("Location:$url");
    exit("A sessão foi expirada ou é invalida");
endif;

include( get_template_directory() . '/models/model_marcacao.php' ); 
include( get_template_directory() . '/models/model_empresa.php' ); 
include( get_template_directory() . '/models/model_ligacaoEmpresa.php' ); 
include( get_template_directory() . '/models/model_beneficio.php' ); 
include( get_template_directory() . '/models/model_solicitacao_resgate.php' ); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    $cnpj = $_REQUEST["cnpj"];
    $url = get_bloginfo('url')."/painel-cliente/extrato-pontos/?cnpj=$cnpj";
    if (isset($_POST['solicitacao_resgate'])):
        $inserirSolicitacao = inserirSolicitacao($_POST);  
    endif;
    unset($_POST);
    echo "<script>window.location.href = '$url' </script>";
    exit;
}
    
$minhasEmpresas = buscarEmpresaLigadaAoCliente($_SESSION['dados_cliente'][0]->cpf);
$totalPontos = 0;
$listarMarcacoes = listarMarcacaoEmpresaCliente2($_SESSION['dados_cliente'][0]->cpf, $_REQUEST["cnpj"]); 
$dadosEmpresa = buscarEmpresa($_REQUEST["cnpj"]);

?>

<style>    
    .div-resolut {
        width: 120px; 
        height: 120px; 
    }
    .img-resolut {
        width: 120px; 
        height: 120px; 
        object-fit: contain;
    }    
    .div-resolut2 {
        width: 60px; 
        height: 60px; 
    }
    .img-resolut2 {
        width: 60px; 
        height: 60px; 
        object-fit: contain;
    }    
</style>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meu Extrato <small></small></h1>  
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="<?= get_bloginfo('url') ?>/painel-cliente" class="btn btn-sm btn-outline-secondary btn-nav-forload">Voltar</a>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary btnDetalhesBeneficioBrinde" data-cnpjemp="<?= $listarMarcacoes[0]->cnpjemp ?>" data-bs-toggle="modal" data-bs-target="#modalBeneficio" >
                <i class="fa fa-gift" aria-hidden="true"></i>
                Ver Benefícios
            </button>
        </div>
    </div> 
     
    <?php if ($inserirSolicitacao == true): ?>
    <div class="alert alert-success" role="alert">
        A simple success alert—check it out!
    </div>   
    <?php endif; ?>
        
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
        <div class="lh-100"> 
            <h6 class="mb-0 text-white lh-100">
                Local das marcações.: <?= $dadosEmpresa[0]->razao_social ?>
            </h6>
            <small>Detalhes das marcações</small>
        </div>
    </div>
    
    <!-- ------------------------------------------------------ -->
    <!-- Listando os detalhes da marcação para cada empresa     -->
    <!-- ------------------------------------------------------ -->
           
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        
        <?php foreach ($listarMarcacoes as $key => $value1): ?>
        <?php  $totalPontosCima = $totalPontosCima + $value1->pontos; ?>
        <?php endforeach; ?>
        <small class="d-block text-end mt-3">       
            <a href="#" style="text-decoration: none; font-size: 16px">Total Pontos.: <?= $totalPontosCima ?> </a>
        </small>  
        
        <?php foreach ($listarMarcacoes as $key => $value): ?>
        <div class="d-flex text-muted pt-3">
            <div class="div-resolut2">
                <img class="img-resolut2" src="<?= $value->logoempsrc ?>" >
            </div>
            <div class="small lh-sm border-bottom w-100" style="margin-left: 10px; margin-top: 10px">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark"><?= date("d/m/Y H:i", strtotime($value->datamarcacao)) ; ?></strong>
                    
                    <?php if ($value->tipomarcacao == 'retirada'):   ?>                    
                    <a href="#">
                        <span class="badge rounded-pill bg-danger">Resgate <?= $value->pontos ?> </span>
                    </a>                   
                    <?php endif; ?>   
                    
                    <?php if ($value->tipomarcacao == 'cash'):   ?>                    
                    <a href="#">
                        <span class="badge rounded-pill bg-primary"><?= $value->pontos ?> Pts</span>
                    </a>                 
                    <?php endif; ?>   
                                        
                </div>
                <span class="d-block">Local marcação.: <?=$value->nome_fantasia ?></span>
            </div>
        </div>
        <?php  $totalPontos = $totalPontos + $value->pontos; ?>
        <?php endforeach; ?>
        <small class="d-block text-end mt-3">       
            <a href="#" style="text-decoration: none; font-size: 16px">Total Pontos.: <?= $totalPontos ?> </a>
        </small>            
    </div>
     
</main>

<!-- Modal -->
<div class="modal fade" id="modalBeneficio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pontos e Benefícios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body detalhesBeneficioBrinde"> </div>
        </div>
    </div>
</div>

<?php get_footer('painel') ?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_extrato_cliente.js"></script>




