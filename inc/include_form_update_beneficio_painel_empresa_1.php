<div class="row">

    <div class="col-lg-3">
        <img src="<?= $value->imgsrcbeneficio ?>" width="150px" />
    </div>

    <div class="col-lg-9">

        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $value->descricao ?></h5>
                    <small><?= $value->qtdpontos ?> pts</small>
                </div>
                <p class="mb-1">
                    <?= $value->obsadicional ?>
                </p>
                <small>Status.: <?= $value->status ?></small>
            </a>
        </div>

        <ul class="list-group" style="font-size: 15px">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Cadastrado em
                <span class="badge bg-secondary rounded-pill"><?=  date('d/m/Y H:i', strtotime($value->dtcadastro )) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Valido até
                <span class="badge bg-secondary rounded-pill">
                    <?php if($value->dtvalidade == '0000-00-00 00:00:00'): ?>
                      <?=  "Tempo indeterminado" ?> 
                    <?php else :?>
                        <?=  date('d/m/Y H:i', strtotime($value->dtvalidade )) ?>
                    <?php endif ;?>
                </span>
            </li>
        </ul>
    </div>                                           
</div>

<div class="row mt-5">
    
    <div class="col-lg-12">
        <hr/>
        <p style="font-size: 18px">Alteração/Manutenção</p>
        <hr/>
    </div>
    
    <form id="form_update_beneficios" action="" method="post"></form>
        
    <div class="col-lg-6 mt-3">
        <label class="form-label">Valor em Pontos</label>
        <input type="text" class="form-control dinheiro" name="valorpontos" value="<?= $value->qtdpontos ?>" form="form_update_beneficios" >
    </div>
    <div class="col-lg-6 mt-3">
        <label class="form-label">Data de Validade</label>
        <input type="date" class="form-control" name="dtvalidade" form="form_update_beneficios" >
    </div>
    
    <div class="col-lg-6 mt-3">
        <label class="form-label">Status</label>
        <select class="form-select" aria-label=".form-select-sm example" name="status" form="form_update_beneficios">
            <option value="ativo" selected>Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
    </div>
    
    <input type="hidden" nome="acao" value="update"/>
           
</div>

<div class="row mt-5 ">
    <div class="col-lg-12 d-flex justify-content-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button form="form_update_beneficios" type="submit" class="btn btn-primary" data-bs-dismiss="modal" style="margin-left: 10px">Salvar</button>
    </div>
</div>

<script>

    $('.dinheiro').mask('#.##0,00', {reverse: true});

</script>


                                        

