<?php

function configurarTipoMarcacao() {
    
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
   
    $dadosInsert = array();
    $dadosInsert['tipo_marcacao'] = $_POST['tipo_marcacao'];
    $dadosInsert['cnpjemp'] = $_SESSION['dados_empresa'][0]->cnpj ;
    $dadosInsert['dthr_ultima_alteracao'] = date('Y-d-m h:i:s');

    if ($_POST['tipo_marcacao'] == 'cash') {  
        
        $dadosInsert['percentual'] = $_POST['percentual'];     
        $dadosInsert['percentual']  = str_replace('.', '', $dadosInsert['percentual']);
        $dadosInsert['percentual']  = str_replace(',', '.', $dadosInsert['percentual']);
        
        echo "<pre>";
        var_dump($dadosInsert);
        echo "</pre>";
        
        if (isset($_POST['update']) && $_POST['update'] == 'sim'):
            var_dump("Vamos dar UPDATE");
            $retorno =  updateConfiguracaoEmpresa($dadosInsert['cnpjemp'], $dadosInsert['percentual']);
            else:
                var_dump("Vamos dar INSERT");
                $retorno =  inserirConfiguracao($dadosInsert);    
        endif;
           
        return $retorno;
    }    
}

function alterarSenhaDashBoard() {
    
    if (isset($_POST['novasenha']) && isset($_POST['novasenha_confirma']) ): 
   
        if ($_POST['novasenha'] == $_POST['novasenha_confirma']):  
            
            if (isset($_POST['senhaatual'])):   
                
                if (autenticarLoginEmpresa($_SESSION['dados_empresa'][0]->cnpj, $_POST['senhaatual'])):
                    
                    if (alterarSenhaEmpresa($_POST['novasenha'], $_SESSION['dados_empresa'][0]->cnpj)):
                        return "SenhaAlterada";
                    endif;
                    
                else :
                    return "SenhaAtualInvalida";
                endif;
            endif;
            
        else:
            
            return "NovasSenhasInvalidas";
            
        endif;      
    endif;
    
}


?>
