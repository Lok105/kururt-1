<?php $this->Html->addCrumb('О компании'); ?>

<section class="about-area ptb-100">
    <div class="container">
        <div class="row">
            <?php if($information->index_img && $information->index_img != '') : ?>
                <div class="col-md-6 col-xs-12">
                    <div class="about-img black-opacity">
                        <img src="/img/upload/<?php echo $information->index_img; ?>" alt="<?php echo $information->title; ?>" />
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="about-wrap">
                        <?php echo $information->index_body; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-xs-12">
                    <div class="about-wrap">
                        <?php echo $information->index_body; ?>
                    </div>
                </div>            
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="about-area ptb-100 bg-1">
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


<?php if($staffers) : ?>

<section class="team-area ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<div class="section-title text-center">
					<h2>Наша команда</h2>
					<p>Люди наш самый ценный ресурс. Мы сплоченная, целеустремленная команда единомышленников.</p>
				</div>
			</div>
		</div>
		<div class="row">
            <?php $countStaff = 1; ?>
            <?php foreach($staffers as $staff) : ?>
    			<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".<?php echo $countStaff; ?>s">
    				<div class="team-wrap2 mb-30">
    					<div class="team-img">
    						<img src="/img/upload/<?php echo $staff->img; ?>" alt="<?php echo $staff->name; ?>" />
                            <div class="overlay">
    							<h3><?php echo $staff->name; ?></h3>
                                <span><?php echo $staff->position; ?></span>
    							<p><?php echo $staff->description; ?></p>
                                <ul>
                                    <?php if($staff->soc_fb && $staff->soc_fb != '') : ?>
                                        <li><a href="<?php echo $staff->soc_fb; ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; ?>
                                    <?php if($staff->soc_tw && $staff->soc_tw != '') : ?>
                                        <li><a href="<?php echo $staff->soc_tw; ?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>    								
                                    <?php if($staff->soc_vk && $staff->soc_vk != '') : ?>
                                        <li><a href="<?php echo $staff->soc_vk; ?>"><i class="fa fa-vk"></i></a></li>
                                    <?php endif; ?>
                                    <?php if($staff->soc_goo && $staff->soc_goo != '') : ?>
                                        <li><a href="<?php echo $staff->soc_goo; ?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?php endif; ?>
    							</ul>
    						</div>
    					</div>
    					<div class="team-content">
    						<div class="team-name"><?php echo $staff->name; ?></div>
    						<p><?php echo $staff->position; ?></p>
    					</div>
    				</div>
    			</div>                
                <?php $countStaff++; ?>
            <?php endforeach; ?>
        
		</div>
	</div>
</section>
<?php endif; ?>
