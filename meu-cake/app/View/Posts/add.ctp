<!-- add.ctp -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Adicionar Post</h2>
                </div>
                <div class="panel-body">

                    <?php echo $this->Form->create('Post', ['url' => ['action' => 'add'], 'class' => 'form-horizontal']); ?>
                    
                    <div class="form-group">
                        <?php
                        echo $this->Form->input('title', [
                            'label' => ['text' => 'Título', 'class' => 'col-sm-2 control-label'],
                            'class' => 'form-control input-lg', // Tamanho maior para o título
                            'placeholder' => 'Digite o título',
                            'type' => 'text'
                        ]);
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        echo $this->Form->input('body', [
                            'label' => ['text' => 'Conteúdo', 'class' => 'col-sm-2 control-label'],
                            'class' => 'form-control input-lg', // Tamanho maior para o conteúdo
                            'placeholder' => 'Digite o conteúdo',
                            'type' => 'text',
                            'rows' => '4' // Ajuste da altura
                        ]);
                        ?>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="checkbox">
                                <label>
                                    <?php echo $this->Form->input('is_active', ['type' => 'checkbox', 'label' => 'Ativo', 'hiddenField' => '0']); ?>
                                    
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo $this->Form->button('Salvar', ['class' => 'btn btn-primary']); ?>
                        </div>
                    </div>

                    <?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
