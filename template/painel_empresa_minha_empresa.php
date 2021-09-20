<?php 
    /* Template Name: Painel Empresa - Minha Empresa */ 
    get_header('painel');    
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Minha Empresa <small> dados cadastrais</small></h2>
    </div>
    
    <form class="needs-validation" novalidate action="" method="post">
        
        <br/>
        <div class="form-row">
            <div class="col-lg-6">
                <label>Cód. Emp</label>
                <input type="text" class="form-control" value="<?= $_SESSION['dados_empresa'][0]->id ?>" readonly="">
            </div>
            <div class="col-lg-6">
                <label >Razão Social</label>
                <input type="text" class="form-control" name="razao_social" value="<?= $_SESSION['dados_empresa'][0]->razao_social ?>" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Nome Fantasia</label>
                <input type="text" class="form-control" name="nome_fantasia" value="<?= $_SESSION['dados_empresa'][0]->nome_fantasia ?>" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>   
            <div class="col-md-6 mb-3">
                <label>CNPJ</label>
                <input type="text" class="form-control" name="cnpj" id="cnpj" value="<?= $_SESSION['dados_empresa'][0]->cnpj ?>"  required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            
        </div>
        <br/>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Telefone</label>
                <input type="text" class="form-control" name="nome_fantasia" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label>Whatsapp</label>
                <input type="text" class="form-control" name="cnpj" id="cnpj" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
        </div>
        <br/>
        <div class="form-row">           
            <div class="col-md-6 mb-3">
                <label>Facebook</label>
                <input type="text" class="form-control" name="nome_fantasia" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
           
            <div class="col-md-6 mb-3">
                <label>Instagram</label>
                <input type="text" class="form-control" name="cnpj" id="cnpj" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>           
        </div>
        
        <div class="form-row">
            
            <div class="col-md-6 mb-3">
                <label>Senha </label>
                <input type="password" class="form-control" name="password" id="password" value="<?= $_SESSION['dados_empresa'][0]->passwd ?>" required>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
           
            <div class="col-md-6 mb-3">
                <label>Confirmar Senha</label>
                <input type="password" class="form-control" name="password_confirma" value="<?= $_SESSION['dados_empresa'][0]->passwd ?>" id="password_confirma" required>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            
        </div>
              
        
        <button class="btn btn-primary" type="submit" disabled="">Salvar</button>
        
    </form>
    <br/>
    
</main>

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
    
</main>
<?php get_footer('painel'); ?>
