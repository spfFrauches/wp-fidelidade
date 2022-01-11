        
        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Fidelidade Web 2021. Todos os direitos reservados.</div>

                    <a href="#!">Politica de privacidade</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Termos</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>

        <!-- Feedback modal-->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Entrar no Painel</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <form>
                            <div class="form-floating mb-4">
                                <input class="form-control" id="inputName" type="text" placeholder="Enter your name..." />
                                <label for="inputName">CNPJ / CPF</label>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input class="form-control" id="inputPhone" type="tel" placeholder="(123) 456-7890" />
                                <label for="inputPhone">Senha</label>
                            </div>
                            
                            <div class="d-grid"><button class="btn btn-primary rounded-pill py-3" type="submit">Entrar</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php bloginfo('template_url') ?>/dist/js/jquery-3.5.1.min.js" ></script>
        <script src="<?php bloginfo('template_url') ?>/dist/4/js/scripts.js"></script>
        
        <script src="<?php bloginfo('template_url') ?>/dist/Mask/dist/jquery.mask.js"></script>
        <script src="<?php bloginfo('template_url') ?>/dist/js/form-validation.js"></script>   
    </body>
</html>



