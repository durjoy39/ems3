<?php

use Cake\Core\Configure;

$status = Configure::read('status_options');
?>
<div class="page-bar">
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
        <li><?= __('Edit Class Info') ?></li>

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

                        <?php

                        echo $this->Form->input('class_campus');
                        echo $this->Form->input('class_name', ['options' => $class_name, 'empty' => __('Select')]);
                        echo $this->Form->input('class_shift_info');
                        echo $this->Form->input('class_medium');

                        echo $this->Form->input('teacher_id', ['options' => $teacherBasic, 'empty' => __('Select')]);
                        echo $this->Form->input('class_start_date', ['type' => 'text', 'value' => $class_start_date,
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
