function verificaSeExisteCNPJ() {
    
    var cnpj = document.getElementById('cnpj').value;
    var xmlhttp = new XMLHttpRequest(); 
    
    xmlhttp.open("POST", "../wp-content/themes/fidelidade/ajax/ajax_empresas.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("cnpj="+cnpj);
    
    xmlhttp.onreadystatechange = function() {
            
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "inexistente") {
                document.getElementById("cnpj").style.border = ""; 
                document.getElementById("label_cnpj").style.color = "black"; 
                document.getElementById("label_cnpj").innerHTML = "CNPJ";
                document.getElementById("btnContinuar").removeAttribute("disabled");  
            } else {
                document.getElementById("cnpj").style.border = "solid 1px #FF0000"; 
                document.getElementById("label_cnpj").innerHTML = "CNPJ - já existe";
                document.getElementById("label_cnpj").style.color = "red";
                var desativar = document.createAttribute("disabled");  
                document.getElementById("btnContinuar").setAttributeNode(desativar); 
            }     
        }       
    };     
}

function verificaSeExisteEmail(){
    
    var email = document.getElementById('email').value;
    var xmlhttp = new XMLHttpRequest(); 
    
    xmlhttp.open("POST", "../wp-content/themes/fidelidade/ajax/ajax_empresas.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("email="+email);
    
    xmlhttp.onreadystatechange = function() {
            
        if (this.readyState == 4 && this.status == 200) {
            
            if (this.responseText == "inexistente") {
                document.getElementById("email").style.border = ""; 
                document.getElementById("label_email").style.color = "black"; 
                document.getElementById("label_email").innerHTML = "E-mail";
                document.getElementById("btnContinuar").removeAttribute("disabled");  
            } else {
                document.getElementById("email").style.border = "solid 1px #FF0000"; 
                document.getElementById("label_email").innerHTML = "E-mail - já existe";
                document.getElementById("label_email").style.color = "red";
                
                var desativar = document.createAttribute("disabled");  
                document.getElementById("btnContinuar").setAttributeNode(desativar);
                
            }     
        }       
    };        
}


function confirmarSenha() {
    
    var senha =  document.getElementById("password").value;
    var confirmar_senha = document.getElementById("password_confirma").value;
    
    if (senha !== confirmar_senha) {  
        document.getElementById("password").style.border = "solid 1px #FF0000"; 
        document.getElementById("password_confirma").style.border = "solid 1px #FF0000";
        var desativar = document.createAttribute("disabled");  
        document.getElementById("btnContinuar").setAttributeNode(desativar);     
        document.getElementById("label_senha").innerHTML = "Senhas não conferem";
        document.getElementById("label_senha_confirma").innerHTML = "digite senhas iguais";
        document.getElementById("label_senha").style.color = "red";
        document.getElementById("label_senha_confirma").style.color = "red";     
    } else {
        document.getElementById("btnContinuar").removeAttribute("disabled"); 
         document.getElementById("password").style.border = ""; 
        document.getElementById("password_confirma").style.border = "";
    }   
}
