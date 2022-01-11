<div class="row">
    <div class="col-lg-12">
        <h2 class="pb-2 border-bottom">
            <?= $cliente[0]->nome_completo ?>
        </h2>
        <ol class="list-group ">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Saldo de pontos</div>
              </div>
              <span class="badge bg-primary rounded-pill"><?= $saldoPontosClientes[0]->saldoPontos ?></span>
            </li>           
        </ol>  
    </div>
    <br/>
    <div class="col-lg-12 p-3">
        
        <?php if ($saldoPontosClientes[0]->saldoPontos <  $brindePontosMinimos[0]->pontosMinimos ):  ?>
        
        <div class="alert alert-danger" role="alert">           
            Saldo insuficiente para resgate
        </div>
        
        <?php endif; ?>
        
        <h5 class="pb-2 border-bottom">
            Qual Brinde ?
        </h5>     
    </div>
</div>

<form action="<?= get_bloginfo('url') ?>/painel-empresa-processar-resgate-pontos/" method="post" id="formResgateBrinde" name="formResgateBrinde"></form>

<?php foreach ($beneficios as $key => $value) : ?>   
<div class="form-check">
    <div class="row">
        
        <div class="col-md-2 p-5">
            <input form="formResgateBrinde" class="form-check-input" value="<?= $value->qtdpontos ?>" type="radio" name="pontosGastos" <?= ($saldoPontosClientes[0]->saldoPontos <  $value->qtdpontos) ? "disabled" : "" ?> >
            <input form="formResgateBrinde" type="hidden" value="<?= $cliente[0]->cpf  ?>" name='cpfCliente' >
        </div>
        
        <div class="col-md-10 p-2">
            <img src="<?= $value->imgsrcbeneficio ?>" class="img-thumbnail" width="100px" >           
            <label class="form-check-label">
                <?= $value->descricao ?>
            </label>           
            <span class="badge rounded-pill <?= ($saldoPontosClientes[0]->saldoPontos <  $value->qtdpontos) ? "bg-danger" : "bg-success" ?>"><?= $value->qtdpontos  ?> <?= ($saldoPontosClientes[0]->saldoPontos <  $value->qtdpontos) ? "(sem saldo)" : "" ?></span>
        </div>
        
    </div>     
</div>
<?php endforeach; ?>

<div class="d-grid gap-1 col-6">
  <button form="formResgateBrinde" class="btn btn-primary" type="submit" <?= ($saldoPontosClientes[0]->saldoPontos <  $brindePontosMinimos[0]->pontosMinimos) ? "disabled" : "" ?>> Resgatar Brinde </button>
</div>

