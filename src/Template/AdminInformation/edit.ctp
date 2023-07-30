<div class="container-fluid">

    <div class="page-header">
        <h1>Редактор компании</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Вернуться'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create($information, ['type' => 'file']) ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', ['label' => 'Название компании', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('description', ['label' => 'Слоган для главной', 'class' => 'default-fild form-control', 'type' => 'text']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('h1', ['label' => 'Заголовок H1 для страницы "О компании"', 'class' => 'default-fild form-control', 'type' => 'text']); ?>
                        </div>                                                
                        <div class="form-group">
                            <?php echo $this->Form->input('phone', ['label' => 'Телефон', 'class' => 'default-fild form-control']); ?>
                        </div>  
                        <div class="form-group">
                            <?php echo $this->Form->input('phone_1', ['label' => 'Телефон (дополнительный)', 'class' => 'default-fild form-control']); ?>
                        </div> 
                        <div class="form-group">
                            <?php echo $this->Form->input('phone_2', ['label' => 'Телефон (дополнительный)', 'class' => 'default-fild form-control']); ?>
                        </div>                                                                    
                        <div class="form-group">
                            <?php echo $this->Form->input('email', ['label' => 'E-mail', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('address', ['label' => 'Адрес', 'class' => 'default-fild form-control']); ?>
                        </div> 
                        <div class="form-group">
                            <?php echo $this->Form->input('w_time', ['label' => 'Время работы', 'class' => 'default-fild form-control']); ?>
                        </div>                                                
                        <div class="form-group">
                            <?php echo $this->Form->input('video', ['label' => 'Видео с YouTube просто скопируйте ссылку сюда', 'class' => 'default-fild form-control', 'type' => 'text']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('body', ['label' => 'Описание. Отображается на странице "О компании"', 'class' => 'default-fild form-control', 'id' => 'block1']); ?>
                            <p class="help-block">Можно загружать изображения</p>                            
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace('block1');
                        </script> 
                        
                        <div class="form-group">
                            <?php echo $this->Form->input('index_body', ['label' => 'Не большое описание. Отображается на главной странице и странице "О компании"', 'class' => 'default-fild form-control', 'id' => 'block2']); ?>
              
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace('block2');
                        </script> 
                        <div class="form-group">
                            <?php echo $this->Form->input('recaptcha', ['label' => 'Ключ Google reCaptcha 2', 'class' => 'default-fild form-control']); ?>
                            <p>Что бы защитить форму отправки сообщений от спама, зарегистрируйте сайт на <a href="https://www.google.com/recaptcha/intro/v3.html">Google reCaptha</a> и получите ключи для reCaptcha 2 (флажок). Когда вы заполните поля Ключ и Секретный ключ, рекапча включится автоматически на странице "Контакты"</p>
                        </div> 
                        <div class="form-group">
                            <?php echo $this->Form->input('recaptcha_secret', ['label' => 'Секретный ключ reCaptcha', 'class' => 'default-fild form-control']); ?>
                        </div>                                                
                        <div class="form-group">
                            <?php echo $this->Form->input('lat', ['label' => 'Координаты офиса Lat', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('lng', ['label' => 'Координаты офиса Lng', 'class' => 'default-fild form-control']); ?>
                        </div>                                                                                                                                                                                                                                        
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_fb', ['label' => 'Facebook', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_tw', ['label' => 'Twitter', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_wk', ['label' => 'VK', 'class' => 'default-fild form-control']); ?>
                        </div> 
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_goo', ['label' => 'Google', 'class' => 'default-fild form-control']); ?>
                        </div>                                                                                                                                                                           
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_inst', ['label' => 'Instagram', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('soc_you', ['label' => 'Youtube', 'class' => 'default-fild form-control']); ?>
                        </div>                        
                    </fieldset>
                    <fieldset>
                        <div class="dop-img-block">
                            <div class="line-add-title">Для качественного изображения, выберите изображение шириной не меньше 1920 px (1920/400)</div>
                          <fieldset class="article-img">
                            <label class="dop-img-title">Выберите изображение фона для страницы "О компании"</label>
                            <div class="clearfix"></div>
                            <span id="preview-top">
                                <div id="top_banner_img">
                                    <div class="top_banner_img article-img">
                                        <?php if($information->back) : ?>
                                            <img style="max-width: 100%;width: auto;" src="/img/upload/<?php echo $information->back; ?>"/>
                                        <?php endif; ?>        
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img', ['class' => 'inputs', 'label' => false, 'id' => 'art_img', 'type' => 'file', 'class' => 'logo_f']); ?>
                                <?php echo $this->Form->input('last_img', ['type' => 'hidden', 'value' => $information->back]); ?>
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
                                
                                var image = new Image();
                                image.src = reader.result;
                                image.onload = function(){
                    
                                    var imW = this.width;
                                    var imH = this.height;
                                    
                                     preview_top.innerHTML = ['<img class="thumb article_thumb" src="', e.target.result,
                                                    '" title="', escape(theFile.name), '" id ="top_banner_img" />'].join('');

                                     $('#top_banner_img').Jcrop({
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
                                            jQuery('#x_top').val(c.x);
                                        	jQuery('#y_top').val(c.y);
                                        	jQuery('#w_top').val(c.w);
                                        	jQuery('#h_top').val(c.h);
                                        };                                                    
                                    
                   
                                }

                                   
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
                          <fieldset class="article-img">
                            <label class="dop-img-title">Выберите изображение наша компания для главной (640/480)</label>
                            <div class="clearfix"></div>
                            <span id="preview-top1">
                                <div id="top_banner_img1">
                                    <div class="top_banner_img article-img">
                                        <?php if($information->index_img) : ?>
                                            <img style="max-width: 50%;width: auto;" src="/img/upload/<?php echo $information->index_img; ?>"/>
                                        <?php endif; ?>        
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img1', ['class' => 'inputs', 'label' => false, 'id' => 'art_img1', 'type' => 'file', 'class' => 'logo_f']); ?>
                                <?php echo $this->Form->input('last_img1', ['type' => 'hidden', 'value' => $information->index_img]); ?>
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
                                        aspectRatio: 600/480,
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
                    
                    
                    <fieldset>
                        <div class="dop-img-block">
                            <div class="line-add-title">Для качественного изображения, выберите изображение шириной не меньше 1920 px (1920/800)</div>
                          <fieldset class="article-img">
                            <label class="dop-img-title">Выберите изображение фона для главной, блок "достижения"</label>
                            <div class="clearfix"></div>
                            <span id="preview-top2">
                                <div id="top_banner_img2">
                                    <div class="top_banner_img article-img">
                                        <?php if($information->back2) : ?>
                                            <img style="max-width: 100%;width: auto;" src="/img/upload/<?php echo $information->back2; ?>"/>
                                        <?php endif; ?>        
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img2', ['class' => 'inputs', 'label' => false, 'id' => 'art_img2', 'type' => 'file', 'class' => 'logo_f']); ?>
                                <?php echo $this->Form->input('last_img2', ['type' => 'hidden', 'value' => $information->back2]); ?>
                            </div>
                            <?php echo $this->Form->input('x_top2', ['type' => 'hidden', 'id' => 'x_top2']); ?>
                            <?php echo $this->Form->input('y_top2', ['type' => 'hidden', 'id' => 'y_top2']); ?>
                            <?php echo $this->Form->input('w_top2', ['type' => 'hidden', 'id' => 'w_top2']); ?>
                            <?php echo $this->Form->input('h_top2', ['type' => 'hidden', 'id' => 'h_top2']); ?>        
                        </fieldset>               
                        <script type="text/javascript">
                         function handleFileSelect(evt) {
                            
                          var files = evt.target.files; 
                          
                          for (var i = 0, f; f = files[i]; i++) {
                           if (!f.type.match('image.*')) {
                            continue; 
                           }
                           
                           var reader = new FileReader();
                           var preview_top = document.getElementById('preview-top2');
                           var top_banner_img = document.getElementById('top_banner_img2');
                           
                           
                           reader.onload = (function(theFile) {
                          
                            return function(e) {
                                
                                var image = new Image();
                                image.src = reader.result;
                                image.onload = function(){
                    
                                    var imW = this.width;
                                    var imH = this.height;
                                    
                                     preview_top.innerHTML = ['<img class="thumb article_thumb" src="', e.target.result,
                                                    '" title="', escape(theFile.name), '" id ="top_banner_img2" />'].join('');

                                     $('#top_banner_img2').Jcrop({
                                        aspectRatio: 1920/800,
                                        trueSize: [imW, imH],
                                        //boxWidth: 600, 
                                        //boxHeight: 600,
                                        onSelect: updateCoords,
                                        setSelect: [ 0, 0, 1000, 1000 ],
                                        onChange: updateCoords                       
                                     });
                                    
                                     function updateCoords(c)
                                        {
                                            jQuery('#x_top2').val(c.x);
                                        	jQuery('#y_top2').val(c.y);
                                        	jQuery('#w_top2').val(c.w);
                                        	jQuery('#h_top2').val(c.h);
                                        };                                                    
                                    
                   
                                }

                                   
                            };
                           })(f);
                           reader.readAsDataURL(f);
                          }
                         }
                         document.getElementById('art_img2').addEventListener('change', handleFileSelect, false);
                        </script>
                     
                        </div>                                          

                        <div class="clearfix"></div>                    
                    </fieldset>  
                    
                    
                    <fieldset>
                        <div class="dop-img-block">
                            <div class="line-add-title">Для качественного изображения, выберите изображение шириной не меньше 1920 px (1920/800)</div>
                          <fieldset class="article-img">
                            <label class="dop-img-title">Выберите изображение фона для главной, блок "видео"</label>
                            <div class="clearfix"></div>
                            <span id="preview-top3">
                                <div id="top_banner_img3">
                                    <div class="top_banner_img article-img">
                                        <?php if($information->back3) : ?>
                                            <img style="max-width: 100%;width: auto;" src="/img/upload/<?php echo $information->back3; ?>"/>
                                        <?php endif; ?>        
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img3', ['class' => 'inputs', 'label' => false, 'id' => 'art_img3', 'type' => 'file', 'class' => 'logo_f']); ?>
                                <?php echo $this->Form->input('last_img3', ['type' => 'hidden', 'value' => $information->back3]); ?>
                            </div>
                            <?php echo $this->Form->input('x_top3', ['type' => 'hidden', 'id' => 'x_top3']); ?>
                            <?php echo $this->Form->input('y_top3', ['type' => 'hidden', 'id' => 'y_top3']); ?>
                            <?php echo $this->Form->input('w_top3', ['type' => 'hidden', 'id' => 'w_top3']); ?>
                            <?php echo $this->Form->input('h_top3', ['type' => 'hidden', 'id' => 'h_top3']); ?>        
                        </fieldset>               
                        <script type="text/javascript">
                         function handleFileSelect(evt) {
                            
                          var files = evt.target.files; 
                          
                          for (var i = 0, f; f = files[i]; i++) {
                           if (!f.type.match('image.*')) {
                            continue; 
                           }
                           
                           var reader = new FileReader();
                           var preview_top = document.getElementById('preview-top3');
                           var top_banner_img = document.getElementById('top_banner_img3');
                           
                           
                           reader.onload = (function(theFile) {
                          
                            return function(e) {
                                
                                var image = new Image();
                                image.src = reader.result;
                                image.onload = function(){
                    
                                    var imW = this.width;
                                    var imH = this.height;
                                    
                                     preview_top.innerHTML = ['<img class="thumb article_thumb" src="', e.target.result,
                                                    '" title="', escape(theFile.name), '" id ="top_banner_img3" />'].join('');

                                     $('#top_banner_img3').Jcrop({
                                        aspectRatio: 1920/800,
                                        trueSize: [imW, imH],
                                        //boxWidth: 600, 
                                        //boxHeight: 600,
                                        onSelect: updateCoords,
                                        setSelect: [ 0, 0, 1000, 1000 ],
                                        onChange: updateCoords                       
                                     });
                                    
                                     function updateCoords(c)
                                        {
                                            jQuery('#x_top3').val(c.x);
                                        	jQuery('#y_top3').val(c.y);
                                        	jQuery('#w_top3').val(c.w);
                                        	jQuery('#h_top3').val(c.h);
                                        };                                                    
                                    
                   
                                }

                                   
                            };
                           })(f);
                           reader.readAsDataURL(f);
                          }
                         }
                         document.getElementById('art_img3').addEventListener('change', handleFileSelect, false);
                        </script>
                     
                        </div>                                          

                        <div class="clearfix"></div>                    
                    </fieldset>   
                    
                    
                    <fieldset>
                        <div class="dop-img-block">
                            <div class="line-add-title">Для качественного изображения, выберите изображение шириной не меньше 1920 px (1920/800)</div>
                          <fieldset class="article-img">
                            <label class="dop-img-title">Выберите изображение фона для главной, блок "партнеры"</label>
                            <div class="clearfix"></div>
                            <span id="preview-top4">
                                <div id="top_banner_img4">
                                    <div class="top_banner_img article-img">
                                        <?php if($information->back4) : ?>
                                            <img style="max-width: 100%;width: auto;" src="/img/upload/<?php echo $information->back4; ?>"/>
                                        <?php endif; ?>        
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img4', ['class' => 'inputs', 'label' => false, 'id' => 'art_img4', 'type' => 'file', 'class' => 'logo_f']); ?>
                                <?php echo $this->Form->input('last_img4', ['type' => 'hidden', 'value' => $information->back4]); ?>
                            </div>
                            <?php echo $this->Form->input('x_top4', ['type' => 'hidden', 'id' => 'x_top4']); ?>
                            <?php echo $this->Form->input('y_top4', ['type' => 'hidden', 'id' => 'y_top4']); ?>
                            <?php echo $this->Form->input('w_top4', ['type' => 'hidden', 'id' => 'w_top4']); ?>
                            <?php echo $this->Form->input('h_top4', ['type' => 'hidden', 'id' => 'h_top4']); ?>        
                        </fieldset>               
                        <script type="text/javascript">
                         function handleFileSelect(evt) {
                            
                          var files = evt.target.files; 
                          
                          for (var i = 0, f; f = files[i]; i++) {
                           if (!f.type.match('image.*')) {
                            continue; 
                           }
                           
                           var reader = new FileReader();
                           var preview_top = document.getElementById('preview-top4');
                           var top_banner_img = document.getElementById('top_banner_img4');
                           
                           
                           reader.onload = (function(theFile) {
                          
                            return function(e) {
                                
                                var image = new Image();
                                image.src = reader.result;
                                image.onload = function(){
                    
                                    var imW = this.width;
                                    var imH = this.height;
                                    
                                     preview_top.innerHTML = ['<img class="thumb article_thumb" src="', e.target.result,
                                                    '" title="', escape(theFile.name), '" id ="top_banner_img4" />'].join('');

                                     $('#top_banner_img4').Jcrop({
                                        aspectRatio: 1920/800,
                                        trueSize: [imW, imH],
                                        //boxWidth: 600, 
                                        //boxHeight: 600,
                                        onSelect: updateCoords,
                                        setSelect: [ 0, 0, 1000, 1000 ],
                                        onChange: updateCoords                       
                                     });
                                    
                                     function updateCoords(c)
                                        {
                                            jQuery('#x_top4').val(c.x);
                                        	jQuery('#y_top4').val(c.y);
                                        	jQuery('#w_top4').val(c.w);
                                        	jQuery('#h_top4').val(c.h);
                                        };                                                    
                                    
                   
                                }

                                   
                            };
                           })(f);
                           reader.readAsDataURL(f);
                          }
                         }
                         document.getElementById('art_img4').addEventListener('change', handleFileSelect, false);
                        </script>
                     
                        </div>                                          

                        <div class="clearfix"></div>                    
                    </fieldset>                                                        
                    
                                       
                    <?= $this->Form->button(__('Редактировать'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>

    
</div>
<!-- /.container-fluid -->

