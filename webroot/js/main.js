"use strict";

$(function() {
    
    var defTitleOne = $('.head-title').html(); 
    var defBodyOne = $('.index-top-note').text();
    var defLinkOne = $('#linkOne').attr('href');
    
    var defTitleTwo = $('#dopTitleOne').html(); 
    var defBodyTwo = $('#dopBodyOne').text();
    var defLinkTwo = $('#gray_1').attr('href');
    
    var defTitleThree = $('#dopTitleTwo').html(); 
    var defBodyThree = $('#dopBodyTwo').text();
    var defLinkThree = $('#gray_2').attr('href');           
    
    //alert(defLinkThree);
    setInterval(function(){
        var gray = $('#indexTop').data('gray');
        if($('#indexTop').data('gray') == 'gray_1'){
            //var backGround = $('#gray_1').data('back');
            //$('#indexTop').css({'background':'url(../img/'+backGround+') center top no-repeat'});
            
            $('.head-title').animate({opacity:0},700, function(){ $(this).html(defTitleTwo).animate({opacity:1}, 700); });
            $('.index-top-note').animate({opacity:0},700, function(){ $(this).html(defBodyTwo).animate({opacity:1}, 700); });
            $('#linkOne').attr('href', defLinkTwo);
            
            $('#dopTitleOne').animate({opacity:0},700, function(){ $(this).html(defTitleOne).animate({opacity:1}, 700); });
            $('#dopBodyOne').animate({opacity:0},700, function(){ $(this).html(defBodyOne).animate({opacity:1}, 700); });
            $('#gray_1').attr('href', defLinkOne);            
            
            
            $('.bg-grad.active').removeClass('active');
            $('.bg-grad.two').addClass('active');
            
            
            
            $('#indexTop').data('gray','gray_2').attr('data-gray', 'gray_2');
        }else if($('#indexTop').data('gray') == 'gray_2'){
            //var backGround = $('#gray_2').data('back');
            //$('#indexTop').css({'background':'url(../img/'+backGround+') center top no-repeat'});


            $('.head-title').animate({opacity:0},700, function(){ $(this).html(defTitleThree).animate({opacity:1}, 700); });
            $('.index-top-note').animate({opacity:0},700, function(){ $(this).html(defBodyThree).animate({opacity:1}, 700); });
            $('#linkOne').attr('href', defLinkThree);
            
            $('#dopTitleTwo').animate({opacity:0},700, function(){ $(this).html(defTitleTwo).animate({opacity:1}, 700); });
            $('#dopBodyTwo').animate({opacity:0},700, function(){ $(this).html(defBodyTwo).animate({opacity:1}, 700); });
            $('#gray_2').attr('href', defLinkTwo);
            
            $('.bg-grad.active').removeClass('active');
            $('.bg-grad.three').addClass('active');            
                        
            $('#indexTop').data('gray','gray_3').attr('data-gray', 'gray_3');
        }else{
            //var backGround = 'back.jpg';
            //$('#indexTop').css({'background':'url(../img/back.jpg) center top no-repeat'});
            
            $('.head-title').animate({opacity:0},700, function(){ $(this).html(defTitleOne).animate({opacity:1}, 700); });
            $('.index-top-note').animate({opacity:0},700, function(){ $(this).html(defBodyOne).animate({opacity:1}, 700); });
            $('#linkOne').attr('href', defLinkOne);
            
            $('#dopTitleOne').animate({opacity:0},700, function(){ $(this).html(defTitleTwo).animate({opacity:1}, 700); });
            $('#dopBodyOne').animate({opacity:0},700, function(){ $(this).html(defBodyTwo).animate({opacity:1}, 700); });
            $('#gray_1').attr('href', defLinkTwo);
            
            $('#dopTitleTwo').animate({opacity:0},700, function(){ $(this).html(defTitleThree).animate({opacity:1}, 700); });
            $('#dopBodyTwo').animate({opacity:0},700, function(){ $(this).html(defBodyThree).animate({opacity:1}, 700); });
            $('#gray_2').attr('href', defLinkThree);                         
            
            $('.bg-grad.active').removeClass('active');
            $('.bg-grad.one').addClass('active');            
                       
            $('#indexTop').data('gray','gray_1').attr('data-gray', 'gray_1');            
        }

    }, 7000);

    var winWidth = $(window).width();
    //alert(winWidth);
    
    if(winWidth < 901){
        if(!$('.logo').hasClass('small-logo')){
            $('.logo').addClass('small-logo');
            $('.logo a img').attr({'src':'/img/White.svg'});
        }
        if($('.phone-block').hasClass('black-color') && !$('.phone-block').hasClass('phone-small')){
            $('.phone-block').addClass('phone-small');
            $('.phone-block a').css({'color': '#fff'});
        }
        
    }else{
        if($('.logo').hasClass('small-logo')){
            $('.logo').removeClass('small-logo');
            $('.logo a img').attr({'src':'/img/Dark.svg'});
        }
        if($('.phone-block').hasClass('black-color') && $('.phone-block').hasClass('phone-small')){
            $('.phone-block').removeClass('phone-small');
            $('.phone-block a').css({'color': '#2d2d2d'});
        }        
    }
    
    $(window).resize(function() {
        
        winWidth = $(window).width();
        
        if(winWidth < 901){
            if(!$('.logo').hasClass('small-logo')){
                $('.logo').addClass('small-logo');
                $('.logo a img').attr({'src':'/img/White.svg'});
            }
            if($('.phone-block').hasClass('black-color') && !$('.phone-block').hasClass('phone-small')){
                $('.phone-block').addClass('phone-small');
                $('.phone-block a').css({'color': '#fff'});
            }            
        }else{
            if($('.logo').hasClass('small-logo')){
                $('.logo').removeClass('small-logo');
                $('.logo a img').attr({'src':'/img/Dark.svg'});
            }
            if($('.phone-block').hasClass('black-color') && $('.phone-block').hasClass('phone-small')){
                $('.phone-block').removeClass('phone-small');
                $('.phone-block a').css({'color': '#2d2d2d'});
            }            
        }        
    
        
    });    


    $('.info-block').each(function(){
       var self = $(this);
       var imgHeight = self.find('.info-img').height();
       self.css({'min-height':imgHeight});
       //alert(imgHeight);
       
        
    });

    $('.but-top').on('click', function(event){
    	event.preventDefault();
    	$('body,html').animate({
    		scrollTop: 0,
    	 	}, 700
    	);
    });

    $(".move-button").click(function () {
        
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        //alert(destination);
        $('body, html').animate({ scrollTop: destination }, 600);
        return false; 
    });    
    
    
    $('.open-pod').each(function(){
       var self = $(this);
       

       self.hover(function(){
        
           if(!self.find('.inv-nav').hasClass('opened')){
              self.find('.inv-nav').slideDown(300).addClass('opened');  
           }        
        
        
       },
       function(){
        
        setTimeout(function(){
            self.find('.inv-nav').removeClass('opened');
            self.find('.inv-nav').slideUp(300);
            }, 300
        );
       }); 
    });
    
    $('.small-open').click(function(){
        
        if($(this).hasClass('opened-left')){
            $('.left-nav-back').animate({width:'0'}, 300);
            $(this).removeClass('opened-left');
            $('.open-nav').show(200);
            $('.close-nav').hide(200);
        }else{
            $('.left-nav-back').animate({width:'100%'}, 300);
            $(this).addClass('opened-left');
            $('.open-nav').hide(200);
            $('.close-nav').show(200);            
        }
        
    });



    $('.form-phone').focus(function(){
        $(this).css({'border':'1px solid #c1c1c1'});
    });

    
    $('.form-wrap').on('submit', function(){

       var self = $(this);
        
        //self.submit(function() {
            var fname = self.find('.form-name').val();
            var phone = self.find('.form-phone').val();
            var lang = self.find('.lang').val();
            var type = self.find('.type').val();
                        
            if (phone == '') {
                self.find('.form-phone').css({'border':'1px solid #dc3545'});
                
                return false;
            }else{

                $.ajax({
                    url: '/About/sendBack',
                    type: "POST",
                    data: { 'fname': fname, 'phone' : phone },
        			dataType: 'json',
        			cache: false,                    
                    success: function(res) {
                        self.find('.form-name').val('');
                        self.find('.form-phone').val('');
                        
                        if(type == 'body'){
                            if(lang == 'ru'){
                                self.find('.res-msg').html(res.resMes.ru).addClass('succes-mes').removeClass('error-mes').fadeIn();
                            }else{
                                self.find('.res-msg').html(res.resMes.en).addClass('succes-mes').removeClass('error-mes').fadeIn();
                            }
                            setTimeout(function() {
                                self.find('.res-msg').fadeOut('slow');
                            }, 5000);
                        }else{
                            $('.close-result').slideUp(300);
                            $('.result-block').slideDown(300);                            
                        }
                    },
                    error: function(res){
                        if(lang == 'ru'){
                            self.find('.res-msg').html(res.resMes.ru).addClass('error-mes').removeClass('succes-mes').fadeIn();
                        }else{
                            self.find('.res-msg').html(res.resMes.en).addClass('error-mes').removeClass('succes-mes').fadeIn();
                        }
                        setTimeout(function() {
                            self.find('.res-msg').fadeOut('slow');
                        }, 5000);                        
                    }
                });
                
                return false;
            }
    


        //    return false;
        //});       
       
       
       return false;
       
       
       
       
       
        
    });
   
    
});