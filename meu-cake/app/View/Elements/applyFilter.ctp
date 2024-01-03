<form class="form-inline" method="post" >
    <?php echo $this->Form->create('Post', ['type' => 'post','id'=>'myform']); ?>
    <div class="form-group">
        <?php echo $this->Form->input('content', ['class' => 'form-control', 'placeholder' => 'Digite a data de criação', 'type' => 'text', 'label' => 'Título/Conteúdo', 'empty' => true]); ?>
    </div>
    <div class="form-group">
        
        <?php echo $this->Form->input('create', ['class' => 'form-control datepicker', 'placeholder' => 'Digite a data de modificação', 'type' => 'text', 'label' => 'data de criação', 'empty' => true]); ?>
    </div>
    <div class="form-group">
        
        <?php echo $this->Form->input('end', ['class' => 'form-control datepicker', 'placeholder' => 'Digite o título', 'type' => 'text', 'label' => 'data de modificação', 'empty' => true]); ?>
    </div>
    <div class="form-group">
        <?php
        $options = ['' => '', '1' => 'Ativo', '0' => 'Inativo'];
        echo $this->Form->select('is_active', $options, ['class' => 'form-control']);
        ?>
    </div>
    <?php
    echo $this->Form->button('Buscar', ['class' => 'btn btn-primary mt-3']);
    echo $this->Html->link('Limpar', ['?' => ['reset' => true]], ['class' => 'btn btn-primary mt-3']);
    echo $this->Form->end();
    ?>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
       $(function () {
        $(".datepicker").datepicker({
          dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });

        
        $("#myForm").submit(function () {
            $(".datepicker").each(function () {
                var selectedDate = $(this).datepicker("getDate");
                if (selectedDate !== null) {
                    var formattedDate = $.datepicker.formatDate("yy-mm-dd", selectedDate);
                    $(this).val(formattedDate);
                }
            });
        });
    });
</script>

</form>

