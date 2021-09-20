<?php

function nextID(){
    global $wpdb; 
    $resultado =  $wpdb->get_results( "SELECT MAX(id) as ID from empresas" );
    return $resultado;
}

function insertDB($array) {    
    global $wpdb; 
    $resultado = $wpdb->insert( 'empresas', $array, array('%s','%s', '%s') ) ;   
    return $resultado;
}

function listar() {   
    global $wpdb; 
    $resultado =  $wpdb->get_results( "SELECT * FROM empresas" );
    return $resultado;
}

function buscarEmpresa($cnpj){
   global $wpdb;      
   $resultado =  $wpdb->get_results( "SELECT * FROM empresas where cnpj = '$cnpj' " ); 
   return $resultado;
}

function emailEmpresa($email){
    global $wpdb;     
    $resultado =  $wpdb->get_results( "SELECT * FROM empresas where email = '$email' " ); 
    return $resultado;
}

?>
