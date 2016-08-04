<?php

use Cake\Core\Configure;

?>
<div class="page-bar" xmlns="http://www.w3.org/1999/html">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Class Info'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Class Info') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Class Info') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($classInfo, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">

                    <div class="col-md-6 col-md-offset-3">

                        <div class="form-group input select">
                            <label for="campus-type" class="col-sm-3 control-label text-right">Campus Type</label>

                            <div id="container-campus-select" class="col-sm-9">
                                <select name="class_campus" class="form-control" id="campus-select">
                                </select>
                            </div>
                        </div>
                        <div class="form-group input select">
                            <label for="shift-select" class="col-sm-3 control-label text-right">Shift Type</label>

                            <div id="container-shift-select" class="col-sm-9 ">
                                <select name="class_shift_info" id="shift-select"
                                        class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group input select">
                            <label for="medium-select" class="col-sm-3 control-label text-right">Medium Type</label>

                            <div id="container-medium-select" class="col-sm-9 ">
                                <select name="class_medium" id="medium-select"
                                        class="form-control">
                                </select>
                            </div>
                        </div>
                        <?php
                        // echo/ $this->Form->input('class_campus', ['class' => 'form-control input select campus-select', 'id' => 'campus-select']);
                        // echo $this->Form->input('class_shift_info', ['class' => 'form-control shift-select']);
                        //echo $this->Form->input('class_medium', ['class' => 'form-control medium-select']);
                        echo $this->Form->input('class_name', ['options' => $class_name, 'empty' => __('Select')]);
                        echo $this->Form->input('teacher_id', ['options' => $teacherBasic, 'empty' => __('Select')]);
                        echo $this->Form->input('class_start_date', ['type' => 'text',
                            'class' => 'form-control date date-picker ', 'data-date' => '', 'data-date-format' => 'dd-mm-yyyy',
                            'data-date-viewmode' => 'years']);
                        echo $this->Form->input('start_time', ['class' => 'form-control timepicker timepicker-no-seconds']);
                        echo $this->Form->input('end_time', ['class' => 'form-control timepicker timepicker-no-seconds']);
                        echo $this->Form->input('room_no');
                        echo $this->Form->input('extra_info');

                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        //echo $this->Form->input('delete_status');
                        //echo $this->Form->input('delete_kg');

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
    var controller = 'SectionInfo';
    var action = 'ajax';
    var elem_type;//retrieving campus list.
    var parent_id = "";
    var medium_name;
    var cid;
    $().ready(function () {

        elem_type = "campus_list";
        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type, function (data) {

            // console.log(data);

            $('#campus-select').append('<option value="select">Select</option>');
            $.each(data, function (index, item) {
                console.log(item);
                $('#campus-select').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');


            });

        });


    });
    $("#campus-select").on('change', function () {
        elem_type = "shift_list";
        parent_id = $('#campus-select').val();

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type + "/" + parent_id, function (data) {


            $('#shift-select').append('<option value="select">Select</option>');
            $.each(data, function (index, item) {
                console.log(item);
                $('#shift-select').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');


            });

        });

    });

    $("#shift-select").on('change', function () {
        elem_type = "medium_list";
        parent_id = $('#shift-select').val();

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type + "/" + parent_id, function (data) {


            $('#medium-select').append('<option value="select">Select</option>');
            $.each(data, function (index, item) {
                console.log(item);
                $('#medium-select').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');


            });

        });

    });

</script>