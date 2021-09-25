<?php 

    /* Template Name: Painel Empresas Configuração */ 
    get_header('painel');
    require './wp-content/themes/fidelidade/inc/model_marcacao.php';    
    setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
    date_default_timezone_set('America/Bahia');  
    
    require ( get_template_directory() . '/inc/model_empresa_config.php' );    
    $config = verConfigMarcacaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);
        
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> 
    
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
                    <h4 class="alert-heading">Nenhuma configuraçao aplicada</h4>
                    <p>
                        Configure a forma de pontuação para seus clientes. Sem isso não será possivel
                        continuar.
                    </p>
                    <hr>
                    <p class="mb-0">
                        Defina a quantidade de obtenção de pontos com base na compra dos produtos
                        ou serviços por parte do seu cliente.
                    </p>
                </div>
            
            
            <?php endif; ?>

            <?php if ($config): ?>
                <div class="alert alert-warning" role="alert">
                   Nesta versão, uma vez configurado não pode mais alterar. Caso precise de alteração 
                   fale com o administrador do sistema.
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mt-4"> 
        <div class="col-lg-6">
            <div class="form-group">            
                <label class="h5" >Forma de adquirir pontos</label>
                <div class="form-group">
                    <select class="form-select" id="tipoMarcacao" name="tipoMarcacao" <?= $config ? "disabled" : ""?>>
                        <option value="cash" <?= ($tipoMarcacao=='cash') ?  "selected" : "" ?> >Base no valor da compra/pgto</option>
                    </select>
                </div>
            </div>             
        </div> 
        <div class="col-lg-6">          
            <label class="my-1 mr-2">Porcentagem (%) de conversão para pontos</label>
            <select class="form-select my-1 mr-sm-2" name="percentual" id="percentual" <?= $config ? "disabled" : ""?>>
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
    
    <div class="row  mt-5">
        <div class="col-lg-6">  
            <div class="d-grid gap-2 col-12 mx-auto">
                <button  class="btn btn-primary my-1  btn-block btnSalvarAction"  <?= $config ? "disabled" : "" ?>  >Salvar</button> 
            </div>
        </div>
    </div>
             
    
    <br/>
</main>
<?php 
    get_footer('painel');   
?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_empresa_config.js"></script>


