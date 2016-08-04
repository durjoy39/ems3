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
        <li><?= $this->Html->link(__('Section Info'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Section Info List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Section Info'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('sid') ?></th>
                                                                                                                                                <th><?= __('cid') ?></th>
                                                                                                                                                <th><?= __('section_name') ?></th>
                                                                                                                                                <th><?= __('start_time') ?></th>
                                                                                                                                                <th><?= __('end_time') ?></th>
                                                                                                                                                <th><?= __('room_no') ?></th>
                                                                                                                                        <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sectionInfo as $key => $sectionInfo) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($sectionInfo->sid) ?></td>
                                                                                            <td><?= $this->Number->format($sectionInfo->cid) ?></td>
                                                                                            <td><?= h($sectionInfo->section_name) ?></td>
                                                                                            <td><?= h($sectionInfo->start_time) ?></td>
                                                                                            <td><?= h($sectionInfo->end_time) ?></td>
                                                                                            <td><?= h($sectionInfo->room_no) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $sectionInfo->sid],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $sectionInfo->sid],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $sectionInfo->sid],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $sectionInfo->sid)]);
                                            
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

