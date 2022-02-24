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
    $sqlMarcacoes = "SELECT * FROM $tabelaMarcacoes WHERE cnpjemp = '$cnpj' AND cpfcli = '$cpf' ORDER BY datamarcacao DESC ";
       
    $resultadoCadastroCliente =  $wpdb->get_results( $sqlClientes );
    $resutadoMarcacoes = $wpdb->get_results( $sqlMarcacoes );
    
    $totalPontos = 0;
    foreach ($resutadoMarcacoes as $key => $value) :
        $totalPontos = $totalPontos + $value->pontos;     
    endforeach;
   
    require ('../../../../wp-content/themes/fidelidade/inc/include_modalPainelEmpresa_meusClientes.php');
 
}

