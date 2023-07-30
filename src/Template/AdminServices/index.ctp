<div class="container-fluid">
    <div class="page-header">
        <h1>Каталог услуг</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Новая услуга'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>
                <?php if($zapros) : ?>
                    Результат поиска по запросу "<?php echo $zapros; ?>"
                <?php else : ?>
                    Все услуги
                <?php endif; ?>
            </h2>
            <div class="product-form">
                <?php echo $this->Form->create('search', ['type' => 'get']); ?>
                        <div class="form-group input-group">
                            <input class="form-control" type="text" name="search" placeholder="Найти услугу">
                            <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                        </div>                
                <?php echo $this->Form->end(); ?>
                <div class="buttons-block">
                    <?= $this->Html->link(__('Сбросить фильтр'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>                
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('title', 'Title <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('menu_title', 'Пункт меню <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('position', 'Позиция <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('published', 'Опубликована <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('show_menu', 'Меню <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created', 'Создана <i class="fa fa-sort" aria-hidden="true"></i>', ['escape' => false]) ?></th>
                            <th scope="col" class="actions">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($pages) : ?>
                        <?php foreach ($pages as $product): ?>
                        <?php //debug($product); ?>
                        <tr>
                            <td><?= $this->Number->format($product->id) ?></td>
                         
                            <td><a href="/pages/<?php echo $product->alias; ?>" target="_blank"><?= h($product->title) ?></a></td>
                            <td><?= h($product->menu_title) ?></td>
                            <td style="text-align: center;"><?= h($product->position) ?></td>
                            <td style="text-align: center;">
                                <?php if($product->published == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if($product->show_menu == '1') : ?>
                                    <div class="blue-color"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                <?php else : ?>
                                    <div class="red-color"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                                <?php endif; ?>
                            </td>
                                                        
                            <td><?= h($product->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Редактировать'), ['action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $product->id], ['confirm' => __('Вы действительно хотите удалить # {0}?', $product->title)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                    
                    <?php else : ?>
                        <tr>
                            <td>Еще нет страниц</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('Первая')) ?>
                    <?= $this->Paginator->prev('< ' . __('Предыдущая')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Следующая') . ' >') ?>
                    <?= $this->Paginator->last(__('Последняя') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Страница {{page}} из {{pages}}, показано {{current}} записей из {{count}} всего')]) ?></p>
            </div>
        </div>
    </div>
    
    
    
    <div class="row">
        <div class="col-xs-12">
            <h2>Редактор основной страницы "Услуги"</h2>        
                <div class="news form large-9 medium-8 columns content">
                    <?= $this->Form->create($information, ['type' => 'file']) ?>
                    <fieldset>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', ['label' => 'Title основной страницы Услуги', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('description', ['label' => 'Description основной страницы Услуги', 'class' => 'default-fild form-control', 'type' => 'text']); ?>
                        </div>                        
                        <div class="form-group">
                            <?php echo $this->Form->input('h1', ['label' => 'Заголовок H1 для страницы Услуги', 'class' => 'default-fild form-control', 'type' => 'text']); ?>
                        </div>                     
                        <div class="form-group">
                            <?php echo $this->Form->input('index_body', ['label' => 'Краткое описание для и главной и для подзаголовка', 'class' => 'default-fild form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('body', ['label' => 'Текст для основной страницы Услуги', 'class' => 'default-fild form-control', 'id' => 'block1']); ?>
                            <p class="help-block">Можно загружать изображения</p>                            
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace('block1');
                        </script>                    
                    </fieldset>
                    <fieldset>
                        <div class="dop-img-block">
                            <div class="line-add-title">Для качественного изображения, выберите изображение шириной не меньше 1920 px</div>
                          <fieldset class="article-img">
                            <label class="dop-img-title">Выберите изображение фона для основной страницы "Услуги"</label>
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
                    
                   
                    <?= $this->Form->button(__('Редактировать'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>                
    </div>    
    
</div>
<!-- /.container-fluid -->
