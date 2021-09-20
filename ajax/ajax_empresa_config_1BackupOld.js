$(".confMarcacao").hide();
$("#percentualHelp").hide();

    
/* var itemSelecionado = $("#tipoMarcacao option:selected"); */
var itemSelecionado = $('#tipoMarcacao').val();

if (itemSelecionado == 'cash') {
    $(".confMarcacao").show();
}
    
$('#tipoMarcacao').change(function () {
    if ( $(this).val() == "cash" ) {
        $(".confMarcacao").show();
    }
    if ( $(this).val() == "none" ) {
        $(".confMarcacao").hide();
    }
});

$('#percentual').change(function () {
    if ( $(this).val() != "0" ) {
        $('#percentual').css("border", "");
        $("#percentualHelp").hide();
    }
});

$('.btnSalvarAction').click(function(){
   
    var tipoMarcacao = $('#tipoMarcacao').val();
    var percentual = $('#percentual').val();
       
    if (tipoMarcacao == "cash") {
        
        if (percentual == "0") {
            $('#percentual').css("border", "1px solid red");
            $("#percentualHelp").show();
            $("#percentualHelp").css('color', 'red');
            return false;      
        } else {
            $('#percentual').css("border", "");
            $("#percentualHelp").hide();
        }
    
    }
        
    var xmlhttp = new XMLHttpRequest();   
    xmlhttp.open("POST", "../wp-content/themes/fidelidade/ajax/ajax_empresa_config.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("tipo_marcacao="+tipoMarcacao+"&percentual="+percentual);
    
    xmlhttp.onreadystatechange = function() {
         
        if (this.readyState == 4 && this.status == 200) {
            console.log (this.responseText);
            location.reload();
        }
        
        
    }; 
    
});
    


