<?php $this->Html->addCrumb('Услуги'); ?>

<?php if($information->body && $information->body != '') : ?>
    <section class="about-area ptb-100 bottom-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="about-wrap">
                        <?php echo $information->body; ?>
                    </div>
                </div>            
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="service-area ptb-80">
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp">
				<div class="section-title text-center">
					<h2>Наши услуги</h2>
					<p><?php echo $information->index_body; ?></p>
				</div>
			</div>
		</div>    
        <div class="row">
            <?php if($countServices == 1) : ?>
                <div class="col-md-4 visible-lg visible-md"></div>
            <?php elseif($countServices == 2) : ?>
                <div class="col-md-2 visible-lg visible-md"></div>
            <?php endif; ?>        
            <?php foreach($services as $item) : ?>
                <?php //debug($item); ?>

                <div class="col-md-4 col-sm-6 col-xs-12 col">
                    <div class="service-wrap mb-30">
                        <div class="service-img">
                            <img src="/img/upload/<?php echo $item->img; ?>" alt="<?php echo $item->menu_title; ?>" />
                        </div>
                        <div class="service-content">
                            <h3><?php echo $item->h1; ?></h3>
                            <p><?php echo $item->short; ?></p>
                            <a href="/services/<?php echo $item->alias; ?>">Подробнее</a>
                        </div>
                    </div>
                </div>        
            <?php endforeach; ?>

        </div>
    </div>
</section>
