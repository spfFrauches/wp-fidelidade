<?php 
    /* Template Name: Painel Empresa - Meus Clientes */ 
    get_header('painelcliente');
    include( get_template_directory() . '/inc/model_clientes.php' );
    include( get_template_directory() . '/inc/model_marcacao.php' );
    
    $listarCliente = listarDadosCompletosClientesLigados($_SESSION['dados_empresa'][0]->cnpj);
    $configEmpresa = listarConfiguracaoEmpresa($_SESSION['dados_empresa'][0]->cnpj);   
    $percentualDaEmpresa = $configEmpresa[0]->percentual_vlrcompra;
    $cnpjempresa = $_SESSION['dados_empresa'][0]->cnpj
    
?>
<!-- -->


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Meus clientes <small></small></h1>
    </div>
    
    
    <?php // var_dump($listarCliente) ?>
    <div class="row mt-5">   
        <div class="col-lg-12">
            <table id="example" class="table table-hover" >
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>CPF</th>
                        <th>Últ. Marcação</th>
                        <th>Detalhes</th>
                    </tr>
                </thead>               
                <tbody>
                    <?php foreach ($listarCliente as $key => $value):?> 
                    <tr>
                        <td><?= $value->NOME ?></td>
                        <td><?= $value->CPF ?></td>
                        <td><?= date('d/m/Y H:i:s', strtotime($value->ULTMARC)) ?></td>
                        <td>                           
                            <a href="#" class="modaldetalhes"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-modal="<?= $value->CPF ?>" data-cnpj="<?= $cnpjempresa ?>" >
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a>                            
                        </td>
                    </tr>
                     <?php endforeach;  ?> 
                </tbody>              
            </table>
        </div> 
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detalhes do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body detalhescliente">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<br/>

<script>
    
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    
</script>

<?php get_footer('painelcliente'); ?>
