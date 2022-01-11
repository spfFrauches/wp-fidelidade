<?php

$request = (object) $_REQUEST;

if (!empty ($funcao = $request->funcao) ) :    
    $funcao();
else:
    exit();
endif;

function carregarDadosBeneficio()
{
    require '../../../../wp-load.php';
    global $wpdb; 
    
    include( get_template_directory() . '/models/model_beneficio.php' );
    include( get_template_directory() . '/models/model_marcacao.php' );
    include( get_template_directory() . '/models/model_clientes.php' );
    $beneficios = listarBeneficiosPorEmpresa($_POST['cnpj']);
    
    $cliente = listarClienteFidelidade($_POST['cpf']);
    
    $saldoPontosClientes = saldoPontosClienteEmpresa($_POST['cpf'], $_POST['cnpj']);
    $brindePontosMinimos = brindeMenorPonto($_SESSION['dados_empresa'][0]->cnpj);
    
        
    include( get_template_directory() . '/inc/include_resgate_beneficio_painel_empresa.php' );
    
}

