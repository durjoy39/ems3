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
            <?= $this->Html->link(__('School Setup Element'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View School Setup Element') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('School Setup Element Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Element Id') ?></th>
                            <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_ID) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Element Type') ?></th>
                            <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_TYPE) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Element Data') ?></th>
                            <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_DATA) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Element Parent') ?></th>
                            <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_PARENT) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?php
                                if ($softSchoolSetupElement->TBL30_STATUS == 1)
                                    echo '<span class="label label-success">Active</span>';
                                else
                                    echo '<span class="label label-danger">In-Active</span>';
                                ?></td>
                        </tr>

                        </tr>
                        <tr>
                            <th><?= __('Entry Date') ?></th>
                            <td><?= h($softSchoolSetupElement->TBL30_ENTRY_DATE) ?></tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

