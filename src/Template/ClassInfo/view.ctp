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
            <?= $this->Html->link(__('Class Info'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Class Info') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Class Info Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Class Campus') ?></th>
                            <td><?= h($classInfo->class_campus) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Class Shift Info') ?></th>
                            <td><?= h($classInfo->class_shift_info) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Class Medium') ?></th>
                            <td><?= h($classInfo->class_medium) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Teacher Basic') ?></th>
                            <td><?= $classInfo->has('teacher_basic') ? $this->Html->link($classInfo->teacher_basic->id, ['controller' => 'TeacherBasic', 'action' => 'view', $classInfo->teacher_basic->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Start Time') ?></th>
                            <td><?= h($classInfo->start_time) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('End Time') ?></th>
                            <td><?= h($classInfo->end_time) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Room No') ?></th>
                            <td><?= h($classInfo->room_no) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Extra Info') ?></th>
                            <td><?= h($classInfo->extra_info) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Cid') ?></th>
                            <td><?= $this->Number->format($classInfo->cid) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Class Name') ?></th>
                            <td><?= $class_name ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Class Start Date') ?></th>
                            <td><?= $class_start_date ?></td>
                        </tr>


                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$classInfo->status]) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Delete Status') ?></th>
                            <td><?= $this->Number->format($classInfo->delete_status) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Delete Kg') ?></th>
                            <td><?= $this->Number->format($classInfo->delete_kg) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

