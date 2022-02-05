<?php

function inserirSolicitacao($post) 
{
    
    global $wpdb;       
     
    $dadosInput = [
        'cnpjemp' => $post['cnpjemp'],
        'cpfcliente' =>  $post['cpfcliente'],
        'cdbeneficio' => $post['cdbeneficio'],
        'dtsolicitacao' =>  $post['dtsolicitacao'],
        'status' => $post['status'] 
    ];  
    
    $resultado = $wpdb->insert( 'solicitacao_resgate', 
                $dadosInput, 
                array('%s','%s', '%d', '%s', '%s') ) ; 
    
    if ($resultado):
        
        return true;
    else:
        return false;
    endif; 
       
}

function listarSolicitacaoRestage($cpf) {
    
    // solicitacao_resgate    
    global $wpdb;
    
    $result1 = $wpdb->get_results("SELECT emp.razao_social,  "
            . "emp.nome_fantasia, ben.descricao, solRes.status "
            . "FROM solicitacao_resgate solRes "
            . "INNER JOIN beneficios ben ON solRes.cdbeneficio = ben.id  "
            . "INNER JOIN empresas emp ON solRes.cnpjemp = emp.cnpj "
            . "WHERE cpfcliente = '$cpf'");
    
    // $result  = $wpdb->get_results("SELECT * FROM solicitacao_resgate WHERE cpfcliente = '$cpf'  ORDER BY dtsolicitacao DESC ");
    return $result1;
          
}

function listarSolicitacaoRestageConfere($cpf, $cdbeneficio) {
    
    // solicitacao_resgate    
    global $wpdb;
 
    $result  = $wpdb->get_row("SELECT * FROM solicitacao_resgate "
            . "WHERE cpfcliente = '$cpf' AND cdbeneficio = '$cdbeneficio' "
            . "AND status = 'solicitado' "
            . "ORDER BY dtsolicitacao DESC ");
    return $result;
          
}

function listarSolicitacaoRestageConfere2($cpf, $cnpj) {
    
    // solicitacao_resgate    
    global $wpdb;
 
    $result  = $wpdb->get_row("SELECT * FROM solicitacao_resgate "
            . "WHERE cpfcliente = '$cpf' AND cnpjemp = '$cnpj' "
            . "AND status = 'solicitado' "
            . "ORDER BY dtsolicitacao DESC ");
    return $result;
          
}


function listarSolicitacaoRestageEmpresa($empresa) {
    
    // solicitacao_resgate    
    global $wpdb;
 
    $result  = $wpdb->get_results("SELECT solRes.idresgate, solRes.dtsolicitacao,solRes.cnpjemp, ben.id as idbeneficio, "
            . "ben.descricao, solRes.status, ben.qtdpontos, "
            . "solRes.cpfcliente, cli.nome_completo , cli.src_selfie "
            . "FROM solicitacao_resgate solRes "
            . "INNER JOIN beneficios ben ON solRes.cdbeneficio = ben.id "
            . "INNER JOIN empresas emp ON solRes.cnpjemp = emp.cnpj "
            . "INNER JOIN clientes cli ON solRes.cpfcliente = cli.cpf "
            . "WHERE solRes.cnpjemp = '$empresa' "
            . "AND solRes.status = 'solicitado' ");   
    return $result;
           
}

function baixaSolicitacaoResgate($idresgate)
{
     
    global $wpdb; 
        
    $resultado = $wpdb->update('solicitacao_resgate', 
            array(
                'status'=>'entregue',
                'dtresgate' => date("Y-m-d H:i")
            ), 
            array('idresgate'=>$idresgate ));
    
    return $resultado;
    
}

