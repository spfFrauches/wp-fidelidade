<?php

define ("NOME_APLICACAO", 'Webi Club Fidelidade');

function checkLogadoEmpresa()
{
    if ($_SESSION['login_painel'] != 'empresa'):
        $url = get_bloginfo('url')."/login";
        header("Location:$url");
        exit("A sessão foi expirada ou é invalida");
    endif; 
}

