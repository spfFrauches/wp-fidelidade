<?php

function verificarSeCadastroViaSite()
{    
    if (isset($_POST['tipo_cadastro']) && $_POST['tipo_cadastro'] == 'site' ) {
        return true;
    } else {
        return false;
    }  
}

function cadastroClienteViaSite() {
    
    if(!empty($_FILES['selfcliente'])):      
        $targetDir = "./wp-content/themes/fidelidade/clientes_selfie/";    
        $dir = get_bloginfo('template_url')."/clientes_selfie/".basename($_FILES["selfcliente"]["name"]);
        $target_file = $targetDir . basename($_FILES["selfcliente"]["name"]);             
        move_uploaded_file ($_FILES['selfcliente']['tmp_name'], $target_file);
    endif;

    $arrayCliente = [
        'nome_completo' => $_POST['nome_completo'],
        'cpf' => $_POST['cpf_cliente'],
        'data_nascimento' =>  $_POST['data_nascimento'],
        'email' => $_POST['email'],
        'fone' => $_POST['telefone'],
        'senha' =>  $_POST['senha'],
        'termos_uso' => 'SIM',
        'src_selfie' => $dir,
        'path_selfie' => $target_file
    ];
        
    if (insertDBCliente($arrayCliente)):
        return true;
    else:
        return false;
    endif;

    
}


function swalMsgAlertaClienteExcluido($msg) {    
    echo "<script>"; 
    echo "Swal.fire(
            'Operação realizada',
            '$msg',
            'success'
        )"; 
    echo "</script>";
    
}

function swalMsgAlertaClienteCadastrado($msg) {
    
    echo "<script>"; 
    echo "Swal.fire(
            'Operação realizada',
            '$msg',
            'success'
        )"; 
    echo "</script>";
    
}

function  swalMsgAlertaClienteNaoExcluido($msg) {
    echo "<br/>";
    echo '<div class="alert alert-warning" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo "$msg";
    echo '</div>';
}

function  swalMsgAlertaClienteErro($msg) {
    echo "<script>"; 
    echo "Swal.fire(
            'Ops',
            '$msg',
            'warning'
        )"; 
    echo "</script>";
}
  
?>
