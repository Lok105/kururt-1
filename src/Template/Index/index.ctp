<?php if(!empty($slides)) : ?>
<!-- Слайды на главной странице -->
<section class="slider-area">
    <div class="slider-active2 slider-next-prev-style">
        <?php foreach($slides as $slide) : ?>
    		<div class="slider-items">
    			<img src="/img/upload/<?php echo $slide['img']; ?>" alt="<?php echo $slide['title']; ?>" class="slider">
    			<div class="slider-content text-center">
    				<div class="table">
    					<div class="table-cell">
    						<div class="container">
    							<div class="row">
    								<div class="col-xs-12 col-md-8 col-md-offset-2">
    									<h2><?php echo $slide['title']; ?></h2>
    									<p><?php echo $slide['text']; ?></p>
                                        <?php if($slide['url'] != '' || $slide['show_form'] == '1') : ?>
        									<ul>
                                                <?php if($slide['show_form'] == '1') : ?>
        										  <li><a class="modal-btn" href="<?php echo $slide['url']; ?>" data-toggle="modal" data-target="#myModal">Оформить заказ</a></li>
                                                <?php endif; ?>
                                                <?php if($slide['url'] != '') : ?>
        										  <li><a href="<?php echo $slide['url']; ?>" target="_blank">Подробнее</a></li>
                                                <?php endif; ?>                                                
        									</ul>
                                        <?php endif; ?>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>        
        <?php endforeach; ?>
	</div>
</section>
<!-- Конец зоны слайдов -->
<?php endif; ?>


<!-- Блок "О компании" на главной -->
<section class="about-area ptb-100">
	<div class="container">
		<div class="row">
            <?php if($info['index_img'] && $info['index_img'] != '') : ?>
                <div class="col-md-6 col-xs-12 wow fadeInLeft">
                    <div class="about-img black-opacity">
                        <img src="/img/upload/<?php echo $info['index_img']; ?>" alt="<?php echo $info['title']; ?>" />
                        <div class="more-link"><a href="/information" class="btn-style">Подробнее</a></div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 wow fadeInRight">
                    <div class="about-wrap">
                        <?php echo $info['index_body']; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-xs-12 wow fadeInBottom">
                    <div class="about-wrap">
                        <?php echo $info['index_body']; ?>
                    </div>
                </div>            
            <?php endif; ?>        
        
		</div>
	</div>
</section>
<!-- Блок "О компании" на главной -->

<?php if(!empty($indexServices)) : ?>
<!-- Блок "Услуги" -->
<section class="service-area ptb-100 bg-1">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp">
				<div class="section-title text-center">
					<h2>Услуги</h2>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
            <?php $countserv = 1; ?>
            <?php foreach($indexServices as $indexSrvice) : ?>
    			<div class="col-md-4 col-sm-6 col-xs-12 col wow fadeInUp index-section"  data-wow-delay=".<?php echo $countserv; ?>s">
    				<div class="service-wrap">
    					<div class="service-img">
    						<img src="/img/upload/<?php echo $indexSrvice['img']; ?>" alt="<?php echo $indexSrvice['menu_title']; ?>" />
    					</div>
    					<div class="service-content service-index">
    						<h3><?php echo $indexSrvice['menu_title']; ?></h3>
    						<p><?php echo $indexSrvice['short']; ?></p>
    						<a href="/services/<?php echo $indexSrvice['alias']; ?>">Подробнее</a>
    					</div>
    				</div>
    			</div>                
                <?php $countserv++; ?>
            <?php endforeach; ?>
		</div>
	</div>
</section>
<!-- Блок "Услуги" -->
<?php endif; ?>

<!-- Блок факты-->
<?php if(isset($info['back2']) && $info['back2'] != '') : ?>
    <?php $back2Path = '/img/upload/'.$info['back2']; ?>
<?php else : ?>
    <?php $back2Path = '/img/bg.jpg'; ?>
<?php endif; ?>
<section class="fanfact-area parallax black-opacity"  data-speed="5" data-bg-image="<?php echo $back2Path; ?>">
	<div class="table">
		<div class="table-cell">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 wow fadeInUp"  data-wow-delay=".1s">
						<div class="fanfact12-wrap">
                            <div class="section-first">Более 1700 видов и сортов</div>
                            <div class="section-second">древесных и кустарниковых , а также многолетних травянистых растений были изучены нами, чтобы предложить Вам лучшее.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Блок факты-->

