<div class="container-fluid">

    <div class="page-header">
        <h2>Сообщение от пользователя - <?php echo $message->name; ?></h2>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Все сообщения'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
  
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Сообщение и информация о пользователе</h3>
                </div>
                <div class="panel-body">
                    <div class="parts-block-edit">
                        <table class="vertical-table">
  
                            <tr>
                                <th scope="row"><?= __('Тема сообщения') ?></th>
                                <td><?php echo $message->theme; ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Имя') ?></th>
                                <td><?php echo $message->name; ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Телефон') ?></th>
                                <td><?php echo $message->phone; ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('E-mail') ?></th>
                                <td><?php echo $message->email; ?></td>
                            </tr>                                                        
                            <tr>
                                <th scope="row"><?= __('Отправлено') ?></th>
                                <td><?= $message->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU') ?></td>
                            </tr>
                        </table>

                        <div class="message-body">

                            <h4><?= __('Текст сообщения') ?></h4>
                            <?= $this->Text->autoParagraph(h($message->body)); ?>
     
                            <div class="clearfix"></div>
                        </div>
                        <?php if($message->body_answer) : ?>
                            <div class="message-body">
                                <h4><?= __('Текст ответа') ?></h4>
                                <?= $this->Text->autoParagraph(h($message->body_answer)); ?>
                            </div>
                        <?php endif; ?>


                              
                    </div>
                </div>               
            </div>
        </div>
        
    </div>
<?php if($message->email) : ?>    
    <div class="row">
  
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Ответить</h3>
                </div>
                <div class="panel-body">
                    <div class="parts-block-edit">
                        <?php echo $this->Form->create('answer_message'); ?>
                        	<fieldset>
                                <div class="form-group">
                                    <?php echo $this->Form->input('theme', ['label' => 'Тема сообщения', 'class' => 'default-fild form-control', 'value' => 'Ответ на ваше обращение на сайте '.$info['title']]); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo $this->Form->input('body', ['class' => 'default-fild form-control', 'label' => 'Ответ на сообщение пользователя', 'type' => 'textarea', 'value' => 'Уважаемый '.$message->name.', добрый день!']); ?>
                                </div>                                                             
                        	</fieldset>                   
                        <?php echo $this->Form->submit('Отправить', ['class' => 'submit-button btn btn-primary']); ?>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>               
            </div>
        </div>
        
    </div>
<?php endif; ?>    

