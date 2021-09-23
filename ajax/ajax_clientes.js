$('#load_form_cadastroCliente').hide();
/* $('#load_termos_condicoes').hide(); */
$('#load_form_cadastroCliente_finalizar').hide();
$('#success-icon').hide();
$('#error-icon').hide();

var cpf = document.getElementById('cpf');
var cpfLabel = document.getElementById('cpf_label');

cpf.addEventListener("blur", function() {
  
    var xmlhttp = new XMLHttpRequest();   
    xmlhttp.open("POST", "../wp-content/themes/fidelidade/ajax/ajax_clientes.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("cpf="+cpf.value);
    
    xmlhttp.onreadystatechange = function() {
            
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "ja_existe") {
                cpf.style.border = "solid 1px #FF0000"; 
                cpfLabel.innerHTML = "CPF - já existe";
                cpfLabel.style.color = "red";
                var desativar = document.createAttribute("disabled");  
                document.getElementById("btnContinuarCadastroCliente").setAttributeNode(desativar); 
            } else {
                cpf.style.border = ""; 
                cpfLabel.style.color = "black"; 
                cpfLabel.innerHTML = "CPF";
                document.getElementById("btnContinuarCadastroCliente").removeAttribute("disabled");  
            }     
        }       
    };
    
}, true);

var email = document.getElementById('email');
var emailLabel = document.getElementById('email_label');

email.addEventListener("blur", function() {
  
    var xmlhttp = new XMLHttpRequest();   
    xmlhttp.open("POST", "../wp-content/themes/fidelidade/ajax/ajax_clientes.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("email="+email.value);
    
    xmlhttp.onreadystatechange = function() {
            
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "ja_existe") {
                email.style.border = "solid 1px #FF0000"; 
                emailLabel.innerHTML = "E-mail - já existe";
                emailLabel.style.color = "red";
                var desativar = document.createAttribute("disabled");  
                document.getElementById("btnContinuarCadastroCliente").setAttributeNode(desativar); 
            } else {
                email.style.border = ""; 
                emailLabel.style.color = "black"; 
                emailLabel.innerHTML = "E-mail";
                document.getElementById("btnContinuarCadastroCliente").removeAttribute("disabled");  
            }     
        }       
    };
    
}, true);

var telefone = document.getElementById('telefone');
var telefoneLabel = document.getElementById('telefone_label');

telefone.addEventListener("blur", function() {
  
    var xmlhttp = new XMLHttpRequest();   
    xmlhttp.open("POST", "../wp-content/themes/fidelidade/ajax/ajax_clientes.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("telefone="+telefone.value);
    
    xmlhttp.onreadystatechange = function() {
            
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "ja_existe") {
                telefone.style.border = "solid 1px #FF0000"; 
                telefoneLabel.innerHTML = "Telefone - já existe";
                telefoneLabel.style.color = "red";
                var desativar = document.createAttribute("disabled");  
                document.getElementById("btnContinuarCadastroCliente").setAttributeNode(desativar); 
            } else {
                telefone.style.border = ""; 
                telefoneLabel.style.color = "black"; 
                telefoneLabel.innerHTML = "Telefone";
                document.getElementById("btnContinuarCadastroCliente").removeAttribute("disabled");  
            }     
        }       
    };
    
}, true);


$('#btnContinuarCadastroClienteOLD').click(function() {
    
    if ($('#cpf').val() == '') {
        alert("O CPF deve ser preenhcido");
        return false
    } 
    
    if ($('#nome_completo').val() == '') {
        alert("Seu nome deve ser preenhcido");
        return false
    } 
    
    if ($('#email').val() == '') {
        alert("Seu e-mail deve ser preenhcido");
        return false
    } 
    
    $('#form_cadastroCliente').hide();
    $('#load_form_cadastroCliente').show();
     
    setTimeout(function(){
        $('#load_form_cadastroCliente').hide(); 
        $('#load_termos_condicoes').show();
    },1000);
      
    return false; // evita o reload do post http

});

$('#btnFinalizarCadastroCliente').click(function() {
    
    $('#load_form_cadastroCliente').hide();
    $('#load_termos_condicoes').hide(); 
    $('#load_form_cadastroCliente_finalizar').show();
    
    var dados = $('#formclientes').serialize();

    $.ajax({
        type: 'POST',
        url: '../wp-content/themes/fidelidade/ajax/ajax_clientes.php',
        async: true,
        data: dados,
        success: function(data) {

            $('.spinner-border').hide();
            
            if (data == 'jaExiste') {
                $('#msgFinalizado').html('Ops, esse cliente já esta cadastrado.');
                $('#error-icon').show();
            }
            if (data == 'cadastrado') {
                $('#msgFinalizado').html('Parabens, seu cadastro foi realizado. Aproveite');
                $('#success-icon').show();
            }
            if (data == 'erroAoInserirBanco') {
                $('#msgFinalizado').html('Ops, desculpe. Algum erro interno.');
                $('#error-icon').show();
            }
        } ,
        error: function() {
            alert("Ops, algum erro estranho ao gravar no banco de dados...");
            $('.load_form_cadastroCliente_finalizar').hide();
            return false;
        }
    });
    
    return false; // evita o reload do post http
    
});

var senha =  document.getElementById("senha_cliente");
var confirmar_senha = document.getElementById("senha_cliente_confirma");

confirmar_senha.addEventListener("blur", function() {
    
    console.log(senha.value);
    console.log(confirmar_senha.value);
    
    if (senha.value !== confirmar_senha.value) { 

        senha.style.border = "solid 1px #FF0000"; 
        confirmar_senha.style.border = "solid 1px #FF0000";
        var desativar = document.createAttribute("disabled");  

        document.getElementById("btnContinuarCadastroCliente").setAttributeNode(desativar);     
        document.getElementById("senhaCliente").innerHTML = "Senhas não conferem";
        document.getElementById("senhaClienteConfirmar").innerHTML = "digite senhas iguais";
        document.getElementById("senhaCliente").style.color = "red";
        document.getElementById("senhaClienteConfirmar").style.color = "red"; 

    } else {
        document.getElementById("senhaCliente").innerHTML = "Senha";
        document.getElementById("senhaClienteConfirmar").innerHTML = "Confirmar senha";
        senha.style.border = ""; 
        confirmar_senha.style.border = "";
        document.getElementById("senhaCliente").style.color = "black";
        document.getElementById("senhaClienteConfirmar").style.color = "black"; 
        document.getElementById("btnContinuarCadastroCliente").removeAttribute("disabled");  
    }   
}, true);