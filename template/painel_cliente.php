<?php 
    /* Template Name: Painel Cliente */ 
    if (isset($_SESSION['login_painel']) && $_SESSION['login_painel'] == 'cliente') :
        get_header('painel');
        include( get_template_directory() . '/inc/model_marcacao.php' ); 
        include( get_template_directory() . '/inc/model_empresa.php' ); 
        include( get_template_directory() . '/inc/model_ligacaoEmpresa.php' ); 
        $minhasEmpresas = buscarEmpresaLigadaAoCliente($_SESSION['dados_cliente'][0]->cpf);
        
?>
<main class="col-md-9 p-2 ms-sm-auto col-lg-10 px-md-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meu Webi CLub</h1>    
    </div>  
    
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-secondary rounded shadow-sm">
        <!-- <img class="mr-3" src="" alt="" width="48" height="48"> -->
        <div class="lh-100"> 
          <h6 class="mb-0 text-white lh-100">Olá, <?= $_SESSION['dados_cliente'][0]->nome_completo ?></h6>
          <small>MegaChic Fidelidade</small>
        </div>
    </div>
        
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Meus locais de compra</h6>
        <?php if (!$minhasEmpresas) ?>
            <div class="col-lg-12 mt-5 mb-1">
                Você ainda não tem locais de compra registrados
                no Webi Club Fidadelidade.
            </div>
        <?php ?>
    </div>
       
    <div class="row">
        <?php foreach ($minhasEmpresas as $keyEmp => $valueEmp) : ?>
            <div class="col-4 mb-1">
                <div class="card">
                    <img class="d-block mx-auto img-thumbnail mt-2" src="<?= $valueEmp->logoempsrc ?>" alt="" width="90px">
                    <div class="card-body text-center">
                        <p class="card-text">
                            <a href="<?=get_bloginfo('url')?>/painel-cliente?cnpj=<?= $valueEmp->cnpjemp ?>" class="btn btn-primary btn-sm" style="font-size:10px"><?= $valueEmp->nome_fantasia ?></a>
                        </p>
                    </div>
                </div> 
            </div>
        <?php endforeach; ?>
    </div>
             
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Minhas Pontuações</h6> 
            
        <?php if (!$minhasEmpresas) ?>
            <div class="col-lg-12 mt-5 mb-1">
                Você ainda não tem pontos registrados
                no Webi Club Fidadelidade.
            </div>
        <?php ?>
              
        <?php if (isset($_REQUEST['cnpj'])) : ?>
            
        <?php 
            $totalPontos = 0;
        ?>
        <?php $listarMarcacoes = listarMarcacaoEmpresaCliente($_SESSION['dados_cliente'][0]->cpf, $_REQUEST["cnpj"]); ?>

        <?php foreach ($listarMarcacoes as $key => $value): ?>
        <div class="media text-muted pt-3" >          
            <svg style="margin-top: 5px" class="bd-placeholder-img mr-2 rounded" width="42" height="42" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Pontos.: <?= $value->pontos ?></strong>
                    <a href="#">Detalhes</a>
                </div>
                <?php  
                    $cnpj = $value->cnpjemp ;
                    $nomeEmpresa = buscarEmpresa($cnpj);
                    $nomeEmpresa = $nomeEmpresa[0]->nome_fantasia;
                    $totalPontos = $totalPontos + $value->pontos;
                ?>

                <span class="d-block">Local .: <?php echo "$nomeEmpresa"?> </span>
                <span class="d-block">Data .: <?= date("d/m/Y H:i", strtotime($value->datamarcacao)) ; ?> </span>
            </div>
        </div>
        <?php endforeach; ?>      
        <small class="d-block text-right mt-3">
            <a href="#">Total Pontos.: <b style="font-size: 14px"><?= $totalPontos ?></b></a>
        </small>
        <?php endif;  ?>
    </div>
</main>

<?php 
    else : 
        $url = get_bloginfo('url')."/login";
        echo "<script>";
        echo "window.location.href = '$url'";
        echo "</script>"; 
    endif;
?>

<?php get_footer('painel') ?>




