<?php

use Cake\Core\Configure;
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('School Setup Element'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New School Setup') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New  School Setup Element') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($softSchoolSetupElement, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('TBL30_ELEMENT_TYPE', array('label' => 'Element Type',
                            'options' => Configure::read('element_types'), 'onchange' => "LoadData(this);"));
                        ?>
                        <div class="form-group input select" id = "campus-select">
                            <label for="tbl30-type" class="col-sm-3 control-label text-right">Campus Type</label>
                            <div id="container_TBL30_ELEMENT_PARENT" class="col-sm-9 ">
                                <select name = "TBL30_ELEMENT_PARENT" id ="tbl30-element-parent" class="form-control">
                                </select>
                            </div>	
                        </div>

                        <div class="form-group input select" id ="shift-select">
                            <label for="tbl30-type" class="col-sm-3 control-label text-right">Shift Type</label>
                            <div id="container_TBL30_ELEMENT_PARENT" class="col-sm-9 ">
                                <select name = "TBL30_ELEMENT_PARENT" id ="tbl30-element-parent-medium" class="form-control">
                                </select>
                            </div>	
                        </div>
                        <?php
                        echo $this->Form->input('TBL30_ELEMENT_DATA', array('label' => 'Element data'));
                        // echo $this->Form->input('TBL30_ELEMENT_PARENT', array('label' => 'Element Parent'));
                        echo $this->Form->input('TBL30_STATUS', ['label' => 'Status', 'options' => Configure::read('status_options')]);
                        // echo $this->Form->input('TBL30_SYSTEM_REPORT_DATE', array('empty' => true, 'default' => ''));
                        ?> 
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>

        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<script>
    var root = '<?php echo Configure::read('project_root') ?>';
    var controller = 'SchoolSetupElement';
    var action = 'ajax';
    function LoadData() {

        $("#tbl30-element-parent").html("");

        if ($("#tbl30-element-type").val() == "campus") {

            $("#campus-select").hide();
            $("#shift-select").hide();
        }

        if ($("#tbl30-element-type").val() == "medium")
        {
            $("#campus-select").show();
            $("#shift-select").show();
            var elem_type = "medium";
            var items = "";
            $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type, function (data) {

                $('#tbl30-element-parent').append('<option value="select">Select</option>');
                $.each(data, function (index, item)
                {
                    console.log(item);
                    $('#tbl30-element-parent').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');

                    // console.log(items);
                });

            });

            $('#tbl30-element-parent').change(function () {
                $("#tbl30-element-parent-medium").html("");
                var campus_id = $('#tbl30-element-parent :selected').val();
                //console.log(campus_id);
                var elem_type = 'campus_child';
                $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type + "/" + campus_id, function (data) {

                    $.each(data, function (index, item)
                    {
                        $('#tbl30-element-parent-medium').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');

                    });
                });
            });
        }
        if ($("#tbl30-element-type").val() == "shift")
        {
            $("#shift-select").hide();
            $("#campus-select").show();
            var elem_type = "shift";
            var items = "";
            $('#tbl30-element-parent').append('<option value="select">Select</option>');
            $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type, function (data) {

                $.each(data, function (index, item)
                {
                    $('#tbl30-element-parent').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');

                });
            });
        } else {

            $("#tbl30-element-parent").html("");

        }
    }



</script>

