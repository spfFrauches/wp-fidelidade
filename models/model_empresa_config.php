<?php

function inserirConfiguracao ($arrayDados) {
    
    global $wpdb;     
    $tabela1 = "empresa_config";
        
    $dadosInsert = array(   'cnpjemp'           => $arrayDados['cnpjemp'], 
                            'tipo_marcacao'     => $arrayDados['tipo_marcacao'],
                            'percentual_vlrcompra' => $arrayDados['percentual'],
                            'dthr_ultima_alteracao' => $arrayDados['dthr_ultima_alteracao']                                         
                        );
      
    $dadosInsertDB   = $wpdb->insert( "$tabela1", $dadosInsert,  array('%s','%s','%f','%s' ) ) ; 
    echo "<pre>";
    var_dump($dadosInsert);
    echo "</pre>";
    
    var_dump($dadosInsertDB);
    
    if ($dadosInsertDB){
        return true;
    } else {
        return false;
    }
  
}

function verConfigMarcacaoEmpresa($cnpj) {
    
    global $wpdb; 
    $resultado =  $wpdb->get_results( "SELECT * FROM empresa_config where cnpjemp = '$cnpj' " );
    return $resultado;
    
}

function updateConfiguracaoEmpresa($cnpj, $percentual){
    
    
    global $wpdb; 
    $resultado = $wpdb->update('empresa_config', array('percentual_vlrcompra'=>$percentual), array('cnpjemp'=>$cnpj));
    return $resultado;
    
}