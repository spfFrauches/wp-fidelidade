<?php 

    /* Template Name: Painel Cliente Meus Dados */ 
    get_header('painel');
    include( get_template_directory() . '/inc/model_clientes.php' );
     
    $caminhoImgDefault = get_bloginfo('template_url')."/img/default-user-1.png";   
    
    if(!empty($_FILES['selfcliente'])){
       
        $cpf = $_SESSION['dados_cliente'][0]->cpf;
        $targetDir = "./wp-content/themes/fidelidade/clientes_selfie/";
        $dir = get_bloginfo('template_url')."/clientes_selfie/".basename($_FILES["selfcliente"]["name"]);
        $target_file = $targetDir . basename($_FILES["selfcliente"]["name"]); 
        
        if(move_uploaded_file($_FILES['selfcliente']['tmp_name'], $target_file)){         
            global $wpdb; 
            $wpdb->update('clientes', array('src_selfie'=>$dir ,'path_selfie'=>$target_file), array('cpf'=>$cpf));
            $msgPosUpload = "Dados atualizados com sucesso!";  
        } else {
            $msgPosUpload = "Erro ao processar!";
        }
    } 
    
    $dadosCliente = buscarClientes($_SESSION['dados_cliente'][0]->cpf);
    
    if ($_SESSION['login_painel'] != 'cliente'):
        $url = get_bloginfo('url')."/login";
        header("Location:$url");
        exit("A sessão foi expirada ou é invalida");
    endif; 
    
    
?>

<main class="col-lg-9 ms-sm-auto col-lg-10 px-lg-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
    
    <form method="post" id="formclientes" action=""  enctype="multipart/form-data">
                
       <div class="row mt-3">
            <div class="col-lg-12 text-center">          
                <img id="previewImg" class="img-thumbnail" width="200" src="<?= $dadosCliente[0]->src_selfie == null ?  $caminhoImgDefault : $dadosCliente[0]->src_selfie ?>" alt="Selfie">
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
            <div class="col-lg-12 text-center mt-5">
                <label class="form-label" style="font-size: 17px">Alterar selfie</label>
                <br/>
                <input type="file" name="selfcliente"  onchange="previewFile(this);"  accept="image/*" required>
            </div>
        </div>   
        
        <br/><br/>
        
        <div class="row">
            <div class="col-lg-6 mb-6">
                <label>CPF</label>
                <input type="text" class="form-control cpf" id="cpf" name="cpf_cliente"  value="<?= $_SESSION['dados_cliente'][0]->cpf ?>" required readonly="" >
                <div class="invalid-feedback">
                    O CPF é obrigatório. Preencha este campo.
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <label >Nome completo</label>
                <input type="text" class="form-control" name="nome_completo"  value="<?= $dadosCliente[0]->nome_completo ?>" required readonly="">
                <div class="invalid-feedback">
                   O nome completo é obrigatório. Preencha este campo.
                </div>          
            </div>
        </div>
        
        <br/>
        
        <div class="row">    
            <div class="col-lg-6 mb-6">
                <label>E-mail <span class="text-muted"></span></label>
                <input type="email" class="form-control" name="email"  value="<?= $dadosCliente[0]->email ?>" readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <label>Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento"   value="<?= $dadosCliente[0]->data_nascimento ?>" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>    
        </div>
        <br/>
        
        <div class="row"> 
            <div class="col-lg-6 mb-6">
                <label>Telefone <span class="text-muted"></span></label>
                <input type="text" class="form-control" name="telefone"  value="<?= $dadosCliente[0]->fone ?>" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
        </div>
        
        <br/>
        
        <div class="row mt-3"> 
            <div class="col-lg-6">
                <button class="btn btn-primary btn-block" id="btnSalvar">Salvar</button>
            </div>
        </div>
        
        <br/><br/>
        
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



