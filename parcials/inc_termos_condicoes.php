<h3>Termos e condições</h3>
<p><b>1: Lorem ipsum dolor sit amet, consectetur adipiscing elit</b></p>
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
</p>
<br/>
<p><b>2: Sed ut perspiciatis unde omnis iste</b></p>
<p>
    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti 
    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, 
    similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. 
    Et harum quidem rerum facilis est et expedita distinctio
</p>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="termos_contrato" required="" name="termos_contrato" value="SIM">
    <label class="form-check-label">Eu aceito e concordo com o termos e condições do uso.</label>
</div>

<button class="btn btn-warning btn-lg btn-block" onclick="goBack()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar </button>
<br/>
<input type="hidden" name="finalizarCadastroCliente" value="1" />

<button class="btn btn-primary btn-lg btn-block" id="btnFinalizarCadastroCliente" type="submit">Finalizar <i class="fa fa-chevron-right" aria-hidden="true"></i></button>

<script>
    
    function goBack() {
        $('#load_form_cadastroCliente').show();
        $('#load_termos_condicoes').hide();
         setTimeout(function(){
            $('#load_form_cadastroCliente').hide(); 
            $('#form_cadastroCliente').show();
        },700);
    }

</script>