<?php

    require '../../../../wp-load.php';
    include( get_template_directory() . '/models/model_beneficio.php' ); 
    include( get_template_directory() . '/models/model_marcacao.php' ); 
    
    $x = listarBeneficiosPorEmpresa($_POST['cnpjemp']);  
    $listarMarcacoesExtrato = listarMarcacaoEmpresaCliente2($_SESSION['dados_cliente'][0]->cpf, $_REQUEST["cnpjemp"]); 
    $totalPontos = 0;
    

    foreach ($listarMarcacoesExtrato as $key => $value) :
        $totalPontos = $totalPontos + $value->pontos;   
    endforeach;
    

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

<div class="row">
    <div class="col-lg-12">
        
        <ul class="list-group list-group-flush">
            <li style="font-size: 18px" class="list-group-item">Meu Saldo de Pontos</li>
            <li style="font-size: 19px" class="list-group-item"><small style="font-size: 11px">Total.: </small><?= $totalPontos ?></li>
        </ul>
        
       
    </div>
</div>
                      
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="background-color: #ced4da" >
        <?php foreach ($x as $key => $value): ?>
        <div class="carousel-item <?= $key == 0 ? "active": "" ?>" >                       
            <div class="row">                
                <div class="col-lg-12 p-5">
                    <img class="img-resolut" src="<?= $value->imgsrcbeneficio ?>" style="display: block;margin-left: auto;margin-right: auto;">
                </div>               
                <div class="col-lg-12 p-5 mt-5">
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
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Meus Pontos</div>
                                
                            </div>
                          <span class="badge bg-success rounded-pill"><?= $totalPontos ?></span>
                        </li> 
                    </ol>
                </div>
            </div>            
        </div> 
        <?php    endforeach; ?>       
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> 

<br/><br/><br/>
                       

