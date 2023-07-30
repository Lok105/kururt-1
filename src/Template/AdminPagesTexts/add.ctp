<div class="container-fluid">

    <div class="page-header">
        <h1>Новая страница</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Список страниц'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create($pagesText) ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('url', ['label' => 'URL', 'class' => 'default-fild form-control', 'type' => 'text']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', ['label' => 'Title', 'class' => 'default-fild form-control', 'id' => 'clearTitle']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('description', ['label' => 'Description', 'class' => 'default-fild form-control']); ?>                           
                        </div>                          
                        <div class="form-group">
                            <?php echo $this->Form->input('body', ['label' => 'Текст', 'class' => 'default-fild form-control', 'required' => true, 'id' => 'block1']); ?>
                            <p class="help-block">Можно загружать изображения</p>                            
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace('block1');
                        </script>
                                                                                                                                                                                         
                        
                    </fieldset>
                    <?= $this->Form->button(__('Создать'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>

    
</div>
<!-- /.container-fluid -->