<!-- Блок портфолио -->
<?php if($portfolios) : ?>
<section class="porftolio-area ptb-70">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp">
				<div class="section-title text-center">
					<h2>Портфолио</h2>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="portfolio-menu text-center">
					<button class="active" data-filter="*">Все</button>
                    <?php $portArr = array(); ?>
                    <?php foreach($portfolios as $port) : ?>
                        <?php if($port->teg_title && $port->teg_title != '' && $port->teg_alias && $port->teg_alias != '') : ?>
                            <?php $portArr[$port->teg_alias] = $port->teg_title; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>                    
                    <?php foreach($portArr as $port => $value) : ?>
                        <button data-filter=".<?php echo $port; ?>"><?php echo $value; ?></button>
                    <?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="row grid">
            <?php $countP = 1; ?>
            <?php foreach($portfolios as $portfolio) :?>
    			<div class="col-md-4 portfolio <?php echo $portfolio->teg_alias; ?> col-sm-6 col-xs-12 col wow fadeInUp"  data-wow-delay=".<?php echo $countP; ?>s">
    				<div class="portfolio-wrap">
    					<div class="overlay">
                            <?php if($portfolio->url && $portfolio->url != '') : ?>
        						<a class="popup1" href="<?php echo $portfolio->url; ?>" target="_blank">
        							<i class="fa fa-link"></i>
        						</a>
                            <?php endif; ?>
    						<h3><?php echo $portfolio->title; ?></h3>
    						<p><?php echo $portfolio->text; ?></p>
    					</div>
    					<div class="portfolio-img">
    						<img src="/img/upload/<?php echo $portfolio->img; ?>" alt="<?php echo $portfolio->title; ?>" />
    					</div>
    				</div>
    			</div>
                <?php $countP++; ?>            
            <?php endforeach; ?>

		</div>
	</div>
</section>
<?php endif; ?>
<!-- Блок портфолио -->

<?php if(!empty($histories)) : ?>
<!-- Блок история -->
<div class="featured-area pb-140 <?php if(!$portfolios){echo 'ptb-140';} ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp">
				<div class="section-title text-center">
					<h2>История компании</h2>
					<p>Короткое общее описание для блока истории. Его можно написать, а можно и оставить поле пустым. (редактирует вебмастер)</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="featured-wrap">
					<ul>
                        <?php $countHistorie = 1; ?>
                        <?php foreach($histories as $hist) : ?>
    						<li class="wow <?php if (($countHistorie % 2) == 1){echo 'fadeInLeft';}else{echo 'fadeInRight';} ?>" data-wow-delay=".<?php echo $countHistorie; ?>s">
    							<div class="history-year"><?php echo $hist['year']; ?></div>
    							<div class="featured-content">
    								<div class="featured-img">
    									<img src="/img/upload/<?php echo $hist['img']; ?>" alt="<?php echo $hist['title']; ?>" />
    								</div>
    								<div class="featured-info">
    									<h4><?php echo $hist['title']; ?></h4>
    									<p><?php echo $hist['text']; ?></p>
    								</div>
    							</div>
    						</li> 
                            <?php $countHistorie++; ?>                           
                        <?php endforeach; ?>
						<li>
							<div class="history-year">Сейчас</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Блок история -->
<?php endif; ?>

<?php //if(isset($info['video']) && $info['video'] != '') : ?>
<!-- Блок видео -->
<?php if(isset($info['back3']) && $info['back3'] != '') : ?>
    <?php $back3Path = '/img/upload/'.$info['back3']; ?>
<?php else : ?>
    <?php $back3Path = '/img/bg.jpg'; ?>
<?php endif; ?>
<section class="video-area  parallax black-opacity wow fadeInUp" data-speed="5" data-bg-image="<?php echo $back3Path; ?>">
	<h2 class="hidden">Video area</h2>
	<div class="table">
		<div class="table-cell">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
                        <div class="citata-block video-wrap text-center">
                            <div class="citata-body">"Каждый должен оставить что-то после себя... <br />Что-то, чего при жизни касались твои пальцы. Люди будут смотреть на взращенное тобою дерево или цветок, и в эту минуту ты будешь жив."</div>
                            <div class="citata-name">Рэй Брэдбери</div>
                        </div>
						<!--<div class="video-wrap text-center">
							<a href="<?php //echo $info['video']; ?>" class="video-popup">
								<i class="fa fa-play"></i>
							</a>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Блок видео -->
<?php //endif; ?>

