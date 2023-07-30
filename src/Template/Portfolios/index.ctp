<div class="text-block portfolio-links-block">

    <h1 class="change-text">
        <ul class="portfolio-texts">
            <li data-in-effect="tada" data-out-effect="flipOutX" data-out-shuffle="true">Мои работы</li>   
            <li data-in-effect="bounceInLeft">Все сайты, представленные тут, живые!</li>
    		<li data-in-effect="fadeIn" data-out-effect="rotateOutDownLeft">По многим сайтам и сейчас идет расширение функциональности</li>
            <li data-in-effect="fadeInUpBig" data-out-effect="fadeOutUpBig">под растущие потребности заказчиков</li>
        </ul>

    </h1>    
   
    <div class="basic-text index-text">
        <?php if($portfolios) : ?>
            <?php $portfolio_count = 1; ?>
            <?php 
                $random_arr = array();
                
            ?>
            <?php foreach($portfolios as $portfolio) : ?>
                <div class="link-portfolio-block link-port-1">
                    <div class="img-block"><img src="/img/upload/<?php echo $portfolio->img; ?>" alt="<?php echo $portfolio->img_alt; ?>"/></div>
                    <div class="fon-block fon-block-<?php echo $portfolio->random; ?>"></div>
                    <div class="click-block"><a href="/portfolios/<?php echo $portfolio->alias; ?>"></a></div>
                    <div class="port-link">
                        <a href="/portfolios/<?php echo $portfolio->alias; ?>"><?php echo $portfolio->short; ?></a>
                    </div>
                    <div class="port-link-title">
                        <?php if(!$portfolio->h1 || $portfolio->h1 == '') : ?>
                            <a href="/portfolios/<?php echo $portfolio->alias; ?>"><?php echo $portfolio->title; ?></a>
                        <?php else : ?>
                            <a href="/portfolios/<?php echo $portfolio->alias; ?>"><?php echo $portfolio->h1; ?></a>
                        <?php endif; ?> 
                    </div>                   
                </div>
                <?php $portfolio_count++; ?>
            <?php endforeach; ?>
            <input type="hidden" id="countPrice" value="<?php echo $portfolio_count - 1; ?>"/>
            
            <div class="pagination-block">               
                <ul class="pagination-list">
                    <?= $this->Paginator->first('<span></span>', ['escape' => false]) ?>
                    <?= $this->Paginator->prev('<span></span>', ['escape' => false]) ?>
                    <?= $this->Paginator->numbers(['modulus' => 9]) ?>
                    <?= $this->Paginator->next('<span></span>', ['escape' => false]) ?>
                    <?= $this->Paginator->last('<span></span>', ['escape' => false]) ?>
                </ul>                
            </div>            
            
            
            <div class="link-why">
                <a class="fun-link" href="/articles/pochemu-stoit-zakazat-sayt-u-menya">
                    <span class="fun_1">П</span>
                    <span class="fun_2">о</span>
                    <span class="fun_3">ч</span>
                    <span class="fun_4">е</span>
                    <span class="fun_5">м</span>
                    <span class="fun_6 margin-right-15">у</span>
                    <span class="fun_7">с</span>
                    <span class="fun_8">т</span>
                    <span class="fun_9">о</span>
                    <span class="fun_10">и</span>
                    <span class="fun_11 margin-right-15">т</span>
                    <span class="fun_12">з</span>
                    <span class="fun_13">а</span>
                    <span class="fun_14">к</span>
                    <span class="fun_15">а</span>
                    <span class="fun_16">з</span>
                    <span class="fun_17">а</span>
                    <span class="fun_18">т</span>
                    <span class="fun_19 margin-right-15">ь</span>
                    <span class="fun_20">с</span>
                    <span class="fun_21">а</span>
                    <span class="fun_22">й</span>
                    <span class="fun_23 margin-right-15">т</span>
                    <span class="fun_24 margin-right-15">у</span>
                    <span class="fun_25">м</span>
                    <span class="fun_26">е</span>
                    <span class="fun_27">н</span>
                    <span class="fun_28 margin-right-15">я</span>
                    <span class="fun_29">?</span>
                </a>
            </div>
           
            
            
        <?php else : ?>
            В данной рубрике еще нет статей. Заходите позже
            <div><a href="/">На главную</a> <a href="/categories">Все статьи</a></div>
        <?php endif; ?>
    </div>
    
</div>



