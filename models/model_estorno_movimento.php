<?php

function listarMovimentosClientes($cnpjemp) {
    
    global $wpdb;
       
    $sql = "";
    $sql .= "SELECT mark.id, mark.cnpjemp, mark.cpfcli, ";
    $sql .= "cli.nome_completo, mark.datamarcacao, mark.valormarcacao, ";
    $sql .= "mark.tipomarcacao, mark.porcentagemPontos, mark.pontos ";
    $sql .= "FROM marcacao mark  ";
    $sql .= "INNER JOIN clientes cli ON mark.cpfcli = cli.cpf ";
    $sql .= "WHERE mark.cnpjemp = '$cnpjemp' ";
    $sql .= "GROUP BY  mark.cpfcli ";
    $sql .= "ORDER BY mark.datamarcacao DESC";
    
    //
    
    $resultCliente  = $wpdb->get_results($sql);
    return $resultCliente;
    
}
