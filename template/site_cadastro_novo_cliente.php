<?php 
    /* Template Name: Site Cadastro Novo Cliente */ 
    get_header('site'); 
    $caminhoImgDefault = get_bloginfo('template_url')."/img/default-user-1.png";  
?>

<div  class="mb-5" >

<form method="post" action="<?= get_bloginfo('url') ?>/finalizar-cadastro-cliente" class="needs-validation" novalidate enctype="multipart/form-data"> 
    
    <div class="container"> 
        
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="<?= get_bloginfo('template_url') ?>/img/img_exemple.png" alt="" width="72" height="72">
            <h2>Webi Club Fidelidade</h2>
            <p class="lead">
                Seja bem vindo, faça seu cadastro e tenha seu webi fidelidade.
                Suas compras valem pontos pontos para trocar por beneficios !
            </p>
        </div>
   
        <div class="row card p-3" id="form_cadastroCliente">
            <div class="col-lg-12 order-lg-1"> 
                
                <div class="row mt-3">
                    <div class="col-lg-12 text-center">          
                        <img id="previewImg" class="img-thumbnail" width="150" src="<?= $caminhoImgDefault  ?>" alt="Selfie">
                        <script>
                            function previewFile(input){
                                var file = $("input[type=file]").get(0).files[0];
                                if(file){
                                    var reader = new FileReader();
                                    reader.onload = function(){
                                        $("#previewImg").attr("src", reader.result);
                                    }
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>             
                    </div>
                    <div class="col-lg-12 text-center">
                        <label class="form-label" style="font-size: 17px">Seu selfie</label>
                        <br/>
                        <input type="file" name="selfcliente"  onchange="previewFile(this);"  accept="image/*" >
                    </div>
                </div> 
                
                <div class="row mt-5">
                    <div class="col-lg-6 mb-2">
                        <label id="cpf_label">CPF</label>
                        <input type="text" class="form-control cpf" id="cpf" name="cpf_cliente" onblur="analisarCpf()" >
                        <div id="cpfHelp" class="form-text"></div>
                    </div>
                    <div class="col-lg-6 mb-2">
                       <label id="nome_label">Nome completo</label>
                        <input type="text" class="form-control" id="nomeCompleto" name="nome_completo" onblur="analisarNomeCompleto()"  >
                        <div id="nomeCompletoHelp" class="form-text"></div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <label id="email_label">E-mail *</label>
                        <input type="email" class="form-control" id="email" name="email" >
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label id="nascimento_label">Nascimento *</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"  onblur="analisarDataNascimento()" >
                        <div id="nascimentoHelp" class="form-text"></div>
                    </div>
                </div>
                
                <div class="row">               
                    <div class="col-lg-6 mb-2">
                        <label id="telefone_label">Telefone *<span class="text-muted"></span></label>
                        <input type="text" class="form-control telefoneform" id="telefone" name="telefone" onblur="analisarTelefone()" >
                        <div id="telefoneHelp" class="form-text"></div>
                    </div>
                    
                    <div class="col-lg-6 mb-2">
                        <label id="sexo_label">Sexo <span class="text-muted"></span></label>
                        <select class="form-control" id="sexo" name="sexo" onblur="analisarSexo()">
                            <option value=''></option>
                            <option value='M'>Masculino</option>
                            <option value="F">Femenino</option>                           
                        </select>
                        <div id="sexoHelp" class="form-text"></div>
                    </div>                    
                </div>
               
                <div class="row"> 
                    <div class="col-lg-6 mb-2">
                        <label id="senhaCliente">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha_cliente">
                        <div id="senhaHelp" class="form-text"></div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label id="senhaClienteConfirmar">Confirmar Senha </label>
                        <input type="password" class="form-control" name="password_confirma" id="senha_cliente_confirma" >
                        <div id="senhaConfirmaHelp" class="form-text"></div>
                    </div>
                </div>
                
                <br/>
                
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="termos_contrato" required="" name="termos_contrato" value="SIM">
                    <label class="form-check-label">Eu aceito e concordo com o termos e condições do uso. <a href="#">Clique aqui</a> para ler</label>               
                </div>
                
                <br/><br/>
                
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary btn-lg btn-block" id="btnContinuarCadastroCliente">Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i></button>   
                </div>
                
            </div> 
        </div>     
    </div>
</form>
</div>

<?php get_footer('site'); ?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_clientes.js?v=1.0"></script>






