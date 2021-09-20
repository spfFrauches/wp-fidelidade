<?php

function verificarSeCadastroViaSite()
{    
    if (isset($_POST['tipo_cadastro']) && $_POST['tipo_cadastro'] == 'site' ) {
        return true;
    } else {
        return false;
    }  
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
