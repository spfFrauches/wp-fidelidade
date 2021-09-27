<?php 
    /* Template Name: Painel Empresa - Minha Empresa */
    get_header('painel'); 
    
    include( get_template_directory() . '/inc/model_empresa.php' );
    
    /* REFATORAR ISSO E COLOCAR DENTRO DE UM MODEL / FUNCAO */
    if(!empty($_FILES['logoempresa'])){      
        $id = $_POST['codempresa'];
        $targetDir = "./wp-content/themes/fidelidade/empresas_logos/";
        $dir = get_bloginfo('template_url')."/empresas_logos/".basename($_FILES["logoempresa"]["name"]);
        $target_file = $targetDir . basename($_FILES["logoempresa"]["name"]);              
        if(move_uploaded_file($_FILES['logoempresa']['tmp_name'], $target_file)){         
            global $wpdb; 
            $wpdb->update('empresas', array('logoempsrc'=>$dir ,'logopath'=>$target_file), array('id'=>$id));
            $msgPosUpload = "Dados atualizados com sucesso!";  
        } else {
            $msgPosUpload = "Erro ao processar arquivo!";
        }
    }
    
    $caminhoImgDefault = get_bloginfo('template_url')."/img/uploadYourLogo.png";  
    $dadosEmpresa = buscarEmpresa($_SESSION['dados_empresa'][0]->cnpj);

       
?>

