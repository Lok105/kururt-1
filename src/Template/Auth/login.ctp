<?php $this->Html->addCrumb('Авторизация'); ?>

<!-- contact-area start -->
<div class="contact-area ptb-100">
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<div class="section-title text-center">
					<h2>Авторизация</h2>
                    <p></p>
				</div>
			</div>
		</div>    
        <div class="row">
            <div class="col-xs-12">
                <div class="contact-wrap form-style">
                    <div class="cf-msg"></div>
                    
                    <?php echo $this->Form->create('users', ['id' => 'cf']); ?>
                        <?php echo $this->Form->input('surname', ['type' => 'hidden', 'value' => '']); ?>
						<div class="col-xs-12">
                            <?php echo $this->Form->input('username', ['placeholder' => 'Логин', 'label' => false, 'required' => 'required']); ?>
						</div>
						<div class="col-xs-12">
							<?php echo $this->Form->input('password', ['placeholder' => 'Пароль', 'label' => false, 'required' => 'required']); ?>
						</div>                        
    
                        <div class="col-xs-12">
                            <?php echo $this->Form->submit('Войти', ['class' => 'cont-submit btn-contact input-button', 'type' => 'submit', 'name' => 'auth', 'label' => false, 'id' => 'auth']); ?>
                        </div>                              
                    <?php echo $this->Form->end(); ?>                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact-area end -->

