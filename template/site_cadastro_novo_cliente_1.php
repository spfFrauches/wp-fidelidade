<?php 
/* Template Name: Site Cadastro Novo Cliente */ 
$_SESSION['url_referencia'] = '';
get_header('sitetmpl4'); 
$caminhoImgDefault = get_bloginfo('template_url')."/img/default-user-1.png";  
?>
<br/><br/>
<aside class="bg-gradient-primary-to-secondary primary-to-secondary  pt-5 pb-5">
    <div class="container">
        <div class="row mt-4">
            <div class="col-xl-8">
                <div class="h1 text-white">
                    Webi Club Fidelidade
                </div>
                <p class="lead text-white">
                    Tenha seu webi fidelidade. Cadastro de clientes
                </p>
                <!--
                <img src="<?php bloginfo('template_url') ?>/dist/4/assets/img/tnw-logo.svg" alt="..." style="height: 3rem" />
                -->
                <br/>
            </div>
            <div class="col-xl-4 text-end">            
                <a class="btn btn-outline-light py-4 px-5 mb-4 rounded-pill" href="<?= get_bloginfo('url') ?>/novo-cliente/" target="_blank">Já sou cadastrado</a>
            </div>
        </div>
    </div>
</aside>

<div class="container px-5 mt-5">  
    <div class="row gx-5">
        <div class="col-lg-6 order-lg-0 mb-5 mb-lg-0">
            <div class="container-fluid px-5">
                <div class="row gx-5">
                    <div class="col-md-6 mb-5">
                        <!-- Feature item-->
                        <div class="text-center">
                            <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                            <h3 class="font-alt">Cadastre-se</h3>
                            <p class="text-muted mb-0">É rapido e fácil</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <!-- Feature item-->
                        <div class="text-center">
                            <i class="bi-camera icon-feature text-gradient d-block mb-3"></i>
                            <h3 class="font-alt">Peça para te marcar</h3>
                            <p class="text-muted mb-0">
                                Sobre os pontos trocados por brindes
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <!-- Feature item-->
                        <div class="text-center">
                            <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                            <h3 class="font-alt">Some pontos!</h3>
                            <p class="text-muted mb-0">Entre no app e acompanhe seu cashback</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Feature item-->
                        <div class="text-center">
                            <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                            <h3 class="font-alt">Troque por brindes</h3>
                            <p class="text-muted mb-0">Sobre resgatar brindes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 order-lg-1">
            <!-- Features section device mockup-->
            <div class="features-device-mockup">                
                <div  class="mb-5" >
                    <form method="post" action="<?= get_bloginfo('url') ?>/finalizar-cadastro-cliente" class="needs-validation" novalidate enctype="multipart/form-data"> 
                        <div class="row card" id="form_cadastroCliente">
                            <div class="col-lg-12 order-lg-1">        
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">          
                                        <img id="previewImg" class="img-thumbnail" width="150" src="<?= $caminhoImgDefault  ?>" alt="Selfie">                                   
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4 text-center">
                                        <label for="formFileSm" class="form-label" style="font-size: 17px">Seu selfie</label>
                                        <br/>
                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="selfcliente"  onchange="previewFile(this);"  accept="image/*" >
                                    </div>
                                    <div class="col-lg-4"></div>
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
                
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="termos_contrato" required="" name="termos_contrato" value="SIM">
                            <label class="form-check-label">Eu aceito e concordo com o termos e condições do uso. <a href="#">Clique aqui</a> para ler</label>               
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary btn-lg btn-block" id="btnContinuarCadastroCliente">
                                Continuar 
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>   
                        </div>
                    </div>
                </div>
                
            </div> 
        </div>     
   
    </form>
</div>

<!-- Modal Para Efeito de Load Apenas -->
<div class="modal fade" id="modalLoad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
        <div class="modal-content" style="background: rgba(0, 0, 0, 0.0); border: none" >
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div> 
                <div class="col-lg-12 text-center">
                    <p class="text-light" style="font-size: 18px">Carregando, por favor aguarde</p>
                </div>
            </div>
        </div>
    </div>
</div>
                
                

            </div>
        </div>
    </div>
</div>



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

<?php get_footer('sitetmpl4'); ?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_clientes.js?v=1.0"></script>






