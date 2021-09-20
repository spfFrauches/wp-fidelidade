<?php 
    /* Template Name: Site Home */
    get_header('site');
?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            
            <section class="jumbotron text-center" style="background-color:#b9b9b9; height: 400px">
                <div class="container">
                    <h1 class="text-black-50">Fidelidade Web</h1>
                    <br/>
                    <p class="lead text-muted text-black-50">
                        Crie o cartão fidelidade Web para seus cliente em apenas 2 minutos. 
                    </p>
                    <br/>
                    <p>
                        <a href="<?= get_bloginfo('url') ?>/novo-cliente" class="btn btn-primary my-2">Para Clientes</a>
                        <a href="<?= get_bloginfo('url') ?>/nova-empresa/" class="btn btn-secondary my-2">Para empresas</a>
                    </p>
                </div>
            </section>
        
        </div>
        <div class="carousel-item">
            
            <section class="jumbotron text-center" style="background-color:#b9b9b9; height: 400px">
                <div class="container">
                    <h1 class="text-black-50">Mais engajamento</h1>
                    <br/>
                    <p class="lead text-muted text-black-50">
                        Fidelize seu cliente com cashback, campanhas de brindes e prêmios.
                    </p>
                    <br/>
                    <p>
                        <a href="<?= get_bloginfo('url') ?>/novo-cliente" class="btn btn-primary my-2">Para Clientes</a>
                        <a href="<?= get_bloginfo('url') ?>/nova-empresa/" class="btn btn-secondary my-2">Para empresas</a>

                    </p>
                </div>
            </section>
            
        </div>
        <div class="carousel-item">
            
            <section class="jumbotron text-center" style="background-color:#b9b9b9; height: 400px">
                <div class="container">
                    <h1 class="text-black-50">Fidelidade Web</h1>
                    <br/>
                    <p class="lead text-muted text-black-50">
                        Faça-os voltar sempre!
                        Rápido, prático, simples e seguro, veja!
                    </p>
                    <br/>
                    <p>
                        <a href="<?= get_bloginfo('url') ?>/novo-cliente" class="btn btn-primary my-2">Para Clientes</a>
                        <a href="<?= get_bloginfo('url') ?>/nova-empresa/" class="btn btn-secondary my-2">Para empresas</a>

                    </p>
                </div>
            </section>
            
        </div>
    </div>
    
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container-fluid">         
    <div class="row featurette">
        <div class="col-lg-7" style="padding-top: 100px; padding-left: 50px">
            <h2 class="featurette-heading">
                Modernize seu cartão fidelidade
            </h2>
            <h2 class="featurette-heading">
                <span class="text-muted">Crie e compartilhe com seus clientes.</span>
            </h2>
            <p class="lead">Para criar seu cartão fidelidade web é muito simples, faça seu cadastro, configure como será seu cartão e pronto! Em apenas 2 minutos você tem tudo pronto!</p>
        </div>

        <div class="col-md-5 text-right p-5">
            <img class="img-fluid" src="<?= get_bloginfo('template_url')  ?>/img/img_exemple.png">
        </div>
    </div>
    
</div>

<div class="container">  
    <hr/>
</div>

<div class="container-fluid">  
    
    <div class="row featurette">
        
        <div class="col-lg-5 text-left p-5">
            <img class="img-fluid" src="<?= get_bloginfo('template_url')  ?>/img/img_exemple.png">
        </div>
        
        <div class="col-lg-7" style="padding-top: 100px; padding-left: 50px">
            <h2 class="featurette-heading">
                Acesso fácil e rapido para seus clientes
            </h2>
            <h2 class="featurette-heading">
                <span class="text-muted">Seus clientes vão adorar!</span>
            </h2>
            <p class="lead">
                Com o cartão fidelidade web eles poderão acompanhar as marcações em seus cartões e conferir os brindes e promoções.
                Agora ele não corre o risco de perder o cartão, está tudo na web com acesso nas palmas de suas mãos.
            </p>
        </div>
        
    </div>
    
</div>

<?php get_footer('site') ?>

