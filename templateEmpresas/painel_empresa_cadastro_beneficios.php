<?php 
/* Template Name: Painel Empresa - Cadastro Beneficios */ 
get_header('painel');
include( get_template_directory() . '/inc/functions_login.php' ); 
include( get_template_directory() . '/models/model_empresa.php' );
include( get_template_directory() . '/inc/functions_empresa.php' );

if(!isset($_SESSION['login_painel'])):
    $url = get_bloginfo('url')."/login";
    header("Location:$url");
    exit("Sessão expirada ou invalida");
endif; 

$_SESSION['url_referencia'] = 'empresa-beneficios-por-pontos';
$caminhoImgDefault = get_bloginfo('template_url')."/img/beneficio-logo2.png";  
            
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">
      
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Cadastro de benefícios <small></small></h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= get_bloginfo('url') ?>/painel-empresa/beneficios-por-pontos/" class="btn btn-sm btn-outline-secondary">              
                Voltar
            </a>
        </div>
    </div>
           
    <br/>
    
    <div class="row">
        <div class="col-lg-2">
            <img id="previewImg" class="img-thumbnail" width="150" src="<?= $caminhoImgDefault ?>" alt="imagem ilustrativa do beneficio">       
        </div>
        <div class="col-lg-4 mt-5">
            <label for="formFileSm" class="form-label" style="font-size: 17px">Imagem ilustrativa do brinde / beneficio</label>
            <br/>
            <input class="form-control form-control-sm" id="formFileSm"  type="file" name="imgbeneficio"  onchange="previewFile(this);"  accept="image/*" required>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-sm-6">
            <label class="form-label">Descrição do Beneficio</label>
            <input type="text" class="form-control" id="descricaoBrinde">
        </div>
        <div class="col-sm-3">
            <label class="form-label">Valor em Pontos</label>
            <input type="text" class="form-control dinheiro" id="descricaoBrinde">
        </div>
        <div class="col-sm-3">
            <label class="form-label">Status</label>
            <select class="form-select" aria-label=".form-select-sm example">
                <option selected>Ativo</option>
                <option value="1">Inativo</option>
            </select>
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-sm-12">
            <label class="form-label">Observação adicional do Beneficio</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Salvar</button>
            </div>
        </div>
    </div>
       
</main>

    
<?php get_footer('painel'); ?>

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
    $('.dinheiro').mask('#.##0,00', {reverse: true});
</script>  
