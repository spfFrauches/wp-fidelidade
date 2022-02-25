<?php 
/* Template Name: Painel Cliente Extrato*/ 

$_SESSION['url_referencia'] = '';
$_SESSION['jaInserido'] = 'nao'; 
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

$cpfCliente = $_SESSION['dados_cliente'][0]->cpf;
$cnpjemp = $_REQUEST["cnpj"];
    

$minhasEmpresas = buscarEmpresaLigadaAoCliente($cpfCliente);
$totalPontos = 0;
$pontosExpirado = 0;
$totalPontosExpirado = 0;
$listarMarcacoes = listarMarcacaoEmpresaCliente2($_SESSION['dados_cliente'][0]->cpf, $_REQUEST["cnpj"]); 
$dadosEmpresa = buscarEmpresa($_REQUEST["cnpj"]);

$solicitacaoEmAberto = solicitacaoRestageEmAberto($cpfCliente,$cnpjemp);

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
    
    <?php 
        /*
        echo "<pre>";
        var_dump($listarMarcacoes);
        echo "</pre>";
        */
    ?>
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meu Extrato <small></small></h1>  
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="<?= get_bloginfo('url') ?>/painel-cliente" class="btn btn-sm btn-outline-secondary btn-nav-forload">Voltar</a>
            </div>
            <button type="button" class="btn btn-sm btn btn-success btnDetalhesBeneficioBrinde" data-cnpjemp="<?= $listarMarcacoes[0]->cnpjemp ?>" data-bs-toggle="modal" data-bs-target="#modalBeneficio" >
                <i class="fa fa-gift" aria-hidden="true"></i>
                Ver Benefícios
            </button>
        </div>
    </div> 
      
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-3">
                            <div class="div-resolut2">
                                <img class="img-resolut2" src="<?= $listarMarcacoes[0]->logoempsrc ?>" >
                            </div>
                        </div>
                        <div class="col-9">
                            <h6 class="mb-0 text-black-50 lh-100"><?= $dadosEmpresa[0]->razao_social ?></h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    
    <?php if ($solicitacaoEmAberto): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <b>Que massa!</b> Você tem brindes a resgatar...
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>  
    <?php endif; ?>
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
            <div class="display-6">
                
                <?php if ($value->tipomarcacao == 'retirada'):   ?>
                <i style="color: green" class="fa fa-gift" aria-hidden="true"></i>
                <?php endif; ?> 
                
                <?php if ($value->tipomarcacao == 'cash'):   ?> 
                
                    <?php if (strtotime($value->data_expiracao) < date('Y-m-d') ):   ?> 
                    <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                    <?php endif; ?> 
                    <?php if (strtotime($value->data_expiracao) > date('Y-m-d') ):   ?> 
                    <i class="fa fa-check-square-o text-primary" aria-hidden="true"></i>
                    <?php endif; ?> 
                   
                <?php endif; ?> 
                               
            </div>
            <div class="small lh-sm border-bottom w-100" style="margin-left: 10px; margin-top: 10px">
                <div class="d-flex justify-content-between">
                    
                    <?php if ($value->tipomarcacao == 'retirada'):   ?> 
                        <strong class="text-success"><?= date("d/m/Y H:i", strtotime($value->datamarcacao)) ; ?></strong>
                    <?php endif; ?> 
                        
                    <?php if ($value->tipomarcacao == 'cash'):   ?>       
                        <strong class="text-primary"><?= date("d/m/Y H:i", strtotime($value->datamarcacao)) ; ?></strong>
                    <?php endif; ?> 
                        
                    <?php if ($value->tipomarcacao == 'retirada'):   ?>                    
                    <a href="#">
                        <span class="badge rounded-pill bg-success">Resgate <?= $value->pontos ?> </span>
                    </a>                   
                    <?php endif; ?>   
                    
                    <?php if ($value->tipomarcacao == 'cash'):   ?> 
                        
                        <?php if (strtotime($value->data_expiracao) < date('Y-m-d') ):   ?>
                        <a href="#">
                            <span class="badge rounded-pill bg-danger">
                                <s><?= $value->pontos ?> Pts</s>
                                <?php $pontosExpirado = $value->pontos ?>
                            </span>
                        </a> 
                        <?php endif; ?>   
                        
                        <?php if (strtotime($value->data_expiracao) > date('Y-m-d') ):   ?>
                        <a href="#">
                            <span class="badge rounded-pill bg-primary"><?= $value->pontos ?> Pts</span>
                           
                        </a> 
                        <?php endif; ?>   
                                  
                    <?php endif; ?>   
                                        
                </div>
                <span class="d-block">
                    <?php if ($value->tipomarcacao == 'retirada'):   ?>
                        <p class="text-success">Parabens pelo seu resgate.</p>
                    <?php endif; ?> 
                    
                    <?php if ($value->tipomarcacao == 'cash'):   ?> 
                        
                        <?php if (strtotime($value->data_expiracao) < date('Y-m-d') ):   ?>                         
                        <p class="text-danger">Expirado em: <?= date("d/m/Y", strtotime($value->data_expiracao)) ?></p>             
                        <?php endif; ?>
                        
                        <?php if (strtotime($value->data_expiracao) >= date('Y-m-d') ):   ?>                         
                        <p class="text-primary">Expira em: <?= date("d/m/Y", strtotime($value->data_expiracao)) ?></p>                   
                        <?php endif; ?>
                        
                    <?php endif; ?>    
                </span>
            </div>
        </div>
        <?php  
            $totalPontos = $totalPontos + $value->pontos;
            
            $totalPontosExpirado = $totalPontosExpirado + $pontosExpirado ;
            
            $totalPontosFinal = $totalPontos - $totalPontosExpirado;
         ?>
        <?php endforeach; ?>
        <small class="d-block text-end mt-3">       
            <a href="#" style="text-decoration: none; font-size: 16px">Pontos expirados.: <?= $totalPontosExpirado ?> </a>
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




