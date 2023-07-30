<div class="container-fluid">

    <div class="page-header">
        <h1>История на главной</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Добавить'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>История компании</h2>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col">Картинка</th>
                            <th scope="col"><?= $this->Paginator->sort('title', 'Title <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('year', 'Год <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('text', 'Текст <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('position', 'Позиция <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created', 'Создан <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" class="actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($slides as $slide): ?>
                        <tr>
                            <td><?= $this->Number->format($slide->id) ?></td>
                            <td><img class="admin-img-line" src="/img/upload/<?php echo $slide->img; ?>" alt=""/></td>
                            <td><?php echo $slide->title; ?></td>
                            <td><?= h($slide->year) ?></td>
                            <td><?php echo $slide->text; ?></td>
                            <td><?= $this->Number->format($slide->position) ?></td>
                            <td><?= h($slide->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Редактировать'), ['action' => 'edit', $slide->id]) ?>
                                <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $slide->id], ['confirm' => __('Вы действительно хотите удалить # {0}?', $slide->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                    
                    
                    </tbody>
                </table>
            </div>
        </div>                
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('Первая')) ?>
                    <?= $this->Paginator->prev('< ' . __('Предыдущая')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Следующая') . ' >') ?>
                    <?= $this->Paginator->last(__('Последняя') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Страница {{page}} из {{pages}}, показано {{current}} записей из {{count}} всего')]) ?></p>
            </div>
        </div>
    </div>

    
</div>
<!-- /.container-fluid -->