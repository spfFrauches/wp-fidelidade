<?php 

    /* Template Name: Painel Cliente Meus Dados */ 
    get_header('painel');
    
    
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meus Dados</h1>
        
    </div>
     
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
            <!-- <img class="mr-3" src="" alt="" width="48" height="48"> -->
            <div class="lh-100"> 
              <h6 class="mb-0 text-white lh-100">Se necessário altere seus dados.</h6>
              <small>Após alterar clique em Salvar</small>
            </div>
        </div>
    
    <?php // var_dump($_SESSION['dados_cliente'][0]); ?>
    
    <form method="post" id="formclientes">
        
        
        <div class="form-row">
            
            <label>Foto</label>
            <input type="file" class="form-control-file" name="foto" id="foto">
            
        </div>
        
        <br/><br/>
        
        <div class="form-row">
            <div class="col-md-6 mb-6">
                <label>CPF</label>
                <input type="text" class="form-control cpf" id="cpf" name="cpf_cliente"  value="<?= $_SESSION['dados_cliente'][0]->cpf ?>" required readonly="" >
                <div class="invalid-feedback">
                    O CPF é obrigatório. Preencha este campo.
                </div>
            </div>
            <div class="col-md-6 mb-6">
                <label >Nome completo</label>
                <input type="text" class="form-control" name="nome_completo"  value="<?= $_SESSION['dados_cliente'][0]->nome_completo ?>" required readonly="">
                <div class="invalid-feedback">
                   O nome completo é obrigatório. Preencha este campo.
                </div>          
            </div>
        </div>
        
        <br/>
        
        <div class="form-row">    
            <div class="col-md-6 mb-6">
                <label>E-mail <span class="text-muted"></span></label>
                <input type="email" class="form-control" name="email"  value="<?= $_SESSION['dados_cliente'][0]->email ?>" readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            <div class="col-md-6 mb-6">
                <label>Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento"   value="<?= $_SESSION['dados_cliente'][0]->data_nascimento ?>" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>    
        </div>
        <br/>
         <div class="row"> 
            <div class="col-md-6 mb-6">
                <label>Telefone <span class="text-muted"></span></label>
                <input type="text" class="form-control" name="telefone"  value="<?= $_SESSION['dados_cliente'][0]->fone ?>" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
        </div>
        
        <br/>
        
        <button class="btn btn-primary" id="btnSalvar">Salvar</button>
        
    </form>
  
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

<?php get_footer('painel'); ?>



