<!doctype html>
<html class="no-js" lang="ru">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta name="author" content="Alexey Voroshilov" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">





        <title><?php if(isset($meta['title']) && $meta['title'] != '') : ?><?php echo $meta['title']; ?><?php endif; ?></title>
    <?php if(isset($meta['description']) && $meta['description'] != '') : ?>
    <?php echo $this->Html->meta('description', $meta['description']); ?>
    <?php else : ?>
    <?php echo $this->Html->meta('description', ''); ?>
    <?php endif; ?>

<?php
    if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') ||
         (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ||
         (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ) {
        $server_request_scheme = 'https';
    } else {
        $server_request_scheme = 'http';
    }
?>
<?php $controller = $this->request->getParam('controller'); ?>
<?php if($controller == 'Index') : ?>
        <link rel="canonical" href="<?php echo $server_request_scheme.'://'.$_SERVER['HTTP_HOST']; ?>" />
<?php else : ?>
<?php $alias_path = $this->request->getParam('pass'); ?>
<?php $actionClear = $this->request->getParam('action'); ?>
<?php if($actionClear == 'index') : ?>
<?php $action = ''; ?>
<?php else : ?>
<?php $action = DS.$actionClear; ?>
<?php endif; ?>
<?php if(!empty($alias_path)) : ?>
        <link rel="canonical" href="<?php echo $server_request_scheme.'://'.$_SERVER['HTTP_HOST'].DS.mb_strtolower($controller, 'UTF-8').DS.$alias_path[0]; ?>" />
<?php else : ?>
        <link rel="canonical" href="<?php echo $server_request_scheme.'://'.$_SERVER['HTTP_HOST'].DS.mb_strtolower($controller, 'UTF-8').$action; ?>" />
<?php endif; ?>
<?php endif; ?>

        <?php echo $this->Html->css(array('bootstrap.min.css', 'animate.css', 'owl.carousel.css', 'font-awesome.min.css', 'magnific-popup.css', 'slicknav.min.css', 'styles.css', 'responsive.css')); ?>

        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>

        <?php echo $this->Html->script(['vendor/jquery-1.12.4.min.js',
                                        'bootstrap.min.js',
                                        'owl.carousel.min.js',
                                        'counterup.main.js',
                                        'imagesloaded.pkgd.min.js',
                                        'isotope.pkgd.min.js',
                                        'jquery.waypoints.min.js',
                                        'jquery.magnific-popup.min.js',
                                        'jquery.slicknav.min.js',
                                        'snake.min.js',
                                        'wow.min.js',
                                        'plugins.js',
                                        'scripts.js'
                                        ],
                                        ['block' => 'scriptBottom']); ?>


            <?php echo $this->fetch('meta'); ?>
            <?php echo $this->fetch('css'); ?>
            <?php echo $this->fetch('script'); ?>



    </head>
    <body>

    <?php //debug($newsHave); ?>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- preloder-wrap -->
        <div id="cssLoader3" class="preloder-wrap">
            <div class="loader">
                <div class="child-common child4"></div>
                <div class="child-common child3"></div>
                <div class="child-common child2"></div>
                <div class="child-common child1"></div>
            </div>
        </div>
        <!-- preloder-wrap -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header nice-modal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Оформление заказа</h4>
              </div>
              <div class="modal-body contact-wrap form-style">
                <?php echo $this->Form->create('back', ['url' => ['controller' => 'Information', 'action' => 'sendBack']]); ?>
                    <?php echo $this->Form->control('surname', ['type' => 'hidden', 'value' => '', 'id' => 'surname2']); ?>
                    <?php echo $this->Form->control('check', ['type' => 'hidden', 'value' => '', 'id' => 'check2']); ?>
                      <div class="form-group">
                        <?php echo $this->Form->control('name', ['class' => 'contact-fild', 'label' => false, 'placeholder' => 'Ваше имя', 'id' => 'name_2']); ?>
                      </div>
                      <div class="form-group">
                        <?php echo $this->Form->control('email', ['class' => 'contact-fild', 'label' => false, 'placeholder' => 'E-mail', 'id' => 'email_2']); ?>
                      </div>


                      <div class="form-group">
                        <?php echo $this->Form->control('phone', ['class' => 'contact-fild', 'label' => false, 'placeholder' => 'Ваш телефон', 'required' => true, 'id' => 'phone_2']); ?>
                      </div>

                      <div class="form-group">
                        <?php echo $this->Form->textarea('body', ['class' => 'contact-textarea', 'label' => false, 'placeholder' => 'Сообщение', 'id' => 'msg_2']); ?>
                      </div>
                      <div class="modal-logo"><img src="/img/logo.png" alt="pozitivland.ru"/></div>

                      <div class="form-button-block">
                        <?php echo $this->Form->button('Отправить заявку', ['class' => 'cont-submit btn-contact', 'onclick' => "document.getElementById('check2').value='".$secret."';"]); ?>
                      </div>
                      <div class="note-modal">Нажимая кнопку отправить вы подтверждаете согласие на обработку персональных данных</div>
                <?php echo $this->Form->end(); ?>
              </div>
            </div>
          </div>
        </div>


        <!-- search-area -->
        <div class="search-area">
            <span class="closs-btn">Закрыть</span>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" name="search" placeholder="Поиск по сайту">
                                <button type="button" name="button" class="btn-style">Искать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search-area -->
		<!-- heared area start -->
		<header class="header-area">
            <div class="header-top bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center top-head">ПРЕВЕНТИВНАЯ, ВОССТАНОВИТЕЛЬНАЯ И КУРОРТНАЯ МЕДИЦИНА</div>
                    </div>
                </div>
            </div>
            <div class="header-middle bg-2">
                <div class="container">
                    <div class="row" id="sticky-header" >
                        <div class="col-md-4 hidden-sm hidden-xs">
    						<div class="logo">
    							<div class="logo-img"><a href="/"><img src="/img/logo.png" alt=""/></a></div>
    						</div>
    					</div>
                        <div class="col-md-8 col-xs-12">
                            <div class="header-middle-right">
                                <div class="geader-middle-top">
                                    <div class="header-open-modal">
                                        <button type="button" class="default-btn" data-toggle="modal" data-target="#myModal">ПОДПИСАТЬСЯ</button>
                                    </div>
                                    <div class="top-nav-btn">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="header-middle-bottom">
                                    <div class="bot-left">Научно-информационный журнал</div>
                                    <div class="bot-right">Издается с 2000 года</div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="open-nav">
                <div class="mainmenu">
                    <ul id="navigation">
                        <li class="<?php if($this->request->getParam('controller') == 'Index'){echo "active";} ?>"><a href="/">Главная </a></li>
                        <li class="<?php if($this->request->getParam('controller') == 'Information' && $this->request->getParam('action') == 'index'){echo "active";} ?>"><a href="/information">О компании </a></li>
                        <?php if($services_menu) : ?>
                            <li class="<?php if($this->request->getParam('controller') == 'Services'){echo "active";} ?>"><a href="/services">Услуги <i class="fa fa-angle-down"></i></a>
                                <ul class="submenu">
                                    <?php foreach($services_menu as $serPoint) : ?>
                                        <li>
                                            <a href="/services/<?php echo $serPoint->alias; ?>">
                                                <?php if($serPoint->menu_title && $serPoint->menu_title != '') : ?>
                                                    <?php echo $serPoint->menu_title; ?>
                                                <?php else : ?>
                                                    <?php echo $serPoint->h1; ?>
                                                <?php endif; ?>
                                                <?php if(!empty($serPoint->children)) : ?>
                                                    <span class="pull-right">+</span>
                                                <?php endif; ?>
                                            </a>
                                            <?php if(!empty($serPoint->children)) : ?>
                                                <ul class="submenu">
                                                    <?php foreach($serPoint->children as $podmenu1) : ?>
                                                        <li>
                                                            <a href="/services/<?php echo $podmenu1->alias; ?>">
                                                                <?php if($podmenu1->menu_title && $podmenu1->menu_title != '') : ?>
                                                                    <?php echo $podmenu1->menu_title; ?>
                                                                <?php else : ?>
                                                                    <?php echo $podmenu1->h1; ?>
                                                                <?php endif; ?>
                                                                <?php if(!empty($podmenu1->children)) : ?>
                                                                    <span class="pull-right">+</span>
                                                                <?php endif; ?>
                                                            </a>
                                                            <?php if(!empty($podmenu1->children)) : ?>
                                                                <ul class="submenu">
                                                                    <?php foreach($podmenu1->children as $podmenu2) : ?>
                                                                        <li>
                                                                            <a href="/services/<?php echo $podmenu2->alias; ?>">
                                                                                <?php if($podmenu2->menu_title && $podmenu2->menu_title != '') : ?>
                                                                                    <?php echo $podmenu2->menu_title; ?>
                                                                                <?php else : ?>
                                                                                    <?php echo $podmenu2->h1; ?>
                                                                                <?php endif; ?>
                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>

                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>


                        <?php if($page_menu) : ?>
                            <?php $alias_path = $this->request->getParam('pass'); ?>
                            <?php //debug($alias_path); ?>
                            <?php foreach($page_menu as $pageBase) : ?>
                                <?php //debug($pageBase); ?>
                                <li class="<?php if($this->request->getParam('controller') == 'Pages' && $alias_path[0] == $pageBase->alias){echo "active";} ?>"><a href="/pages/<?php echo $pageBase->alias; ?>"><?php echo $pageBase->menu_title; ?> <?php if(!empty($pageBase->children)){echo '<i class="fa fa-angle-down"></i>';} ?></a>
                                    <?php if(!empty($pageBase->children)) : ?>
                                        <ul class="submenu">
                                            <?php foreach($pageBase->children as $serPoint) : ?>
                                                <li>
                                                    <a href="/pages/<?php echo $serPoint->alias; ?>">
                                                        <?php if($serPoint->menu_title && $serPoint->menu_title != '') : ?>
                                                            <?php echo $serPoint->menu_title; ?>
                                                        <?php else : ?>
                                                            <?php echo $serPoint->h1; ?>
                                                        <?php endif; ?>
                                                        <?php if(!empty($serPoint->children)) : ?>
                                                            <span class="pull-right">+</span>
                                                        <?php endif; ?>
                                                    </a>
                                                    <?php if(!empty($serPoint->children)) : ?>
                                                        <ul class="submenu">
                                                            <?php foreach($serPoint->children as $podmenu1) : ?>
                                                                <li>
                                                                    <a href="/pages/<?php echo $podmenu1->alias; ?>">
                                                                        <?php if($podmenu1->menu_title && $podmenu1->menu_title != '') : ?>
                                                                            <?php echo $podmenu1->menu_title; ?>
                                                                        <?php else : ?>
                                                                            <?php echo $podmenu1->h1; ?>
                                                                        <?php endif; ?>
                                                                        <?php if(!empty($podmenu1->children)) : ?>
                                                                            <span class="pull-right">+</span>
                                                                        <?php endif; ?>
                                                                    </a>
                                                                    <?php if(!empty($podmenu1->children)) : ?>
                                                                        <ul class="submenu">
                                                                            <?php foreach($podmenu1->children as $podmenu2) : ?>
                                                                                <li>
                                                                                    <a href="/pages/<?php echo $podmenu2->alias; ?>">
                                                                                        <?php if($podmenu2->menu_title && $podmenu2->menu_title != '') : ?>
                                                                                            <?php echo $podmenu2->menu_title; ?>
                                                                                        <?php else : ?>
                                                                                            <?php echo $podmenu2->h1; ?>
                                                                                        <?php endif; ?>
                                                                                    </a>
                                                                                </li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    <?php endif; ?>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>

                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if($newsHave) : ?>
                            <li class="<?php if($this->request->getParam('controller') == 'News'){echo "active";} ?>"><a href="/news">Блог</a></li>
                        <?php endif; ?>
                        <li class="<?php if($this->request->getParam('controller') == 'Information' && $this->request->getParam('action') == 'contacts'){echo "active";} ?>"><a href="/information/contacts">Контакты</a></li>

                    </ul>
                </div>
            </div>

			<div class="header-bottom"  id="sticky-header1">
                <div class="container">
    				<div class="row">
                        <div class="hidden-md hidden-lg col-sm-10 col-xs-9">
    						<div class="logo">
    							<div class="logo-img"><a href="/"><img src="/img/logo.png" alt=""/></a></div>
    						</div>
    					</div>

                        <div class="col-md-11 hidden-lg hidden-xs">
    						<!--<div class="mainmenu">
    							<ul id="navigation">
    								<li class="<?php /*if($this->request->getParam('controller') == 'Index'){echo "active";} */?>"><a href="/">Главная </a></li>
    								<li class="<?php /*if($this->request->getParam('controller') == 'Information' && $this->request->getParam('action') == 'index'){echo "active";} */?>"><a href="/information">О компании </a></li>
                                    <?php /*if($services_menu) : */?>
            							<li class="<?php /*if($this->request->getParam('controller') == 'Services'){echo "active";} */?>"><a href="/services">Услуги <i class="fa fa-angle-down"></i></a>
            								<ul class="submenu">
                                                <?php /*foreach($services_menu as $serPoint) : */?>
                                                    <li>
                                                        <a href="/services/<?php /*echo $serPoint->alias; */?>">
                                                            <?php /*if($serPoint->menu_title && $serPoint->menu_title != '') : */?>
                                                                <?php /*echo $serPoint->menu_title; */?>
                                                            <?php /*else : */?>
                                                                <?php /*echo $serPoint->h1; */?>
                                                            <?php /*endif; */?>
                                                            <?php /*if(!empty($serPoint->children)) : */?>
                                                                <span class="pull-right">+</span>
                                                            <?php /*endif; */?>
                                                        </a>
                                                        <?php /*if(!empty($serPoint->children)) : */?>
                                                            <ul class="submenu">
                                                                <?php /*foreach($serPoint->children as $podmenu1) : */?>
                                                                    <li>
                                                                        <a href="/services/<?php /*echo $podmenu1->alias; */?>">
                                                                            <?php /*if($podmenu1->menu_title && $podmenu1->menu_title != '') : */?>
                                                                                <?php /*echo $podmenu1->menu_title; */?>
                                                                            <?php /*else : */?>
                                                                                <?php /*echo $podmenu1->h1; */?>
                                                                            <?php /*endif; */?>
                                                                            <?php /*if(!empty($podmenu1->children)) : */?>
                                                                                <span class="pull-right">+</span>
                                                                            <?php /*endif; */?>
                                                                        </a>
                                                                        <?php /*if(!empty($podmenu1->children)) : */?>
                                                                            <ul class="submenu">
                                                                                <?php /*foreach($podmenu1->children as $podmenu2) : */?>
                                                                                    <li>
                                                                                        <a href="/services/<?php /*echo $podmenu2->alias; */?>">
                                                                                            <?php /*if($podmenu2->menu_title && $podmenu2->menu_title != '') : */?>
                                                                                                <?php /*echo $podmenu2->menu_title; */?>
                                                                                            <?php /*else : */?>
                                                                                                <?php /*echo $podmenu2->h1; */?>
                                                                                            <?php /*endif; */?>
                                                                                        </a>
                                                                                    </li>
                                                                                <?php /*endforeach; */?>
                                                                            </ul>
                                                                        <?php /*endif; */?>
                                                                    </li>
                                                                <?php /*endforeach; */?>
                                                            </ul>
                                                        <?php /*endif; */?>
                                                    </li>

                                                <?php /*endforeach; */?>
                                            </ul>
                                        </li>
                                    <?php /*endif; */?>


                                    <?php /*if($page_menu) : */?>
                                        <?php /*$alias_path = $this->request->getParam('pass'); */?>
                                        <?php /*//debug($alias_path); */?>
                                        <?php /*foreach($page_menu as $pageBase) : */?>
                                        <?php /*//debug($pageBase); */?>
                							<li class="<?php /*if($this->request->getParam('controller') == 'Pages' && $alias_path[0] == $pageBase->alias){echo "active";} */?>"><a href="/pages/<?php /*echo $pageBase->alias; */?>"><?php /*echo $pageBase->menu_title; */?> <?php /*if(!empty($pageBase->children)){echo '<i class="fa fa-angle-down"></i>';} */?></a>
                								<?php /*if(!empty($pageBase->children)) : */?>
                                                    <ul class="submenu">
                                                        <?php /*foreach($pageBase->children as $serPoint) : */?>
                                                            <li>
                                                                <a href="/pages/<?php /*echo $serPoint->alias; */?>">
                                                                    <?php /*if($serPoint->menu_title && $serPoint->menu_title != '') : */?>
                                                                        <?php /*echo $serPoint->menu_title; */?>
                                                                    <?php /*else : */?>
                                                                        <?php /*echo $serPoint->h1; */?>
                                                                    <?php /*endif; */?>
                                                                    <?php /*if(!empty($serPoint->children)) : */?>
                                                                        <span class="pull-right">+</span>
                                                                    <?php /*endif; */?>
                                                                </a>
                                                                <?php /*if(!empty($serPoint->children)) : */?>
                                                                    <ul class="submenu">
                                                                        <?php /*foreach($serPoint->children as $podmenu1) : */?>
                                                                            <li>
                                                                                <a href="/pages/<?php /*echo $podmenu1->alias; */?>">
                                                                                    <?php /*if($podmenu1->menu_title && $podmenu1->menu_title != '') : */?>
                                                                                        <?php /*echo $podmenu1->menu_title; */?>
                                                                                    <?php /*else : */?>
                                                                                        <?php /*echo $podmenu1->h1; */?>
                                                                                    <?php /*endif; */?>
                                                                                    <?php /*if(!empty($podmenu1->children)) : */?>
                                                                                        <span class="pull-right">+</span>
                                                                                    <?php /*endif; */?>
                                                                                </a>
                                                                                <?php /*if(!empty($podmenu1->children)) : */?>
                                                                                    <ul class="submenu">
                                                                                        <?php /*foreach($podmenu1->children as $podmenu2) : */?>
                                                                                            <li>
                                                                                                <a href="/pages/<?php /*echo $podmenu2->alias; */?>">
                                                                                                    <?php /*if($podmenu2->menu_title && $podmenu2->menu_title != '') : */?>
                                                                                                        <?php /*echo $podmenu2->menu_title; */?>
                                                                                                    <?php /*else : */?>
                                                                                                        <?php /*echo $podmenu2->h1; */?>
                                                                                                    <?php /*endif; */?>
                                                                                                </a>
                                                                                            </li>
                                                                                        <?php /*endforeach; */?>
                                                                                    </ul>
                                                                                <?php /*endif; */?>
                                                                            </li>
                                                                        <?php /*endforeach; */?>
                                                                    </ul>
                                                                <?php /*endif; */?>
                                                            </li>

                                                        <?php /*endforeach; */?>
                                                    </ul>
                                                <?php /*endif; */?>
                                            </li>
                                        <?php /*endforeach; */?>
                                    <?php /*endif; */?>

                                    <?php /*if($newsHave) : */?>
                                        <li class="<?php /*if($this->request->getParam('controller') == 'News'){echo "active";} */?>"><a href="/news">Блог</a></li>
                                    <?php /*endif; */?>
    								<li class="<?php /*if($this->request->getParam('controller') == 'Information' && $this->request->getParam('action') == 'contacts'){echo "active";} */?>"><a href="/information/contacts">Контакты</a></li>

    							</ul>
    						</div>-->
    					</div>
    				</div>
    			</div>
			</div>
		</header>
		<!-- heared area end -->
        <?php //debug($info); ?>



        <div class="container">
            <?php echo $this->Flash->render(); ?>
        </div>
        <?php if($this->request->getParam('controller') !== 'Index') : ?>

        <!-- breadcumb-area start -->
        <div class="breadcumb-area black-opacity" style="<?php if(isset($bback) && $bback != ''){echo "background:url(../img/upload/{$bback})no-repeat center center / cover";}else{echo "background:url(../img/bg/4.jpg)no-repeat center center / cover";} ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcumb-wrap">
                            <?php if(isset($bbackh1) && $bbackh1 != '') : ?>
                                <h1><?php echo $bbackh1; ?></h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcumb-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            <?php echo $this->Html->getCrumbs('<span>/</span>', 'Главная'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcumb-area end -->


        <?php endif; ?>

        <?php echo $this->fetch('content'); ?>




		<!-- footer-area start  -->
		<footer>
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12  col wow fadeInUp" data-wow-delay=".1s">
							<div class="footer-widget footer-logo">
                                <?php if($info['title'] && $info['title'] != '') : ?>
                                    <div class="footer-title"><?php echo $info['title']; ?></div>
                                <?php endif; ?>
                                <?php if($info['description'] && $info['description'] != '') : ?>
                                    <p><?php echo $info['description']; ?></p>
                                <?php endif; ?>
                                <ul>
                                    <?php if($info['phone'] && $info['phone'] != '') : ?>
                                        <li><i class="fa fa-phone"></i> <?php echo $info['phone']; ?></li>
                                    <?php endif; ?>
                                    <?php if($info['email'] && $info['email'] != '') : ?>
                                        <li><i class="fa fa-envelope"></i> <?php echo $info['email']; ?></li>
                                    <?php endif; ?>
                                </ul>
							</div>
						</div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".2s">
                            <?php if(!empty($bottom_menu)) : ?>
                                <div class="footer-widget footer-menu">
                                    <h2>Информация</h2>
                                    <ul>
                                        <?php foreach($bottom_menu as $alias => $menu_name) : ?>
                                            <li><a href="/pages/<?php echo $alias; ?>"><?php echo $menu_name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".3s">
                            <div class="footer-widget footer-menu">
                                <h2>Сайт</h2>
                                <ul>
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="/information">О компании</a></li>
                                    <?php if($services_menu) : ?>
                                        <li><a href="/services">Услуги</a></li>
                                    <?php endif; ?>
                                    <?php if($page_menu) : ?>
                                        <?php foreach($page_menu as $pageBase) : ?>
                                            <li><a href="/pages/<?php echo $pageBase->alias; ?>"><?php echo $pageBase->menu_title; ?></a></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".4s">
                            <div class="footer-widget quick-contact">
                                <h2>Поделиться</h2>
                                <div class="soc-block">
                                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                                    <script src="//yastatic.net/share2/share.js"></script>
                                    <div class="ya-share2" data-services="vkontakte,facebook,moimir,twitter,linkedin"></div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class="footer-bottom text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
&copy; <?php echo date("Y"); ?> Все права защищены <?php echo $info['title']; ?> | Разработка сайта <a class="footer-link" href="https://varavar.ru" target="_blank">Varavar.ru</a>
                        </div>
                    </div>
                </div>
            </div>
		</footer>
		<!-- footer-area end  -->

        <?php echo $this->fetch('scriptBottom'); ?>



    </body>
</html>
