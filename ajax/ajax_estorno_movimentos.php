<?php

include '../../../../wp-load.php';
require '../models/model_estorno_movimento.php';
require '../models/model_marcacao.php';

$dadosDaMarcacao = listarMovimentoMarcacao($_POST['idmarcacao']);
$verificaLimeteEstorno = limitePara24hEstorno($dadosDaMarcacao[0]->datamarcacao);

?>

<?php if ($verificaLimeteEstorno == true): ?>

<form method="post" action="" id="formEstornoMovimento"></form>

<input type="hidden" name="idmarcacao" value="<?= $_POST['idmarcacao'] ?>" form="formEstornoMovimento">
<input type="hidden" name="cpfcliente" value="<?= $_POST['cpfcliente'] ?>" form="formEstornoMovimento">
<input type="hidden" name="cnpjemp" value="<?= $_POST['cnpjemp'] ?>" form="formEstornoMovimento">
<input type="hidden" name="estornar" value="sim" form="formEstornoMovimento" />

<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">
        Motivo do estorno
    </label>
    <textarea class="form-control" name="obsestorno" rows="3" required form="formEstornoMovimento"></textarea>
    <br/><br/>
    <button type="submit" class="btn btn-primary text-right" form="formEstornoMovimento" >Estornar</button>
</div>
   
<?php endif; ?>

<?php if ($verificaLimeteEstorno == false): ?>

<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Tempo excedido</h4>
    <p>
        Ops. Desculpe! Não é possivel estornar movimentos que
        foi lançado há mais de 24 horas.
    </p>
    <hr>
    <p class="mb-0">Operação não permitida</p>
</div>

<?php endif; ?>