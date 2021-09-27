<?php 
    /* Template Name: Site Cadastro Nova Empresa */ 
    get_header('site');
?>

<div class="container">
    
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?= get_bloginfo('template_url') ?>/img/img_exemple.png" alt="" width="72" height="72">
        <h2>Cadastro de Empresa</h2>
        <p class="lead">
            Preencha os dados abaixo e crie agora mesmo sua plataforma Webi Fidelidade. 
            Fidelize seus cliente é rápido, fácil, simples e seguro!
        </p>
    </div>

    <div class="row card p-3">
        <div class="col-lg-12 order-lg-1">           
            <form class="needs-validation" novalidate action="<?= get_bloginfo('url') ?>/finalizar-cadastro-empresa" method="post">                
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Dados Gerais</h4>
                    </div>
                </div>                
                <br/>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label id="label_cnpj">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" onblur="verificaSeExisteCNPJ()" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label>Razão Social</label>
                        <input type="text" class="form-control" name="razao_social" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                </div>                    
                <div class="row">                    
                    <div class="col-lg-6 mb-3">
                        <label>Nome Fantasia</label>
                        <input type="text" class="form-control" name="nome_fantasia" required>
                        <div class="invalid-feedback">
                             Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">E-mail</label>
                        <input type="email" class="form-control"  name="email" id="email" onblur="verificaSeExisteEmail()" required="">
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>                   
                </div>                              
                <div class="row">                    
                    <div class="col-lg-6 mb-3">
                        <label>Telefone</label>
                        <input type="text" class="form-control telefoneform" name="telefone" required>
                        <div class="invalid-feedback">
                             Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">WhatsApp / Telegram</label>
                        <input type="text" class="form-control telefoneform"  name="whatsapp">
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>                   
                </div>
                
                <div class="row">                    
                    <div class="col-lg-6 mb-3">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" >
                        <div class="invalid-feedback">
                             Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">Instagram</label>
                        <input type="text" class="form-control"  name="instagram" >
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>                   
                </div>
                <div class="row"> 
                    <div class="col-lg-6 mb-3">
                        <label id="label_senha">Senha</label>
                        <input type="password" class="form-control" name="passwd" id="password" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_senha_confirma">Confirmar Senha</label>
                        <input type="password" class="form-control" name="password_confirma" onblur="confirmarSenha()" id="password_confirma" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                </div>                
                <br/>                
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Endereço</h4>
                    </div>
                </div>                
                <br/>                
                <div class="row">                    
                    <div class="col-lg-6 mb-3">
                        <label>CEP</label>
                        <input type="text" class="form-control cepform" name="cep" id="cep" required>
                        <div class="invalid-feedback">
                             Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">Cidade</label>
                        <input type="text" class="form-control"  name="cidade" id="cidade" required="">
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>                     
                    <div class="col-lg-6 mb-3">                       
                        <div class="form-group">
                            <label>UF</label>
                            <select class="form-control" id="uf" name="uf" required>
                                <option></option>
                                <option value="AC">Acre</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>                        
                    </div>                    
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">Endereço</label>
                        <input type="text" class="form-control"  name="endereco" id="endereco"  required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div> 
                    <div class="col-lg-6 mb-3">
                        <label>Bairro</label>
                        <input type="text" class="form-control"  name="bairro" id="bairro"  required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>                     
                    <div class="col-lg-6 mb-3">
                        <label>Número</label>
                        <input type="text" class="form-control"  name="numero" id="numero">
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>                     
                    <div class="col-lg-6 mb-3">
                        <label >Complemento</label>
                        <input type="text" class="form-control"  name="complemento" id="complemento">
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div> 
                    <input type="hidden" name="data_cadastro" value="<?= date("Y-m-d") ?>" />
                    <input type="hidden" name="flsituacao" value="0" />
                </div>                                
                <br/>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary btn-lg btn-block" id="btnContinuar" type="submit">Continue <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                </div>
            </form>
        </div> 
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
    })();
</script>

<br/><br/>

<?php get_footer('site'); ?>
<script src="<?php bloginfo('template_url') ?>/ajax/buscacep.js"></script>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_empresas.js"></script>







