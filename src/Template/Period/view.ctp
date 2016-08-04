<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Period'), ['action' => 'edit', $period->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Period'), ['action' => 'delete', $period->id], ['confirm' => __('Are you sure you want to delete # {0}?', $period->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Period'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Period'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="period view large-9 medium-8 columns content">
    <h3><?= h($period->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($period->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($period->end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Period Number') ?></th>
            <td><?= h($period->period_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Entry By') ?></th>
            <td><?= h($period->entry_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($period->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Entry Date') ?></th>
            <td><?= h($period->entry_date) ?></td>
        </tr>
    </table>
</div>
