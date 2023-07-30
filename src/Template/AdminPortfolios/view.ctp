<div class="container-fluid">

    <div class="page-header">
        <h2>Сайт портфолио</h2>
    </div>
    <div class="row">
  
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= h($portfolio->title) ?></h3>
                </div>
                <div class="panel-body">
                        <div class="small-content-block">
                            <div class="product-basic-info">
                                <?php if($portfolio->img) : ?>
                                    <div class="media_product_block">
                                        <a class="image-popup-no-margins" href="/img/upload/<?php echo $portfolio->img; ?>" title="<?php echo $portfolio->title; ?>">
                                        	<img src="/img/upload/<?php echo $portfolio->img; ?>" alt="<?php echo $portfolio->title; ?>"/>
                                        </a>                     
                                    </div>              
                                <?php else : ?>
                                    <div class="media_product_block">
                                        <img src="/img/no_photo.png" alt=""/>
                                    </div>            
                                <?php endif; ?>
                                <div class="product-text-block">
                                    <div class="product-title item-line"><span>Заголовок H1</span> <?php echo $portfolio->h1; ?></div>
                                    <div class="item-line"><span>Title</span> <?php echo $portfolio->title; ?></div>                                 
                                    <?php if($portfolio->short) : ?>
                                        <div class="item-desc">Краткое описание:</div>
                                        <div class="product-short"><?php echo $portfolio->short; ?></div>
                                    <?php endif; ?>
                                    <?php if($portfolio->text) : ?>
                                        <div class="item-desc">Полный текст:</div>
                                        <div class="product-body"><?= $portfolio->text; ?></div>
                                    <?php endif; ?>

                
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="product-char-block">
                                <div class="pictures-title">Изображения к сайту</div>
                                <div class="pictures-block">
                                    <?php foreach($portfolio->pictures as $picture) : ?>
                                        <div class="picture-block">
                                            <img src="/img/upload/<?php echo $picture->img; ?>"/>
                                            <?php echo $this->Form->create('delPictures', ['url' => ['action' => 'delPictures', $picture->id]]); ?>
                                            <?php echo $this->Form->input('portfolio', ['type' => 'hidden', 'value' => $portfolio->id]); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-times" aria-hidden="true"></i>', ['class' => 'cross-button']); ?>
                                            <?php echo $this->Form->end(); ?>
                                        </div>
                                    <?php endforeach; ?>                     
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add-picture-block">
                                    <?php echo $this->Form->create('pictures', ['type' => 'file']); ?>
                                      <fieldset class="article-img">
                                        <label>Добавить изображение</label>
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
                                                        //aspectRatio: 200/300,
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
                                    <?php echo $this->Form->submit('Добавить', ['class' => 'btn btn-primary']); ?>
                                    <?php echo $this->Form->end(); ?>
                                </div>                
                
                            </div>
                    
                        </div>


                </div>               
            </div>
        </div>
        
    </div>
</div>

<?php //foreach($cat_obj as $cat){debug($cat);} ?>