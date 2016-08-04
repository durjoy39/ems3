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
            <?= $this->Html->link(__('Class Name'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Class Name') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Class Name Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Class Id') ?></th>
                                    <td><?= h($className->class_id) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Class Name') ?></th>
                                    <td><?= h($className->class_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Entry By') ?></th>
                                    <td><?= h($className->entry_by) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Subject Code') ?></th>
                                    <td><?= $this->Number->format($className->subject_code) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Faculty Id') ?></th>
                                    <td><?= $this->Number->format($className->faculty_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Order') ?></th>
                                    <td><?= $this->Number->format($className->order) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$className->status]) ?></td>
                                </tr>
                                                            
                                                            <tr>
                                    <th><?= __('Del Status') ?></th>
                                    <td><?= $this->Number->format($className->del_status) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Entry Date') ?></th>
                                    <td><?= h($className->entry_date) ?></tr>
                                </tr>
                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

