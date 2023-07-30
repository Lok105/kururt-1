<div class="container-fluid">
    <?php //Debug($information); ?>
    <div class="page-header">
        <h1>Данные о компании</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Редактировать данные компании'), ['action' => 'edit', $information->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
   
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= h($information->title) ?></h3>
                </div>
                <div class="panel-body">
                    <div class="company view large-9 medium-8 columns content">
                        <table class="vertical-table">
                            <tr>
                                <th scope="row"><?= 'Имя компании' ?></th>
                                <td><?= h($information->title) ?></td>
                            </tr> 
                            <tr>
                                <th scope="row"><?= 'Слоган' ?></th>
                                <td><?= h($information->description) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Заголовок H1' ?></th>
                                <td><?= h($information->h1) ?></td>
                            </tr>                                                                                
                            <tr>
                                <th scope="row"><?= 'Телефон' ?></th>
                                <td><?= h($information->phone) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Телефон (доп)' ?></th>
                                <td><?= h($information->phone_1) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Телефон (доп)' ?></th>
                                <td><?= h($information->phone_2) ?></td>
                            </tr>                                                       
                            <tr>
                                <th scope="row"><?= __('Email') ?></th>
                                <td><?= h($information->email) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Адрес') ?></th>
                                <td><?= h($information->address) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Время работы') ?></th>
                                <td><?= h($information->w_time) ?></td>
                            </tr> 
                            <tr>
                                <th scope="row"><?= __('Видео') ?></th>
                                <td><?= h($information->video) ?></td>
                            </tr>                                                       
                            <tr>
                                <th scope="row"><?= __('reCaptcha ключ') ?></th>
                                <td><?= h($information->recaptcha) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('reCaptcha секретный ключ') ?></th>
                                <td><?= h($information->recaptcha_secret) ?></td>
                            </tr>                                                                                    
                            <tr>
                                <th scope="row"><?= 'Страница Facebook' ?></th>
                                <td><?= h($information->soc_fb) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Страница Twitter' ?></th>
                                <td><?= h($information->soc_tw) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Страница VK' ?></th>
                                <td><?= h($information->soc_wk) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Страница Google' ?></th>
                                <td><?= h($information->soc_goo) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Страница Instagram' ?></th>
                                <td><?= h($information->soc_inst) ?></td>
                            </tr> 
                            <tr>
                                <th scope="row"><?= 'Страница Youtube' ?></th>
                                <td><?= h($information->soc_you) ?></td>
                            </tr>                                                                                     
                        </table>
                        <div class="admin-about-block">
                            <?echo $information->body; ?>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        
    </div>
    
    <div class="row">
   
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Сменить логин пароль</h3>
                </div>
                <div class="panel-body">
                    <div class="company view large-9 medium-8 columns content">

                    <?= $this->Form->create($user, ['url' => ['controller' => 'adminInformation', 'action' => 'editAdmin', $user->id]]) ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('username', ['label' => 'Логин', 'class' => 'default-fild form-control', 'required' => true]); ?>
                        </div>                                            
                        <div class="form-group">
                            <?php echo $this->Form->input('password', ['label' => 'Пароль', 'class' => 'default-fild form-control', 'required' => true, 'value' => '']); ?>
                        </div>

                    </fieldset>
                    <?= $this->Form->button(__('Изменить'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                    </div>
                </div>               
            </div>
        </div>
        
    </div>    
    <?php //foreach($quests as $quest){debug($quest); } ?>
     <?php //debug($contract); ?>
     
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Пользователи</h3>
                </div>
                            
            <?php if($staff) : ?>
                <div class="panel-body">
                    <div class="dop-user">
                        <div class="buttons-block">
                            <?= $this->Html->link(__('Добавить пользователя'), ['action' => 'addUser'], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>                 
                    <div class="company view large-9 medium-8 columns content">
                                           
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('id', 'ID <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('name', 'Имя <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('username', 'Логин <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th> 
                                        <th scope="col"><?= $this->Paginator->sort('role', 'Доступ <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>  
                                        <th scope="col" class="actions">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($staff as $staff_user): ?>
                                    <tr>
                                        <td><?= $this->Number->format($staff_user->id) ?></td>
                                        <td><?= h($staff_user->name) ?></td>
                                        <td><?= h($staff_user->username) ?></td>
                                        <td><?= h($staff_user->role) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Редактировать'), ['action' => 'editUser', $staff_user->id]) ?>
                                            <?= $this->Form->postLink(__('Удалить'), ['action' => 'deleteUser', $staff_user->id], ['confirm' => __('Вы действительно хотите удалить пользователя ID#{0}?', $staff_user->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>                    
                                
                                </tbody>
                            </table>
                          
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </div>                
        </div>
    </div>     
     
     
</div>




