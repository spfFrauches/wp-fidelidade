<?php 
    /* Template Name: Site Finalizar Cadastro Cliente */ 
    get_header('site');
    include( get_template_directory() . '/inc/model_clientes.php' );
?>

<?php 

    $arrayCliente = [
        'nome_completo' => $_POST['nome_completo'],
        'cpf' => $_POST['cpf_cliente'],
        'data_nascimento' =>  $_POST['data_nascimento'],
        'email' => $_POST['email'],
        'fone' => $_POST['telefone'],
        'senha' =>  $_POST['senha'],
        'termos_uso' => 'SIM'
    ];
    
    $insertCliente = insertDBCliente($arrayCliente);
    
?>

<?php if ($insertCliente): ?>

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
        <h2>Ops, desculpe</h2>
        <p class="lead">
            Algo com esses dados fez com que não fosse possivel inserir
            no banco de dados.
        </p>
        <br/>
        <a href="<?= get_bloginfo('url') ?>/novo-cliente" class="btn btn-outline-secondary" >Voltar ao cadastro</a>
    </div>   
</div>

<?php endif; ?>

<br/><br/><br/>
<br/><br/><br/>
<br/><br/><br/>
<?php get_footer('site'); ?>







