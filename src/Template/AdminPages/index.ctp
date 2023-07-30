<div class="container-fluid">
    <div class="page-header">
        <h1>Каталог страниц</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Новая страница'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>
                <?php if($zapros) : ?>
                    Результат поиска по запросу "<?php echo $zapros; ?>"
                <?php else : ?>
                    Все страницы
                <?php endif; ?>
            </h2>
            <div class="product-form">
                <?php echo $this->Form->create('search', ['type' => 'get']); ?>
                        <div class="form-group input-group">
                            <input class="form-control" type="text" name="search" placeholder="Найти страницу">
                            <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                        </div>                
                <?php echo $this->Form->end(); ?>
                <div class="buttons-block">
                    <?= $this->Html->link(__('Сбросить фильтр'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>                
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('title', 'Title <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('menu_title', 'Пункт меню <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('position', 'Позиция <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('published', 'Опубликована <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('show_menu', 'Основное меню <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('show_menu', 'Нижнее меню <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created', 'Создана <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" class="actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($pages) : ?>
                        <?php foreach ($pages as $product): ?>
                        <?php //debug($product); ?>
                        <tr>
                            <td><?= $this->Number->format($product->id) ?></td>
                         
                            <td><a href="/pages/<?php echo $product->alias; ?>" target="_blank"><?= h($product->title) ?></a></td>
                            <td><?= h($product->menu_title) ?></td>
                            <td style="text-align: center;"><?= h($product->position) ?></td>
                            <td style="text-align: center;">
                                <?php if($product->published == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if($product->show_menu == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if($product->bottom_menu == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>                                                        
                            <td><?= h($product->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Просмотреть'), ['controller' => 'AdminPages', 'action' => 'view', $product->id], ['target' => '_blank']) ?>
                                <?= $this->Html->link(__('Редактировать'), ['action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $product->id], ['confirm' => __('Вы действительно хотите удалить # {0}?', $product->title)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                    
                    <?php else : ?>
                        <tr>
                            <td>Еще нет страниц</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endif; ?>
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



