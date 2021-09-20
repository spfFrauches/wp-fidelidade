<?php 
    /* Template Name: Painel Empresa - Meus Clientes */ 
    get_header('painel');
    include( get_template_directory() . '/inc/model_clientes.php' );
    include( get_template_directory() . '/inc/model_marcacao.php' );
    //$listarCliente = listarClientesLigados($_SESSION['dados_empresa'][0]->cnpj); 
    $listarCliente = listarDadosCompletosClientesLigados($_SESSION['dados_empresa'][0]->cnpj);
    $configEmpresa = listarConfiguracaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);
    
   
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meus clientes <small></small></h1>
    </div>  
    <br/>
    
    <?php //var_dump($configEmpresa[0]); ?>
    
    <form>
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Todos os clientes</option>
                    <option value="1">Os mais frequêntes</option>
                    <option value="2">Últimas marcações</option>
                    <option value="3">Tiket Médio</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </div>
    </form>
    <br/>

    <?php if ($listarCliente) :  ?> 
    
    <table class="table">   
        <thead>
            <tr>
                <td>Nome</td>
                <td>CPF</td>
                <td>ÚLT. MARCAÇÃO</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listarCliente as $key => $value) : ?>
            
                <?php 
                    $marcacoes = listarMarcacaoCliente($value->CPF,  $_SESSION['dados_empresa'][0]->cnpj); 
                    $qtdMarcacoes = count($marcacoes);
                    $qtdFreq = $configEmpresa[0]->qtd_frequencia;
                    $tipoMarc = $configEmpresa[0]->tipo_marcacao == 'qtd';                   
                ?>
                         
                <tr class="<?= ($qtdMarcacoes >= $qtdFreq && $tipoMarc=='qtd' ) ? "table-success" : "" ?>">                    
                    <td><?= $value->NOME ?></td>
                    <td><?= $value->CPF ?></td>
                    <td> 
                        <?= date("d/m/Y H:i", strtotime($value->ULTMARC)) ; ?> 
                        <?= ($qtdMarcacoes >= $qtdFreq && $tipoMarc=='qtd' ) ? ' &nbsp; <a href="#" > <i class="fa fa-star-o" aria-hidden="true"></i></a>': '' ?>                        
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#exampleModal<?= $value->id ?>">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                
                <div class="modal fade" id="exampleModal<?= $value->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <?php                                 
                                    $marcacoes = listarMarcacaoCliente($value->CPF, $_SESSION['dados_empresa'][0]->cnpj);                                   
                                    $totalValor = 0;
                                    
                                    foreach ($marcacoes as $key => $value) {
                                        $totalValor = doubleval($value->valormarcacao) + $totalValor;
                                    }
                                    
                                    if ( ($configEmpresa[0]->tipo_marcacao) == 'cash' ) : 
                                        $pesoPt = intval($configEmpresa[0]->ind_vlr) ;
                                        $indPt = intval($configEmpresa[0]->ind_pontos);
                                        $calcularPontos = ($totalValor/$pesoPt) * $indPt ;
                                    endif;
                                                                                                                                                                                 
                                    $qtdMarcacoes = count($marcacoes);                                                                    
                                ?>
                                
                                <div class="col-lg-12 order-lg-12 mb-4">
                                    
                                    <h5 class="d-flex justify-content-between align-items-center mb-3">                                       
                                        <p class="text-muted">Total de Marcações</p>
                                        <span class="badge badge-secondary badge-pill"><?= $qtdMarcacoes ?></span>
                                    </h5>
                                    <p class="text-muted p-1"  style="margin-top: -35px">
                                        Detalhes das marcações. <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >Clique aqui</a>
                                    </p>
                                    
                                    
                                    <div class="accordion" id="accordionExample">    
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul class="list-group mb-3">
                                                    <?php foreach ($marcacoes as $key1 => $value1): ?>
                                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                        <div>
                                                          <h6 class="my-0"><?= date("d/m/Y H:i", strtotime($value1->datamarcacao)) ; ?></h6>
                                                          <small class="text-muted">Outra obvervação(se precisar)</small>
                                                        </div>
                                                        <span class="text-muted">R$ <?= $value1->valormarcacao ?> </span>
                                                    </li>  
                                                    <?php endforeach; ?>
                                                </ul> 
                                            </div>
                                        </div>                                    
                                    </div>
                                    
                                    <hr/>
                                    
                                    <h5 class="d-flex justify-content-between align-items-center mb-3">                                       
                                        <p class="text-muted">Valor Total</p>
                                        <span class="badge badge-secondary badge-pill"> R$.: <?= $totalValor ?></span>
                                    </h5>
                                    
                                    <hr/>
                                    
                                    <?php if ( ($configEmpresa[0]->tipo_marcacao) == 'cash' ) : ?>
                                    
                                    <h5 class="d-flex justify-content-between align-items-center mb-3">                                       
                                        <p class="text-muted" >Pontos Acumulados</p>
                                        <span class="badge badge-secondary badge-pill">
                                            PT.: <?= number_format($calcularPontos, 1); ?>
                                        </span>
                                    </h5>
                                    
                                    <?php endif; ?>
                                    
                                    
                              
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                   
            <?php endforeach; ?>          
        </tbody>
    </table>
            
    <?php else:  ?>
    <p>Nenhum cliente cadastrado/ligado a essa empresa</p>
    <?php endif; ?> 
   
</main>

<?php get_footer('painel'); ?>
