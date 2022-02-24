<?php

/* Template Name: Painel Empresa - Estorno Movimentos */ 
 if ($_SESSION['login_painel'] != 'empresa'):
    $url = get_bloginfo('url')."/login";
    header("Location:$url");
    exit("A sessão foi expirada ou é invalida");
endif; 

include( get_template_directory() . '/models/model_estorno_movimento.php' );

$cnpjemp = $_SESSION['dados_empresa'][0]->cnpj;
$listarClientes = listarMovimentosClientes($cnpjemp);

get_header('painelcliente');

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">
      
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Estorno de Movimentos <small></small></h2>
    </div>
    
    <div class="row">     
        <div class="col-lg-12">                  
            <div class="row mt-5">   
                <div class="col-lg-12">
                    <table id="example" class="table table-hover" >
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>CPF</th>
                                <th>Ult. Marc.</th>
                                <th>Ver</th>
                            </tr>
                        </thead>               
                        <tbody>
                            <?php foreach ($listarClientes as $key => $value):?> 
                            <tr>
                                <td><?= strtoupper($value->nome_completo) ?></td>
                                <td><?= $value->cpfcli ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($value->datamarcacao)) ?></td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                             <?php endforeach;  ?> 
                        </tbody>              
                    </table>
                </div> 
            </div>            
        </div>
    </div>
    
    <?php
    /*
        echo "<pre>";
        var_dump($listarClientes);
        echo "</pre>";
     * 
     */
    ?>
                
           
    <br/>

</main>

<script>
    
    $(document).ready(function() {
         $('#example').dataTable( {
            "order": []
        } );
    } );
    
</script>

<?php get_footer('painel'); ?>


