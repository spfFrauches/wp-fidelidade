<h3>
    <?= $resultadoCadastroCliente[0]->nome_completo; ?>
</h3>
 
CPF.: <?=  $cpf;  ?>
    
<br/><br/>
    
<ol class="list-group ">   
    <li class="list-group-item d-flex justify-content-between align-items-start">   
        <div class="ms-2 me-auto">   
            <div class="fw-bold">Total de Pontos disponiveis.: </div>   
        </div>
        <span class="badge bg-primary rounded-pill"> <?= $totalPontos ?></span>   
    </li>   
</ol> 

<?php 


?>
    
<p class='mt-2 mb-3' style='font-size:21px'>Detalhes</p>
    
<ol class="list-group list-group-numbered">   
    
    <?php foreach ($resutadoMarcacoes as $key1 => $value1) : ?>
        
    <li class="list-group-item d-flex justify-content-between align-items-start">   
        <div class="ms-2 me-auto">   
            Pontos em.: <?= date('d/m/Y H:i:s', strtotime($value1->datamarcacao)) ?> 
            <div style="font-size: 11px">
                Valor R$.: <?= $value1->valormarcacao ?> 
                |-> 
                <?= $value1->porcentagemPontos ?> 
                % para conversão em pontos   
            </div>   

        </div>
                
        <span class="badge <?= ($value1->tipomarcacao == 'retirada') ? "bg-danger" : "bg-success" ?>  rounded-pill">
            <?= $value1->pontos ?>
            <?= $value1->tipomarcacao ?>
        </span> 
                
    </li>   
        
    <?php endforeach; ?>
   
</ol>  

<br/><br/>
    
 
 
