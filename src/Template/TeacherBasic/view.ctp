<?php
$status = \Cake\Core\Configure::read('status_options');
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
        <li><?= __('View Teacher Basic') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Teacher Basic Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('First Name Eng') ?></th>
                                    <td><?= h($teacherBasic->first_name_eng) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Middle Name') ?></th>
                                    <td><?= h($teacherBasic->middle_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Last Name') ?></th>
                                    <td><?= h($teacherBasic->last_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Nick Name Eng') ?></th>
                                    <td><?= h($teacherBasic->nick_name_eng) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Bangla Name') ?></th>
                                    <td><?= h($teacherBasic->bangla_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Father Husband Name') ?></th>
                                    <td><?= h($teacherBasic->father_husband_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Mother Name') ?></th>
                                    <td><?= h($teacherBasic->mother_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Gender') ?></th>
                                    <td><?= h($teacherBasic->gender) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Relegion') ?></th>
                                    <td><?= h($teacherBasic->relegion) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Blood Group') ?></th>
                                    <td><?= h($teacherBasic->blood_group) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('National Id') ?></th>
                                    <td><?= h($teacherBasic->national_id) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Birth Place') ?></th>
                                    <td><?= h($teacherBasic->birth_place) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Nationality') ?></th>
                                    <td><?= h($teacherBasic->nationality) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Country') ?></th>
                                    <td><?= h($teacherBasic->country) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Designation') ?></th>
                                    <td><?= h($teacherBasic->designation) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Responsibility') ?></th>
                                    <td><?= h($teacherBasic->responsibility) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('File') ?></th>
                                    <td><?= h($teacherBasic->file) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Phone') ?></th>
                                    <td><?= h($teacherBasic->phone) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Email') ?></th>
                                    <td><?= h($teacherBasic->email) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Mobile') ?></th>
                                    <td><?= h($teacherBasic->mobile) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Present Address') ?></th>
                                    <td><?= h($teacherBasic->present_address) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Permanent Address') ?></th>
                                    <td><?= h($teacherBasic->permanent_address) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Resume') ?></th>
                                    <td><?= h($teacherBasic->resume) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Class') ?></th>
                                    <td><?= h($teacherBasic->class) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Type') ?></th>
                                    <td><?= h($teacherBasic->type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Institute Teacher Id') ?></th>
                                    <td><?= h($teacherBasic->institute_teacher_id) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Type Of Appoinment') ?></th>
                                    <td><?= h($teacherBasic->type_of_appoinment) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Batch Number') ?></th>
                                    <td><?= h($teacherBasic->batch_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Merit Number') ?></th>
                                    <td><?= h($teacherBasic->merit_number) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Dob') ?></th>
                                    <td><?= $this->Number->format($teacherBasic->dob) ?></td>
                                </tr>
                                                                                                                
                                                            <tr>
                                    <th><?= __('Delete Status') ?></th>
                                    <td><?= $this->Number->format($teacherBasic->delete_status) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Join Date') ?></th>
                                    <td><?= $this->Number->format($teacherBasic->join_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('First Join Date') ?></th>
                                    <td><?= $this->Number->format($teacherBasic->first_join_date) ?></td>
                                </tr>
                                                                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

