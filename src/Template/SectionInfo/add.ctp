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
            <?= $this->Html->link(__('Section Info'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Section Info') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Section Info') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($sectionInfo, ['class' => 'form-horizontal', 'id' => 'section-form', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <div class="form-group input select">
                            <label for="campus-type" class="col-sm-3 control-label text-right">Campus Type</label>

                            <div id="container-campus-select" class="col-sm-9">
                                <select name="campus-select " class="form-control" id="campus-select">
                                </select>
                            </div>
                        </div>

                        <div class="form-group input select">
                            <label for="shift-select" class="col-sm-3 control-label text-right">Shift Type</label>

                            <div id="container-shift-select" class="col-sm-9 ">
                                <select name="shift-select" id="shift-select"
                                        class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group input select">
                            <label for="medium-select" class="col-sm-3 control-label text-right">Medium Type</label>

                            <div id="container-medium-select" class="col-sm-9 ">
                                <select name="medium-select" id="medium-select"
                                        class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group input select">
                            <label for="class-name-select" class="col-sm-3 control-label text-right">Class Name </label>

                            <div id="container-class-name" class="col-sm-9 ">
                                <select name="class-name-select" id="class-name-select"
                                        class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group input select">
                            <label for="teacher-name-select" class="col-sm-3 control-label text-right">Teacher
                                Name </label>

                            <div id="container-teacher-name" class="col-sm-9">
                                <select name="teacher-name-select" id="teacher-name-select"
                                        class="form-control">
                                </select>
                            </div>
                        </div>


                        <!--cid-->
                        <?php echo $this->Form->input('section_name', ['class' => 'form-control']); ?>
                        <?php
                        echo $this->Form->input('status', ['label' => 'Status', 'options' => Configure::read('status_options')]);
                        ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'id' => 'section-submit', 'style' => 'margin-top:20px']) ?>
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
    var elem_type;

    var medium_id;// here id means id of select option ;
    var campus_id;
    var shift_id;
    var class_id;//id associated with class name
    var teacher_id;
    var cid;

    var campus_name;
    var shift_name;
    var medium_name;
    var class_name;


    $().ready(function () {

        elem_type = "campus_list";
        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type, function (data) {

            console.log(data);
            $('#campus-select').append('<option value="select">Select</option>');
            $.each(data, function (index, item) {
                //console.log(item);
                $('#campus-select').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');


            });

        });


    });
    $("#campus-select").on('change', function () {
        elem_type = "shift_list";
        campus_id = $('#campus-select').val();
        campus_name = $('#campus-select').find(":selected").text();
        console.log(campus_name);

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type + "/" + campus_id, function (data) {

            $('#shift-select').html('');
            $('#shift-select').append('<option value="select">Select</option>');
            $.each(data, function (index, item) {
                console.log(item);
                $('#shift-select').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');


            });

        });

    });

    $("#shift-select").on('change', function () {
        elem_type = "medium_list";
        shift_id = $('#shift-select').val();
        shift_name = $('#shift-select').find(":selected").text();
        console.log(shift_name);
        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type + "/" + shift_id, function (data) {

            $('#medium-select').html('');
            $('#medium-select').append('<option value="select">Select</option>');
            $.each(data, function (index, item) {
                /// console.log(item);
                $('#medium-select').append('<option value="' + item.TBL30_ELEMENT_ID + '">' + item.TBL30_ELEMENT_DATA + '</option>');


            });

        });

    });
    $("#medium-select").on('change', function () {
        elem_type = "class_name";
        medium_id = $('#medium-select').val();
        medium_name = $('#medium-select').find(":selected").text();
        console.log(medium_name);

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type, function (data) {

            $('#class-name-select').html('');
            $('#class-name-select').append('<option value="select">Select</option>');
            $.each(data, function (id, class_name) {

                $('#class-name-select').append('<option value="' + id + '">' + class_name + '</option>');


            });

        });

    });
    $("#class-name-select").on('change', function () {
        elem_type = "teacher_info";
        class_id = $('#class-name-select').val();

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" + elem_type, function (data) {

            $('#teacher-name-select').html('');
            $('#teacher-name-select').append('<option value="select">Select</option>');
            $.each(data, function (id, teacher_name) {

                $('#teacher-name-select').append('<option value="' + id + '">' + teacher_name + '</option>');
            });

        });

    });
    $("#teacher-name-select").on('change', function () {
        teacher_id = $("#teacher-name-select").val();
        console.log(teacher_id);
    });
    $("#section-form").submit(function (e) {

        e.preventDefault();
        action = 'saveclassinfo';

        var sec_name = $('#section-name').val();
        var status = $('#status').val();
        // var extra_info = $('#section-name').val();

        var campus_info = {
            'campus_name': campus_name,
            'shift_name': shift_name,
            'medium_name': medium_name,
            'class_name': class_id,
            'teacher_id': teacher_id,
            'edit': 'false',
            'section_name': sec_name,
            'status': status
                    // 'extra_info': extra_info
        };

        $.ajax({
            url: "/" + root + "/" + controller + "/" + action,
            type: "post",
            data: campus_info,
            success: function (response) {

                var redirect = "/" + root + "/" + controller + "/" + 'index';
                console.log('done');
                window.location.href = redirect;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }


        });

    });

</script>

