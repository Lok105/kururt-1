<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staffer $staffer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Staffer'), ['action' => 'edit', $staffer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Staffer'), ['action' => 'delete', $staffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staffer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Staffers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staffer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="staffers view large-9 medium-8 columns content">
    <h3><?= h($staffer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($staffer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($staffer->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($staffer->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img') ?></th>
            <td><?= h($staffer->img) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soc Vk') ?></th>
            <td><?= h($staffer->soc_vk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soc Fb') ?></th>
            <td><?= h($staffer->soc_fb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soc Tw') ?></th>
            <td><?= h($staffer->soc_tw) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soc Goo') ?></th>
            <td><?= h($staffer->soc_goo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($staffer->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($staffer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($staffer->created) ?></td>
        </tr>
    </table>
</div>
