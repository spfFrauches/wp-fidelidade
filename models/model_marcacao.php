<?php

function buscarCliente($cliente) {
    
    global $wpdb;
    $resultCliente  = $wpdb->get_results("SELECT * FROM clientes WHERE cpf = '$cliente'");
    return $resultCliente;
    
}

function listarMarcacaoCliente($cliente, $empresa) {
    global $wpdb;
    $result  = $wpdb->get_results("SELECT * FROM marcacao WHERE cpfcli = '$cliente' and cnpjemp = '$empresa' order by datamarcacao desc ");
    return $result;
    
}

function listarMarcacaoClienteIndividual($cliente) {
    global $wpdb;
    $result  = $wpdb->get_results("SELECT * FROM marcacao WHERE cpfcli = '$cliente' order by datamarcacao desc ");
    return $result;
    
}

function listarMarcacaoEmpresaCliente($cliente, $empresa) {
    global $wpdb;
    $result  = $wpdb->get_results("SELECT * FROM marcacao WHERE cpfcli = '$cliente' AND cnpjemp = '$empresa' ORDER BY datamarcacao desc ");
    return $result;
    
}

function listarMarcacaoEmpresaCliente2($cliente, $empresa) {
    
    global $wpdb;
    $result  = $wpdb->get_results("SELECT * FROM marcacao tbsmarcacao "
            . "JOIN empresas tbsempresa ON tbsempresa.cnpj = tbsmarcacao.cnpjemp "
            . "WHERE tbsmarcacao.cpfcli = '$cliente' AND tbsmarcacao.cnpjemp = '$empresa' "
            . "ORDER BY tbsmarcacao.datamarcacao desc ");
    return $result;
    
}


function listarConfiguracaoEmpresa($cnpj) {
    global $wpdb;
    $result  = $wpdb->get_results("SELECT * FROM empresa_config WHERE cnpjemp = '$cnpj' ");
    return $result;
    
}

function clienteMarcacao($cpf) {
    
    global $wpdb;
    $result  = $wpdb->get_results("SELECT * FROM marcacao WHERE cpfcli = '$cpf'");
    return $result; 
    
}

function marcarCliente($arrayLigacao, $arrayMarcacao ) {
    
    global $wpdb; 
    
    $tabela1 = "ligacaoclienteempresa";
    $tabela2 = "marcacao";
        
    $dataLigacao = array('cnpjemp' => $arrayLigacao['cnpjEmpresa'], 'cpfcli' => $arrayLigacao['cpfCliente']);
      
    $inserirLigacao   = $wpdb->insert( "$tabela1", $dataLigacao,  array('%s','%s') ) ;    
    $inserirMarcacao  = $wpdb->insert( "$tabela2", $arrayMarcacao, array('%s','%s','%s','%f','%s', '%s','%d','%f') );
    
    if ($inserirMarcacao) {
        return true;
    } else {
        return false;
    }

}

function listarTotalMarcacoes($cnpj){
    
    global $wpdb;
    $resultado =  $wpdb->get_results( "SELECT count(*) qtdTotalMarcacao "
                . "FROM marcacao WHERE cnpjemp = '$cnpj' " );
    //return  $resultado->num_rows;
    return $resultado[0]-> qtdTotalMarcacao;
    
    
    
}
    