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
        <li><?= $this->Html->link(__('School Setup Element'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('School Setup Element List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New School Setup'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('Element Id') ?></th>
                                <th><?= __('Element Type') ?></th>
                                <th><?= __('Element Data') ?></th>
                                <th><?= __('Element Parent') ?></th>
                                <th><?= __('Status') ?></th>

                                <th><?= __('Entry Date') ?></th>
                                <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($softSchoolSetupElement as $key => $softSchoolSetupElement) { ?>
                                <tr>
                                    <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_ID) ?></td>
                                    <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_TYPE) ?></td>
                                    <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_DATA) ?></td>
                                    <td><?= h($softSchoolSetupElement->TBL30_ELEMENT_PARENT) ?></td>
                                    <td><?php
                                        if ($softSchoolSetupElement->TBL30_STATUS == 1)
                                            echo '<span class="label label-success">Active</span>';
                                        else
                                           echo '<span class="label label-danger">In-Active</span>';
                                        ?></td>

                                    <td><?= h($softSchoolSetupElement->TBL30_ENTRY_DATE) ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), ['action' => 'view', $softSchoolSetupElement->TBL30_ELEMENT_ID], ['class' => 'btn btn-sm btn-info']);

                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $softSchoolSetupElement->TBL30_ELEMENT_ID], ['class' => 'btn btn-sm btn-warning']);

                                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $softSchoolSetupElement->TBL30_ELEMENT_ID], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $softSchoolSetupElement->TBL30_ELEMENT_ID)]);
                                        ?>

                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('<<');
                    echo $this->Paginator->numbers();
                    echo $this->Paginator->next('>>');
                    ?>
                </ul>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

