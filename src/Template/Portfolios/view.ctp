<div class="text-block portfolio-block">
    <h1>
        <?php if($portfolio->h1 && $portfolio->h1 != '') : ?>
            <?php echo $portfolio->h1; ?>
        <?php else : ?>
            <?php echo $portfolio->title; ?>
        <?php endif; ?>
    </h1>
    <?php if($portfolio->site_url && $portfolio->site_url != '') : ?>
        <div class="link-portfolio">
            <a href="<?php echo $portfolio->site_url; ?>" target="_blank"><?php echo $portfolio->site_name; ?>, перейти на сайт</a>
        </div>
    <?php endif; ?>
    <div class="portfolio-img-block port-full-<?php echo $count_pic; ?>">
        <?php //debug($count_pic); ?>
        <?php $count_num = 1; ?>
        <?php foreach($pictures as $pic) : ?>
            <?php $num_block = mt_rand(1, 5); ?>
        
            <div class="port-pict-block port-block-<?php echo $count_pic.$count_num; ?> rand-<?php echo $num_block; ?>">
                <span class="knop-<?php echo $num_block; ?>"></span>
                <div class="port-pic-wrapper">
                    <a class="fancybox" rel="group1" href="/img/upload/<?php echo $pic->img; ?>"><img src="/img/upload/<?php echo $pic->img; ?>" alt="<?php echo $pic->img_alt; ?>"/></a>
                </div>
            </div>
            <?php //debug($num_block); ?>
            <?php $count_num++; ?>
        <?php endforeach; ?>
        <div class="clear"></div>
    </div>

    <div class="portfolio-scroll">    
        <div class="wrap">
        
        
        	<div class="frame nonitembased" id="nonitembased">
        		<div class="slidee">    
            
                    <?php if($portfolio->fishki && $portfolio->fishki != '') : ?>
                        <div class="fishki-title">Что интересного:</div>
                        <div class="basic-text fiski-portfolio"><?php echo $portfolio->fishki; ?></div>
                    <?php endif; ?> 
                    <?php if($portfolio->text && $portfolio->text != '') : ?>
                    <div class="body-title">О сайте:</div>   
                    <div class="basic-text">
                        <?php echo $portfolio->text; ?>
                    </div>
                    <?php endif; ?>
            
                </div>
            </div>
            <ul class="pages"></ul>
        </div>
    </div>    
    
</div>