<?php if(!empty($staffersIndex)) : ?>
<!-- Блок команда -->
<section class="team-area ptb-140 bg-1">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp">
				<div class="section-title text-center">
					<h2>Команда</h2>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
            <?php $countStaff = 1; ?>
            <?php foreach($staffersIndex as $staff) : ?>
    			<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".<?php echo $countStaff; ?>s">
    				<div class="team-wrap2 mb-30">
    					<div class="team-img">
    						<img src="/img/upload/<?php echo $staff['img']; ?>" alt="<?php echo $staff['name']; ?>" />
                            <div class="overlay">
    							<h3><?php echo $staff['name']; ?></h3>
                                <span><?php echo $staff['position']; ?></span>
    							<p><?php echo $staff['description']; ?></p>
    							<ul>
                                    <?php if($staff['soc_fb'] && $staff['soc_fb'] != '') : ?>
                                        <li><a href="<?php echo $staff['soc_fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; ?>
                                    <?php if($staff['soc_tw'] && $staff['soc_tw'] != '') : ?>
                                        <li><a href="<?php echo $staff['soc_tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if($staff['soc_vk'] && $staff['soc_vk'] != '') : ?>
                                        <li><a href="<?php echo $staff['soc_vk']; ?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                    <?php endif; ?>
                                    <?php if($staff['soc_goo'] && $staff['soc_goo'] != '') : ?>
                                        <li><a href="<?php echo $staff['soc_goo']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <?php endif; ?>                                                                                                                        
    							</ul>
    						</div>
    					</div>
    					<div class="team-content">
    						<div class="team-name"><?php echo $staff['name']; ?></div>
    						<p><?php echo $staff['position']; ?></p>
    					</div>
    				</div>
    			</div>            
          
                <?php $countStaff++; ?>
            <?php endforeach; ?>
		</div>
	</div>
</section>
<!-- Блок команда -->
<?php endif; ?>

<?php if(!empty($questions)) : ?>
<!-- Блок вопрос ответ -->
<div class="faq-area ptb-140">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12  wow fadeInUp">
				<div class="section-title text-center">
					<h2>Частые вопросы</h2>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 wow fadeInLeft">
				<div class="faq-wrap">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php $countQuest = 0; ?>
                        <?php foreach($questions as $quest) : ?>
    						<div class="panel panel-default">
    							<div class="panel-heading" id="heading<?php echo $countQuest; ?>">
    								<h4 class="panel-title">
    									<a <?php if($countQuest > 0){echo 'role="button" class="collapsed"';} ?> data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $countQuest; ?>" aria-expanded="<?php if($countQuest == 0){echo 'true';}else{echo 'false';} ?>" aria-controls="collapse<?php echo $countQuest; ?>">
    										<?php echo $quest['title']; ?>
    									</a>
    								</h4>
    							</div>
    							<div id="collapse<?php echo $countQuest; ?>" class="panel-collapse collapse <?php if($countQuest == 0){echo 'in';} ?>">
    								<div class="panel-body">
    									<?php echo $quest['text']; ?>
    								</div>
    							</div>
    						</div>                        
                            <?php $countQuest++; ?>
                        <?php endforeach; ?> 


					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Блок вопрос ответ -->
<?php endif; ?>


<?php if($news) : ?>
<!-- Блок новости -->
<section class="blog-area ptb-140 bg-1">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp">
				<div class="section-title text-center">
					<h2>Блог</h2>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
            <?php $countNew = 1; ?>
            <?php foreach($news as $new) : ?>
    			<div class="col-md-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".<?php echo $countNew; ?>s">
    				<div class="blog-wrap">
    					<div class="blog-img">
    						<img src="/img/upload/<?php echo $new->img; ?>" alt="<?php echo $new->h1; ?>" />
    					</div>
    					<div class="blog-content new-anonce">
    						<h3><a href="/news/<?php echo $new->alias; ?>"><?php echo $new->h1; ?></a></h3>
                            <div class="new-date"><?php //echo $new->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU'); ?></div>
    						<p><?php echo $new->short; ?></p>
    						<a href="/news/<?php echo $new->alias; ?>" class="btn-style">Читать</a>
    					</div>
    				</div>
    			</div>            
                <?php $countNew++; ?>
            <?php endforeach; ?>

		</div>
	</div>
</section>
<!-- Блок новости -->
<?php endif; ?>

<?php if(!empty($partners)) : ?>
<!-- Блок партнеры -->
<?php if(isset($info['back4']) && $info['back4'] != '') : ?>
    <?php $back4Path = '/img/upload/'.$info['back4']; ?>
<?php else : ?>
    <?php $back4Path = '/img/bg.jpg'; ?>
