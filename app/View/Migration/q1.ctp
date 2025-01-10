<div class="row-fluid">
    <div class="alert alert-info">
        <h3>Data Migration Wizard</h3>
        <p>Please upload sample xlsx file or download <?php echo $this->Html->link('<i class="icon-share"></i> XLSX file', '/files/migration_sample_1.xlsx', array('escape' => false)); ?>, to test data migration into multiple DB table</p>
    </div>

    <?php
    echo $this->Form->create('FileUpload', array('type' => 'file'));
    echo $this->Form->input('file', array('label' => 'Upload data file', 'type' => 'file', 'accept' => '.xlsx'));
    ?>
    <br/>
    <?php
    echo $this->Form->submit('Migrate Data', array('class' => 'btn btn-primary'));
    echo $this->Form->end();
    ?>
</div>

<?php $this->start('script_own')?>
<script>
    $(document).ready(function(){
        $('#FileUploadQ1Form').submit(function () {
            $("input[type='submit']", this)
                .val("Please Wait...")
                .attr('disabled', 'disabled');

            return true;
        });
    })
</script>
<?php $this->end()?>