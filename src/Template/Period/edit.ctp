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
            <?= $this->Html->link(__('Period List'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Period') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit  Period') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($period,['type' => 'file', 'class'=>'form-horizontal myForm','novalidate']) ?>
                <div class="form-group">
                    <label class="control-label col-md-3"><?= __('Start Time')?></label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" value="<?= $period['start_time']?>" class="form-control timepicker timepicker-no-seconds" name="start_time" required>
                            <span class="input-group-btn"><button class="btn default" type="button"><i class="fa fa-clock-o"></i></button></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><?= __('End Time')?></label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" value="<?= $period['end_time']?>" class="form-control timepicker timepicker-no-seconds" name="end_time" required>
                            <span class="input-group-btn"><button class="btn default" type="button"><i class="fa fa-clock-o"></i></button></span>
                        </div>
                    </div>
                </div>
                    <?=$this->Form->input('period_number'); ?>
                <div class="text-center"><?= $this->Form->button(__('Submit'),['class'=>'btn green-seagreen']) ?></div>

                <?= $this->Form->end() ?>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

