<?php 
    /* Template Name: Site Marcação cartão */ 
    get_header('marcacao'); 
    include( get_template_directory() . '/inc/model_empresa_config.php' ); 
    $carregarConfiguracaoEmpresa = verConfigMarcacaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);
    
    $tipoMarcacao = $carregarConfiguracaoEmpresa[0]->tipo_marcacao ;
    $logoEmpresa = $_SESSION['dados_empresa'][0]->logoempsrc;
    
    if ($tipoMarcacao == 'cash') {
        $tipoMarcacao = "Cashback";
    }
     
?>
<style>
    @media (max-width:550px){      
        .topo{
            margin-top: -50px;
        }
    }  
</style>

<br/><br/>  

<div class="container">    
    <div class="py-5 text-center topo"> 
        
        <?php 
        // var_dump($_SESSION['dados_empresa'][0]->logoempsrc);
        ?>
        
        <?php if (!$tipoMarcacao): ?>
            <div class="alert alert-danger" role="alert">
                O tipo de marcação não foi configurado. Vá em Configurações e defina.
            </div>
        <?php endif; ?>
        
        <br/>
        
        <?php if ($logoEmpresa != ''): ?>
            <img class="d-block mx-auto mb-4" src="<?= $logoEmpresa ?>" alt="" width="92" height="92">
        <?php endif; ?>
        <?php if (empty($logoEmpresa)): ?>
            <i class="fa fa-adn fa-5x" aria-hidden="true"></i>    
        <?php endif; ?>
        
        <h2>Web 
            <small> 
                Marcações 
                <span class="badge badge-secondary">
                    <?= $tipoMarcacao; ?>
                </span>
            </small>
        </h2>
        <br/>
        
        <div class="form-group cpf_form_marcacao card p-2">
            <p class="lead" style="margin-top: 25px; margin-bottom: 20px" id="info_form">
            Informe o CPF 
            </p>
            <div class="form-group row text-center">
                <div class="col-lg-3 col-1"></div>
                <div class="col-lg-6 col-10">
                    <input type="text" class="form-control" size="5" id="cpf_marcacao" name="cpf_marcacao" aria-describedby="emailHelp" required="">
                    <small id="cpfHelp" class="form-text text-muted">CPF do cliente (precisa estar cadastrado na plataforma).</small>
                </div>
                <div class="col-lg-3 col-1"></div>
            </div>    
        </div>
        
        <div class="form-group" id="load_form_marcacao">
            <div class="spinner-border text-secondary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
       
        <div class="form-group card p-2" id="confirma_marcacao">
            
            <div class="row text-center">
                <div class="col-lg-12">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>                 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px">
                    <h4 class="text-center"><small id="confirma_marcacaoNome">Nome do Cliente</small></h4>
                    <h4 class="text-center" style="margin-top: -15px"><small id="confirma_marcacaoCPF">000.000.000-00</small></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="form-group text-center">
                        <label>Valor(R$)  </label>
                        <input type="text" class="form-control dinheiro" id="valorMarcacao" placeholder="R$"/>
                        <input type="hidden" name="tipo_marcacao" id="tipoMarcacao" value="<?= $carregarConfiguracaoEmpresa[0]->tipo_marcacao?>"/>
                    </div>       
                </div>
                <div class="col-lg-3"></div>
            </div>        
        </div>
        
        <div class="form-group card p-2" id="confirma_marcacaoConfere">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Confirmação de Marcação</h4>
                    <br/>
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    <br/>
                    <h4 id="confirma_marcacaoNomeConfere"><small>Cliente.:</small> Nome do Cliente</h4>
                    <h4 id="confirma_marcacaoCPFConfere" ><small>CPF.:</small> 000.000.000-00</h4>
                    <h4><small>Valor R$ .: </small><b id="confirma_marcacaoValorConfere">R$ 000,00</b></h4>
                </div>               
            </div>        
        </div>

        <div class="form-group card p-2" id="confirma_marcacaoConfereSucesso">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Marcação feita com sucesso!</h4>
                    <br/>
                    <i class="fa fa-check-circle fa-5x" aria-hidden="true"></i>
                    <br/>
                </div>               
            </div>        
        </div>
        
        <div class="form-group card p-2" id="confirma_marcacaoNaoExiste">
            <div class="row">
                <div class="col-12">
                    <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i>
                    <br/>
                   Desculpe, mas não encotramos registro desse CPF. 
                </div>             
            </div>        
        </div>
        
        <br/><br/>
        
        <div class="row" id="btnsMarcarVoltar">
            <div class="col-6">
                <button type="button" id="btcVoltarMarcacao" class="btn btn-warning btn-lg btn-block">Voltar</button>
                <button type="button" id="btcVoltarMarcacaoConfere" class="btn btn-warning btn-lg btn-block">Voltar e corrigir</button>
                <button type="button" id="btcVoltarVazio" class="btn btn-warning btn-lg btn-block">Voltar</button>
            </div>
            <div class="col-6">
                
                <button type="button" id="btcContinuarMarcacao" class="btn btn-secondary btn-lg btn-block" <?= (!$tipoMarcacao) ? "disabled" : "" ?>>Continuar</button>
                <button type="button" id="btnMarcar" class="btn btn-secondary btn-lg btn-block" <?= (!$tipoMarcacao) ? "disabled" : "" ?>>Marcar</button>
                <button type="button" id="btnMarcarConfere" class="btn btn-secondary btn-lg btn-block">Confirmar Marcação</button>
            </div>
        </div>

        <div class="row" id="btnNovaMarcacao">
            <div class="col-12">
                <button type="button" id="btnNovaMarcacao" class="btn btn-warning btn-lg btn-block">Nova marcação</button>
            </div>
        </div>
                
    </div>

</div>
    
<?php get_footer('marcacao'); ?>








