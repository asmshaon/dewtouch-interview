<div class="row-fluid">
    <div class="alert alert-info">
        <h3>Data Migration Wizard</h3>
        <p>Please upload sample xlsx file or download <?php echo $this->Html->link('<i class="icon-share"></i> XLSX file', '/files/migration_sample_1.xlsx', array('escape' => false)); ?> and test data migration into multiple table</p>
    </div>

    <?php
    echo $this->Form->create('FileUpload', array('type' => 'file'));
    echo $this->Form->input('file', array('label' => 'Upload data file', 'type' => 'file', 'accept' => '.xlsx'));
    echo $this->Form->submit('Migrate Data', array('class' => 'btn btn-primary'));
    echo $this->Form->end();
    ?>
</div>
