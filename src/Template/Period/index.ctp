
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
        <li><?= $this->Html->link(__(''), ['action' => 'index']) ?></li>
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
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('start_time') ?></th>
                            <th><?= $this->Paginator->sort('end_time') ?></th>
                            <th><?= $this->Paginator->sort('period_number') ?></th>
                            <th><?= $this->Paginator->sort('entry_by') ?></th>
                            <th><?= $this->Paginator->sort('entry_date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($period as $period): ?>
                            <tr>
                                <td><?= $this->Number->format($period->id) ?></td>
                                <td><?= h($period->start_time) ?></td>
                                <td><?= h($period->end_time) ?></td>
                                <td><?= h($period->period_number) ?></td>
                                <td><?= h($period->entry_by) ?></td>
                                <td><?= gmdate('d-m-Y',$period->entry_date) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $period->id],['class' => 'btn btn-sm btn-warning']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $period->id], ['class' => 'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $period->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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

