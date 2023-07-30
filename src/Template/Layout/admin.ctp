<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']); ?>
    <?php echo $this->Html->charset(); ?>    
    <meta name="robots" content="none"/>
    <meta name="robots" content="noindex, nofollow" />

    <title>Панель администратора</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <!-- Custom Fonts -->

    <?php echo $this->Html->css(array('jquery-ui.css', 'jquery-ui.theme.css', 'bootstrap.min.css', 'sb-admin.css', 'plugins/morris.css', 'jquery.Jcrop.css', 'dropzone.css', 'magnific-popup.css', 'font-awesome.min.css', 'admin.css')); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $this->Html->script(['ckeditor/ckeditor.js']); ?>
    <?php echo $this->Html->script(['jquery.js', 'jquery-ui.min.js', 'jquery.ui.datepicker-ru.js', 'bootstrap.min.js', 'dropzone.js', 'jquery.Jcrop.min.js', 'jquery.magnific-popup.min.js', 'admin.js'], ['block' => 'scriptBottom']); ?>
    
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>        

</head>

<body>

    <div id="wrapper">
        <?php //debug($count_messages); ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" target="_blank" title="На сайт"><?php echo $info['title']; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="message-count"><?php echo $count_messages; ?></span><b class="caret"></b></a>
                    <?php if($messages) : ?>
                    <ul class="dropdown-menu message-dropdown">
                    
                        <?php foreach($messages as $mesage) : ?>
                            <?php if($mesage->read_already == '0') : ?>
                            <li class="message-preview">
                                <a href="/adminMessages/view/<?php echo $mesage->id; ?>">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong><?php echo $mesage->name; ?></strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> <?= h($mesage->created->i18nFormat('dd MMMM YYYY', 'Europe/Moscow', 'ru-RU')) ?></p>
                                            <p><?php echo $this->Text->excerpt($mesage->body, 'method', 100, '...'); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php endif; ?>                            
                        <?php endforeach; ?>

                        <li class="message-footer">
                            <a href="/adminMessages">Смотреть все сообщения</a>
                        </li>
                    </ul>
                    <?php else : ?>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview message-no-new">
                            Новых сообщений нет
                        </li>

                        <li class="message-footer">
                            <a href="/adminMessages">Смотреть все сообщения</a>
                        </li>
                    </ul>                    
                    <?php endif; ?>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php if(isset($user_reg['name'])) : ?>
                        <?php echo $user_reg['name']; ?>
                    <?php else : ?>
                        <?php echo $user_reg['username']; ?>
                    <?php endif; ?>                    
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/adminInformation"><i class="fa fa-fw fa-user"></i> Профиль</a>
                        </li>
                        <li>
                            <a href="/" target="_blank"><i class="fa fa-fw fa-envelope"></i> На сайт</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/auth/logout"><i class="fa fa-fw fa-power-off"></i> Выйти</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/admin/main"><i class="fa fa-fw fa-dashboard"></i> Главная</a>
                    </li>
                    

                    <li>
                        <a href="/adminInformation"><i class="fa fa-fw fa-home"></i> <?php echo $info['title']; ?></a>
                    </li>                     
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
                            <i class="fa fa-fw fa-globe"></i> Сайт <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="/adminStaffers"><i class="fa fa-users"></i> Сотрудники</a>
                            </li>
                            <li>
                                <a href="/adminServices"><i class="fa fa-newspaper-o"></i> Услуги</a>
                            </li>                            
                            <li>
                                <a href="/adminPages"><i class="fa fa-newspaper-o"></i> Страницы</a>
                            </li>
                            
                            <li>
                                <a href="/adminNews"><i class="fa fa-newspaper-o"></i> Новости</a>
                            </li>
                            <li>
                                <a href="/adminPortfolios"><i class="fa fa-newspaper-o"></i> Портфолио</a>
                            </li>                                                                                                                  
                            <li>
                                <a href="/adminHistories"><i class="fa fa-newspaper-o"></i> История</a>
                            </li> 
                            <li>
                                <a href="/adminQuestions"><i class="fa fa-newspaper-o"></i> FAQ</a>
                            </li>
                            <li>
                                <a href="/adminPartners"><i class="fa fa-newspaper-o"></i> Партнеры</a>
                            </li>                                                                                                             
                        </ul>
                    </li> 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users">
                            <i class="fa fa-users" aria-hidden="true"></i> Пользователи <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="/adminMessages"><i class="fa fa-fw fa-address-card"></i> Сообщения (<?php echo $count_messages; ?>)</a>
                            </li>
                                                                              
                        </ul>
                    </li>                                                                              
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#configs">
                            <i class="fa fa-wrench" aria-hidden="true"></i> Настройки <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="configs" class="collapse">
                            <li>
                                <a href="/adminCategories"><i class="fa fa-fw fa-folder-open"></i> Категории</a>
                            </li>
                            <li>
                                <a href="/adminSlides"><i class="fa fa-newspaper-o"></i> Слайды</a>
                            </li>
                            <li>
                                <a href="/adminPagesTexts"><i class="fa fa-newspaper-o"></i> СЕО Тексты</a>
                            </li>                                                                                                              
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

<?php echo $this->Flash->render(); ?>
<?php echo $this->fetch('content'); ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php echo $this->fetch('scriptBottom'); ?>

</body>

</html>