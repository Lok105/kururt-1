<div class="container-fluid">

    <div class="page-header">
        <h1>Новая услуга</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Список услуг'), ['controller' => 'AdminServices', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>            
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create($page, ['type' => 'file']) ?>
                    <fieldset>
                        <label>Принадлежность услуг</label>
                        <div class="form-group">
                            <?php echo $this->Form->select('parent_id', $page_select, ['class' => 'default-fild form-control', 'empty' => 'Родительская/Самостоятельная услуга']); ?>
                        </div>
                    
                        <div class="form-group">
                            <?php echo $this->Form->input('title', ['label' => 'Название услуги | title', 'class' => 'default-fild form-control', 'required' => true, 'id' => 'title']); ?>
                        </div>                                            
                        <div class="form-group">
                            <?php echo $this->Form->input('alias', ['label' => 'Алиас / псевдоним', 'class' => 'default-fild form-control', 'id' => 'alias']); ?>
                            <p class="help-block">Заполняется автоматически при указании Титл или укажите сами латинские буквы и цифры, знак -</p>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('menu_title', ['label' => 'Пункт меню', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('short', ['label' => 'Краткое описание для анонса', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('body', ['label' => 'Содержимое услуги', 'class' => 'default-fild form-control', 'id' => 'block1']); ?>
                            <p class="help-block">Можно загружать изображения</p>                            
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace('block1');
                        </script>
                                                                                             
                        <div class="form-group">
                            <?php echo $this->Form->input('h1', ['label' => 'Заголовок | H1', 'class' => 'default-fild form-control']); ?>
                        </div>                        
                        <div class="form-group">
                            <?php echo $this->Form->input('position', ['label' => 'Позиция пункта в меню', 'class' => 'default-fild form-control']); ?>
                            <p class="help-block">Если не указана, будет использоваться сортировка по Пункт меню</p>
                        </div>
                        <div class="checkbox">
                            <?php echo $this->Form->input('published', ['label' => 'Опубликовать', 'class' => 'default-fild form-control', 'type' => 'checkbox']); ?>
                        </div> 
                        <div class="clearfix"></div> 
                        <div class="checkbox">
                            <?php echo $this->Form->input('show_menu', ['label' => 'Отображать в меню', 'class' => 'default-fild form-control', 'type' => 'checkbox']); ?>
                        </div> 
                        <div class="clearfix"></div>   
                        <div class="checkbox">
                            <?php echo $this->Form->input('show_index', ['label' => 'Показывать на главной', 'class' => 'default-fild form-control', 'type' => 'checkbox']); ?>
                        </div> 
                        <div class="clearfix"></div>                                                                                              
                        <div class="form-group">
                            <?php echo $this->Form->input('description', ['label' => 'Описание | Description', 'class' => 'default-fild form-control']); ?>
                        </div>                                                                                                                                                                                                                
                        
                    </fieldset>
                    <fieldset>
                        <div class="dop-img-block">
                            <div class="line-add-title">Изображение услуги для предпросмотра</div>                    
                          <fieldset class="article-img">
                        
                            <label>Изображение услуги</label>
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
                                        aspectRatio: 400/320,
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
                        </div>                                          

                        <div class="clearfix"></div>                    
                    </fieldset>                             
                            
                    <fieldset>
                        <div class="dop-img-block">
                            <div class="line-add-title">Для качественного изображения, выберите изображение шириной не меньше 1920 px</div>
                          <fieldset class="article-img">
                            <label class="dop-img-title">Выберите изображение фона для страницы</label>
                            <div class="clearfix"></div>
                            <span id="preview-top1">
                                <div id="top_banner_img1">
                                    <div class="top_banner_img">
     
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img1', ['class' => 'inputs', 'label' => false, 'id' => 'art_img1', 'type' => 'file', 'class' => 'logo_f']); ?>
                            </div>
                            <?php echo $this->Form->input('x_top1', ['type' => 'hidden', 'id' => 'x_top1']); ?>
                            <?php echo $this->Form->input('y_top1', ['type' => 'hidden', 'id' => 'y_top1']); ?>
                            <?php echo $this->Form->input('w_top1', ['type' => 'hidden', 'id' => 'w_top1']); ?>
                            <?php echo $this->Form->input('h_top1', ['type' => 'hidden', 'id' => 'h_top1']); ?>        
                        </fieldset>               
                        <script type="text/javascript">
                         function handleFileSelect(evt) {
                            
                          var files = evt.target.files; 
                          
                          for (var i = 0, f; f = files[i]; i++) {
                           if (!f.type.match('image.*')) {
                            continue; 
                           }
                           
                           var reader = new FileReader();
                           var preview_top = document.getElementById('preview-top1');
                           var top_banner_img = document.getElementById('top_banner_img1');
                           
                           
                           reader.onload = (function(theFile) {
                          
                            return function(e) {
                                
                                var image = new Image();
                                image.src = reader.result;
                                image.onload = function(){
                    
                                    var imW = this.width;
                                    var imH = this.height;
                                    
                                     preview_top.innerHTML = ['<img class="thumb article_thumb" src="', e.target.result,
                                                    '" title="', escape(theFile.name), '" id ="top_banner_img1" />'].join('');

                                     $('#top_banner_img1').Jcrop({
                                        aspectRatio: 1920/400,
                                        trueSize: [imW, imH],
                                        //boxWidth: 600, 
                                        //boxHeight: 600,
                                        onSelect: updateCoords,
                                        setSelect: [ 0, 0, 1000, 1000 ],
                                        onChange: updateCoords                       
                                     });
                                    
                                     function updateCoords(c)
                                        {
                                            jQuery('#x_top1').val(c.x);
                                        	jQuery('#y_top1').val(c.y);
                                        	jQuery('#w_top1').val(c.w);
                                        	jQuery('#h_top1').val(c.h);
                                        };                                                    
                                    
                   
                                }

                                   
                            };
                           })(f);
                           reader.readAsDataURL(f);
                          }
                         }
                         document.getElementById('art_img1').addEventListener('change', handleFileSelect, false);
                        </script>
                     
                        </div>                                          

                        <div class="clearfix"></div>                    
                    </fieldset>                            
                                               
                    <?= $this->Form->button(__('Создать'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>

    
</div>
<!-- /.container-fluid -->
