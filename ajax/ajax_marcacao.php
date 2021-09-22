<?php 

    require '../../../../wp-load.php';
    require ( get_template_directory() . '/inc/model_marcacao.php' );
    require ( get_template_directory() . '/inc/model_clientes.php' );
    require ( get_template_directory() . '/inc/model_empresa_config.php' );

    /* 1 tela/load da marcação - ao clicar em Continuar na tela de Marcações */
    /* Verificando quem é o cliente e montando o JSON dos dados cadastrais. */
    
    if (isset($_POST['cpf'])) {
        $cliente_marcacao = $_POST['cpf'];
        $seExiste = verificarSeExiste($cliente_marcacao);
        if ($seExiste) {
            echo json_encode($seExiste);    
        } else {
            echo "false";
        }        
    }
       
    if (isset($_POST['marcar']) && $_POST['marcar']==1 ) {
        
        date_default_timezone_set('America/Bahia');
        $dataHoraMarcacao = date('Y-m-d H:i');
        $cpfMarcacao  = $_POST['dataCPF'];
        $cnpjMarcacao = $_SESSION['dados_empresa'][0]->cnpj;
        $valorMarcacao = $_POST['valor'];
        $tipoMarcacao = $_POST['tipoMarcacao'];
        
               
        $dadosMarcacao = [
            "cpf"  => $cpfMarcacao,
            'cnpj' => $cnpjMarcacao,
            'datahora' => $dataHoraMarcacao,
            'valor' => $valorMarcacao,
            'tipo' => $tipoMarcacao
        ];
                
        echo json_encode($dadosMarcacao);
  
    }
    
    if (isset($_POST['marcarConfere']) && $_POST['marcarConfere'] == 1 ) {
        
        $cpfMarcacao = $_POST['cpf'];
        $cnpjMarcacao =  $_POST['cnpj'];  
        $valorMarcacao = $_POST['valorMarcacao'];
        $datahora = $_POST['datahora'];
        $protocolo = 'teste';
        $tipo_marcacao = $_POST['tipoMarcacao'];
        
        $valorMarcacaoSemPonto  = str_replace('.', '', $valorMarcacao);
        $valorMarcacaoFormatado  = str_replace(',', '.', $valorMarcacaoSemPonto);

        $arrayLigacao = [
            'cpfCliente' => $cpfMarcacao,
            'cnpjEmpresa' => $cnpjMarcacao,
        ];
        
        $arrayMarcacao = [        
            'cnpjemp' => $cnpjMarcacao,
            'cpfcli' => $cpfMarcacao,
            'datamarcacao' => $datahora,
            'valormarcacao' => $valorMarcacaoFormatado,
            'protocolomarcacao' => $protocolo,
            'tipomarcacao' => $tipo_marcacao
        ];
       
        $marcarCartao = marcarCliente($arrayLigacao, $arrayMarcacao);
        echo "<br/>";

        if ($marcarCartao):
            
            $marcacoes = listarMarcacaoCliente($cpfMarcacao, $cnpjMarcacao);
            $qtdMarcacoes = count($marcacoes);
            
            $configEmpresa = listarConfiguracaoEmpresa($cnpjMarcacao);
            echo "<pre>";
            var_dump($qtdMarcacoes);
            echo "</pre>";
                                      
            
        endif;
        
        
    } 
    

?>