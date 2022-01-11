<?php 
/* Template Name: Site Cadastro Nova Empresa */ 
$_SESSION['url_referencia'] = '';
get_header('site');
?>

<div class="container">
    
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?= get_bloginfo('template_url') ?>/img/img_exemple.png" alt="" width="72" height="72">
        <h2>Cadastro de Empresa</h2>
        <p class="lead">
            Preencha os dados abaixo e crie agora mesmo sua plataforma <?= NOME_APLICACAO ?>. 
            Fidelize seus cliente é rápido, fácil, simples e seguro!
        </p>
    </div>

    <div class="row card p-3">
        <div class="col-lg-12 order-lg-1">           
            <form  action="<?= get_bloginfo('url') ?>/finalizar-cadastro-empresa" method="post">                
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Dados Gerais</h4>
                    </div>
                </div>                
                <br/>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label id="label_cnpj">CNPJ *</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" onblur="verificaSeExisteCNPJ()">
                        <div id="cnpjHelp" class="form-text"></div>
                         
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_razao_social">Razão Social *</label>
                        <input type="text" class="form-control" id="razao_social" name="razao_social" onblur="analisaRazaoSocial()">
                        <div id="razao_socialHelp" class="form-text"></div>
                    </div>
                </div>                    
                <div class="row">                    
                    <div class="col-lg-6 mb-3">
                        <label id="label_nome_fantasia">Nome Fantasia *</label>
                        <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" onblur="analisaFantasia()">
                        <div id="nome_fantasiaHelp" class="form-text"></div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">E-mail *</label>
                        <input type="email" class="form-control"  name="email" id="email" onblur="verificaSeExisteEmail()" >
                        <div id="emailHelp" class="form-text"></div>
                    </div>                   
                </div>                              
                <div class="row">                    
                    <div class="col-lg-6 mb-3">
                        <label id="label_telefone">Telefone *</label>
                        <input type="text" class="form-control telefoneform" id="telefone" name="telefone" onblur="analisaTelefone()" >
                        <div id="telefoneHelp" class="form-text"></div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">WhatsApp / Telegram</label>
                        <input type="text" class="form-control telefoneform"  name="whatsapp">
                    </div>                   
                </div>
                
                <div class="row">                    
                    <div class="col-lg-6 mb-3">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" >
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_email">Instagram</label>
                        <input type="text" class="form-control"  name="instagram" >
                    </div>                   
                </div>
                <div class="row"> 
                    <div class="col-lg-6 mb-3">
                        <label id="label_senha">Senha *</label>
                        <input type="password" class="form-control" name="passwd" id="password">
                        <div id="passwordHelp" class="form-text"></div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_senha_confirma">Confirmar Senha *</label>
                        <input type="password" class="form-control" name="password_confirma" onblur="confirmarSenha()" id="password_confirma" >
                        <div id="passwordConfirmarHelp" class="form-text"></div>
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
                        <label id="label_cep">CEP *</label>
                        <input type="text" class="form-control cepform" name="cep" id="cep" onblur="analisaCep()" >
                        <div id="cepHelp" class="form-text"></div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label id="label_cidade">Cidade *</label>
                        <input type="text" class="form-control"  name="cidade" id="cidade" onblur="analisaCidade()" >
                        <div id="cidadeHelp" class="form-text"></div>
                    </div>                     
                    <div class="col-lg-6 mb-3">                       
                        <div class="form-group">
                            <label id="label_uf">UF</label>
                            <select class="form-control" id="uf" name="uf" onblur="analisaUF()" >
                                <option value=""></option>
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
                            <div id="ufHelp" class="form-text"></div>
                        </div>                        
                    </div>                    
                    <div class="col-lg-6 mb-3">
                        <label id="label_endereco">Endereço</label>
                        <input type="text" class="form-control"  name="endereco" id="endereco" onblur="analisaEndereco()"  >
                        <div id="enderecoHelp" class="form-text"></div>
                    </div> 
                    <div class="col-lg-6 mb-3">
                        <label id="label_bairro">Bairro</label>
                        <input type="text" class="form-control"  name="bairro" id="bairro" onblur="analisaBairro()" >
                        <div id="bairroHelp" class="form-text"></div>
                    </div>                     
                    <div class="col-lg-6 mb-3">
                        <label>Número</label>
                        <input type="text" class="form-control"  name="numero" id="numero">
                        <div id="numeroHelp" class="form-text"></div>
                    </div>                     
                    <div class="col-lg-6 mb-3">
                        <label >Complemento</label>
                        <input type="text" class="form-control"  name="complemento" id="complemento">
                        <div id="complementoHelp" class="form-text"></div>
                    </div> 
                    <input type="hidden" name="data_cadastro" value="<?= date("Y-m-d") ?>" />
                    <input type="hidden" name="flsituacao" value="0" />
                </div>                                
                <br/>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary btn-lg btn-block btnContinuarCadastroEmpresa" data-bs-target="#exampleModal" id="btnContinuar" type="submit">Continue <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                </div>
            </form>
        </div> 
    </div>
</div>

<br/><br/>


<?php get_footer('site'); ?>

<script src="<?php bloginfo('template_url') ?>/ajax/buscacep.js"></script>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_empresas.js"></script>









