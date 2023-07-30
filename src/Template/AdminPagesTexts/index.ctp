<div class="container-fluid">

    
    

    <div class="page-header">
        <h1>CEO Блок</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Добавить страницу'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>СЕО Страницы</h2>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('url_page', 'URL <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('body', 'Текст <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" class="actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagesTexts as $pagesText): ?>
                        <tr>
                            <td><?= $this->Number->format($pagesText->id) ?></td>
                            <td><a href="<?= h($pagesText->url) ?>" target="_blank"><?= h($pagesText->url) ?></a></td>
                            <td><? echo $this->Text->truncate(
                                            $pagesText->body,
                                            300,
                                            [
                                                'ellipsis' => '...',
                                                'exact' => false
                                            ]
                                        ); ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Просмотреть'), ['action' => 'view', $pagesText->id]) ?>
                                <?= $this->Html->link(__('Редактировать'), ['action' => 'edit', $pagesText->id]) ?>
                                <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $pagesText->id], ['confirm' => __('Вы действительно хотите удалить # {0}?', $pagesText->alias)]) ?>
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


