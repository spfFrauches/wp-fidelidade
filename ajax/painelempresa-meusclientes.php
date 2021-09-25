<?php

$request = (object) $_REQUEST;

if (!empty ($funcao = $request->funcao) ) :    
    $funcao();
else:
    exit();
endif;

function carregarDadosCliente()
{
    require '../../../../wp-load.php';
    global $wpdb; 
    
    /*
    echo "<pre>";
    var_dump($_REQUEST);
    echo "</pre>";
    * 
    */
   
    $tabelaClientes = 'clientes';
    $tabelaMarcacoes = 'marcacao';
    $cpf = $_REQUEST['cpfcliente'];
    $cnpj = $_REQUEST['cnpjempresa'];
    
    $sqlClientes = "SELECT * FROM $tabelaClientes WHERE cpf = '$cpf' ";
    $sqlMarcacoes = "SELECT * FROM $tabelaMarcacoes WHERE cnpjemp = '$cnpj' AND cpfcli = '$cpf' ";
       
    $resultadoCadastroCliente =  $wpdb->get_results( $sqlClientes );
    $resutadoMarcacoes = $wpdb->get_results( $sqlMarcacoes );
    
    $totalPontos = 0;
    foreach ($resutadoMarcacoes as $key => $value) :
        $totalPontos = $totalPontos + $value->pontos;     
    endforeach;
   
    /*
    echo "<pre>".
    var_dump($resutadoMarcacoes);
    echo "</pre>";
     * 
     */
    
    echo "<h3>".$resultadoCadastroCliente[0]->nome_completo."</h3>";
    echo "CPF.: $cpf";
    echo "<br/><br/>";
    
    echo '<ol class="list-group ">';
    echo '<li class="list-group-item d-flex justify-content-between align-items-start">';
    echo '<div class="ms-2 me-auto">';
    echo '<div class="fw-bold">Total de Pontos disponiveis.: </div>';
    /* echo 'Cras justo odio'; */
    echo '</div>';
    echo '<span class="badge bg-primary rounded-pill">'.$totalPontos.'</span>';
    echo '</li>';
    echo '</ol>';
    
    echo "<p class='mt-2 mb-3' style='font-size:21px'>Detalhes</p>";
    
    echo '<ol class="list-group list-group-numbered">';
    foreach ($resutadoMarcacoes as $key1 => $value1) :
        
        echo '<li class="list-group-item d-flex justify-content-between align-items-start">';
        echo '<div class="ms-2 me-auto">';
        echo "Pontos em.: ".date('d/m/Y H:i:s', strtotime($value1->datamarcacao)); 
        echo '<div style="font-size: 11px">Valor R$.: '.$value1->valormarcacao.' |-> '.$value1->porcentagemPontos.' % para conversão em pontos   </div>';

        echo '</div>';
        echo '<span class="badge bg-info text-dark rounded-pill">'.$value1->pontos.'</span>';
        echo '</li>';
        
    endforeach;
   
    echo '</ol>';
 
}

