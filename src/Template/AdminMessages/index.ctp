<div class="container-fluid">
    <div class="page-header">
        <h1>Сообщения пользователей</h1>
    </div>
  
    <div class="row">
        <div class="col-xs-12">
            <h2>Все сообщения</h2>
            <?php if($messages) : ?>
            <div class="table-responsive">
                <?php echo $this->Form->create('moving_form'); ?>
                <div class="button-block-messages">
                    <div class="moving-message">С отмеченными:</div>
                    <?php echo $this->Form->submit('Удалить', ['name' => 'del_mes', 'class' => 'submit-button btn btn-primary']); ?>
                    <?php echo $this->Form->submit('Пометить прочитанными', ['name' => 'read_mes', 'class' => 'submit-button btn btn-primary']); ?>
                </div>            
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"><?= $this->Paginator->sort('name', 'Имя <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('theme', 'Тема <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('phone', 'Телефон <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('email', 'E-mail <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('user_ip', 'IP <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('read_already', 'Прочитано <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('answer', 'Ответ <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created', 'Дата <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" class="actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($messages as $message): ?>
                        <tr>
                            <td><input name="message[]" type="checkbox" value="<?php echo $message->id; ?>" id="mes_<?php echo $message->id; ?>"/></td>
                            <td><?php echo $message->name; ?></td>
                            <td><?php echo $message->theme; ?></td>
                            <td><?php echo $message->phone; ?></td>
                            <td><?php echo $message->email; ?></td>
                            <td><?php echo $message->user_ip; ?></td>
                            <td style="text-align: center;">
                                <?php if($message->read_already == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if($message->answer == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>                            
                            <td><?= h($message->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Посмотреть'), ['action' => 'view', $message->id]) ?>
                                <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $message->id], ['confirm' => __('Вы действительно хотите удалить # {0}?', $message->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                    
                    
                    </tbody>
                </table>
                <?php echo $this->Form->end(); ?>
            </div>
            <?php endif; ?>
        </div>                
    </div>
    <?php if($messages) : ?>
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



