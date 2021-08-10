<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Cadastro de Desenvolvedores</h4>
        </div>
        
        <form id="form" class="form" role="form" action="<?php echo BASE_URL ?>/register" method="post">
            <div class="card-body">
                <div class="row"> 

                    <div class="col-5">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= !empty($data[0]['Nome']) ? $data[0]['Nome'] : ""; ?>">
                    </div>

                    <div class="col-4">
                        <label for="nascimento" class="form-label">Nascimento</label>
                        <input type="date" class="form-control" name="nascimento" id="nascimento" value="<?= !empty($data[0]['Data']) ? $data[0]['Data'] : ""; ?>">
                    </div>

                    <div class="col-2">
                        <label for="sexo" class="form-label">Sexo</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" value="M" id="sexo" <?= !empty($data[0]['Sexo']) && $data[0]['Sexo'] == "Masculino" ? "checked" : "";  ?>> 
                            <label class="form-check-label" for="sexo">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" value="F" id="sexo2" <?= !empty($data[0]['Sexo']) && $data[0]['Sexo'] == "Feminino" ? "checked" : "";  ?>>
                            <label class="form-check-label" for="sexo2">Feminino</label>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-5">
                        <label for="hobby">Hobby</label>
                        <input type="text" class="form-control" name="hobby" id="hobby" value="<?= !empty($data[0]['hobby']) ? $data[0]['hobby'] : ""; ?>">
                    </div>
 

                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-circle-down"></i> Salvar</button>
                <a href="<?php echo BASE_URL ?>"  class="btn btn-sm btn-outline-dark"> Voltar</a>
            </div>
        </form>
    </div>
</div>