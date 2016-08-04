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
            <?= $this->Html->link(__('Groups'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Group') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Group Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Class Info') ?></th>
                                    <td><?= $group->has('class_info') ? $this->Html->link($group->class_info->id, ['controller' => 'ClassInfo', 'action' => 'view', $group->class_info->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Group Name En') ?></th>
                                    <td><?= h($group->group_name_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Group Name Bn') ?></th>
                                    <td><?= h($group->group_name_bn) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $group->status ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

