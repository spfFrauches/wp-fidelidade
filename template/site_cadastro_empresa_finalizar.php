<?php 

    /* Template Name: Site Finalizar Cadastro Empresa */ 
    get_header('site');
    
    include( get_template_directory() . '/inc/functions_empresa.php' ); 
    include( get_template_directory() . '/inc/model_empresa.php' ); 
    
    include( get_template_directory() . '/inc/include_helper_validaPOST_CadastroEmpresaSite.php' ); 
              
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
        
        <?php if ($MgsAlertaCnpj): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaCnpj ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaRazaoSocial): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaRazaoSocial ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaFantasia): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaFantasia ?>
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
        
        <?php if ($MgsAlertaCep): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaCep ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaCidade): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaCidade ?>
        </div>
        <?php endif; ?>
        
        <?php if ($MgsAlertaBairro): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaBairro ?>
        </div>
        <?php endif; ?>
        <?php if ($MgsAlertaEndereco): ?>
        <div class="alert alert-danger" role="alert">
            <?= $MgsAlertaEndereco ?>
        </div>
        <?php endif; ?>
            
        <p class="lead" style="color:red">
            Não foi possivel prosseguir com o cadastro. Tente novamente
            observando com cuidado todos os campos do formulário.
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







