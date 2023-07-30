<div class="container-fluid">
    <div class="page-header">
        <h1><?= h($page->title) ?></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link('Все страницы', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Редактировать', ['action' => 'edit', $page->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php //debug($page); ?>
           <div class="pages view large-9 medium-8 columns content">
            <h3><?= h($page->title) ?></h3>
            <table class="vertical-table">
                <tr>
                    <th scope="row"><?= __('Title') ?></th>
                    <td><?= h($page->title) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Alias') ?></th>
                    <td><?= h($page->alias) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('H1') ?></th>
                    <td><?= h($page->h1) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Publish') ?></th>
                    <td><?= h($page->publish) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($page->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= 'Создана' ?></th>
                    <td><?= h($page->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= 'Отредактирована' ?></th>
                    <td><?= h($page->modified->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-xs-12">
                <h4>Описание / description</h4>
                    <?= $this->Text->autoParagraph(h($page->description)); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4>Страница</h4>
                    <?= $page->body; ?>
                </div>
            </div>
        </div>
        </div>                
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <h2>Слайдер</h2>
                <?php //debug($images->items); ?> 
                <div class="single-offer-hotel">                
                    <?php foreach ($page->pictures as $image): ?>
                        <?php //debug($image); ?>
                        <div class="offer-img">
                            <div class="room-img-wrapper">
                                <?php echo $this->Form->create('delPictures', ['url' => ['controller' => 'AdminPages', 'action' => 'delPictureGal', $image->id]]); ?>
                                    <?php echo $this->Form->button('<i class="fa fa-times" aria-hidden="true"></i>', ['class' => 'cross-button']); ?>
                                <?php echo $this->Form->end(); ?>                                             
                                <a class="image-popup-no-margins hotel-def-img left-img" href="/img/upload/<?php echo $image->img; ?>" title="<?php echo $image->img_alt; ?>">
                                    <img src="/img/upload/<?php echo $image->img; ?>" alt="<?php echo $image->img_alt; ?>">
                                </a>
                            </div>
                                       
                        </div>
                    <?php endforeach; ?>
                </div>                
                <div class="clearfix"></div>

                <div class="dop-img-block">
                    <?php echo $this->Form->create('dop_img', ['url' => ['action' => 'addArticle', $page->id], 'type' => 'file']); ?>
                    <fieldset class="article-img">
                        <label class="dop-img-title">Добавить изображение</label>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', ['label' => 'Заглавие слайда', 'class' => 'default-fild form-control']); ?>                          
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('body', ['label' => 'Текст слайда', 'class' => 'default-fild form-control']); ?>                          
                        </div>                                                
                        <div class="form-group">
                            <?php echo $this->Form->input('img_alt', ['label' => 'Альтернативное описание картинки', 'class' => 'default-fild form-control']); ?>                          
                        </div>
                        <div class="clearfix"></div>
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
                                aspectRatio: 2.1,
                                boxWidth: 800, 
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
                    <?= $this->Form->button(__('Добавить изображение'), ['class' => 'btn btn-primary']) ?>
                    <?php echo $this->Form->end(); ?>                        
                </div>


        </div>                
    </div>    
   
</div>
<!-- /.container-fluid -->


