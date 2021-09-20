<?php 

    require '../../../../wp-load.php';
    require ( get_template_directory() . '/inc/model_empresa_config.php' );
    require ( get_template_directory() . '/inc/functions_empresa.php' );
    
    if (isset($_POST['tipo_marcacao'])) {
              
        configurarTipoMarcacao();
         
    }
   
?>