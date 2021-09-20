<?php 

    require '../../../../wp-load.php';
    require ( get_template_directory() . '/inc/model_empresa_config.php' );
    require ( get_template_directory() . '/inc/functions_empresa.php' );
    
    if (empty($_POST['tipo_marcacao'])):
        exit("Nenhum tipo de marcação informado");
    endif;
    
    if (empty($_POST['percentual'])):
        exit("Nenhum percentual informado");
    endif;
    
    if (isset($_POST['tipo_marcacao'])) {
              
        $retorno = configurarTipoMarcacao();
        echo $retorno;
         
    }
   
?>