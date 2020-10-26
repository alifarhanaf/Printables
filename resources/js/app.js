/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$(document).ready(function() {
    // slick slider
    
    
    
    
      $('.All_Colors label').click(function(event){
        $(this).parents('.All_Colors').find('label').removeAttr('data-active',false)
          $(this).parents('.All_Colors').find('input').removeAttr('checked',false)
          $(this).attr('data-active',true)
          $(this).parent('.main_colors').find('input[type="radio"]').attr('checked','checked')
      })
    
    
       
      $(".image_checker").change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
        }
        else
        {
          
        
        }
    });
    
    
    
    $('.printLocation_name label').click(function(event){
      
      var checkNow = $(this).parent('.printLocation_name').find('input')
    
      if(checkNow.attr('checked')) {
        checkNow.removeAttr('checked','checked')
    } else {
      checkNow.attr('checked','checked')
    }
    
    })
    
    
    
    
    });