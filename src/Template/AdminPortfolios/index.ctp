<div class="container-fluid">

    
    

    <div class="page-header">
        <h1>Портфолио</h1>
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
            <h2>Портфолио</h2>
            
            <?php if($portfolios) : ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col">Картинка</th>
                            <th scope="col"><?= $this->Paginator->sort('title', 'Title <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('url', 'Ссылка <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created', 'Создан <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" class="actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($portfolios as $port): ?>
                        <tr>
                            <td><?= $this->Number->format($port->id) ?></td>
                            <td><img class="admin-img-line" src="/img/upload/<?php echo $port->img; ?>" alt=""/></td>
                            <td><?php echo $port->title; ?></td>
                            <td><a href="<?php echo $port->url; ?>" target="_blank"><?= h($port->title) ?></a></td>
                           
                            <td><?= h($port->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Редактировать'), ['action' => 'edit', $port->id]) ?>
                                <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $port->id], ['confirm' => __('Вы действительно хотите удалить # {0}?', $port->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                    
                    
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
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