$("body").on("click",".modaldetalhes",function () {
    
     $.ajax({ 
            method: "POST",
            url: "../wp-content/themes/fidelidade/ajax/painelempresa-meusclientes.php",
            data: { cpfcliente: $(this).data("modal"), cnpjempresa: $(this).data("cnpj")  , funcao: 'carregarDadosCliente' }
        }).done(function( result ) {
            
            $(".modal-body.detalhescliente").html(result); 
            
        });      
   
});

