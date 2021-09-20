<?php 

    /* Template Name: Site Finalizar Cadastro Empresa */ 
    get_header('site');
    
    require './wp-content/themes/fidelidade/inc/functions_empresa.php';
    require './wp-content/themes/fidelidade/inc/model_empresa.php';
              
    if (isset($_POST)) {
        
        function sanitizeString($string) {
            // matriz de entrada
            $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );
            // matriz de saída
            $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-' );
            // devolver a string
            return str_replace($what, $by, $string);
        }
        
        $array_insert = [
            'razao_social' => $_POST['razao_social'],
            'nome_fantasia' => $_POST['nome_fantasia'],
            'cnpj' =>  $_POST['cnpj'],
            'email' =>  $_POST['email'],
            'slug_empresa' =>   $urlFantasia = strtolower (sanitizeString($_POST['nome_fantasia'])),
            'passwd' => $_POST['passwd'],
            'facebook' => $_POST['facebook'],
            'instagram' => $_POST['instagram'],
            'data_cadastro' => $_POST['data_cadastro'],
            'fl_situacao' => 0,
            'cep' => $_POST['cep'],
            'cidade' => $_POST['cidade'],
            'uf' => $_POST['uf'],
            'endereco' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'numero' => $_POST['numero'],
            'complemento' => $_POST['complemento']
        ];

        $result = insertDB($array_insert);
       
    }

?>

<?php if ($result): ?>

<div class="container"> 
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?= get_bloginfo('template_url') ?>/img/img_exemple.png" alt="" width="72" height="72">
        <h2>Parabéns, seu cadastro foi realizado.</h2>
        <p class="lead">
            Vamos inserir aqui uma mensagem informado as próximas etapas 
            para usar a ferramenta .
        </p>
        <br/>
        <a href="<?= get_bloginfo('url') ?>/painel" class="btn btn-outline-secondary" >Ir ao Painel</a>  
    </div>   
</div>

<?php else : ?>

<div class="container"> 
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?= get_bloginfo('template_url') ?>/img/img_exemple.png" alt="" width="72" height="72">
        <h2 style="color:red">Ops, desculpe</h2>
        <p class="lead" style="color:red">
            Algo com esses dados. Não foi possível inserir
            no banco de dados. Verifique e tente novamente mais tarde.
        </p>
        <br/>
        <a href="<?= get_bloginfo('url') ?>/nova-empresa" class="btn btn-outline-secondary" >Voltar ao cadastro</a>
    </div>   
</div>

<?php endif; ?>

<br/><br/><br/>
<br/><br/><br/>
<br/><br/><br/>
<?php get_footer('site'); ?>







