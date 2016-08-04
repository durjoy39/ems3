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
            <?= $this->Html->link(__('Section Info'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Section Info') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Section Info Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Section Name') ?></th>
                                    <td><?= h($sectionInfo->section_name) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Start Time') ?></th>
                                    <td><?= h($sectionInfo->start_time) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('End Time') ?></th>
                                    <td><?= h($sectionInfo->end_time) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Room No') ?></th>
                                    <td><?= h($sectionInfo->room_no) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Extra Info') ?></th>
                                    <td><?= h($sectionInfo->extra_info) ?></td>
                                </tr>
                                                                                                                                                    
                                                            <tr>
                                    <th><?= __('Sid') ?></th>
                                    <td><?= $this->Number->format($sectionInfo->sid) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Cid') ?></th>
                                    <td><?= $this->Number->format($sectionInfo->cid) ?></td>
                                </tr>
                                                                                                                
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$sectionInfo->status]) ?></td>
                                </tr>
                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

