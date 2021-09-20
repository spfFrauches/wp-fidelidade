<?php 
    /* Template Name: Site Cadastro Novo Cliente */ 
    get_header('site'); 
?>
<form method="post" action="<?= get_bloginfo('url') ?>/finalizar-cadastro-cliente" class="needs-validation" novalidate> 
    
    <div class="container ">       
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="<?= get_bloginfo('template_url') ?>/img/img_exemple.png" alt="" width="72" height="72">
            <h2>Cliente Fidelidade</h2>
            <p class="lead">
                Seja bem vindo, faça seu cadastro e tenha seu cartão fidelidade web para que
                que compras sejam marcadas. Ganhe premios com o fidelidade web.
            </p>
        </div>
   
        <div class="row card p-3" id="form_cadastroCliente">
            <div class="col-md-12 order-md-1"> 
                <h4 class="mb-3">Formulário de cadastro</h4>        
                <div class="row">
                    <div class="col-md-6 mb-6">
                        <label id="cpf_label">CPF</label>
                        <input type="text" class="form-control cpf" id="cpf" name="cpf_cliente" required >
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                       <label >Nome completo</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                </div>
                <br/>   
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label id="email_label">E-mail </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                </div>
                <br/>   
                <div class="row"> 
                    <div class="col-md-6 mb-6">
                        <label id="telefoneLabel">Telefone <span class="text-muted"></span></label>
                        <input type="text" class="form-control telefoneform" id="telefone" name="telefone" required>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                    
                     <div class="col-md-6 mb-6">
                        <label>Sexo <span class="text-muted"></span></label>
                        <select class="form-control">
                            <option>Masculino</option>
                            <option>Femenino</option>
                            <option>Nenhum dos dois</option>
                        </select>
                        <div class="invalid-feedback">
                            Este campo é obrigatório.
                        </div>
                    </div>
                </div>
                <br/>   
                <div class="row"> 
                    <div class="col-md-6 mb-3">
                        <label id="senhaCliente">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha_cliente" required >
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label id="senhaClienteConfirmar">Confirmar Senha </label>
                        <input type="password" class="form-control" name="password_confirma" id="senha_cliente_confirma" required >
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-group form-check">
                    <p>
                        <a href="#">Clique aqui</a> e Leia os termos de uso 
                    </p>
                    <input type="checkbox" class="form-check-input" id="termos_contrato" required="" name="termos_contrato" value="SIM">
                    <label class="form-check-label">Eu aceito e concordo com o termos e condições do uso.</label>
                
                </div>
                <button class="btn btn-primary btn-lg btn-block" id="btnContinuarCadastroCliente">Continuar <i class="fa fa-chevron-right" aria-hidden="true"></i></button>   
            </div> 
        </div>     
    </div>
</form>
<br/><br/><br/>
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

<?php get_footer('site'); ?>
<script src="<?php bloginfo('template_url') ?>/ajax/ajax_clientes.js"></script>






