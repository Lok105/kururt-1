<?php $this->Html->addCrumb('Блог', ['controller' => 'News', 'action' => 'index']); ?>
<?php $this->Html->addCrumb($new->h1); ?>

<?php if($new->body && $new->body != '') : ?>
    <section class="about-area ptb-100 bottom-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="about-wrap">
                        <?php echo $new->body; ?>
                    </div>
                </div>            
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if($news) : ?>
<section class="service-area ptb-100 bg-1">
    <div class="container">
        <div class="row">
            <?php if($countNews == 1) : ?>
                <div class="col-md-4 visible-lg visible-md"></div>
            <?php elseif($countNews == 2) : ?>
                <div class="col-md-2 visible-lg visible-md"></div>
            <?php endif; ?>
            <?php $countNew = 1; ?>        
            <?php foreach($news as $item) : ?>
                <?php //debug($item); ?>

    			<div class="col-md-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".<?php echo $countNew; ?>s">
    				<div class="blog-wrap">
    					<div class="blog-img">
    						<img src="/img/upload/<?php echo $item->img; ?>" alt="<?php echo $item->h1; ?>" />
    					</div>
    					<div class="blog-content new-anonce">
    						<h3><a href="/news/<?php echo $item->alias; ?>"><?php echo $item->h1; ?></a></h3>
                            <div class="new-date"><?php //echo $item->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU'); ?></div>
    						<p><?php echo $item->short; ?></p>
    						<a href="/news/<?php echo $item->alias; ?>" class="btn-style">Читать</a>
    					</div>
    				</div>
    			</div>
                <?php $countNew++; ?>        
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>