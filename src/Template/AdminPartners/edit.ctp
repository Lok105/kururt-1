<div class="container-fluid">

    <div class="page-header">
        <h1>Редактировать ссылку партнера</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Весь список'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create($slide, ['type' => 'file']) ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', ['label' => 'Название', 'class' => 'default-fild form-control', 'required' => true, 'id' => 'title_port']); ?>
                        </div>
                       
                        <div class="form-group">
                            <?php echo $this->Form->input('url', ['label' => 'URL', 'class' => 'default-fild form-control']); ?>
                        </div> 
                    
                        <div class="clearfix"></div>

                        
                          <fieldset class="article-img">
                            <label>Логотип партнера (Размер 300/100)</label>
                            <div class="clear"></div>
                            <span id="preview-top">
                                <div id="top_banner_img">
                                    <div class="top_banner_img article-img">
                                        <?php if($slide->img) : ?>
                                            <img style="max-width: 50%;width: auto;" src="/img/upload/<?php echo $slide->img; ?>"/>
                                        <?php endif; ?>                     
                                    </div>
                                </div>
                            </span>
                            <div class="file-put article-put">        
                                <?php echo $this->Form->input('img', ['class' => 'inputs', 'label' => false, 'type' => 'file', 'id' => 'art_img', 'class' => 'logo_f']); ?>
                                <?php echo $this->Form->input('last_img', ['type' => 'hidden', 'value' => $slide->img]); ?>
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
                                        aspectRatio: 300/100,
                                        //boxWidth: 800, 
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
                            
                            
                           
                            
                            
                            
                                               
                    <?= $this->Form->button(__('Сохранить'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>

    
</div>
<!-- /.container-fluid -->