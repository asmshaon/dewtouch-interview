<div id="message1">

    <?php echo $this->Form->create('Type', array(
            'id' => 'form_type',
            'type' => 'file',
            'class' => '',
            'method' => 'POST',
            'autocomplete' => 'off',
            'url' => array('controller' => 'Format', 'action' => 'q1_selection'),
            'action' => 'q1_selection',
            'inputDefaults' => array(
                'label' => false,
                'div' => false,
                'type' => 'text',
                'required' => false
            )
        )
    )
    ?>

    <?php echo __("Hi, please choose a type below:")?>
    <br><br>

    <?php $options_new = array(
        'Type1' => __('<div data-toggle="tooltip" data-html="true" class="radio-label" title="<ul><li>Test description 1</li></ul>">Type1</div>'),
        'Type2' => __('<div data-toggle="tooltip" data-html="true" class="radio-label" title="<ul><li>Test description 1</li><li>Test description 2</li></ul>">Type2</div>')
    ); ?>

    <?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>

    <hr>
    <?php echo $this->Form->button('Save', array(
        'type' => 'submit',
        'class' => 'btn btn-primary'
    )); ?>

    <?php echo $this->Form->end();?>

</div>

<style>
    /*TODO: move in page css to stylesheet file*/

    #message1 .radio{
        vertical-align: top;
        font-size: 13px;
        margin-left: 20px;
        margin-bottom: 10px;
    }

    .radio-label {
        color:blue;width: 50px;
    }

    .control-label{
        font-weight: bold;
    }

    .wrap {
        white-space: pre-wrap;
    }

    .tooltip-inner {
        background-color: #ffffff; color: #000000; border: solid 1px #c2c2c2
    }

    .tooltip.top .tooltip-arrow{
        border-top-color: #c2c2c2;
    }

    .tooltip.right .tooltip-arrow {
        border-right-color: #c2c2c2;
    }

    .tooltip.left .tooltip-arrow {
        border-left-color: #c2c2c2;
    }

    .tooltip.bottom .tooltip-arrow {
        border-bottom-color: #c2c2c2;
    }
</style>

<?php $this->start('script_own')?>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({
            placement: 'right'
        });
    })
</script>

<?php $this->end()?>