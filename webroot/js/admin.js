$(function(){

$('.panel-body').each(function(){
   var self = $(this);
   
   self.on('click', '.open-hotel-info', function(){
    if($(this).hasClass('info-opened')){
        $(this).removeClass('info-opened').html('Показать');
        self.find('.close-hotel-info').slideUp(300);
    }else{
        $(this).addClass('info-opened').html('Скрыть');
        self.find('.close-hotel-info').slideDown(300);
    }    
   }); 
});

    $('.charact-wrapper').each(function(){
        
        var self = $(this);
        
        self.on('click', '.charsct-title', function(){
            self.find('.charact-body').slideToggle(300);
        });
    });




    $('.image-popup-no-margins').magnificPopup({
    	type: 'image',
    	closeOnContentClick: true,
    	closeBtnInside: false,
    	fixedContentPos: true,
    	mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    	image: {
    		verticalFit: true
    	},
    	zoom: {
    		enabled: true,
    		duration: 300 // don't foget to change the duration also in CSS
    	}
    });



    
    
    $('#title').change(function(){
        
        var alias = $('#alias').val();
        
        if(alias == ''){
            if($(this).val() != ''){
                
                $.ajax({
                    type: "POST",
                    url: "/Admin/getAlias",
                    dataType: "json",
                    data: {'title' : $(this).val()},            
                    error: function () {
                        alert( "При выполнении запроса произошла ошибка. :(" );
                    },
                    success: function ( data ) {                         
                        
                        $('#alias').val(data.alias);
                    }
                
                });            
                
            }else{
                $('#alias').val('');
                return;
            }
        }
    });


$.datepicker.setDefaults($.datepicker.regional['ru']);
var dateFormat = "dd-mm-yy",
  from = $( ".dateFrom" )
    .datepicker({
      dateFormat: "dd-mm-yy",  
      /*defaultDate: "+1w",*/
      minDate: 0,
      changeMonth: false,
      numberOfMonths: 1,
      modal: true
    })
    .on( "change", function() {
      to.datepicker( "option", "minDate", getDate( this ) );
    }),
  to = $( ".dateTo" ).datepicker({
    dateFormat: "dd-mm-yy",    
    /*defaultDate: "+1w",*/
    minDate: 0,    
    changeMonth: false,
    numberOfMonths: 1,
    modal: true
  })
  .on( "change", function() {
    from.datepicker( "option", "maxDate", getDate( this ) );
  });    

function getDate( element ) {
  var date;
  try {
    date = $.datepicker.parseDate( dateFormat, element.value );
  } catch( error ) {
    date = null;
  }

  return date;
}    
   
    
});