<div class="container-fluid">

    <div class="page-header">
        <h1>Редактирование FAQ</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Весь список вопросов и ответов'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create($question) ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', ['label' => 'Титл / заглавие', 'class' => 'default-fild form-control', 'required' => true, 'id' => 'title_port']); ?>
                        </div>
  
                        <div class="form-group">
                            <?php echo $this->Form->input('text', ['label' => 'Текст', 'class' => 'default-fild form-control', 'id' => 'block1']); ?>                           
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace('block1');
                        </script>                        
                        <div class="form-group">
                            <?php echo $this->Form->input('position', ['label' => 'Очередь показа', 'class' => 'default-fild form-control']); ?>
                        </div>                                            
                       
                        <div class="clearfix"></div>
                    </fieldset>
                                               
                    <?= $this->Form->button(__('Сохранить'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>

    
</div>
<!-- /.container-fluid -->
