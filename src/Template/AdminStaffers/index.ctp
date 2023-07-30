<div class="container-fluid">
    <div class="page-header">
        <h1>Сотрудники</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Добавить сотрудника'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Все сотрудники</h2>
            <?php if($staffers) : ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th>Фото</th>
                            <th scope="col"><?= $this->Paginator->sort('name', 'Имя <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('position', 'Должность <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th>Описание</th>
                            <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('published', 'Опубликована <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created', 'Создана <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" class="actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($staffers as $staff): ?>
                        <tr>
                            <td><?= $this->Number->format($staff->id) ?></td>
                            <td><img style="max-width: 250px;" src="/img/upload/<?= $staff->img ?>" alt=""/></td>
                            <td><?= h($staff->name) ?></td>
                            <td><?= h($staff->position) ?></td>
                            <td><?= h($staff->description) ?></td>
                            <td style="text-align: center;">
                                <?php if($staff->published == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>                            
                            <td><?= h($staff->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Редактировать'), ['action' => 'edit', $staff->id]) ?>
                                <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $staff->id], ['confirm' => __('Вы действительно хотите удалить # {0}?', $staff->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                    
                    
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>                
    </div>
    <?php if($staffers) : ?>
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
    <?php endif; ?>
    
</div>
<!-- /.container-fluid -->

