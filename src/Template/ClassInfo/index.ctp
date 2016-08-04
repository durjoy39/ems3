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
        <li><?= $this->Html->link(__('Class Info'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Class Info List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Class Info'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('cid') ?></th>
                                <th><?= __('class_campus') ?></th>
                                <th><?= __('class_shift_info') ?></th>
                                <th><?= __('class_medium') ?></th>
                                <th><?= __('class_name') ?></th>
                                <th><?= __('teacher_id') ?></th>
                                <th><?= __('class_start_date') ?></th>
                                <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($classInfo as $key => $classInfo) { ?>
                                <tr>
                                    <td><?= $this->Number->format($classInfo->cid) ?></td>
                                    <td><?= h($classInfo->class_campus) ?></td>
                                    <td><?= h($classInfo->class_shift_info) ?></td>
                                    <td><?= h($classInfo->class_medium) ?></td>
                                    <td><?php
                                        foreach ($class_name_list as $key2 => $value) {
                                            if ($key2 == $classInfo->class_name) {
                                                echo $value;
                                            }
                                        }
                                        ?></td>
                                    <td><?=
                                        $classInfo->has('teacher_basic') ?
                                                $this->Html->link($classInfo->teacher_basic
                                                        ->nick_name_eng, ['controller' => 'TeacherBasic',
                                                    'action' => 'view', $classInfo->teacher_basic
                                                    ->id]) : ''
                                        ?></td>

                                    <td><?=
                                        $date = gmdate('d-m-Y', $classInfo->class_start_date);
                                        ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), ['action' => 'view', $classInfo->cid], ['class' => 'btn btn-sm btn-info']);

                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $classInfo->cid], ['class' => 'btn btn-sm btn-warning']);

                                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $classInfo->cid], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $classInfo->cid)]);
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

