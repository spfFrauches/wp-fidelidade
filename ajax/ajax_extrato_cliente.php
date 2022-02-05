<?php

    require '../../../../wp-load.php';
    include( get_template_directory() . '/models/model_beneficio.php' ); 
    include( get_template_directory() . '/models/model_marcacao.php' ); 
    
    include( get_template_directory() . '/models/model_solicitacao_resgate.php' );
    
    $beneficioPorEmpresa = listarBeneficiosPorEmpresa($_POST['cnpjemp']);
      
    $empresa = $_POST['cnpjemp'];
    $cliente = $_SESSION['dados_cliente'][0]->cpf;
    $listarMarcacoesExtrato = listarMarcacaoEmpresaCliente2($_SESSION['dados_cliente'][0]->cpf, $_REQUEST["cnpjemp"]); 
    $totalPontos = 0;
    
    if (!$beneficioPorEmpresa):
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "<p>Estas empresa esta sem beneficios cadastrados...</p>";
  
        echo "</div>";
        
    endif;
    
    foreach ($listarMarcacoesExtrato as $key => $value) :
        $totalPontos = $totalPontos + $value->pontos;   
    endforeach;
    
    $solicitacaoRestagateCheck = listarSolicitacaoRestageConfere2($cliente, $empresa)
    
       
    /*
    echo "<pre>";
    var_dump($_SESSION['dados_cliente'][0]->cpf);
    echo "</pre>";
    
    echo "<br/>";
    
    echo "<pre>";
    var_dump($listarMarcacoesExtrato);
    echo "</pre>";
    * 
    */
?>

<div class="row mb-2">
    <div class="col-lg-12">       
        <ol class="list-group">
            <li style="font-size: 18px" class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    Meu Saldo de Pontos
                </div>
              <span class="badge bg-success rounded-pill">R$ <?= $totalPontos ?></span>
            </li>
        </ol>      
    </div>
</div>

<?php
    /*
    echo "<pre>";
    var_dump($solicitacaoRestagateCheck); 
    echo "</pre>";
    */
?>
   

<div id="carouselExampleControls" class="carousel slide carousel-dark" data-bs-ride="carousel">
    <div class="carousel-inner" style="//background-color: #ced4da" >
        
        <?php foreach ($beneficioPorEmpresa as $key => $value): ?>
        
        <?php 
            $solicitacaoResgate = listarSolicitacaoRestageConfere($cliente, $value->id);           
        ?>
        
        <div class="carousel-item <?= $key == 0 ? "active": "" ?>" >  
            
            <?php if (!empty($solicitacaoRestagateCheck)): ?>
            <div class="row">                
                <div class="col-lg-12">           

                    <div class="alert alert-warning" role="alert">
                        Já existe uma solicitação de resgate em andamento. 
                    </div>
                                               
                </div>
            </div>
            <?php endif; ?>
            
            <div class="row">                
                <div class="col-lg-12 p-5">
                    <img class="img-resolut" src="<?= $value->imgsrcbeneficio ?>" style="display: block;margin-left: auto;margin-right: auto;">
                </div>               
                <div class="col-lg-12 p-5 mt-5">
                    <?php if (!empty($solicitacaoResgate)): ?>
                        <span class="badge rounded-pill bg-warning text-dark">Item solicitado para Resgate</span>                   
                    <?php endif; ?>
                    
                    <ol class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><?= $value->descricao ?></div>
                                <?= $value->obsadicional ?>
                            </div>
                          <span class="badge bg-primary rounded-pill"></span>
                        </li>                       
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Valor em Pontos</div>
                                Quantidade de pontos necessários para resgatar o Item
                            </div>
                          <span class="badge bg-primary rounded-pill"><?= $value->qtdpontos ?></span>
                        </li>  
                    </ol>
                </div>
            </div> 
            
            <?php if ($totalPontos < $value->qtdpontos ): ?>
            
                <div class="alert alert-danger" role="alert">
                    Saldo insuficiente
                </div>
            
            <?php endif; ?>
            
            <?php if ($totalPontos >= $value->qtdpontos ): ?>
            
            <form action="" method="POST" id="formSolicitacaoRestate" ></form>
            
            <div class="row">     
                <div class="col-lg-12">
                    <div class="d-grid gap-2">
                        <input type="hidden" form="formSolicitacaoRestate"  name="cnpjemp" value="<?= $empresa ?>" />
                        <input type="hidden" form="formSolicitacaoRestate"  name="cpfcliente" value="<?= $cliente ?>" />
                        <input type="hidden" form="formSolicitacaoRestate"  name="cdbeneficio" value="<?= $value->id ?>" />
                        <input type="hidden" form="formSolicitacaoRestate"  name="dtsolicitacao" value="<?= date("Y-m-d"); ?>" />
                        <input type="hidden" form="formSolicitacaoRestate"  name="status" value="solicitado"/>
                        <input type="hidden" form="formSolicitacaoRestate"  name="solicitacao_resgate" value="true"/>
                        
                        <?php if (empty($solicitacaoRestagateCheck)): ?>
                            <button 
                                type="submit" 
                                form="formSolicitacaoRestate" 
                                class="btn btn-primary" 
                                type="button" <?= !empty($solicitacaoResgate) ? "disabled" : ""  ?>>
                                <?= !empty($solicitacaoResgate) ? "Resgate já solicitado" : "Solicitar Resgate"  ?>
                            </button>
                        <?php endif; ?>
                        
                        <?php if (!empty($solicitacaoRestagateCheck)): ?>
                            <button type="submit" form="formSolicitacaoRestate" class="btn btn-primary" type="button" disabled>
                                Solicitar resgate
                            </button> 
                        <?php endif; ?>
                        
                        
                    </div>
                </div>
            </div>
            
            <?php endif; ?>
            
        </div> 
        <?php    endforeach; ?>       
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="color: #000"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> 

<br/><br/><br/>
                       

