<?php 

    /* Template Name: Painel Empresas Configuração */ 
    get_header('painel');
    require './wp-content/themes/fidelidade/inc/model_marcacao.php';    
    setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
    date_default_timezone_set('America/Bahia');  
    
    require ( get_template_directory() . '/inc/model_empresa_config.php' );    
    $config = verConfigMarcacaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);
        
?>

<br/><br/>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">  
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Configurações do Fidelidade </h1>   
    </div>
    <div class="row"> 
    
        <?php 
            
            if ($config){  
                
                $tipoMarcacao = $config[0]->tipo_marcacao; 
                
                if ($config[0]->tipo_marcacao == 'qtd' ) {
                    $qtd_frequencia = $config[0]->qtd_frequencia;
                }
                
                if ($config[0]->tipo_marcacao == 'cash' ) {
                    $valor = $config[0]->ind_vlr;
                    $pontos = $config[0]->ind_pontos;
                }
                
            } else {
                $tipoMarcacao = 'nada';
            }

        ?> 
    
    </div>
    
    <div class="row"> 
        <div class="col-lg-6">
            <div class="form-group">            
                <label >Tipo de Marcação</label>
                <div class="form-group">
                    <select class="form-control" id="tipoMarcacao" name="tipoMarcacao">
                        <option value="none">Selecione</option>
                        <option value="cash" <?= ($tipoMarcacao=='cash') ?  "selected" : "" ?> >Por cashback</option>
                        <option value="qtd"  <?= ($tipoMarcacao=='qtd') ?  "selected" : "" ?>>Frequência</option>
                    </select>
                </div>
            </div>             
        </div> 
        <div class="col-lg-6 confMarcacao">      
            <div class="alert alert-secondary" role="alert">
                <h4 class="alert-heading">Cashback</h4>
                <p>
                    Neste tipo de marcação, seu cliente acumula pontos para trocar por brindes e/ou promoções.
                    <br/>
                    Configure o peso dos pontos com relação ao valor das compras.
                </p>
                <hr>
                <p class="mb-0">
                    Exemplo:
                    A cada R$ 20 reais, ganhe 1 pronto. Acumule 10 ponto e ganhe o brinde.
                </p>
            </div>
        </div>
    </div> 
    <br/><br/> 
    <div class="row confMarcacao">
        <div class="col-lg-3">          
            <label class="my-1 mr-2">A Cada</label>
            <select class="custom-select my-1 mr-sm-2" name="ind_valor" id="ind_valor">
                <option value="0" selected>R$</option>
                <option value="10" <?= ($valor=='10') ?  "selected" : "" ?>>10 reais</option>
                <option value="20" <?= ($valor=='20') ?  "selected" : "" ?>>20 reais</option>
                <option value="30" <?= ($valor=='30') ?  "selected" : "" ?>>30 reais</option>
                <option value="50" <?= ($valor=='50') ?  "selected" : "" ?>>50 reais</option>
            </select>
        </div>
        <div class="col-lg-3">      
            <label class="my-1 mr-2" >Acumular</label>
            <select class="custom-select my-1 mr-sm-2" name="ind_pontos" id="ind_pontos">
                <option value="0" selected></option>
                <option value="1" <?= ($pontos=='1') ?  "selected" : "" ?>>1 ponto</option>
                <option value="2" <?= ($pontos=='2') ?  "selected" : "" ?>>2 pontos</option>
                <option value="3" <?= ($pontos=='3') ?  "selected" : "" ?>>3 pontos</option>
                <option value="5" <?= ($pontos=='5') ?  "selected" : "" ?>>5 pontos</option>
            </select>                     
        </div>       
    </div>
    
    <br/><br/> 
    
    <div class="row" id="confMarcacao"> 
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">      
                    <div class="alert alert-secondary" role="alert">
                        <h4 class="alert-heading">Cashback</h4>
                        <p>
                            Neste tipo de marcação, seu cliente acumula pontos para trocar por brindes e/ou promoções.
                            <br/>
                            Configure o peso dos pontos com relação ao valor das compras.
                        </p>
                        <hr>
                        <p class="mb-0">
                            Exemplo:
                            A cada R$ 20 reais, ganhe 1 pronto. Acumule 10 ponto e ganhe o brinde.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">          
                    <label class="my-1 mr-2">A Cada</label>
                    <select class="custom-select my-1 mr-sm-2" name="ind_valor" id="ind_valor">
                        <option value="0" selected>R$</option>
                        <option value="10" <?= ($valor=='10') ?  "selected" : "" ?>>10 reais</option>
                        <option value="20" <?= ($valor=='20') ?  "selected" : "" ?>>20 reais</option>
                        <option value="30" <?= ($valor=='30') ?  "selected" : "" ?>>30 reais</option>
                        <option value="50" <?= ($valor=='50') ?  "selected" : "" ?>>50 reais</option>
                    </select>
                </div>
                <div class="col-lg-3">      
                    <label class="my-1 mr-2" >Acumular</label>
                    <select class="custom-select my-1 mr-sm-2" name="ind_pontos" id="ind_pontos">
                        <option value="0" selected></option>
                        <option value="1" <?= ($pontos=='1') ?  "selected" : "" ?>>1 ponto</option>
                        <option value="2" <?= ($pontos=='2') ?  "selected" : "" ?>>2 pontos</option>
                        <option value="3" <?= ($pontos=='3') ?  "selected" : "" ?>>3 pontos</option>
                        <option value="5" <?= ($pontos=='5') ?  "selected" : "" ?>>5 pontos</option>
                    </select>                     
                </div>
            </div>
        </div>
        <div class="col-lg-12">  
            <br/><br/>
            <button  class="btn btn-primary my-1 btnSalvarAction">Salvar</button>  
        </div>
    </div> 
    
    <div class="row" id="confMarcacao2">  
        
        <div class="col-lg-12">  
            <div class="row">
                <div class="col-lg-6">  
                    <div class="alert alert-secondary" role="alert">
                        <h4 class="alert-heading">Frequência</h4>
                        <p>
                            Neste tipo de marcação, vale a quantidade de vezes marcado. 
                            <br/>
                            Ou seja cada vez que o cliente consumir ou adiquirir certo produto/serviço
                            será efetuada uma marcação. 
                        </p>
                        <hr>
                        <p class="mb-0">
                            Exemplo .:
                            A cada 10 pizza familia, ganhe 1 média.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">  
            <div class="row">
                <div class="col-lg-6">  
                    <hr/>           
                    <label class="my-1 mr-2" >Qtdade de marcação/frequência</label>
                    <select class="custom-select my-1 mr-sm-2" name="qtd_frequencia" id="qtd_frequencia">
                        <option selected></option>
                        <option value="10" <?= ($qtd_frequencia=='10') ?  "selected" : "" ?>>10 marcações</option>
                        <option value="20" <?= ($qtd_frequencia=='20') ?  "selected" : "" ?>>20 marcações</option>
                        <option value="30" <?= ($qtd_frequencia=='30') ?  "selected" : "" ?>>30 marcações</option>
                        <option value="50" <?= ($qtd_frequencia=='50') ?  "selected" : "" ?>>50 marcações</option>
                    </select> 
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">  
            <br/><br/>
            <button class="btn btn-primary my-1 btnSalvarAction">Salvar</button>            
        </div> 
    </div>
    <br/><br/>
    
</main>
<?php 
    get_footer('painel');   
?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_empresa_config.js"></script>


