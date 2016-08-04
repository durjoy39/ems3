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
            <?= $this->Html->link(__('Teacher Basic'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('Edit Teacher Basic') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Teacher Basic') ?>
                                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
                
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($teacherBasic,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('first_name_eng');
                                                                    echo $this->Form->input('middle_name');
                                                                    echo $this->Form->input('last_name');
                                                                    echo $this->Form->input('nick_name_eng');
                                                                    echo $this->Form->input('bangla_name');
                                                                    echo $this->Form->input('father_husband_name');
                                                                    echo $this->Form->input('mother_name');
                                                                    echo $this->Form->input('dob');
                                                                    echo $this->Form->input('gender');
                                                                    echo $this->Form->input('relegion');
                                                                    echo $this->Form->input('blood_group');
                                                                    echo $this->Form->input('national_id');
                                                                    echo $this->Form->input('birth_place');
                                                                    echo $this->Form->input('nationality');
                                                                    echo $this->Form->input('country');
                                                                    echo $this->Form->input('designation');
                                                                    echo $this->Form->input('responsibility');
                                                                    echo $this->Form->input('file');
                                                                    echo $this->Form->input('phone');
                                                                    echo $this->Form->input('email');
                                                                    echo $this->Form->input('mobile');
                                                                    echo $this->Form->input('present_address');
                                                                    echo $this->Form->input('permanent_address');
                                                                    echo $this->Form->input('resume');
                                                                    echo $this->Form->input('class');
                                                                    echo $this->Form->input('delete_status');
                                                                    echo $this->Form->input('join_date');
                                                                    echo $this->Form->input('type');
                                                                    echo $this->Form->input('institute_teacher_id');
                                                                    echo $this->Form->input('first_join_date');
                                                                    echo $this->Form->input('type_of_appoinment');
                                                                    echo $this->Form->input('batch_number');
                                                                    echo $this->Form->input('merit_number');
                                                    ?>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn blue pull-right','style'=>'margin-top:20px']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

