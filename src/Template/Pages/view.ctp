<?php if(isset($crumbs['one'])) : ?>
    <?php if(isset($crumbs['two'])) : ?>
        <?php $this->Html->addCrumb($crumbs['one']['title'], ['controller' => 'Pages', 'action' => 'view', $crumbs['one']['alias']]); ?>
    <?php else : ?>
        <?php $this->Html->addCrumb($crumbs['one']['title']); ?>    
    <?php endif; ?>
<?php endif; ?>
<?php if(isset($crumbs['two'])) : ?>
    <?php if(isset($crumbs['three'])) : ?>
        <?php $this->Html->addCrumb($crumbs['two']['title'], ['controller' => 'Pages', 'action' => 'view', $crumbs['two']['alias']]); ?>
    <?php else : ?>
        <?php $this->Html->addCrumb($crumbs['two']['title']); ?>   
    <?php endif; ?>
<?php endif; ?>
<?php if(isset($crumbs['three'])) : ?>
    <?php if(isset($crumbs['fore'])) : ?>
        <?php $this->Html->addCrumb($crumbs['three']['title'], ['controller' => 'Pages', 'action' => 'view', $crumbs['three']['alias']]); ?>
    <?php else : ?> 
        <?php $this->Html->addCrumb($crumbs['three']['title']); ?>   
    <?php endif; ?>
<?php endif; ?>

<?php if($service->body && $service->body != '') : ?>
    <section class="about-area ptb-100 bottom-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="about-wrap">
                        <?php echo $service->body; ?>
                    </div>
                </div>            
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if($services) : ?>
<section class="service-area ptb-80">
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp">
				<div class="section-title text-center">
					<h2><?php echo $service->menu_title; ?></h2>
					<p><?php echo $service->short; ?></p>
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
                            <a href="/pages/<?php echo $item->alias; ?>">Подробнее</a>
                        </div>
                    </div>
                </div>        
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>