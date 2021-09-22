<?php 
    /* Template Name: Painel Empresa - Alterar Senha */ 
    get_header('painel');    
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Minha Empresa <small> Alterar Senha</small></h2>
    </div>
    
    <form class="needs-validation" novalidate action="#" method="post">
        
        <br/>
        <div class="form-row">
            <div class="col-lg-6">
                <label>Senha Atual</label>
                <input type="password" class="form-control" value="<?= $_SESSION['dados_empresa'][0]->passwd ?>" required >
            </div>
        </div>
        <br/>        
        <div class="form-row">    
            <div class="col-md-6 mb-3">
                <label>Nova Senha </label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label>Confirmar nova Senha</label>
                <input type="password" class="form-control" name="password_confirma"  id="password_confirma" required>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>           
        </div>
            
        <div class="form-row mt-5">
            <div class="col-lg-12">
                <button class="btn btn-primary" type="submit" disabled="">Salvar</button>
            </div>
        </div>
                
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
