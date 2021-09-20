<!doctype html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dist/css/bootstrap.css" >
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dist/css/product.css" >
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dist/font-awesome-4.7.0/css/font-awesome.css" >   
        <script src="<?php bloginfo('template_url') ?>/dist/js/jquery-3.5.1.min.js" ></script>
        <title>Fidelidade</title>
         <?php wp_head(); ?>    
    </head>
    
    <body>
        <!--
        <nav class="site-header sticky-top py-1">
            <div class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2" href="#" aria-label="Product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
                </a>
                <a class="py-2 d-none d-md-inline-block" href="<?php bloginfo('home') ?>">Home</a>
                <a class="py-2 d-none d-md-inline-block" href="<?php bloginfo('url') ?>/como-funciona/">Como Funciona</a>
                <a class="py-2 d-none d-md-inline-block" href="<?php bloginfo('url') ?>/precos/">Preços</a>
                <a class="py-2 d-none d-md-inline-block" href="#">Quem somos</a>
                <a target="_blank" class="py-2 d-none d-md-inline-block" href="<?php bloginfo('home') ?>/painel">Painel</a>
            </div>
        </nav>
        -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">            
            <div class="container-fluid">  
                <a class="navbar-brand" href="#"><i class="fa fa-fire fa-2x" aria-hidden="true"></i></a>            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php bloginfo('home') ?>">Home</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Planos e Assinaturas</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">&nbsp;</a>
                            </li>
                           
                            <li class="nav-item">
                                <a  href="<?php bloginfo('home') ?>/painel" class="btn btn-outline-dark">Entrar</a>
                            </li>
                        </ul>
                    </span>
                </div>                
            </div>           
        </nav>

