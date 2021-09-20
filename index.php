<?php get_header(); ?>
        
<form class="form-signin" action="<?= bloginfo('url'); ?>/painel/" method="post">

        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">
                Fidelidade
            </h1>
            <p>
                <code>Acesso ao cartão fidelidade web</code> pseudo-element. 
                <a href="#">
                    Works in latest Chrome, Safari, Firefox, and IE 10/11 (prefixed).
                </a>
            </p>
        </div>

        <div class="form-label-group">
            <input type="email" class="form-control" placeholder="Email address" required autofocus>
            <label>Login de Acesso</label>
        </div>

        <div class="form-label-group">
            <input type="password" class="form-control" placeholder="Password" required>
            <label>Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
    
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sair</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>

    </form>

<?php get_footer(); ?>