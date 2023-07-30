<?php $this->Html->addCrumb('Контакты'); ?>

<!-- contact-area start -->
<div class="contact-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact-wrap form-style">
                    <h3>Напишите нам</h3>
                    <div class="cf-msg"></div>
                    
                    <?php echo $this->Form->create('message', ['url' => ['action' => 'sendBack'], 'id' => 'cf']); ?>
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
                <div class="contact-wrap contact-block">
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            <?php if($information->phone && $information->phone != '') : ?>
                                <p><?php echo $information->phone; ?></p>
                            <?php endif; ?>  
                            <?php if($information->phone_1 && $information->phone_1 != '') : ?>
                                <p><?php echo $information->phone_1; ?></p>
                            <?php endif; ?> 
                            <?php if($information->phone_2 && $information->phone_2 != '') : ?>
                                <p><?php echo $information->phone_2; ?></p>
                            <?php endif; ?>                                                                                   
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <?php if($information->email && $information->email != '') : ?>
                                <p><?php echo $information->email; ?></p>
                            <?php endif; ?> 
                        </li>
                        <?php if($information->address && $information->address != '') : ?>
                        <li>
                            <i class="fa fa-location-arrow"></i>
                            <?php echo $information->address; ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php if($information->lat && $information->lat != '' && $information->lng && $information->lng != '') : ?>
                <div class="col-xs-12">
                    <div id="map"></div>
                </div>
                
                <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
               
                <script type="text/javascript">
                    ymaps.ready(function () {
                        var myMap = new ymaps.Map('map', {
                                center: [<?php echo $information->lat; ?>, <?php echo $information->lng; ?>],
                                zoom: 14,
                                controls: ["zoomControl", "zoomControl", "fullscreenControl"]
        
                            }, {
                                searchControlProvider: 'yandex#search'
                            }),
        
                            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                            ),
        
                            myPlacemarkWithContent = new ymaps.Placemark([<?php echo $information->lat; ?>, <?php echo $information->lng; ?>], {

                            }, {
                                iconLayout: 'default#imageWithContent',
                                iconImageHref: '/img/ico_7.png',
                                iconImageSize: [35, 50],
                                iconImageOffset: [-20, -50],
                                iconContentOffset: [15, 15],
                                iconContentLayout: MyIconContentLayout
                            });
                    
                        myMap.geoObjects
                            .add(myPlacemarkWithContent);
                    });                  
                </script>
            <?php endif; ?>            
        </div>
    </div>
</div>
<!-- contact-area end -->