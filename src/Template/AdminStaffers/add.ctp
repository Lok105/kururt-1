<div class="container-fluid">

    <div class="page-header">
        <h1>Добавление сотрудника</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Список сотрудников'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create($staffer, ['type' => 'file']) ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('name', ['label' => 'Имя', 'class' => 'default-fild form-control', 'required' => true]); ?>
                        </div>
                    
                        <div class="form-group">
                            <?php echo $this->Form->input('position', ['label' => 'Должность', 'class' => 'default-fild form-control']); ?>
                        </div>  
                        <div class="form-group">
                            <?php echo $this->Form->input('description', ['label' => 'Описание', 'class' => 'default-fild form-control']); ?>
                        </div> 
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_vk', ['label' => 'В контакте', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_fb', ['label' => 'Фейсбук', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_tw', ['label' => 'Твиттер', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_goo', ['label' => 'Гугл +', 'class' => 'default-fild form-control']); ?>
                        </div>                                                                                                                                              
                        <div class="checkbox">
                            <?php echo $this->Form->input('published', ['label' => 'Опубликовать', 'class' => 'default-fild form-control', 'type' => 'checkbox']); ?>
                        </div> 
                        <div class="clearfix"></div>                          

                    </fieldset> 
                        
                          <fieldset class="article-img">
                        
                            <label>Изображение сотрудника</label>
                            <div class="clear"></div>
                            <div class="clear"></div>
                            <span id="preview-top">
                                <div id="top_banner_img">
                                    <div class="top_banner_img">
                    
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img', ['class' => 'inputs', 'label' => false, 'type' => 'file', 'id' => 'art_img', 'class' => 'logo_f']); ?>
                            </div>
                            <?php echo $this->Form->input('x_top', ['type' => 'hidden', 'id' => 'x_top']); ?>
                            <?php echo $this->Form->input('y_top', ['type' => 'hidden', 'id' => 'y_top']); ?>
                            <?php echo $this->Form->input('w_top', ['type' => 'hidden', 'id' => 'w_top']); ?>
                            <?php echo $this->Form->input('h_top', ['type' => 'hidden', 'id' => 'h_top']); ?>        
                    	</fieldset>               
                            <script type="text/javascript">
                             function handleFileSelect(evt) {
                              var files = evt.target.files; 
                              for (var i = 0, f; f = files[i]; i++) {
                               if (!f.type.match('image.*')) {
                                continue; 
                               }
                               var reader = new FileReader();
                               var preview_top = document.getElementById('preview-top');
                               var top_banner_img = document.getElementById('top_banner_img');
                               reader.onload = (function(theFile) {
                                return function(e) {
                    
                                     preview_top.innerHTML = ['<img class="thumb article_thumb" src="', e.target.result,
                                                    '" title="', escape(theFile.name), '" id ="top_banner_img" />'].join('');
                                     $('#top_banner_img').Jcrop({
                                        aspectRatio: 500/600,
                                        boxWidth: 600, 
                                        //boxHeight: 600,
                                        onSelect: updateCoords,
                                        setSelect: [ 0, 0, 1000, 1000 ],
                                        onChange: updateCoords                       
                                     });
                                     
                                     function updateCoords(c)
                                        {
                                        	jQuery('#x_top').val(c.x);
                                        	jQuery('#y_top').val(c.y);
                                        	jQuery('#w_top').val(c.w);
                                        	jQuery('#h_top').val(c.h);
                                        };
                                        
                                       
                                };
                               })(f);
                               reader.readAsDataURL(f);
                              }
                             }
                             document.getElementById('art_img').addEventListener('change', handleFileSelect, false);
                            </script>
                                                
                    <?= $this->Form->button(__('Создать'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>

    
</div>
<!-- /.container-fluid -->