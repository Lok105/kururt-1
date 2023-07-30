<div class="container-fluid">

    <div class="page-header">
        <h1>Добавление пользователя</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <a href="/adminInformation" class="btn btn-primary">Карточка компании</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create('new_staff') ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('username', ['label' => 'Логин', 'class' => 'default-fild form-control', 'required' => true, 'id' => 'titleno']); ?>
                        </div> 
                        <div class="form-group">
                            <?php echo $this->Form->input('name', ['label' => 'Имя', 'class' => 'default-fild form-control', 'required' => true]); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('password', ['label' => 'Пароль', 'class' => 'default-fild form-control', 'required' => true]); ?>
                        </div> 
                        <div class="form-group">
                            <?php echo $this->Form->select(
                                    'role',
                                    ['admin' => 'Администратор', 'manager' => 'Менеджер', 'redactor' => 'Редактор'],
                                    ['default' => 'admin', 'class' => 'default-fild form-control']
                                ); 
                            ?>
                        </div>                                                                         
                      
                    <?= $this->Form->button(__('Создать'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>

    
</div>
<!-- /.container-fluid -->