<main class="col-lg-9 ms-sm-auto col-lg-10 px-lg-4">
    
    <div class="row">            
        <div class="col-lg-12">
            <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">Minha Empresa <small> dados cadastrais</small></h2>
            </div>      
        </div>
    </div>

    <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
        <br/>     
        <div class="row mt-3">
            <div class="col-lg-3">          
                <img id="previewImg" class="img-thumbnail" width="150" src="<?= ($dadosEmpresa[0]->logoempsrc != null ? $dadosEmpresa[0]->logoempsrc : $caminhoImgDefault )  ?>" alt="Logomarca de sua empresa">
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
            <div class="col-lg-9">
                <label class="form-label" style="font-size: 17px">Insira a logo de sua empresa</label>
                <br/>
                <input type="file" name="logoempresa"  onchange="previewFile(this);"  accept="image/*" required>
            </div>
        </div>   
            
        <div class="row mt-5">
            <div class="col-lg-4">
                <label>Cód. Emp</label>
                <input type="text" class="form-control" name="codempresa" value="<?= $_SESSION['dados_empresa'][0]->id ?>" readonly>
            </div>
            <div class="col-lg-8">
                <label >Razão Social</label>
                <input type="text" class="form-control" value="<?= $_SESSION['dados_empresa'][0]->razao_social ?>" readonly>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-lg-4 mb-3">
                <label>Nome Fantasia</label>
                <input type="text" class="form-control"  value="<?= $_SESSION['dados_empresa'][0]->nome_fantasia ?>"  readonly>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>            
            <div class="col-lg-4 mb-3">
                <label>CNPJ</label>
                <input type="text" class="form-control" value="<?= $_SESSION['dados_empresa'][0]->cnpj ?>" readonly>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <label>Telefone</label>
                <input type="text" class="form-control" readonly value="<?= $_SESSION['dados_empresa'][0]->telefone ?>">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>            
        </div>

        <br/>
        <div class="row"> 
            <div class="col-lg-4 mb-3">
                <label>Whatsapp / Telegram</label>
                <input type="text" class="form-control"  readonly value="<?= $_SESSION['dados_empresa'][0]->whatsapptelegram ?>">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <label>Facebook</label>
                <input type="text" class="form-control" readonly value="<?= $_SESSION['dados_empresa'][0]->facebook ?>">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>          
            <div class="col-lg-4 mb-3">
                <label>Instagram</label>
                <input type="text" class="form-control"  readonly value="<?= $_SESSION['dados_empresa'][0]->instagram ?>">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>           
        </div>
        
        <hr/>
        <h3><small>Endereço</small></h3>
        <hr/>
        
        <div class="row">
            <div class="col-lg-4 mb-3">
                <label>CEP</label>
                <input type="text" class="form-control" name="cep" value="<?= $_SESSION['dados_empresa'][0]->cep ?>" required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div> 
            <div class="col-lg-4 mb-3">                       
                <div class="form-group">
                    <label>UF</label>
                    <select class="form-control" id="uf" name="uf" required readonly>
                        <option></option>
                        <option value="AC" <?= $_SESSION['dados_empresa'][0]->uf == "AC" ? "selected" : "" ?>>Acre</option>
                        <option value="AL" <?= $_SESSION['dados_empresa'][0]->uf == "AL" ? "selected" : "" ?>>Alagoas</option>
                        <option value="AP" <?= $_SESSION['dados_empresa'][0]->uf == "AP" ? "selected" : "" ?>>Amapá</option>
                        <option value="AM" <?= $_SESSION['dados_empresa'][0]->uf == "AM" ? "selected" : "" ?>>Amazonas</option>
                        <option value="BA" <?= $_SESSION['dados_empresa'][0]->uf == "BA" ? "selected" : "" ?>>Bahia</option>
                        <option value="CE" <?= $_SESSION['dados_empresa'][0]->uf == "CE" ? "selected" : "" ?>>Ceará</option>
                        <option value="DF" <?= $_SESSION['dados_empresa'][0]->uf == "DF" ? "selected" : "" ?>>Distrito Federal</option>
                        <option value="ES" <?= $_SESSION['dados_empresa'][0]->uf == "ES" ? "selected" : "" ?>>Espírito Santo</option>
                        <option value="GO" <?= $_SESSION['dados_empresa'][0]->uf == "GO" ? "selected" : "" ?>>Goiás</option>
                        <option value="MA" <?= $_SESSION['dados_empresa'][0]->uf == "MA" ? "selected" : "" ?>>Maranhão</option>
                        <option value="MT" <?= $_SESSION['dados_empresa'][0]->uf == "MT" ? "selected" : "" ?>>Mato Grosso</option>
                        <option value="MS" <?= $_SESSION['dados_empresa'][0]->uf == "MS" ? "selected" : "" ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?= $_SESSION['dados_empresa'][0]->uf == "MG" ? "selected" : "" ?>>Minas Gerais</option>
                        <option value="PA" <?= $_SESSION['dados_empresa'][0]->uf == "PA" ? "selected" : "" ?>>Pará</option>
                        <option value="PB" <?= $_SESSION['dados_empresa'][0]->uf == "PB" ? "selected" : "" ?>>Paraíba</option>
                        <option value="PR" <?= $_SESSION['dados_empresa'][0]->uf == "PR" ? "selected" : "" ?>>Paraná</option>
                        <option value="PE" <?= $_SESSION['dados_empresa'][0]->uf == "PE" ? "selected" : "" ?>>Pernambuco</option>
                        <option value="PI" <?= $_SESSION['dados_empresa'][0]->uf == "PI" ? "selected" : "" ?>>Piauí</option>
                        <option value="RJ" <?= $_SESSION['dados_empresa'][0]->uf == "RJ" ? "selected" : "" ?>>Rio de Janeiro</option>
                        <option value="RN" <?= $_SESSION['dados_empresa'][0]->uf == "RN" ? "selected" : "" ?>>Rio Grande do Norte</option>
                        <option value="RS" <?= $_SESSION['dados_empresa'][0]->uf == "RS" ? "selected" : "" ?>>Rio Grande do Sul</option>
                        <option value="RO" <?= $_SESSION['dados_empresa'][0]->uf == "RO" ? "selected" : "" ?>>Rondônia</option>
                        <option value="RR" <?= $_SESSION['dados_empresa'][0]->uf == "RR" ? "selected" : "" ?>>Roraima</option>
                        <option value="SC" <?= $_SESSION['dados_empresa'][0]->uf == "SC" ? "selected" : "" ?>>Santa Catarina</option>
                        <option value="SP" <?= $_SESSION['dados_empresa'][0]->uf == "SP" ? "selected" : "" ?>>São Paulo</option>
                        <option value="SE" <?= $_SESSION['dados_empresa'][0]->uf == "SE" ? "selected" : "" ?>>Sergipe</option>
                        <option value="TO" <?= $_SESSION['dados_empresa'][0]->uf == "TO" ? "selected" : "" ?>>Tocantins</option>
                    </select>
                </div>                        
            </div> 
            <div class="col-lg-4 mb-3">
                <label>Cidade</label>
                <input type="text" class="form-control" name="cidade" value="<?= $_SESSION['dados_empresa'][0]->cidade ?>"  required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>      
        </div>
        
        <div class="row">
                  
            <div class="col-lg-4 mb-3">
                <label>Endereço</label>
                <input type="text" class="form-control" name="endereco" value="<?= $_SESSION['dados_empresa'][0]->endereco ?>"  required readonly="">
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div> 
            <div class="col-lg-4 mb-3">
                <label>Bairro</label>
                <input type="text" class="form-control" value="<?= $_SESSION['dados_empresa'][0]->bairro ?>"  readonly>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div> 
            <div class="col-lg-4 mb-3">
                <label>Número</label>
                <input type="text" class="form-control" value="<?= $_SESSION['dados_empresa'][0]->numero ?>"  readonly>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div> 
        </div>
        
        <div class="row">
            
            <div class="col-lg-12">
                <label>Complemento</label>
                <input type="text" class="form-control"  value="<?= $_SESSION['dados_empresa'][0]->complemento ?>"  readonly>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div> 
           
        </div>
              
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" >Salvar</button>
                </div>
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
    
<?php get_footer('painel'); ?>
