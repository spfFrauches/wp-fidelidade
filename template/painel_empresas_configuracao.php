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

    
    
    <br/>
    <div class="row">     
        <?php            
            if ($config){      
                $tipoMarcacao = $config[0]->tipo_marcacao; 

                if ($config[0]->tipo_marcacao == 'cash' ) {
                    $percentual = $config[0]->percentual_vlrcompra;
                }
            } else {
                $tipoMarcacao = 'nada';
            }
        ?>    
    </div>
    <div class="row">    
        <div class="col-lg-6">
            <?php if (!$config): ?>
                <div class="alert alert-danger" role="alert">
                   Nenhuma configuraçao aplicada. Por favor configure para continuar...
                   <br/>
                   Mas atenção, ao configurar não pode mais alterar (nesta versão)
                </div>
            <?php endif; ?>

            <?php if ($config): ?>
                <div class="alert alert-warning" role="alert">
                   Nesta versão, uma vez configurado não pode mais alterar. Caso precise de alteração 
                   fale com o administrador do sistema.
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-6 confMarcacao">            
            <div class="accordion mb-5" id="accordionExample">    
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Configure seu cashback
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Com base no valor da compra de seu cliente, estabeleça
                                um percentual desse valor que será convertido em pontos.
                                <br/>
                                Esses pontos podem ser trocador por produtos ou brindes
                                para fidelizar seu cliente. Veja com nossa consultoria
                                como isso pode ser vantajoso.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-6">
            <div class="form-group">            
                <label class="h5" >Tipo de Marcação</label>
                <div class="form-group">
                    <select class="form-control" id="tipoMarcacao" name="tipoMarcacao" <?= $config ? "disabled" : ""?>>
                        <option value="none">Selecione</option>
                        <option value="cash" <?= ($tipoMarcacao=='cash') ?  "selected" : "" ?> >Por cashback</option>
                    </select>
                </div>
            </div>             
        </div> 
        <div class="col-lg-6">          
            <label class="my-1 mr-2">Porcentagem (%) em cima do valor da compra.</label>
            <select class="custom-select my-1 mr-sm-2" name="percentual" id="percentual" <?= $config ? "disabled" : ""?>>
                <option value="0" selected>Selecione o % (percentual)</option>
                <option value="1" <?= ($percentual=='1') ?  "selected" : "" ?>>1%</option>
                <option value="2" <?= ($percentual=='2') ?  "selected" : "" ?>>2%</option>
                <option value="3" <?= ($percentual=='3') ?  "selected" : "" ?>>3%</option>
                <option value="4" <?= ($percentual=='4') ?  "selected" : "" ?>>4%</option>
                <option value="5" <?= ($percentual=='5') ?  "selected" : "" ?>>5%</option>
            </select>
            <small id="percentualHelp" class="form-text">Este campo é obrigatório</small>
        </div>  
    </div> 
    <br/>
    
    <div class="row confMarcacao mt-5">
        <div class="col-lg-6">  
            <button  class="btn btn-primary my-1  btn-block btnSalvarAction"  <?= $config ? "disabled" : "" ?>  >Salvar</button>  
        </div>
    </div>
             
    
    <br/>
</main>
<?php 
    get_footer('painel');   
?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_empresa_config.js"></script>


