<?php 

/* Template Name: Painel Empresa - Solicitações Resgate */ 
$_SESSION['url_referencia'] = 'painel-empresa-resgate-pontos';
get_header('painel');

include( get_template_directory() . '/models/model_solicitacao_resgate.php' );
include( get_template_directory() . '/models/model_marcacao.php' );

$cnpjempresa = $_SESSION['dados_empresa'][0]->cnpj; 
$_SESSION['nvBeneficioCadastrado'] = false;

if(!isset($_SESSION['login_painel'])):
    $url = get_bloginfo('url')."/login";
    header("Location:$url");
    exit("Sessão expirada ou invalida");
endif; 

$solitacaoResgate = listarSolicitacaoRestageEmpresa($cnpjempresa);

if (isset($_POST['idResgate'])):
    
    $baixa1 = baixaSolicitacaoResgate($_POST['idResgate']);

    if ($baixa1):
        $baixa2 = descontarSaldo_ResgateBeneficio($_POST['qtdpontos'], $_POST['cpfcliente'], $cnpjempresa);
        $nomeCliente = $_POST['nomeCliente'];
    endif;
    
    $solitacaoResgate = listarSolicitacaoRestageEmpresa($cnpjempresa);
    
endif;
           
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3"> 
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">       
        
        <h2 class="h2">
            Resgate de Pontos e Beneficios <small></small>
        </h2>
        
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= get_bloginfo('url') ?>/painel-empresa/beneficios-por-pontos/" class="btn btn-sm btn-outline-secondary btn-nav-forload">              
                Voltar
            </a>
        </div>
        
    </div>
    
    <br/> 
    
    <?php   
    
        /*
        echo "<pre>";
        var_dump($solitacaoResgate); 
        echo "</pre>";
        echo "<pre>";
        var_dump($baixa1); 
        echo "</pre>";

        echo "<pre>";
        var_dump($baixa2); 
        echo "</pre>";  
        */  
    ?>
    
    
    <div class="row mt-3">   
        <div class="col-lg-12">
            
            <?php if ($baixa2): ?>
                       
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Brinde entregue </strong> para o cliente.: <?= isset($nomeCliente) ? "$nomeCliente" : "" ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            
            <?php endif; ?>
            
        </div>
    </div>
    
    
    <div class="row mt-5">   
        <div class="col-lg-12">
            <table id="example" class="table table-hover" >
                
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>CPF</th>
                        <th>Brinde</th>
                        <th></th>
                    </tr>
                </thead>               
                <tbody>
                    
                    <?php if(!$solitacaoResgate): ?>
                    <tr>
                        <td>Nenhum resgate solicitado</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                    
                    <?php else: ?>
                    
                    <?php foreach ($solitacaoResgate as $key => $value):?> 
                    <tr>
                        <td><?= $value->nome_completo ?></td>
                        <td><?= $value->cpfcliente ?></td>
                        <td><?= $value->descricao ?></td>
                        <td>                           
                            <a href="#" class="modalResgateBeneficio"  data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value->idresgate ?>" data-cpf="" >
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a>                            
                        </td>
                    </tr>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $value->idresgate ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Baixa Resgate de brindes</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body detalhesbeneficio">                                  
                                    <div class="row">                                       
                                        
                                        <form method="post" action="" id="formBaixaResgateBrinde" ></form> 
                                        
                                        <input type="hidden" name="idResgate"  form="formBaixaResgateBrinde" value="<?= $value->idresgate ?>">
                                        <input type="hidden" name="cpfcliente" form="formBaixaResgateBrinde" value="<?= $value->cpfcliente ?>">
                                        <input type="hidden" name="qtdpontos"  form="formBaixaResgateBrinde" value="<?= $value->qtdpontos ?>">
                                        <input type="hidden" name="nomeCliente"  form="formBaixaResgateBrinde" value="<?= $value->nome_completo ?>">
                                        
                                        
                                        <div class="col-lg-12">
                                            <p>Cliente.:</p>
                                            <h3 style="margin-top: -12px"><?= $value->nome_completo ?></h3>
                                        </div>

                                        <div class="col-lg-6">
                                            <img src="<?= $value->src_selfie ?>" class="img-thumbnail" width="200px">
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Data da solicitação.: <?= date("d/m/Y ",strtotime($value->dtsolicitacao)) ?></li>
                                                <li class="list-group-item">Item.: <?= $value->descricao ?> </li>
                                            </ul>
                                            <div class="d-grid gap-2">
                                                  <button form="formBaixaResgateBrinde" class="btn btn-primary" type="submit">Concluir resgate</button>
                                            </div>
                                        </div>                                                                             
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <?php endforeach;  ?> 
                    
                    <?php endif; ?>
                    
                    
                </tbody>              
            </table>
        </div> 
    </div>      
</main>

<?php get_footer('painel'); ?>

<script src="<?php bloginfo('template_url') ?>/ajax/painelempresa-resgateBeneficios.js"> </script>
