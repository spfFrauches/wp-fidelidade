<?php 
    /* Template Name: Site Finalizar Cadastro Cliente */ 
$_SESSION['url_referencia'] = '';
get_header('site');
include( get_template_directory() . '/models/model_clientes.php' );
include( get_template_directory() . '/inc/functions_cliente.php' );

include( get_template_directory() . '/inc/include_helper_validaPOST_CadastroCliente.php' ); 
    
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
        <h2 style="color:red">Ops, desculpe</h2>
        
        <?php if ($MgsAlertaCpf): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaCpf ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaNomeCompleto): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaNomeCompleto ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaEmail): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaEmail ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaTelefone): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaTelefone ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaSenha): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaSenha ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaConfirmarSenha): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaConfirmarSenha ?>
        </div>
        <?php endif; ?>
        
        <p class="lead" style="color:red">
            Não foi possivel concluir o cadastro.
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