<?php endif; ?>
<section class="brand-area black-opacity ptb-140" style="background:url(<?php echo $back4Path; ?>)no-repeat center center / cover;">
	<div class="container">
        <div class="row">
			<div class="col-md-7 col-sm-10 col-xs-12 wow fadeInUp">
				<div class="section-title section-title2">
					<h2>Рекомендуем</h2>
					<p>Мы работаем с лучшимим питомниками и выбираем известных и проверенных поставщиков оборудования, инструментов и средств ухода за растениями.</p>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="brand-active">
                <?php foreach($partners as $partner) : ?>
                    <?php if($partner['url'] && $partner['url'] != '') : ?>
                        <div class="col-xs-12">
                            <div class="brand-wrap">
                                <a href="<?php echo $partner['url']; ?>" target="_blank" title="<?php echo $partner['title']; ?>">
                                    <img src="/img/upload/<?php echo $partner['img']; ?>" alt="<?php echo $partner['title']; ?>"/>
                                </a>
                            </div>
                        </div>                    
                    <?php else : ?>
                        <div class="col-xs-12">
                            <div class="brand-wrap">
                                <span title="<?php echo $partner['title']; ?>">
                                    <img src="/img/upload/<?php echo $partner['img']; ?>" alt="<?php echo $partner['title']; ?>"/>
                                </span>
                            </div>
                        </div>                     
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
	</div>
</section>
<!-- Блок партнеры -->
<?php endif; ?>

<!-- contact-area start -->
<!--<div class="contact-area ptb-100 bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact-wrap form-style index-form">
                    <h3 class="white-color">Остались вопросы или нужна консультация?</h3>
                    <div class="sen-q white-color">Отправьте ваше сообщение и мы свяжемся с вами в ближайшее время</div>
                    <div class="cf-msg"></div>
                    
                    <?php echo $this->Form->create('message', ['url' => ['controller' => 'Information', 'action' => 'sendBack'], 'id' => 'cf']); ?>
                        <?php echo $this->Form->input('surname', ['type' => 'hidden', 'value' => '']); ?>
                        <?php echo $this->Form->input('check', ['type' => 'hidden', 'value' => '', 'id' => 'check']); ?>                    
						<div class="row">
							<div class="col-sm-6 col-xs-12">
                                <?php echo $this->Form->input('name', ['class' => 'contact-fild', 'label' => false, 'placeholder' => 'Имя', 'id' => 'fname']); ?>
							</div>
							<div class="col-sm-6 col-xs-12">
                                <?php echo $this->Form->input('email', ['class' => 'contact-fild', 'label' => false, 'placeholder' => 'E-mail', 'id' => 'email']); ?>
							</div>
							<div class="col-xs-12">
                                <?php echo $this->Form->input('theme', ['class' => 'contact-fild', 'label' => false, 'placeholder' => 'Тема', 'id' => 'theme']); ?>
							</div>
							<div class="col-xs-12">
                                <?php echo $this->Form->textarea('body', ['class' => 'contact-textarea', 'label' => false, 'placeholder' => 'Сообщение', 'id' => 'msg']); ?>
							</div>
                            
                            <?php if(isset($info['recaptcha']) && $info['recaptcha'] != '') : ?>
                                <div class="col-xs-12 captcha-block">
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                    <div class="g-recaptcha" data-sitekey="<?php echo $info['recaptcha']; ?>" data-theme="dark"></div>
                                    <div id="put-captcha" class="put-captcha">Подтвердите, что вы не робот</div> 
                                </div> 
                                <script>
                                    document.getElementById('cf').onsubmit = function () {
                                        if (!grecaptcha.getResponse()) {   
                                             document.getElementById('put-captcha').style.display = 'block';
                                             return false;
                                        }
                                    }
                                </script>                                                           
                            <?php endif; ?>
							<div class="col-xs-12">
                                <?php echo $this->Form->button('Отправить сообщение', ['class' => 'cont-submit btn-contact', 'onclick' => "document.getElementById('check').value='".$secret."';"]); ?>
							</div>
						</div>                    
                    <?php echo $this->Form->end(); ?> 
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-wrap contact-block contact-index-block">
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            <?php if($info->phone && $info->phone != '') : ?>
                                <p><?php echo $info->phone; ?></p>
                            <?php endif; ?>  
                            <?php if($info->phone_1 && $info->phone_1 != '') : ?>
                                <p><?php echo $info->phone_1; ?></p>
                            <?php endif; ?> 
                            <?php if($info->phone_2 && $info->phone_2 != '') : ?>
                                <p><?php echo $info->phone_2; ?></p>
                            <?php endif; ?>                                                                                   
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <?php if($info->email && $info->email != '') : ?>
                                <p><?php echo $info->email; ?></p>
                            <?php endif; ?> 
                        </li>
                        <?php if($info->address && $info->address != '') : ?>
                        <li>
                            <i class="fa fa-location-arrow"></i>
                            <?php echo $info->address; ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
</div>-->
<!-- contact-area end -->