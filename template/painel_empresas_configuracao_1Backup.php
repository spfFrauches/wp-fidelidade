<?php 

    /* Template Name: Painel Empresas Configuração */ 
    get_header('painel');
    require './wp-content/themes/fidelidade/inc/model_marcacao.php';    
    setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
    date_default_timezone_set('America/Bahia');  
    
    require ( get_template_directory() . '/inc/model_empresa_config.php' );    
    $config = verConfigMarcacaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);
        
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 
    
    <div class="row">            
        <div class="col-lg-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Configurações do Fidelidade </h1> 
                <br/>
            </div>
        </div>
    </div>

    <?php if (!$config): ?>
        <div class="alert alert-danger" role="alert">
           Nenhuma configuraçao aplicada. Por favor configure para continuar...
           <br/>
           Mas atenção, ao configurar não pode mais alterar (nesta versão)
        </div>
    <?php endif; ?>
    
    <?php if ($config): ?>
        <div class="alert alert-warning" role="alert">
           Nesta versão, uma vez configurado não pode mais alterar. Caso precise alterar 
           fale com o administrador do sistema.
        </div>
    <?php endif; ?>
    
    <br/>
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
        <div class="col-lg-12 confMarcacao">            
            <div class="accordion mb-5" id="accordionExample">    
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Como funciona a marcação por Cashback ?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Neste tipo de marcação, seu cliente acumula 
                                pontos para trocar por brindes e/ou promoções.
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
        </div>
        
        <div class="col-lg-12 confMarcacao2">     
            <div class="accordion mb-5" id="accordionExample">               
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Como funciona a marcação por Frequência?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
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
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="form-group">            
                <label class="h5" >Tipo de Marcação</label>
                <div class="form-group">
                    <select class="form-control" id="tipoMarcacao" name="tipoMarcacao">
                        <option value="none">Selecione</option>
                        <option value="cash" <?= ($tipoMarcacao=='cash') ?  "selected" : "" ?> >Por cashback</option>
                        <option value="qtd"  <?= ($tipoMarcacao=='qtd') ?  "selected" : "" ?>>Frequência</option>
                    </select>
                </div>
            </div>             
        </div>      
    </div> 
    <br/>
    <div class="row confMarcacao">
        <div class="col-lg-6">          
            <label class="my-1 mr-2">A Cada</label>
            <select class="custom-select my-1 mr-sm-2" name="ind_valor" id="ind_valor">
                <option value="0" selected>R$</option>
                <option value="10" <?= ($valor=='10') ?  "selected" : "" ?>>10 reais</option>
                <option value="20" <?= ($valor=='20') ?  "selected" : "" ?>>20 reais</option>
                <option value="30" <?= ($valor=='30') ?  "selected" : "" ?>>30 reais</option>
                <option value="50" <?= ($valor=='50') ?  "selected" : "" ?>>50 reais</option>
            </select>
        </div>
        <div class="col-lg-6">      
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
    
    <div class="row confMarcacao">
        <div class="col-lg-12">  
            <button  class="btn btn-primary my-1 btnSalvarAction"  <?= $config ? "disabled" : "" ?>  >Salvar</button>  
        </div>
    </div>
             
    <div class="row confMarcacao2">
        <div class="col-lg-6">          
            <label class="my-1 mr-2" >Qtdade de marcação/frequência para brinde</label>
            <select class="custom-select my-1 mr-sm-2" name="qtd_frequencia" id="qtd_frequencia">
                <option selected></option>
                <option value="10" <?= ($qtd_frequencia=='10') ?  "selected" : "" ?>>10 marcações</option>
                <option value="20" <?= ($qtd_frequencia=='20') ?  "selected" : "" ?>>20 marcações</option>
                <option value="30" <?= ($qtd_frequencia=='30') ?  "selected" : "" ?>>30 marcações</option>
                <option value="50" <?= ($qtd_frequencia=='50') ?  "selected" : "" ?>>50 marcações</option>
            </select> 
        </div>
    </div>
      
    <div class="row confMarcacao2">    
        <div class="col-lg-12">  
            <button class="btn btn-primary my-1 btnSalvarAction">Salvar</button>            
        </div> 
    </div>
    
    <br/>
</main>
<?php 
    get_footer('painel');   
?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_empresa_config.js"></script>


