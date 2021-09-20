<?php

function configurarTipoMarcacao() {
    
    $dadosInsert = array();
    $dadosInsert['tipo_marcacao'] = $_POST['tipo_marcacao'];
    $dadosInsert['cnpjemp'] = $_SESSION['dados_empresa'][0]->cnpj ;
    $dadosInsert['dthr_ultima_alteracao'] = date('Y-d-m h:i:s');

    if ($_POST['tipo_marcacao'] == 'cash') {  
        $dadosInsert['percentual'] = $_POST['percentual'];
        $retorno =  inserirConfiguracao($dadosInsert);
        return $retorno;
    }
       
}


?>
